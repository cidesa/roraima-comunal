<?php

/**
 * almprocomart actions.
 *
 * @package    Roraima
 * @subpackage almprocomart
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almprocomartActions extends autoalmprocomartActions
{

  private $coderror = -1;

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    //$this->caprocomart = CaprocomartPeer::retrieveByPk($this->getRequestParameter('id'));
    //$this->forward404Unless($this->caprocomart);
    $c = new Criteria();
 	$c->add(CaprocomartPeer::FECPROCOM,$this->getRequestParameter('fecprocom'));
	$c->add(CaprocomartPeer::CODCAT,$this->getRequestParameter('codcat'));
    $datos=CaprocomartPeer::doSelect($c);
    try
    {
      // $this->deleteCaprocomart($this->caprocomart);
	    foreach ($datos as $arreglo)
	    {
	      $arreglo->delete();
	    }
	    $this->SalvarBitacora($this->getRequestParameter('id') ,'Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Caprocomart. Make sure it does not have any associated items.');
      return $this->forward('almprocomart', 'list');
    }

    return $this->redirect('almprocomart/list');
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
	$this->setVars();
    $this->caprocomart = $this->getCaprocomartOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaprocomartFromRequest();

      $this->saveCaprocomart($this->caprocomart);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almprocomart/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almprocomart/list');
      }
      else
      {
        return $this->redirect('almprocomart/edit?id='.$this->caprocomart->getFecprocom().'&fecprocom='.$this->caprocomart->getFecprocom().'&codcat='.$this->caprocomart->getCodcat());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  protected function getCaprocomartOrCreate($fecprocom = 'fecprocom',$codcat = 'codcat',$id='id')
  {
    //if (!$this->getRequestParameter($fecprocom) && !$this->getRequestParameter($codcat))
    if (!$this->getRequestParameter($id))
    {
      $caprocomart = new Caprocomart();
      $this->configGrid();
    }
    else
    {
       $datos = $this->getRequestParameter('caprocomart');
       $dateFormat = new sfDateFormat($this->getUser()->getCulture());
       if ($this->getRequestParameter($fecprocom)=="")
       	 $fecha= $dateFormat->format($datos['fecprocom'], 'i', $dateFormat->getInputPattern('d'));
       else
         $fecha=$this->getRequestParameter($fecprocom);

       if ($this->getRequestParameter($codcat)=="")
       	 $codcat= $datos['codcat'];
       else
         $codcat=$this->getRequestParameter($codcat);
       $c = new Criteria();
  	   $c->add(CaprocomartPeer::FECPROCOM,$fecha);
	   $c->add(CaprocomartPeer::CODCAT,$codcat);
   	   $caprocomart = CaprocomartPeer::doSelectOne($c);
   	   if ($caprocomart)
       		$this->configGrid($fecha,$codcat);
       else
       		 $this->configGrid();

    }

    return $caprocomart;
  }

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $resp=-1;
    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:
   $this->setVars();
   $this->caprocomart= $this->getCaprocomartOrCreate();
    try{
    	 $this->updateCaprocomartFromRequest();
    }
   catch(Exception $ex){}

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
    	if (!$this->caprocomart->getId()) $resp=Compras::Validar_Almprocomart($this->caprocomart->getFecprocom(),$this->caprocomart->getCodcat());
		if ($resp!=-1)
        {
        	$this->coderror=$resp;
			return false;
        }
        else
        {  //Validar que el grid tenga datos
	        $grid=Herramientas::CargarDatosGrid($this,$this->obj);
			$x=$grid[0];
			if (count($x)==0)
			{
			   $this->coderror=140;
			   return false;
			}
			return true;
        }
    }
    else return true;

  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
     $this->setVars();
   $this->caprocomart= $this->getCaprocomartOrCreate();
    try{
    	 $this->updateCaprocomartFromRequest();
    }
   catch(Exception $ex){}

    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    $this->labels = $this->getLabels();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }


  public function setVars()
  {
    $this->mascaracategoria = Herramientas::getObtener_FormatoCategoria();
    $this->loncategoria=strlen($this->mascaracategoria);
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->estados=$this->CargarEstado();
    $this->municipios=array();
    $this->parroquias=array();
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
     $cajtexmos=$this->getRequestParameter('cajtexmos');

     if ($this->getRequestParameter('ajax')=='1')
      {
     		 $fecha=$this->getRequestParameter('fecha');
     		 $codcat=$this->getRequestParameter('codigo');
     		if (trim($fecha)!="")
	        {
	            $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	            $fecha = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
	        }
	        $c = new Criteria();
	        $c->add(CaprocomartPeer::FECPROCOM,$fecha);
	   		$c->add(CaprocomartPeer::CODCAT,$codcat);
	   		$per = CaprocomartPeer::doSelect($c);
	   		if ($per) //hay datos
	   		{
	   			$cajita="yaexiste";
	   			$existe="S";
 				$output = '[["'.$cajita.'","'.$existe.'",""]]';
	   		}
           else
           {
           		$cajita="yaexiste";
	   			$existe="N";
	           	$dato=NpcatprePeer::getCategoria($this->getRequestParameter('codigo'));
	            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajita.'","'.$existe.'",""]]';
           }
      }
      if ($this->getRequestParameter('ajax')=='2')
      {
            $dato=CaregartPeer::getDesart($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }

      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($fecpro='',$coduni='')
	 {
        //darle formato a la fecha
    /*    if (trim($fecpro)!="")
        {
            $dateFormat = new sfDateFormat($this->getUser()->getCulture());
            $fecpro = $dateFormat->format($fecpro, 'i', $dateFormat->getInputPattern('d'));
        }*/
	   $c = new Criteria();
	   if (trim($fecpro)!="") {$c->add(CaprocomartPeer::FECPROCOM,$fecpro);}
	   $c->add(CaprocomartPeer::CODCAT,$coduni);

	   $per = CaprocomartPeer::doSelect($c);


       $mascaraarticulo=$this->mascaraarticulo;
       $lonart=strlen($this->mascaraarticulo);

        // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid
        $opciones->setEliminar(true);
        $opciones->setTabla('Caprocomart');
        $opciones->setAnchoGrid(1800);
        $opciones->setAncho(1800);
        $opciones->setFilas(20);
        $opciones->setName('a');
        $opciones->setTitulo('Artículos a Programar');
        $opciones->setHTMLTotalFilas(' ');

       $obj= array('codart' => 1, 'desart' => 2);
       $params= array('param1' => $lonart);

        // Se generan las columnas
       $col1 = new Columna('Cód. Artículo');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codart');
       $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} "');
       $col1->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almprocomart',$params);
       $col1->setHTML('type="text" size="10" maxlength="'.chr(39).$lonart.chr(39).'"');
	   $col1->setAjax('almprocomart',2,2);

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTAREA);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('desart');
        $col2->setHTML('type="text" size="30x1" readonly=true');

        $col3 = new Columna('Cantidad');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setNombreCampo('canpro');
        $col3->setEsNumerico(true);
        $col3->setHTML('type="text" size="10"');
        $col3->setJScript('onBlur="javascript:event.keyCode=13;return entermonto(event,this.id)"');

        $col4 = clone $col3;
        $col4->setTitulo('Monto Estimado');
        $col4->setNombreCampo('monpro');
        $col4->setHTML('type="text" size="10"');


        $col5 = new Columna('Inicio');
	    $col5->setTipo(Columna::COMBO);
	    $col5->setEsGrabable(true);
	    $col5->setNombreCampo('mespro');
	    $col5->setCombo(Constantes::ListaMeses());
	    $col5->setHTML(' ');

		$col6 = new Columna('Fuente de Financiamiento');
	    $col6->setTipo(Columna::COMBO);
	    $col6->setEsGrabable(true);
	    $col6->setNombreCampo('codfin');
	    $col6->setCombo(self::CargarFuenteFinanciamiento());
	    $col6->setHTML(' ');

	    $col7 = new Columna('Codigo Estado');
	    $col7->setTipo(Columna::TEXTO);
	    $col7->setEsGrabable(true);
	    $col7->setAlineacionObjeto(Columna::CENTRO);
	    $col7->setAlineacionContenido(Columna::CENTRO);
	    $col7->setNombreCampo('codedo');
	    $col7->setOculta(true);

		$col8 = new Columna('Estado');
	    $col8->setTipo(Columna::TEXTO);
	    $col8->setAlineacionObjeto(Columna::CENTRO);
	    $col8->setAlineacionContenido(Columna::CENTRO);
	    $col8->setNombreCampo('nomest');
	    $col8->setHTML('type="text" size="25" readonly=true');

		$col9= new Columna('Codigo Municipio');
	    $col9->setTipo(Columna::TEXTO);
	    $col9->setEsGrabable(true);
	    $col9->setAlineacionObjeto(Columna::CENTRO);
	    $col9->setAlineacionContenido(Columna::CENTRO);
	    $col9->setNombreCampo('codmun');
	    $col9->setOculta(true);

		$col10 = new Columna('Ciudad');
	    $col10->setTipo(Columna::TEXTO);
	    $col10->setAlineacionObjeto(Columna::CENTRO);
	    $col10->setAlineacionContenido(Columna::CENTRO);
	    $col10->setNombreCampo('nommun');
	    $col10->setHTML('type="text" size="25" readonly=true');

		$col11= new Columna('Codigo Parroquia');
	    $col11->setTipo(Columna::TEXTO);
	    $col11->setEsGrabable(true);
	    $col11->setAlineacionObjeto(Columna::CENTRO);
	    $col11->setAlineacionContenido(Columna::CENTRO);
	    $col11->setNombreCampo('codciu');
	    $col11->setOculta(true);

		$col12 = new Columna('Parroquia');
	    $col12->setTipo(Columna::TEXTO);
	    $col12->setAlineacionObjeto(Columna::CENTRO);
	    $col12->setAlineacionContenido(Columna::CENTRO);
	    $col12->setNombreCampo('nompar');
	    $col12->setHTML('type="text" size="25" readonly=true');

	    $col13 = new Columna('');
		$col13->setTipo(Columna::TEXTO);
		$col13->setEsGrabable(false);
		$col13->setAlineacionObjeto(Columna::IZQUIERDA);
		$col13->setAlineacionContenido(Columna::IZQUIERDA);
		$col13->setNombreCampo('anadir');
		$col13->setHTML('type="text" size="1" style="border:none" class="imagenannadir"');
		$col13->setJScript('onClick="agregargrid(this.id)"');


        // Se guardan las columnas en el objetos de opciones
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
        $opciones->addColumna($col9);
        $opciones->addColumna($col10);
        $opciones->addColumna($col11);
        $opciones->addColumna($col12);
        $opciones->addColumna($col13);

	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per);
	}


	  public function CargarFuenteFinanciamiento()
	  {
	    $c = new Criteria();
	    $lista = FortipfinPeer::doSelect($c);

	    $financ = array();

	    foreach($lista as $obj_financ)
	    {
	      $financ += array($obj_financ->getCodfin() => $obj_financ->getNomext());
	    }
	    return $financ;
	  }

  public function CargarEstado()
  {
    $tablas=array('Nppais');//areglo de los joins de las tablas
    $filtros_tablas=array('');//arreglo donde mando los filtros de las clases
    $filtros_variales=array('');//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codpai','nompai');// arreglos donde me traigo el nombre y el codigo
    $estadosresult = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
    $estados=array();
	foreach ($estadosresult as $est => $estv)
	{
		$estados[$est] = ucfirst($estv);
	}
    return $estados;

  }
   public function CargarMunicipio($codpais)
  {
    $tablas=array('Npestado');//areglo de los joins de las tablas
    $filtros_tablas=array('codpai');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codedo','nomedo');// arreglos donde me traigo el nombre y el codigo
    $municipio= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

    foreach ($municipio as $est => $estv)
	{
		$municipio[$est] = ucfirst($estv);
	}
    return $municipio;
  }


  public function CargarParroquia($codpais,$codestado)
  {
    $tablas=array('Npciudad');//areglo de los joins de las tablas
    $filtros_tablas=array('codpai','codedo');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codciu','nomciu');// arreglos donde me traigo el nombre y el codigo
    $parroquia= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

    foreach ($parroquia as $est => $estv)
	{
		$parroquia[$est] = ucfirst($estv);
	}
    return $parroquia;
  }

   public function executeCombo()
  {
    if ($this->getRequestParameter('par')=='1')
    {
      $this->municipios = $this->Cargarmunicipio($this->getRequestParameter('estado'));
      $this->tipo='E';
    }
    elseif ($this->getRequestParameter('par')=='2')
    {
      $this->parroquias = $this->Cargarparroquia($this->getRequestParameter('estado'),$this->getRequestParameter('municipio'));
      $this->tipo='M';
    }
  }

   /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveCaprocomart($caprocomart)
  {
  	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      try
      {
       Compras::Grabar_Almprocomart($caprocomart,$grid);
      }
       catch (Exception $ex)
      {
       $coderr = 0;
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        return $coderr;
      }

  }
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caprocomart/filters');

    // pager
    $this->pager = new sfPropelPager('Caprocomart', 10);
    $c = new Criteria();
	$c->addSelectColumn(CaprocomartPeer::FECPROCOM);
	$c->addSelectColumn("0 AS CANPRO");
    $c->addSelectColumn("0 AS MONPRO");
    $c->addSelectColumn("0 AS MESPRO");
    $c->addSelectColumn("0 AS CODEDO");
    $c->addSelectColumn(CaprocomartPeer::CODCAT);
    $c->addSelectColumn("0 AS CODCIU");
    $c->addSelectColumn("0 AS CODMUN");
    $c->addSelectColumn("0 AS CODFIN");
    $c->addSelectColumn("0 AS CODART");
    $c->addSelectColumn("0 AS ID");



    $c->addGroupByColumn(CaprocomartPeer::FECPROCOM);
    $c->addGroupByColumn(CaprocomartPeer::CODCAT);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
}
