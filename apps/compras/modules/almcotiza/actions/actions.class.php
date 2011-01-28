<?php

/**
 * almcotiza actions.
 *
 * @package    Roraima
 * @subpackage almcotiza
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almcotizaActions extends autoalmcotizaActions
{
    public $coderror=-1;
    public $error=-1;

    
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
    {
      $resp=-1;
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       $this->cacotiza= $this->getCacotizaOrCreate();
       $this->updateCacotizaFromRequest();

       if (!$this->cacotiza->getId()) //nueva cotizacion
       {
	       $codigo=Herramientas::getX('rifpro','caprovee','codpro',$this->getRequestParameter('cacotiza[rifpro]'));
	       $c= new Criteria();
	       $c->add(CacotizaPeer::CODPRO,$codigo);
	       $c->add(CacotizaPeer::REFSOL,$this->cacotiza->getRefsol());
	       $resul= CacotizaPeer::doSelectOne($c);
	       if ($resul)
	       {
	       	$this->error=163;
	       	return false;
	       }

	    $this->valrecaud="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('compras',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
		     if(array_key_exists('almcotiza',$varemp['aplicacion']['compras']['modulos'])){
	           if(array_key_exists('valrecaud',$varemp['aplicacion']['compras']['modulos']['almcotiza'])){
		       {
		       	$this->valrecaud=$varemp['aplicacion']['compras']['modulos']['almcotiza']['valrecaud'];
		       }
	           }}

		if ($this->valrecaud=='S')
		{
            $err=Compras::validarRecaudosVen($this->getRequestParameter('cacotiza[rifpro]'),$this->getRequestParameter('cacotiza[feccot]'));
            if($err!=-1)
	       {
	       	$this->error=$err;
	       	return false;
	       }
		}

	        return true;
       } //if (!$this->cacotiza->getId())
       else //Edición
       {
       	if ($this->cacotiza->getRefsol()!="")
       	{
            $resul = Compras::Verificaranaliscotizacion($this->cacotiza->getRefsol(),$this->cacotiza->getCodpro());
			if ($resul)
			{
                $this->coderror=174;
                return false;
			}
			else
			{
                return true;
			}
       	}
       	else
       	  return true;
       }//else de edicion
      }else return true;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->cacotiza = CacotizaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cacotiza);

    try
    {
        $resul = Compras::Verificaranaliscotizacion($this->cacotiza->getRefsol(),$this->cacotiza->getCodpro());
		if ($resul)
		{
            $err = Herramientas::obtenerMensajeError(175);
            $this->setFlash('notice',$err);
            return $this->redirect('almcotiza/edit?id='.$this->cacotiza->getId());
		}
		else
		{
            $this->deleteCacotiza($this->cacotiza);
            $this->Bitacora('Elimino');
		}
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Cacotiza. Make sure it does not have any associated items.');
      return $this->forward('almcotiza', 'list');
    }

    return $this->redirect('almcotiza/list');
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
        $this->cacotiza = $this->getCacotizaOrCreate();

        try{ $this->updateCacotizaFromRequest(); }
        catch(Exception $ex){}

        $this->labels = $this->getLabels();

        $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);

       if($this->getRequest()->getMethod() == sfRequest::POST)
       {
        if($this->error!=-1)
	    {
	      $erro = Herramientas::obtenerMensajeError($this->error);
	      $this->getRequest()->setError('cacotiza{rifpro}',$erro);
	    }

        if($this->coderror!=-1)
        {
          $err = Herramientas::obtenerMensajeError($this->coderror);
          $this->getRequest()->setError('',$err);
        }
      }
        return sfView::SUCCESS;

     }



  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->cacotiza = $this->getCacotizaOrCreate();
    $this->setVars();
    $this->valor = '';
    $this->aumdis = '';

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCacotizaFromRequest();

      $this->saveCacotiza($this->cacotiza);

      $this->cacotiza->setId(Herramientas::getX_vacio('refcot','cacotiza','id',$this->cacotiza->getRefcot()));

    if ($this->coderror!=-1){ $this->labels = $this->getLabels();
    }else{
        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('almcotiza/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('almcotiza/list');
        }
        else
        {
          return $this->redirect('almcotiza/edit?id='.$this->cacotiza->getId());
        }
    }
    }

    else
    {
      $this->labels = $this->getLabels();
    }
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
	$cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
    {
		$this->valrecaud="";
		$varemp = $this->getUser()->getAttribute('configemp');
		if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('compras',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
		     if(array_key_exists('almcotiza',$varemp['aplicacion']['compras']['modulos'])){
		       if(array_key_exists('valrecaud',$varemp['aplicacion']['compras']['modulos']['almcotiza'])){
		       {
		       	$this->valrecaud=$varemp['aplicacion']['compras']['modulos']['almcotiza']['valrecaud'];
		       }
		      }
		    }

		if ($this->valrecaud=='S')
		{
		    $err=Compras::validarRecaudosVen($this->getRequestParameter('codigo'),$this->getRequestParameter('fecha'));
		    if($err!=-1)
		   {
              if ($err==20) $javascript="alert('El proveedor tiene recaudos Vencidos.'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              if ($err==21) $javascript="alert('El proveedor no tiene Recaudos.'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
             $dato="";
		   }else {
	          $dato=CaproveePeer::getNompro($this->getRequestParameter('codigo'));
	          $javascript="";
		   }
		}else {
			 $dato=CaproveePeer::getNompro($this->getRequestParameter('codigo'));
	         $javascript="";
		}

     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
    }
    else  if ($this->getRequestParameter('ajax')=='2')
    {
     $dato=CaconpagPeer::getDesconpag($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
    }
    else  if ($this->getRequestParameter('ajax')=='3')
    {
      $dato=CaregartPeer::getDesart($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
    else  if ($this->getRequestParameter('ajax')=='4')
    {
      $dato=CaforentPeer::getDesforent($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';

      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
    elseif ($this->getRequestParameter('ajax')=='5')
    {
      $sql="Select ReqArt AS reqart,SUM(COALESCE(CANREQ,0)) AS canreq,SUM(COALESCE(CANORD,0)) AS canrec From CAArtSol Where ReqArt = '".$this->getRequestParameter('codigo')."' Group By reqart";

      if (Herramientas :: BuscarDatos($sql, & $result))
      {
      	$monto=$result[0]['canreq']-$result[0]['canrec'];
        if ($monto<=0)
        {
          $saldo='0';
          $output = '[["saldada","'.$saldo.'",""]]';
          $this->configGrid('',2);
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        }
        else
        {
          $dato=rtrim(CasolartPeer::getDesreq($this->getRequestParameter('codigo')));
          $mondes=number_format(Herramientas::getX('REQART','Casolart','mondes',$this->getRequestParameter('codigo')),2,',','.');
          $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
          $c= new Criteria();
	      $c->add(CadisrgoPeer::REQART,$this->getRequestParameter('codigo'));
	      $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
	      $arr_monrgo= CadisrgoPeer::doSelect($c);
	      $monrgo=0;
	      foreach ($arr_monrgo as $sum)
	      {
	        $monrgo += $sum->getMonrgo();
	      }
          $monrgo=number_format($monrgo,2,',','.');

          $this->configGrid($this->getRequestParameter('codigo'),2);

          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","8","c"],["cacotiza_mondes","'.$mondes.'",""],["cacotiza_monrec","'.$monrgo.'",""]]';

          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        }
      }
      else
      {
      	$saldo='N';
        $output = '[["saldada","'.$saldo.'",""]]';
        $this->configGrid('',2);
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      }
    }
    elseif ($this->getRequestParameter('ajax')=='6')
    {
      $dateFormat = new sfDateFormat('es_VE');
      $fec = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));

      $c = new Criteria();
      $c->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
      $c->add(TsdesmonPeer::FECMON,$fec);
      $resul= TsdesmonPeer::doSelectOne($c);
      if ($resul)
      {
      	$dato=$resul->getValmon();
      	$dato2=$resul->getAumdis();
      }
      else
      {
      	$sql="Select MAX(VALMON) as valmon,MAX(AUMDIS) as aumdis,MAX(CODMON) as codmon from TSDesMon where codmon='".$this->getRequestParameter('codigo')."'";
      	if (Herramientas::BuscarDatos($sql,&$result))
        {
          $dato=$result[0]['valmon'];
          $dato2=$result[0]['aumdis'];
        }
        else { $dato=0; $dato2='D';}
      }

      $output = '[["cacotiza_valmon","'.$dato.'",""],["posneg","'.$dato2.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }

    elseif ($this->getRequestParameter('ajax')=='7')
    {
       $reccalformat=0;
       $codart=$this->getRequestParameter('codart');
       $reqart=$this->getRequestParameter('reqart');
       $cosact=$this->getRequestParameter('cosact');

       $monrecargo=0;
	   $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();

       $cri = new Criteria();
       $cri->add(CaartsolPeer::REQART,$reqart);
       $cri->add(CaartsolPeer::CODART,$codart);
       $cri->addAscendingOrderByColumn(CaartsolPeer::CODCAT);
       $reg = CaartsolPeer::doSelect($cri);
       foreach ($reg as $solegr)
	   {
             $c= new Criteria();
			 $c->add(CadisrgoPeer::REQART,$reqart);
			 $c->add(CadisrgoPeer::CODART,$solegr->getCodart());
			 $c->add(CadisrgoPeer::CODCAT,$solegr->getCodcat());
			 $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
			 $result=CadisrgoPeer::doSelect($c);
			 if ($result)
			 {
		        foreach ($result as $datos)
		        {
		           $monrgopor=$datos->getMonrgoc();
		           if ($datos->getTiprgo()=='M')
				   {
				     $recargo= $monrgopor;
				   }
				   else if ($datos->getTiprgo()=='P')
				   {
				   	 $monbase = $solegr->getCanreq()*$cosact;
				     $recargo = (($monbase*$monrgopor)/100);
				   }
				   else
				   {
				      $recargo=0;
				   }
                   $monrecargo=$monrecargo+$recargo;
		        }// foreach ($result as $datos)
			 }//if ($result)
	   }//	 foreach ($reg as $solegr)
       $monrecargoformat=number_format($monrecargo,2,',','.');
      // $colmonrec="cacotiza_monrec";
       $colmonrec=$this->getRequestParameter('colrecart');
       $output = '[["'.$colmonrec.'","'.$monrecargoformat.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
    }

  }

  protected function getCacotizaOrCreate($id = 'id')
  {

    if (!$this->getRequestParameter($id)) // Nuevo
    {
      $cacotiza = new Cacotiza();
      if ($this->getRequestParameter('cacotiza[refsol]')!='')
      {;
      	$this->configGrid($this->getRequestParameter('cacotiza[refsol]'),2);
      }else
      {
      	$this->configGrid('',1);
      }
    }
    else  //Modificacion
    {
      $cacotiza = CacotizaPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($cacotiza->getRefcot(),3);


      $this->forward404Unless($cacotiza);
    }

    return $cacotiza;
  }


  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('RIFPRO','Caprovee','rifpro',trim($this->getRequestParameter('cacotiza[rifpro]')));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCONPAG','Caconpag','codconpag',trim($this->getRequestParameter('cacotiza[conpag]')));
      }
    else if ($this->getRequestParameter('ajax')=='3')
      {
       $this->tags=Herramientas::autocompleteAjax('REQART','Casolart','reqart',trim($this->getRequestParameter('cacotiza[refsol]')));
      }
    else if ($this->getRequestParameter('ajax')=='4')
      {
       $this->tags=Herramientas::autocompleteAjax('CODFORENT','Caforent','codforent',trim($this->getRequestParameter('cacotiza[forent]')));
      }
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo=' ', $referencia=' ')
  {
    if ($referencia==1 or $referencia==3){ //cotizacion directa
      $c = new Criteria();
      $c->add(CadetcotPeer::REFCOT,$codigo);
   //   $c->addAscendingOrderByColumn(CadetcotPeer::CODART);
      $per = CadetcotPeer::doSelect($c);
	  $param='Cadetcot';
    }elseif ($referencia==2){//solicitud de egreso

	  $param='Caartsol';

      $sql="Select 9 as id, a.codart, b.desart, a.costo, sum(a.canreq) as canreq,  sum(a.mondes) as mondes, sum(a.canreq * a.costo ) as totdet, " .
      		"now() as fecentreg, (select sum(monrgo) from cadisrgo c where c.reqart='".$codigo."' and c.codart=a.codart) as recargo " .
	  		"from Caartsol a, Caregart b  " .
	  		"where a.codart=b.codart and reqart='".$codigo."' group by a.codart,b.desart,a.costo";
	  $resp = Herramientas::BuscarDatos($sql,&$per);

    }else{
      $c = new Criteria();
      $c->add(CadetcotPeer::REFCOT,$codigo);
      $per = CadetcotPeer::doSelect($c);
      $param='Cadetcot';
    }

    $this->numreg=count($per);

    $this->setVars();
    $mascaraarticulo=$this->mascaraarticulo;
    $formatocategoria=$this->formatocategoria;

    $opciones = new OpcionesGrid();
    if ($referencia==1)
    {$opciones->setEliminar(true);}
    else {$opciones->setEliminar(false);}
    $opciones->setTabla($param);
    if ($referencia==1)
    { $opciones->setFilas(50);}
    else { $opciones->setFilas(0);}

    $opciones->setAnchoGrid(1200);
    $opciones->setAncho(1200);
    $opciones->setTitulo('Detalle de la Cotización');
    $opciones->setHTMLTotalFilas(' ');

    $obj= array ('codart' => '1','desart' =>'2');
    $params= array(str_replace('#','@',$mascaraarticulo));

    $col1 = new Columna('Código  Artículo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('Codart');
    if ($referencia==1)
    { $col1->setHTML('type="text" size="15"');
      $col1->setCatalogo('Caregart','sf_admin_edit_form',$obj,'Caregart_Almcotiza',$params);
    }
    else if ($referencia==2 || $referencia==3)
    { $col1->setHTML('type="text" size="15" readonly="true"');}
    else { $col1->setHTML('type="text" size="15" readonly="true"');}
    $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $col1->setAjax('almcotiza',3,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Desart');
    $col2->setHTML('type="text"  size="25x1" readonly=true');

    $col3 = new Columna('Cant. Cotizada');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    if ($referencia==1)
    { $col3->setNombreCampo('Canord');
      $col3->setHTML('type="text" size="12"');}
    else if ($referencia==2)
    {$col3->setNombreCampo('Canreq');
     $col3->setHTML('type="text" size="12" readOnly=true');}
    else
    { $col3->setNombreCampo('Canord');
    	$col3->setHTML('type="text" size="12" readonly="true"');}
    $col3->setEsNumerico(true);
    if ($referencia==1) $col3->setJScript('onKeypress="entermonto(event,this.id); costocacotiza(event,this.id)"');

    $col4 = clone $col3;
    $col4->setTitulo('Costo');
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('costo');
    if ($referencia==1 || $referencia==2 || $referencia==3)
    { $col4->setHTML('type="text" size="12"');}
    else
    { $col4->setHTML('type="text" size="12" readonly="true"');}
    $col4->setJScript('onkeyPress="entermonto(event,this.id); costocacotiza(event,this.id)"');


    $col5 = clone $col4;
    $col5->setTitulo('Descuento');
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('Mondes');
    $col5->setJScript('onKeypress="entermonto(event,this.id), calculadescuento(event,this.id)"');
    $col5->setEsTotal(true,'cacotiza_mondes');

    $col6= clone $col4;
    $col6->setTitulo('Total');
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('Totdet');
    $col6->setJScript(' ');
    $col6->setHTML('type="text" size=15 readonly=true');
    $col6->setEsTotal(true,'totales');

    $col7 = new Columna('Fecha Entrega');
    $col7->setTipo(Columna::FECHA);
    $col7->setAlineacionObjeto(Columna::DERECHA);
    $col7->setAlineacionContenido(Columna::DERECHA);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('fecent');
    $col7->setHTML('');
    //$col7->setVacia(true);

    $col8= clone $col4;
    $col8->setTitulo('recargos');
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('recargo');
    $col8->setJScript(' ');
    $col8->setHTML('type="text" size=15');
    $col8->setOculta(true);
    $col8->setEsTotal(true,'cacotiza_monrec');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    $this->obj = $opciones->getConfig($per);

  }

  public function setVars()
  {
    $this->mascaraarticulo = Herramientas::ObtenerFormato('Cadefart','Forart');
    $this->formatocategoria = Herramientas::getObtener_FormatoCategoria();
    $cacotiza = $this->getRequestParameter('cacotiza');
    $this->provee= $cacotiza['rifpro'];
    $this->moneda = Herramientas::cargarMoneda();
    $this->mansolocor="";
    $this->bloqfec="";
    $this->oculeli="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almcotiza',$varemp['aplicacion']['compras']['modulos'])){
           if(array_key_exists('mansolocor',$varemp['aplicacion']['compras']['modulos']['almcotiza']))
	       {
	       	$this->mansolocor=$varemp['aplicacion']['compras']['modulos']['almcotiza']['mansolocor'];
	       }
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['compras']['modulos']['almcotiza']))
	       {
	       	$this->bloqfec=$varemp['aplicacion']['compras']['modulos']['almcotiza']['bloqfec'];
	       }
	       if(array_key_exists('oculeli',$varemp['aplicacion']['compras']['modulos']['almcotiza']))
	       {
	       	$this->oculeli=$varemp['aplicacion']['compras']['modulos']['almcotiza']['oculeli'];
	       }
         }
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCacotizaFromRequest()
  {
    $cacotiza = $this->getRequestParameter('cacotiza');
    $this->setVars();
    $this->valor = $this->getRequestParameter('valmoneda');
    $this->aumdis = $this->getRequestParameter('posneg');

    if (isset($cacotiza['refcot']))
    {
      $this->cacotiza->setRefcot(str_pad($cacotiza['refcot'],8,0,STR_PAD_LEFT));
    }
    if (isset($cacotiza['feccot']))
    {
      if ($cacotiza['feccot'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cacotiza['feccot']))
          {
            $value = $dateFormat->format($cacotiza['feccot'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cacotiza['feccot'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cacotiza->setFeccot($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cacotiza->setFeccot(null);
      }
    }

    if (isset($cacotiza['tipmon']))
    {
      $this->cacotiza->setTipmon($cacotiza['tipmon']);
    }
    if (isset($cacotiza['valmon']))
    {
      $this->cacotiza->setValmon($cacotiza['valmon']);
    }
    if (isset($cacotiza['codpro']))
    {
      $this->cacotiza->setCodpro($cacotiza['codpro']);
    }
    if (isset($cacotiza['nompro']))
    {
      $this->cacotiza->setNompro($cacotiza['nompro']);
    }
    if (isset($cacotiza['descot']))
    {
      $this->cacotiza->setDescot($cacotiza['descot']);
    }
    if (isset($cacotiza['refsol']))
    {
      $this->cacotiza->setRefsol($cacotiza['refsol']);
    }
    if (isset($cacotiza['refpro']))
    {
      $this->cacotiza->setRefpro($cacotiza['refpro']);
    }
    if (isset($cacotiza['moncot']))
    {
      $this->cacotiza->setMoncot($cacotiza['moncot']);
    }
    if (isset($cacotiza['conpag']))
    {
      $this->cacotiza->setConpag($cacotiza['conpag']);
    }
    if (isset($cacotiza['forent']))
    {
      $this->cacotiza->setForent($cacotiza['forent']);
    }
    if (isset($cacotiza['mondes']))
    {
      $this->cacotiza->setMondes($cacotiza['mondes']);
    }
    if (isset($cacotiza['monrec']))
    {
      $this->cacotiza->setMonrec($cacotiza['monrec']);
    }
    if (isset($cacotiza['tipo']))
    {
      $this->cacotiza->setTipo($cacotiza['tipo']);
    }
    if (isset($cacotiza['rifpro']))
    {
      $this->cacotiza->setRifpro($cacotiza['rifpro']);
      $this->cacotiza->setCodpro(Herramientas::getX_vacio('rifpro','caprovee','codpro',$cacotiza['rifpro']));
    }
    if (isset($cacotiza['porvan']))
    {
      $this->cacotiza->setPorvan($cacotiza['porvan']);
    }
    if (isset($cacotiza['porant']))
    {
      $this->cacotiza->setPorant($cacotiza['porant']);
    }
    if (isset($cacotiza['obscot']))
    {
      $this->cacotiza->setObscot($cacotiza['obscot']);
    }

  }

  protected function deleteCacotiza($cacotiza)
  {
    Compras::eliminarAlmcotiza($cacotiza);
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
  protected function saveCacotiza($cacotiza)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
    $resp=Compras::salvarAlmcotiza($cacotiza,$grid,$this->getRequestParameter('valmoneda'));
    if($resp!=-1){
      $this->coderror = $resp;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }

  }

  protected function getLabels()
  {
    $this->nometiref="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almcotiza',$varemp['aplicacion']['compras']['modulos'])){
           if(array_key_exists('nometiref',$varemp['aplicacion']['compras']['modulos']['almcotiza']))
	       {
	       	$this->nometiref=$varemp['aplicacion']['compras']['modulos']['almcotiza']['nometiref'];
	       }
         }

     if($this->nometiref!="")
     {
		return array(
		  'cacotiza{refcot}' => 'Número:',
		  'cacotiza{feccot}' => 'Fecha:',
		  'cacotiza{tipmon}' => 'Moneda:',
		  'cacotiza{valmon}' => 'Valor:',
		  'cacotiza{codpro}' => 'Código del Contratistas de Bienes o Servicio y Cooperativas:',
		  'cacotiza{rifpro}' => 'RIF de la Contratistas de Bienes o Servicio y Cooperativas:',
		  'cacotiza{nompro}' => 'Descripción:',
		  'cacotiza{descot}' => 'Descripción:',
		  'cacotiza{refsol}' => 'N° de Solicitud:',
		  'cacotiza{desreq}' => 'Desreq:',
		  'cacotiza{refpro}' => $this->nometiref.':',
		  'cacotiza{moncot}' => 'Monto Total:',
		  'cacotiza{conpag}' => 'Código:',
		  'cacotiza{desconpag}' => 'Descripción:',
		  'cacotiza{forent}' => 'Código:',
		  'cacotiza{desforent}' => 'Descripción:',
		  'cacotiza{mondes}' => 'Monto Descuento:',
		  'cacotiza{monrec}' => 'Monto Recargo:',
		  'cacotiza{tipo}' => 'Descuenta:',
		  'cacotiza{porvan}' => '% del VAN de las Ofertas:',
		  'cacotiza{porant}' => '% del Anticipo:',
		  'cacotiza{obscot}' => 'Observación:',
		);
     }else {

    return array(
      'cacotiza{refcot}' => 'Número:',
      'cacotiza{feccot}' => 'Fecha:',
      'cacotiza{tipmon}' => 'Moneda:',
      'cacotiza{valmon}' => 'Valor:',
      'cacotiza{codpro}' => 'Código del Contratistas de Bienes o Servicio y Cooperativas:',
      'cacotiza{rifpro}' => 'RIF de la Contratistas de Bienes o Servicio y Cooperativas:',
      'cacotiza{nompro}' => 'Descripción:',
      'cacotiza{descot}' => 'Descripción:',
      'cacotiza{refsol}' => 'N° de Solicitud:',
      'cacotiza{desreq}' => 'Desreq:',
      'cacotiza{refpro}' => 'Referencia:',
      'cacotiza{moncot}' => 'Monto Total:',
      'cacotiza{conpag}' => 'Código:',
      'cacotiza{desconpag}' => 'Descripción:',
      'cacotiza{forent}' => 'Código:',
      'cacotiza{desforent}' => 'Descripción:',
      'cacotiza{mondes}' => 'Monto Descuento:',
      'cacotiza{monrec}' => 'Monto Recargo:',
      'cacotiza{tipo}' => 'Descuenta:',
      'cacotiza{porvan}' => '% del VAN de las Ofertas:',
      'cacotiza{porant}' => '% del Anticipo:',
      'cacotiza{obscot}' => 'Observación:',
    );
  }
  }

}