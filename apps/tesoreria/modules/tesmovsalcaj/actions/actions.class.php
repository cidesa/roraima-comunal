<?php

/**
 * tesmovsalcaj actions.
 *
 * @package    Roraima
 * @subpackage tesmovsalcaj
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmovsalcajActions extends autotesmovsalcajActions
{
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
   $this->setVars();
   $this->configGrid();
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
    $this->configGridDetalle($this->tssalcaj->getRefsal());

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetalle($refsal='')
  {
  	$c = new Criteria();
  	$c->add(TsdetsalPeer::REFSAL,$refsal);
  	$detalle = TsdetsalPeer::doSelect($c);

  	$mascara=$this->mascaraarticulo;
  	$lonarti=$this->lonart;
    $mascaracategoria=$this->mascaracategoria;
    $loncat=$this->loncat;
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesmovsalcaj/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_tsdetsal');

    if ($refsal=='')
    {
      $obj= array('codart' => 1, 'desart' => 2);
      $params= array('param1' => $lonarti, 'val2');

      $obj2= array('codcat' => 3);
      $params2= array('param1' => $loncat);

      $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,7);" onBlur="javascript:event.keyCode=13; ajaxarticulos(event,this.id);"');
      $this->columnas[1][0]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Forestcos',$params);
      $this->columnas[1][2]->setHTML('type="text" size="17" maxlength="'.chr(39).$loncat.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,7);" onBlur="javascript:event.keyCode=13; ajaxcategoria(event,this.id);"');
      $this->columnas[1][2]->setCatalogo('npcatpre','sf_admin_edit_form',$obj2,'Npcatpre_Almsolegr',$params2);
      $this->columnas[1][3]->setHTML(' size="10" onKeyPress=totalizarMonto(event);');
      $this->columnas[1][4]->setHTML(' size="10" onKeyPress=totalizarMonto(event);');
      $this->columnas[1][3]->setEsTotal(true,'tssalcaj_monsal');
    }
    else
    {
      $this->columnas[0]->setEliminar(false);
      $this->columnas[0]->setFilas(0);
      $this->columnas[1][0]->setHTML('type="text" size="17" readonly=true; ');
      $this->columnas[1][2]->setHTML('type="text" size="17" readonly=true; ');
      $this->columnas[1][3]->setHTML(' size="10" readonly=true; ');
      $this->columnas[1][4]->setHTML(' size="10" readonly=true; ');
      $this->columnas[1][3]->setEsTotal(true,'tssalcaj_monsal');
    }

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->tssalcaj->setObj($this->obj);
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
    $javascript="";
    switch ($ajax){
      case '1':
        if ($codigo!="")
        {
          $a= new Criteria();
          $a->add(OpbenefiPeer::CEDRIF,$codigo);
          $resul=OpbenefiPeer::doSelectOne($a);
          if ($resul)
          {
          	$dato1=$resul->getNomben();
          	$dato2=$resul->getCodcta();
            $javascript="$('tssalcaj_agregabenefi').value='N'; ";
          }else
          {
          	$dato1=""; $dato2="";
          	$javascript="$('tssalcaj_nomben').disabled=false; $('tssalcaj_agregabenefi').value='S'; $('tssalcaj_nomben').focus();";
          }
        }
        $output = '[["tssalcaj_nomben","'.$dato1.'",""],["tssalcaj_ctapag","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '2':
          $dateFormat = new sfDateFormat('es_VE');
          $fecha = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));
          $fec1=split("-",$fecha);
          if (checkdate(intval($fec1[1]), intval($fec1[2]), intval($fec1[0])))
          {
            if(H::validarPeriodoFiscal($fecha)==false)
           {
          	 $javascript="alert('Fecha Fuera del Período'); $('tssalcaj_fecsal').value='';";
           }
           else
           {
           	if ($this->getRequestParameter('numcue')!="")
           	{
           	 if (Tesoreria::el_Banco_Esta_Cerrado($this->getRequestParameter('numcue'),$fec1[1],$fec1[0]))
           	 {
              $javascript="alert_('El Mes ya se encuentra cerrado, por lo que no se podr&acute registrar Movimiento en esta Fecha'); $('tssalcaj_fecsal').value='';";
           	 }
           	}
           	else
           	{
           	  $javascript="alert('El Número de Cuenta Bancaria para Caja Chica no se encuentra Definido'); $('tssalcaj_fecsal').value='';";
           	}
           }
          }
          else
          {
          	$javascript="alert_('La Fecha es Inv&aacute;lida'); $('tssalcaj_fecsal').value='';";
          }
          $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        break;
      case '3':
        $cajtexcom= $this->getRequestParameter('cajtexcom');
        $cajtexmos= $this->getRequestParameter('cajtexmos');
        $monto= $this->getRequestParameter('monto');
        $partida= $this->getRequestParameter('partida');
        $u= new Criteria();
        $u->add(CaregartPeer::CODART,$codigo);
        $resul= CaregartPeer::doSelectOne($u);
        if ($resul)
        {
          $dato1=eregi_replace("[\n|\r|\n\r]", "", $resul->getDesart());
          $dato2=number_format($resul->getCosult(),2,',','.');
          $dato3=$resul->getCodpar();
        }
        else
        {
          $dato1=""; $dato2=""; $dato3="";
          $javascript="alert_('El C&oacute;digo del art&iacute;culo no existe'); $('$cajtexcom').value='';";
        }
        $output = '[["'.$cajtexmos.'","'.$dato1.'",""],["'.$monto.'","'.$dato2.'",""],["'.$partida.'","'.$dato3.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '4':
       $cajtexcom= $this->getRequestParameter('cajtexcom');
       $javascript="";
       $q= new Criteria();
       $q->add(NpcatprePeer::CODCAT,$this->getRequestParameter('codigo'));
       $data= NpcatprePeer::doSelectOne($q);
       if (!$data)
       {
       	$javascript="alert('La Categoria no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
       }
       else
       {
         $codpre=$this->getRequestParameter('codigo').'-'.$this->getRequestParameter('partida');
         $r= new Criteria();
         $r->add(CpdeftitPeer::CODPRE,$codpre);
         $reg= CpdeftitPeer::doSelectOne($r);
         if(!$reg)
         {
         	$javascript="alert('La Código Presupuestario formado por la Categoria y la Partida del articulo no existe --> $codpre'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
         }else {
           $r1= new Criteria();
           $r1->add(CpasiiniPeer::CODPRE,$codpre);
           $reg1= CpasiiniPeer::doSelectOne($r1);
            if(!$reg1)
             {
               $javascript="alert('La Código Presupuestario formado por la Categoria y la Partida del articulo no tiene asignación Inicial --> $codpre'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
         }
       }
       }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
       break;
      default:
        break;
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
    $this->tssalcaj = $this->getTssalcajOrCreate();
      try{ $this->updateTssalcajFromRequest();}
      catch (Exception $ex){}
      $this->configGrid();
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

      $x=$grid[0];
      $i=0;
      if (count($x)==0)
      {
        $this->coderr=525;
        return false;
      }      
      $dateFormat = new sfDateFormat('es_VE');
      $fecha = $dateFormat->format($this->getRequestParameter('tssalcaj[fecsal]'), 'i', $dateFormat->getInputPattern('d'));
      $fec1=split("-",$fecha);
       if(H::validarPeriodoFiscal($fecha)==false)
       {
           $this->coderr=543;
           return false;
       }
       if ($this->getRequestParameter('tssalcaj[numcue]')!=""){
           if (Tesoreria::el_Banco_Esta_Cerrado($this->getRequestParameter('tssalcaj[numcue]'),$fec1[1],$fec1[0]))
           {
             $this->coderr=544;
             return false;
           }
       }
       

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  }

   public function setVars()
  {
  	$b= new Criteria();
  	$dat=OpdefempPeer::doSelectOne($b);
  	if ($dat)
  	{
  	  $this->tssalcaj->setTipdoc($dat->getTipcajchi());
  	  $this->tssalcaj->setNumcue($dat->getCuecajchi());
  	}
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->lonart=strlen($this->mascaraarticulo);
    $this->mascaracategoria = Herramientas::getObtener_FormatoCategoria();
    $this->loncat=strlen($this->mascaracategoria);
  }

  protected function saving($tssalcaj)
  {
  	if ($tssalcaj->getId())
  	{
      $tssalcaj->save();
  	}
  	else
  	{
  	  $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	  Tesoreria::salvarSalidasCajas($tssalcaj,$grid);
  	}
    return -1;
  }

  protected function deleting($tssalcaj)
  {
   Herramientas::EliminarRegistro('Tsdetsal','Refsal',$tssalcaj->getRefsal());
   $c= new Criteria();
   $c->add(TsmovlibPeer::REFLIB,$tssalcaj->getRefsal());
   $c->add(TsmovlibPeer::NUMCUE,$tssalcaj->getNumcue());
   TsmovlibPeer::doDelete($c);
   $tssalcaj->delete();
   return -1;
  }


}
