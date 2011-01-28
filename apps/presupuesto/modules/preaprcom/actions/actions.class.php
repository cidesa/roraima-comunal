<?php

/**
 * preaprcom actions.
 *
 * @package    Roraima
 * @subpackage preaprcom
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 36423 2010-02-09 21:11:15Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class preaprcomActions extends autopreaprcomActions
{
  public function executeIndex()
  {
    return $this->forward('preaprcom', 'edit');
  }


  // Para incluir funcionalidades al executeEdit()
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

	$this->configGrid();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }
    	$c = new Criteria();
    	$c->add(CpcomproPeer::APRCOM,'N');
    	$c->add(CpcomproPeer::STACOM,'A');
    	//$c->add(CpcomproPeer::APRCOM,ISNOTNULL,Criteria::CUSTOM);
    	$sql = "((cpcompro.APRCOM<>'S' and cpcompro.APRCOM<>'R') or cpcompro.APRCOM isnull)";
    	$c->add(CpcomproPeer::APRCOM, $sql, Criteria :: CUSTOM);
    	$c->addAscendingOrderByColumn(CpcomproPeer::REFCOM);
    	$c->addAscendingOrderByColumn(CpcomproPeer::FECCOM);
    	$reg = CpcomproPeer::doSelect($c);

	    //$this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/preaprcom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cpcompro',$reg);
        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/preaprcom/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_cpcompro');

	    $this->columnas[1][0]->setHTML('onClick="verificar(this.id)"');
	    $this->columnas[1][1]->setHTML('onClick="verificar(this.id)"');

	    $this->obj = $this->columnas[0]->getConfig($reg);

        $this->cpcompro->setObj($this->obj);

  }





  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {

    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->cpcompro->getObj());

    $coderr = Presupuesto::salvarPreaprcom($clasemodelo,$grid);

    return $coderr;
    //return parent::saving($clasemodelo,$grid);
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
