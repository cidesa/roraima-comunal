<?php

/**
 * tesaprord actions.
 *
 * @package    Roraima
 * @subpackage tesaprord
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesaprordActions extends autotesaprordActions
{
  public function executeIndex()
  {
    return $this->forward('tesaprord', 'edit');
  }

  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
  	$this->cambiaretiapr="";
  	$this->nometiaprad="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesaprord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('cambiaretiapr',$varemp['aplicacion']['tesoreria']['modulos']['tesaprord']))
	       {
	       	$this->cambiaretiapr=$varemp['aplicacion']['tesoreria']['modulos']['tesaprord']['cambiaretiapr'];
	       if(array_key_exists('nometiaprad',$varemp['aplicacion']['tesoreria']['modulos']['tesaprord']))
	       {
	       	$this->nometiaprad=$varemp['aplicacion']['tesoreria']['modulos']['tesaprord']['nometiaprad'];
	       }
	       }
	     }

    $this->configGrid();
    $this->opordpag->setFilasord($this->filas);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $this->configGridOrdenes();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridOrdenes()
  {
    $c = new Criteria();
    $c->add(OpordpagPeer::STATUS,'N');
    //$c->add(OpordpagPeer::APROBADOORD,null);
    $sql = "(((opordpag.APROBADOORD<>'A' and opordpag.APROBADOORD<>'R') or opordpag.APROBADOORD isnull) and ((opordpag.APROBADOTES<>'A' and opordpag.APROBADOTES<>'R') or opordpag.APROBADOTES isnull))";
    $c->add(OpordpagPeer::APROBADOORD, $sql, Criteria :: CUSTOM);
    //$c->add(OpordpagPeer::APROBADOTES,null);
    $c->add(OpordpagPeer::NUMCHE,null);
    $detalle = OpordpagPeer::doSelect($c);

    $this->filas=count($detalle);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesaprord/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordenes');

    $this->columnas[1][0]->setHTML('onClick="verificar(this.id)"');
	$this->columnas[1][1]->setHTML('onClick="verificar(this.id)"');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
  }

 protected function saving($opordpag)
 {
   $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
   OrdendePago::aprobarOrdenes($opordpag,$grid);
   return -1;
 }
}
