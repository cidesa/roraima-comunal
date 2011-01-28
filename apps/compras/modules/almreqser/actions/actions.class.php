<?php

/**
 * almreqser actions.
 *
 * @package    Roraima
 * @subpackage almreqser
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almreqserActions extends autoalmreqserActions
{
   private $coderror =-1;

	/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	    {
			$dato=CaregartPeer::getDesart($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
			$dato=NpcatprePeer::getCategoria($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	 if ($this->getRequestParameter('ajax')=='3')
	    {
	      $dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
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
  public function configGrid()
   {
	//////////////////////
	//GRID
	$c = new Criteria();
	$c->add(CaartreqserPeer::REQART,$this->careqartser->getReqart());
	$per = CaartreqserPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid
	$mascaraarticulo=$this->mascaraarticulo;
	$longart=strlen($this->mascaraarticulo);
	$mascaracategoria=$this->mascaracategoria;
	$longcat=strlen($this->mascaracategoria);

	if ($this->careqartser->getId())
		$opciones->setEliminar(false);
    else
       $opciones->setEliminar(true);

    $opciones->setTabla('Caartreqser');
	$opciones->setAnchoGrid(870);
	$opciones->setAncho(870);
	$opciones->setTitulo('Detalle de la Orden de Requisición');
	$opciones->setHTMLTotalFilas(' ');
	// Se generan las columnas

	$obj= array ('codart' => '1','desart' =>'2');
	$params= array('param1' => $longart);
	$col1 = new Columna('Código Servicio');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('codart');
	$col1->setAlineacionObjeto(Columna::CENTRO);
	$col1->setAlineacionContenido(Columna::CENTRO);
	$col1->setHTML('type="text" size="10"');
	$col1->setCatalogo('Caregart','sf_admin_edit_form',$obj,'caregart_almreqser',$params);
	$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
	$col1->setAjax('almreqser',1,2);

	$col2 = new Columna('Descripción');
	$col2->setTipo(Columna::TEXTAREA);
	$col2->setNombreCampo('desart');
	$col2->setEsGrabable(false);
	$col2->setAlineacionObjeto(Columna::CENTRO);
	$col2->setAlineacionContenido(Columna::CENTRO);
	$col2->setHTML('type="text" size="30x1" readonly=true');


	$obj1= array ('codcat' => '3','nomcat' =>'4');
	$params1= array('param1' => $longcat);
	$col3 = new Columna('Cod. Unidad');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('codcat');
    $col3->setAlineacionObjeto(Columna::CENTRO);
	$col3->setAlineacionContenido(Columna::CENTRO);
	$col3->setHTML('type="text" size="10"');
    $col3->setCatalogo('Npcatpre','sf_admin_edit_form',$obj1,'npcatpre_almreqser',$params1);
	$col3->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
	$col3->setAjax('almreqser',2,4);

	$col4 = new Columna('Des. Unidad');
	$col4->setTipo(Columna::TEXTAREA);
	$col4->setNombreCampo('nomcat');
	$col4->setEsGrabable(false);
	$col4->setAlineacionObjeto(Columna::CENTRO);
	$col4->setAlineacionContenido(Columna::CENTRO);
	$col4->setHTML('type="text" size="30x1" readonly=true');

    $col5 = new Columna('Realizado el...(Fecha)');
    $col5->setTipo(Columna::FECHA);
    $col5->setEsGrabable(false);
    $col5->setNombreCampo('fecrea');
    $col5->setAlineacionObjeto(Columna::CENTRO);
	$col5->setAlineacionContenido(Columna::CENTRO);
	$col5->setHTML('type="text" size="10" readonly=true' );
	$col5->setJScript('onKeyUp = "this.value=formateafecha(this.value);"');
        $col5->setVacia(true);

   	// Se guardan las columnas en el objetos de opciones
	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);

	// Ee genera el arreglo de opciones necesario para generar el grid
	$this->grid = $opciones->getConfig($per);
	}

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->careqartser = $this->getCareqartserOrCreate();
	$this->setVars();
    $this->configGrid();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCareqartserFromRequest();

      $this->saveCareqartser($this->careqartser);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almreqser/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almreqser/list');
      }
      else
      {
        return $this->redirect('almreqser/edit?id='.$this->careqartser->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
  protected function saveCareqartser($careqartser)
  {
   if ($careqartser->getId())
     {
	 $careqartser->save();
    }
    else //nuevo
    {
		$grid2=Herramientas::CargarDatosGrid($this,$this->grid);
		Articulos::salvarReqser($careqartser,$grid2);
	}
  }

  protected function deleteCareqartser($careqartser)
  {
    Articulos::eliminarReqser($careqartser);
  }


   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCareqartserFromRequest()
  {
    $careqartser = $this->getRequestParameter('careqartser');



    if (isset($careqartser['reqart']))
    {
      $this->careqartser->setReqart($careqartser['reqart']);
    }
    if (isset($careqartser['fecreq']))
    {
      if ($careqartser['fecreq'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($careqartser['fecreq']))
          {
            $value = $dateFormat->format($careqartser['fecreq'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $careqartser['fecreq'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->careqartser->setFecreq($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->careqartser->setFecreq(null);
      }
    }
    if (isset($careqartser['desreq']))
    {
      $this->careqartser->setDesreq($careqartser['desreq']);
    }
    if (isset($careqartser['codcatreq']))
    {
      $this->careqartser->setCodcatreq($careqartser['codcatreq']);
    }
    $this->careqartser->setStareq('A');
  }
  	public function setVars()
	{
		$this->mascaraarticulo = Herramientas::getMascaraArticulo();
		$this->longart=strlen($this->mascaraarticulo);
		$this->mascaracategoria = Herramientas::getObtener_FormatoCategoria();
		$this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    	$this->lonubi= Herramientas::ObtenerFormato('Bndefins','lonubi');
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

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->careqartser = $this->getCareqartserOrCreate();
       try{
	     $this->updateCareqartserFromRequest();
          }

    catch(Exception $ex){}
       $this->setVars();
   	   $this->configGrid();

       $grid=Herramientas::CargarDatosGrid($this,$this->grid);


       if ($this->ValidarDatosVaciosenGrid($grid,&$error))
           {
              $this->coderror=$error;
              return false;
           }
       return true;
      } else return true;
  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;

      if (count($x)==0)
      {
         $error=176;
         return true;
      }

      while ($j<count($x) && !$codcatvacio)
      {
        if (trim($x[$j]->getCodart())!="")
        {
	        if (trim($x[$j]->getCodcat())=="")
	        {
	          $codcatvacio=true;
	          $error=177;
	        }
        }
        $j++;
      } //while ($j<count($x))

      if ($codcatvacio)
        return true;
      else
        return false;
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
    $this->careqartser = $this->getCareqartserOrCreate();
    $this->updateCareqartserFromRequest();
	$this->setVars();
   	$this->configGrid();

    $this->labels = $this->getLabels();
	if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError(1,$err);
      }
    return sfView::SUCCESS;
  }


}
