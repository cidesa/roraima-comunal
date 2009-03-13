<?php

/**
 * presnomtipcon actions.
 *
 * @package    siga
 * @subpackage presnomtipcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomtipconActions extends autopresnomtipconActions
{

  public  $coderror1=-1;

  public function validateEdit()
  {
 	$this->nptipcon = $this->getNptipconOrCreate();
    $this->updateNptipconFromRequest();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {   $this->configGrid_nomina();
        $grid_detalle=Herramientas::CargarDatosGrid($this,$this->obj_nomina,true);//0
        $grid_nomina=$grid_detalle[0];
        $this->configGrid();
        $grid = Herramientas::CargarDatosGrid($this,$this->obj);
        if(empty( $grid[0]))
			$this->coderror1=436;
        if(empty( $grid_nomina))
			$this->coderror1=435;

		$i=0;
    	while ($i<count($grid_nomina))
	    {
	  		$result=array();
			$sql="Select CodNom,CodtipCon From NPASINOMCONT Where CodNom = '".$grid_nomina[$i]['codnom']."' And CodTipCon <> '".$this->nptipcon->getCodtipcon()."'";
			if (Herramientas::BuscarDatos($sql,&$result))
			{
		       if (count($result)>0)
		       {
		       	$this->coderror1=132;
		       	return false;
		       	break;
		       }
			}
		   $i++;
		}

      //return true;

      $x=$grid[0];
	  $j=0;
	  $s=0;

	  while ($s<count($x)){

	  $desde=$x[$s]->getDesde();
	  $hasta=$x[$s]->getHasta();
     if ($desde >= $hasta)
       {
       	$this->coderror1=180;
		       	return false;
		       	break;

       } else if ($x[$s]->getAnovig() > $x[$s]->getAnovighas())
       {
       	$this->coderror1=181;
		       	return false;
		       	break;

       } else
       $s++;
	  }
	  $grid_detalle=Herramientas::CargarDatosGrid($this,$this->obj_nomina);
	  $x= $grid_detalle[0];
	  $j=0;
	  $s=0;
	  $a=0;
	  $encontrado=false;

     while ($s<count($x) and !$encontrado){
     	$cp= $x[$s]->getCodnom();
        $j=0;

	  while ($j<count($x))
	  {
	  $a=0;
      $j= $j+$s;
      $a= $j+1;

      if ($a>=count($x)){
        break;}
       else{

        $v= $x[$a]->getCodnom();
  	  if ($cp == $v )
	   {
	   	 $this->coderror1= 427;
	   	 $encontrado=true;

	   	break;

	   }
      else
        {   $this->coderror1=-1;

        }

		$j++;
	  }}
	  $s++;}

    }else return false;
//print $this->coderror1; exit;
   if ($this->coderror1== -1)
     return true;
     else
     return false;

  }
  public function handleErrorEdit()
    {
      $this->preExecute();
      $this->nptipcon = $this->getNptipconOrCreate();

      try{
      	$this->updateNptipconFromRequest();
      	}
      catch (Exception $ex){}

	  $this->setVars();

      $this->labels = $this->getLabels();


      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	        if($this->coderror1!=-1)
	        {
	          $err = Herramientas::obtenerMensajeError($this->coderror1);
         	  $this->getRequest()->setError('',$err);
	        }

      }
      return sfView::SUCCESS;
    }



	  protected function getNptipconOrCreate($id = 'id')
	  {
	    if (!$this->getRequestParameter($id))
	    {
	      $nptipcon = new Nptipcon();
				$this->setVars();
				$this->configGrid($this->getRequestParameter('nptipcon[codtipcon]'));
				$this->configGrid_nomina($this->getRequestParameter('nptipcon[codtipcon]'));
	    }
	    else
	    {
	      $nptipcon = NptipconPeer::retrieveByPk($this->getRequestParameter($id));
				$this->setVars();
				$this->configGrid($nptipcon->getCodtipcon());
				$this->configGrid_nomina($nptipcon->getCodtipcon());
	      $this->forward404Unless($nptipcon);
	    }

	    return $nptipcon;
	  }

	public function configGrid($var='')
	{
		$c = new Criteria();
		$c->add(NpbonocontPeer::CODTIPCON,$var);
		$per = NpbonocontPeer::doSelect($c);
		if (count($per)>0)
			$filas_arreglo=0;
		else
			$filas_arreglo=1;


		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas(100);
		$opciones->setTabla('Npbonocont');
		$opciones->setName('a');
		$opciones->setAnchoGrid(1100);
		$opciones->setTitulo('Alicuota');
		$opciones->setHTMLTotalFilas(' ');

		$col1 = new Columna('Fecha Vig. Desde');
		$col1->setNombreCampo('Anovig');
		$col1->setTipo(Columna::FECHA);
		$col1->setVacia(true);
		$col1->setHTML('');
		$col1->setEsGrabable(true);

		$col2 = new Columna('Fecha Vig. Hasta');
		$col2->setNombreCampo('Anovighas');
		$col2->setTipo(Columna::FECHA);
		$col2->setVacia(true);
		$col2->setHTML('');
		$col2->setEsGrabable(true);

		$col3 = new Columna('Rango Desde');
		$col3->setTipo(Columna::TEXTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('Desde');
		$col3->setHTML('type="text" size="10"');

		$col4 = new Columna('Rango Hasta');
		$col4->setTipo(Columna::TEXTO);
		$col4->setEsGrabable(true);
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
		$col4->setNombreCampo('Hasta');
		$col4->setHTML('type="text" size="10"');


		$col5 = new Columna('Dias Utilidades');
		$col5->setTipo(Columna::TEXTO);
		$col5->setEsGrabable(true);
		$col5->setAlineacionObjeto(Columna::CENTRO);
		$col5->setAlineacionContenido(Columna::CENTRO);
		$col5->setNombreCampo('Diauti');
		$col5->setHTML('type="text" size="10"');

		$col6 = new Columna('Dias Bono Vacac.');
		$col6->setTipo(Columna::TEXTO);
		$col6->setEsGrabable(true);
		$col6->setAlineacionObjeto(Columna::CENTRO);
		$col6->setAlineacionContenido(Columna::CENTRO);
		$col6->setNombreCampo('Diavac');
		$col6->setHTML('type="text" size="10"');


		$col7 = new Columna('Incidencia.');
	    $col7->setTipo(Columna::COMBO);
	    $col7->setCombo(Constantes::Contratos_nomina());
	    $col7->setAlineacionObjeto(Columna::DERECHA);
	    $col7->setAlineacionContenido(Columna::DERECHA);
	    $col7->setEsGrabable(true);
	    $col7->setNombreCampo('Calinc');
	    $col7->setOculta(true);
	    $col7->setHTML(' ');

		$col8 = new Columna('Antiguedad A.P.');
	    $col8->setTipo(Columna::COMBO);
	    $col8->setCombo(Constantes::Contratos_nomina());
	    $col8->setAlineacionObjeto(Columna::DERECHA);
	    $col8->setAlineacionContenido(Columna::DERECHA);
	    $col8->setEsGrabable(true);
	    $col8->setNombreCampo('Antap');
	    $col8->setHTML(' ');

		$col9 = new Columna('A.A.P. Vacaciones');
	    $col9->setTipo(Columna::COMBO);
	    $col9->setCombo(Constantes::Contratos_nomina());
	    $col9->setAlineacionObjeto(Columna::DERECHA);
	    $col9->setAlineacionContenido(Columna::DERECHA);
	    $col9->setEsGrabable(true);
	    $col9->setNombreCampo('Antapvac');
	    $col9->setHTML(' ');

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


		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);

	}

	public function configGrid_nomina($var='')
	{
		$c = new Criteria();
		$c->add(NpasinomcontPeer::CODTIPCON,$var);
		$per = NpasinomcontPeer::doSelect($c);
		$filas_arreglo=7;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npasinomcont');
		$opciones->setName('b');
		$opciones->setAnchoGrid(800);
		$opciones->setTitulo('');
		$opciones->setHTMLTotalFilas(' ');

		$col1 = new Columna('Tipo Nomina');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('Codnom');
		$col1->setHTML('type="text" size="4"');
        $col1->setCatalogo('npnomina','sf_admin_edit_form',array('codnom' => 1,'nomnom' => 2), 'Npnomina_Presnomtipcon');
		//$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);verificar_codigo_repetido(this.id);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
		$col1->setAjax('presnomtipcon',2,2);

		$col2 = new Columna('Descripcion de Nomina');
		$col2->setTipo(Columna::TEXTO);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('Nomnom');
		$col2->setEsGrabable(true);
		$col2->setHTML('type="text" size="105" readonly=true');
		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj_nomina = $opciones->getConfig($per);

	}

	public function setVars()
	{
		$this->listaFrecuenciaPago = array('M'=>'M');
	}

	protected function saveNptipcon($nptipcon)
	{
		$alic = ''; $a146 = '';
		$this->updateNptipconFromRequest($alic,$a146);

		//<!-----------------------------Grid Arreglos---------------------->
		$grid_alicuota_arreglos=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
		$grid_nomina_arreglos=Herramientas::CargarDatosGrid($this,$this->obj_nomina,true);//1
		$arreglo_arreglo = array($grid_alicuota_arreglos,$grid_nomina_arreglos,$alic,$a146);
		//<!-----------------------------funciones clase Orden de Compra---------------------->
		if (Nomina::Salvar_presnomtipcon($nptipcon,$arreglo_arreglo,&$coderror))
		{
		    return $coderror;
		}//	if (Orden_compra::Salvar($caordcom,$arreglo_arreglo,$arreglo_objetos,$arreglo_campos))
		else
		{
			return $coderror;
		}
	}


  protected function deleteNptipcon($nptipcon)
  {
 		$var= $nptipcon->getCodtipcon();
        //
		$c = new Criteria();
		$c->add(NpbonocontPeer::CODTIPCON,$var);
		$per = NpbonocontPeer::doDelete($c);

		$p = new Criteria();
		$p->add(NpasinomcontPeer::CODTIPCON,$var);
		$arreglo = NpasinomcontPeer::doDelete($p);
		$nptipcon->delete();

  }


  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$codigo=$this->getRequestParameter('codigo');
	 	$js="";
	 	$c= new Criteria();
	 	$c->add(NptipconPeer::CODTIPCON,$codigo);
	 	$per = NptipconPeer::doSelect($c);
	 	$dato="";
	 	if($per)
	 	{
	 		$js.="alert('Codigo $codigo ya existe');";
	 		$js.="$('$cajtexcom').value='';";
	 		$js.="$('$cajtexcom').focus();";
	 	}else
	 	{	if(trim($this->getRequestParameter('codigo'))!='')
	 			$dato=NptipconPeer::getDestipcon_vacio(trim($this->getRequestParameter('codigo')));
	 	}


	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }elseif($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=Herramientas::getX_vacio('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
		if(!empty($dato))
		{
			$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
		}else
		{
			$js="$('$cajtexcom').value='';";
			$js.="$('$cajtexcom').focus();";
			$js.="alert('Nomina no existe');";
			$output = '[["javascript","'.$js.'",""]]';
		}

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }

  }
    protected function updateNptipconFromRequest(&$alic = '',&$a146 = '')
  {
    $nptipcon = $this->getRequestParameter('nptipcon');

    if (isset($nptipcon['codtipcon']))
    {
      $this->nptipcon->setCodtipcon($nptipcon['codtipcon']);
    }
    if (isset($nptipcon['destipcon']))
    {
      $this->nptipcon->setDestipcon($nptipcon['destipcon']);
    }
    if (isset($nptipcon['frepagcon']))
    {
      $this->nptipcon->setFrepagcon($nptipcon['frepagcon']);
    }
    if (isset($nptipcon['fecinireg']))
    {
      if ($nptipcon['fecinireg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nptipcon['fecinireg']))
          {
            $value = $dateFormat->format($nptipcon['fecinireg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nptipcon['fecinireg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nptipcon->setFecinireg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nptipcon->setFecinireg(null);
      }
    }
    if (isset($nptipcon['art146']))
    { $a146 = 'S';
      $this->nptipcon->setArt146(1);
    }
    if (isset($nptipcon['alicuocon']))
    { $alic = 'S';
      $this->nptipcon->setAlicuocon(1);
    }
  }

}
