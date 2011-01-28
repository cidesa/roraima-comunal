<?php

/**
 * tesdefcueban actions.
 *
 * @package    Roraima
 * @subpackage tesdefcueban
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdefcuebanActions extends autotesdefcuebanActions
{
 public $coderror=-1;
  public $error=-1;

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
  $c->add(TsdefchequeraPeer::NUMCUE,$this->tsdefban->getNumcue());
  $per = TsdefchequeraPeer::doSelect($c);

  $opciones = new OpcionesGrid();
  // Se configuran las opciones globales del Grid
  $opciones->setEliminar(true);
  $opciones->setTabla('Tsdefchequera');
  $opciones->setAnchoGrid(700);
  $opciones->setAncho(700);
  $opciones->setTitulo('Chequeras');
  $opciones->setName('a');
  $opciones->setFilas(50);
  $opciones->setHTMLTotalFilas(' ');
  // Se generan las columnas

  $col1 = new Columna('Chequera No.');
  $col1->setTipo(Columna::TEXTO);
  $col1->setEsGrabable(true);
  $col1->setNombreCampo('codchq');
  $col1->setAlineacionObjeto(Columna::IZQUIERDA);
  $col1->setAlineacionContenido(Columna::IZQUIERDA);
  $col1->setBoton(true);
  $col1->setEnlaceboton("ConChe(this.id)");
  $col1->setHTML('type="text" size="10" maxlength=8');
  $col1->setJScript('onKeypress="if (event.keyCode==13) {ConChe(this.id);}"');
  $col1->setAjax('tesdefcueban',3,1);

  $col2 = new Columna('Desde No.');
  $col2->setTipo(Columna::TEXTO);
  $col2->setEsGrabable(true);
  $col2->setNombreCampo('numchedes');
  $col2->setAlineacionObjeto(Columna::IZQUIERDA);
  $col2->setAlineacionContenido(Columna::IZQUIERDA);
  $col2->setHTML('type="text" size="15" maxlength=20');
  $col2->setAjax('tesdefcueban',4,2);


  $col3 = new Columna('Cantidad de Cheques');
  $col3->setTipo(Columna::TEXTO);
  $col3->setEsGrabable(true);
  $col3->setNombreCampo('canche');
  $col3->setAlineacionObjeto(Columna::IZQUIERDA);
  $col3->setAlineacionContenido(Columna::IZQUIERDA);
  $col3->setHTML('type="text" size="10" maxlength=10');
  $col3->setJScript('onBlur=validarEntero(this.id);generarnrochefin(this.id)');


  $col4 = new Columna('Hasta No.');
  $col4->setTipo(Columna::TEXTO);
  $col4->setEsGrabable(true);
  $col4->setNombreCampo('numchehas');
  $col4->setAlineacionObjeto(Columna::IZQUIERDA);
  $col4->setAlineacionContenido(Columna::IZQUIERDA);
  $col4->setHTML('type="text" size="15" maxlength=20 readonly=true');
  $col4->setAjax('tesdefcueban',4,4);

  $col5 = new Columna('Activa');
  $col5->setTipo(Columna::COMBO);
  $col5->setNombreCampo('activa');
  $col5->setCombo(Constantes::listaEstadosChequeras());
  $col5->setEsGrabable(true);
  $col5->setJScript('onChange="activar(this.id);"');
  $col5->setHTML(' ');

  // Se guardan las columnas en el objetos de opciones
  $opciones->addColumna($col1);
  $opciones->addColumna($col2);
  $opciones->addColumna($col3);
  $opciones->addColumna($col4);
  $opciones->addColumna($col5);

  // Ee genera el arreglo de opciones necesario para generar el grid
  $this->obj = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCheques($numchedes=' ', $numchehas=' ', $numcue=' ')
    {
  //////////////////////

  //GRID
  $c = new Criteria();
  $c->add(TscheemiPeer::NUMCUE,$numcue);
  $c->add(TscheemiPeer::NUMCHE, TscheemiPeer::NUMCHE." between '{$numchedes}' AND '{$numchehas}'", Criteria::CUSTOM);
  $c->addAscendingOrderByColumn(TscheemiPeer::NUMCHE);

  $per = TscheemiPeer::doSelect($c);


  $opciones = new OpcionesGrid();
  // Se configuran las opciones globales del Grid
    $opciones->setEliminar(false);

    $opciones->setTabla('Tscheemi');
  $opciones->setAnchoGrid(750);
  $opciones->setAncho(750);
  $opciones->setTitulo('Cheques Emitidos');
  $opciones->setName('a');
  $opciones->setFilas(0);
  $opciones->setHTMLTotalFilas(' ');
  // Se generan las columnas

  $col1 = new Columna('Número');
  $col1->setTipo(Columna::TEXTO);
  $col1->setNombreCampo('numche');
  $col1->setAlineacionObjeto(Columna::IZQUIERDA);
  $col1->setAlineacionContenido(Columna::IZQUIERDA);
  $col1->setHTML('type="text" size="15"  disabled=true');

  $col2 = new Columna('Fecha');
  $col2->setTipo(Columna::TEXTO);
  $col2->setNombreCampo('fecemi');
  $col2->setAlineacionObjeto(Columna::IZQUIERDA);
  $col2->setAlineacionContenido(Columna::IZQUIERDA);
  $col2->setHTML('type="text" size="10"  disabled=true');

  $col3 = new Columna('Monto');
    $col3->setTipo(Columna::MONTO);
    $col3->setNombreCampo('monche');
    $col3->setAlineacionObjeto(Columna::DERECHA);
  $col3->setAlineacionContenido(Columna::DERECHA);
  $col3->setEsNumerico(true);
  $col3->setHTML('type="text" size="15"  readonly=true');

  $col4 = new Columna('Beneficiario');
  $col4->setTipo(Columna::TEXTO);
  $col4->setNombreCampo('nomben');
  $col4->setAlineacionObjeto(Columna::IZQUIERDA);
  $col4->setAlineacionContenido(Columna::IZQUIERDA);
  $col4->setHTML('type="text" size="80"  readonly=true');

    // Se guardan las columnas en el objetos de opciones
  $opciones->addColumna($col1);
  $opciones->addColumna($col2);
  $opciones->addColumna($col3);
  $opciones->addColumna($col4);

  // Ee genera el arreglo de opciones necesario para generar el grid
  $this->objGriChe = $opciones->getConfig($per);
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tsdefban = $this->getTsdefbanOrCreate();
    $this->grupo=Constantes::ListaGrupo();
    $this->setVars();
    $this->configGrid();
    $this->tsmovlib_credito_debito='';
    $this->tsmovban_credito_debito='';
    if ($this->tsdefban->getId())
    {
      if (Herramientas::getX_vacio('numcue','tsmovlib','numcue',$this->tsdefban->getNumcue())<>'')
      {
        $this->tsmovlib_credito_debito= 'readonly';
      }
      if (Herramientas::getX_vacio('numcue','tsmovban','numcue',$this->tsdefban->getNumcue())<>'')
      {
        $this->tsmovban_credito_debito= 'readonly';
      }
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsdefbanFromRequest();

      $this->saveTsdefban($this->tsdefban);

      $this->tsdefban->setId(Herramientas::getX_vacio('numcue','tsdefban','id',$this->tsdefban->getNumcue()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdefcueban/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdefcueban/list');
      }
      else
      {
        return $this->redirect('tesdefcueban/edit?id='.$this->tsdefban->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateTsdefbanFromRequest()
  {
    $tsdefban = $this->getRequestParameter('tsdefban');
    $this->grupo=Constantes::ListaGrupo();
    $this->setVars();
    $this->configGrid();

    if (isset($tsdefban['numcue']))
    {
      $this->tsdefban->setNumcue($tsdefban['numcue']);
    }
    if (isset($tsdefban['nomcue']))
    {
      $this->tsdefban->setNomcue($tsdefban['nomcue']);
    }
    if (isset($tsdefban['tipcue']))
    {
      $this->tsdefban->setTipcue($tsdefban['tipcue']);
    }
    if (isset($tsdefban['destip']))
    {
      $this->tsdefban->setDestip($tsdefban['destip']);
    }
    if (isset($tsdefban['codcta']))
    {
      $this->tsdefban->setCodcta($tsdefban['codcta']);
    }
    if (isset($tsdefban['fecreg']))
    {
      if ($tsdefban['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdefban['fecreg']))
          {
            $value = $dateFormat->format($tsdefban['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdefban['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdefban->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdefban->setFecreg(null);
      }
    }
    if (isset($tsdefban['fecven']))
    {
      if ($tsdefban['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdefban['fecven']))
          {
            $value = $dateFormat->format($tsdefban['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdefban['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdefban->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdefban->setFecven(null);
      }
    }
    if (isset($tsdefban['fecper']))
    {
      if ($tsdefban['fecper'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdefban['fecper']))
          {
            $value = $dateFormat->format($tsdefban['fecper'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdefban['fecper'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdefban->setFecper($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdefban->setFecper(null);
      }
    }
    if (isset($tsdefban['fecape']))
    {
      if ($tsdefban['fecape'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdefban['fecape']))
          {
            $value = $dateFormat->format($tsdefban['fecape'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdefban['fecape'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdefban->setFecape($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdefban->setFecape(null);
      }
    }
    if (isset($tsdefban['renaut']))
    {
      $this->tsdefban->setRenaut($tsdefban['renaut']);
    }
    if (isset($tsdefban['porint']))
    {
      $this->tsdefban->setPorint($tsdefban['porint']);
    }
    if (isset($tsdefban['tipint']))
    {
      $this->tsdefban->setTipint($tsdefban['tipint']);
    }
    if (isset($tsdefban['usocue']))
    {
      $this->tsdefban->setUsocue($tsdefban['usocue']);
    }
    if (isset($tsdefban['numche']))
    {
      $this->tsdefban->setNumche($tsdefban['numche']);
    }
    if (isset($tsdefban['antban']))
    {
      $this->tsdefban->setAntban($tsdefban['antban']);
    }
    if (isset($tsdefban['debban']))
    {
      $this->tsdefban->setDebban($tsdefban['debban']);
    }
    if (isset($tsdefban['creban']))
    {
      $this->tsdefban->setCreban($tsdefban['creban']);
    }
    if (isset($tsdefban['debbandis']))
    {
      $this->tsdefban->setDebbandis($tsdefban['debbandis']);
    }
    if (isset($tsdefban['crebandis']))
    {
      $this->tsdefban->setCrebandis($tsdefban['crebandis']);
    }
    if (isset($tsdefban['antlib']))
    {
      $this->tsdefban->setAntlib($tsdefban['antlib']);
    }
    if (isset($tsdefban['deblib']))
    {
      $this->tsdefban->setDeblib($tsdefban['deblib']);
    }
    if (isset($tsdefban['crelib']))
    {
      $this->tsdefban->setCrelib($tsdefban['crelib']);
    }
    if (isset($tsdefban['deblibdis']))
    {
      $this->tsdefban->setDeblibdis($tsdefban['deblibdis']);
    }
    if (isset($tsdefban['crelibdis']))
    {
      $this->tsdefban->setCrelibdis($tsdefban['crelibdis']);
    }
    if (isset($tsdefban['valche']))
    {
      $this->tsdefban->setValche($tsdefban['valche']);
    }
    if (isset($tsdefban['concil']))
    {
      $this->tsdefban->setConcil($tsdefban['concil']);
    }
    if (isset($tsdefban['plazo']))
    {
      $this->tsdefban->setPlazo($tsdefban['plazo']);
    }
    if (isset($tsdefban['tipren']))
    {
      $this->tsdefban->setTipren($tsdefban['tipren']);
    }
    if (isset($tsdefban['destipren']))
    {
      $this->tsdefban->setDestipren($tsdefban['destipren']);
    }
    if (isset($tsdefban['cantdig']))
    {
      $this->tsdefban->setCantdig($tsdefban['cantdig']);
    }
    if (isset($tsdefban['endosable']))
    {
      $this->tsdefban->setEndosable($tsdefban['endosable']);
    }
    if (isset($tsdefban['salmin']))
    {
      $this->tsdefban->setSalmin($tsdefban['salmin']);
  }
    if (isset($tsdefban['nomrep']))
    {
      $this->tsdefban->setNomrep($tsdefban['nomrep']);
    }
  }
   public function setVars()
  {
    $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->loncta=strlen($this->mascaracontabilidad);
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
        $dato=TstipcuePeer::getDestip(str_pad($this->getRequestParameter('codigo'),3,'0',STR_PAD_LEFT));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
      }
     else if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=TstiprenPeer::getDestip(str_pad($this->getRequestParameter('codigo'),3,'0',STR_PAD_LEFT));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
      }
     else if ($this->getRequestParameter('ajax')=='3')
      {
         $output = '[["'.$cajtexcom.'","3","c"]]';
      }
      else if ($this->getRequestParameter('ajax')=='4')
      {
      	if ($cajtexcom!="")
      	{
         $output = '[["'.$cajtexcom.'","8","c"]]';
      	}
      }
      else if ($this->getRequestParameter('ajax')=='5')
	  {
		$dato2=ContabbPeer::getCargab($this->getRequestParameter('codigo'));
        $output = '[["cargable","'.$dato2.'",""]]';
	  }
	  else if ($this->getRequestParameter('ajax')=='6')
	  {
		$dato='';
		$dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));
        $fec1_aux=split("/",$this->getRequestParameter('codigo'));
        if (checkdate(intval($fec1_aux[1]),intval($fec1_aux[0]),intval($fec1_aux[2])))
        {
          $sql="Select min(feclib) as fecha from tsmovlib where numcue='".$this->getRequestParameter('cuenta')."'";
          if (Herramientas::BuscarDatos($sql,&$tabla))
          {
          	if ($tabla[0]["fecha"]!="")
          	{
          	  if ($fec1 > $tabla[0]["fecha"])
          	  {
          	  	$dato='S';
          	  }
          	}
          }
        }
        $output = '[["valida","'.$dato.'",""]]';
	  }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

   public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIP','Tstipcue','Codtip',trim($this->getRequestParameter('tsdefban[tipcue]')));
      }
      else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIP','Tstipren','Codtip',trim($this->getRequestParameter('tsdefban[tipren]')));
      }
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
    $resp=-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->tsdefban= $this->getTsdefbanOrCreate();
       try{
        $this->updateTsdefbanFromRequest();
       }catch(Exception $ex){}


      $this->configGrid();
      $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      $sql="SELECT codtip FROM tstipcue where codtip='". $this->tsdefban->getTipcue()."' and upper(destip) not like '%AHORRO%'";

      if (Herramientas::BuscarDatos($sql,&$tabla))
      {
      	  if(count($grid[0])>1)
	  	  {
	  	  	  $error= Tesoreria::validarTesdefcueban($grid);
		      if ($error<>-1)
		      {
		        $this->error=$error;
		        return false;
		      }	
	  	  }
	      
      }




     $tsdefban = $this->getRequestParameter('tsdefban');
     if ($this->tsdefban->getId())
     {
       $valor = $tsdefban['numcue'];
       $campo='numcue';
       $valor1 = $tsdefban['fecper'];
       $campo1='fecper';

       $resp=Herramientas::ValidarCodigo($valor,$this->tsdefban,$campo);
       $resp1=Herramientas::ValidarCodigo($valor1,$this->tsdefban,$campo1,'F');
      if($resp!=-1)
       {
        $this->coderror = $resp;
        return false;
       }
      else  if($resp1!=-1)
       {
        $this->coderror = $resp1;
        return false;
       }
      else return true;
     }
     else return true;
   }//if ($this->tsdefban->getId())
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
    $this->labels = $this->getLabels();
    $this->tsmovlib_credito_debito='';
    $this->tsmovban_credito_debito='';
    $this->tsdefban= $this->getTsdefbanOrCreate();
     try{
    $this->updateTsdefbanFromRequest();
    }catch(Exception $ex){}


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
      }
      if($this->error!=-1){
        $err1 = Herramientas::obtenerMensajeError($this->error);
        $this->getRequest()->setError('',$err1);
      }
    }
    return sfView::SUCCESS;

  }



   public function executeGridcheques()
   {
    $numchedes=$this->getRequestParameter('numchedes');
    $numchehas=$this->getRequestParameter('numchehas');
    $numcue=$this->getRequestParameter('numcue');
    $this->configGridCheques($numchedes, $numchehas, $numcue);
    sfView::SUCCESS;
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
  protected function saveTsdefban($tsdefban)
   {
      $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      $x = $grid[0];
      $j = 0;
      while ($j < count($x))
      {
        if ($x[$j]->getActiva()=='SI')
        {
          $tsdefban->setNumche($x[$j]->getNumchedes());
          break;
        }
      $j++;
      }
      $tsdefban->setDeblib($tsdefban->getDeblibdis());
      $tsdefban->setCrelib($tsdefban->getCrelibdis());
      $tsdefban->setDebban($tsdefban->getDebbandis());
      $tsdefban->setCreban($tsdefban->getCrebandis());
      $tsdefban->save();
      Tesoreria::Grabar_Chequeras($tsdefban,$grid);
   }

public function executeDelete()
  {
    $this->tsdefban = TsdefbanPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tsdefban);

    try
    {
      $libros=H::getX_vacio('NUMCUE','Tsmovlib','Numcue',$this->tsdefban->getNumcue());
      $bancos=H::getX_vacio('NUMCUE','Tsmovban','Numcue',$this->tsdefban->getNumcue());

      if ($libros==''){
        if ($bancos=='') {
            $this->deleteTsdefban($this->tsdefban);
            $this->Bitacora('Elimino');
        }else {
            $this->getRequest()->setError('delete', 'El Banco No Puede Ser Eliminado, Porque tiene Movimientos en Banco Asociados.');
            return $this->forward('tesdefcueban', 'list');
        }
      }else{
          $this->getRequest()->setError('delete', 'El Banco No Puede Ser Eliminado, Porque tiene Movimientos en Libro Asociados.');
          return $this->forward('tesdefcueban', 'list');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'El Banco No Puede Ser Eliminado, Porque tiene Movimientos Asociados.');
      return $this->forward('tesdefcueban', 'list');
    }

    return $this->redirect('tesdefcueban/list');
  }

   protected function deleteTsdefban($tsdefban)
   {
     $c= new Criteria();
     $c->add(TsdefchequeraPeer::NUMCUE,$tsdefban->getNumcue());
     TsdefchequeraPeer::doDelete($c);

     $tsdefban->delete();
   }
}
