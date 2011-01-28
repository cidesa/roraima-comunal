<?php

/**
 * Compras: Clase estática para el manejo de las compras
 *
 * @package    Roraima
 * @subpackage compras
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Compras {
  /**************************************************************************
   **         Grid de la Requisición Formulario Almretser                   **
   **                       Jaime Suárez                                    **
   **************************************************************************/
  /**
   * Función para registrar la Requisición
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */

  public static function salvarOrdenCompraEntregas($caordcom, $grid2) {
    $ordcom = $caordcom->getOrdcom();
    //print count($grid2);
    $x = $grid2[0];
    //print count($x);
    $j = 0;
    //print count($x);
    while ($j < count($x)) {
      $x[$j]->setOrdcom($ordcom);
      //print $x[$j]->setOrdcom($ordcom);
      $x[$j]->save();
      $j++;
    }
    $z = $grid2[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }

    }
  }

  public static function ObtenerCorrelativo($caordcom, & $obtenerCorrelativo) {
    if (($caordcom->getTipo() == 'C') or ($caordcom->getTipo() == 'T')) {
      Herramientas :: getVerCorrelativo('ordser', 'cadefart', $r);
      Herramientas :: getSalvarCorrelativo('ordser', 'cadefart', 'Requisición', $r, $msg);
      $obtenerCorrelativo = 'OC' . $r;
      return $obtenerCorrelativo;
    } else {
      Herramientas :: getVerCorrelativo('ordcom', 'cadefart', $r);
      Herramientas :: getSalvarCorrelativo('ordcom', 'cadefart', 'Requisición', $r, $msg);
      $obtenerCorrelativo = 'OS' . $r;
      return $obtenerCorrelativo;
    }
  }

  public static function salvarOrdenCompra($caordcom, $grid) {
    if ($caordcom->getOrdcom() == '########') {
      $result = array ();
      $manejacompra = false;
      $manejaserv = false;
      $sql = "Select * From CADefArt";
      if (Herramientas :: BuscarDatos($sql, & $result)) {
        $tiporec = $result[0]['asiparrec'];
        if ($result[0]['ordcom'] <> 0)
          $manejacompra = true;
        if ($result[0]['ordser'] <> 0)
          $manejaserv = true;
      }
      if ($caordcom->getTipo() == 'C') {
        $manejacorrel = $manejacompra;
      }
      elseif ($caordcom->getTipo() == 'S') {
        $manejacorrel = $manejaserv;
      }

      If ($manejacorrel) {
        $caordcom->setOrdcom(self :: ObtenerCorrelativo($caordcom, & $correlativo));
      }
    } else {
      $caordcom->setOrdcom(str_replace('#', '0', $caordcom->getOrdcom()));
    }
    if (Herramientas :: getX_vacio('ordcom', 'caordcom', 'ordcom', $caordcom->getOrdcom())) {
      $existe_referencia = true;
    } else {
      $existe_referencia = false;
    }
    if ($existe_referencia == false) {
      $caordcom->setCodpro(Herramientas :: getX_vacio('codpro', 'caprovee', 'codpro', $caordcom->getCodpro()));
      $caordcom->save();
      self :: Grabar_OrdenCompra($caordcom, $grid);
      self :: Grabar_DetallesOrdenCompra($caordcom, $grid);
      self :: Grabar_DetallesResumen($caordcom);
      self :: Grabar_DetallesEntrega($caordcom);
    }
  }

  /**
   * Función para registrar los artículos en los diferentes Alamacenes
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */
  public static function Grabar_DetallesOrdenCompra($caordcom, $grid) {
    $ordcom = $caordcom->getOrdcom();
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      $x[$j]->setOrdcom($ordcom);
      $Codcat = $x[$j]->getCodcat();
      $x[$j]->setCodcat($Codcat);

      $x[$j]->save();
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }

    }
  }

  public static function Grabar_DetallesResumen($caordcom) {
    if (Herramientas :: getX_vacio('ordcom', 'Caresordcom', 'ordcom', $caordcom->getOrdcom()) == '') {
      $c = new Criteria();
      $c->add(CaartordPeer :: ORDCOM, $caordcom->getOrdcom());
      $arreglo2 = CaartordPeer :: doSelect($c);
      $i = 0;
      While ($i < count($arreglo2)) {
        $caresordcom = new Caresordcom();
        $caresordcom->setOrdcom($arreglo2[$i]->getOrdcom());
        $caresordcom->setDesres(Herramientas :: getX_vacio('codart', 'caregart', 'desart', $arreglo2[$i]->getCodart()));
        $caresordcom->setCodartpro('');
        $caresordcom->setCanord($arreglo2[$i]->getCanord());
        $caresordcom->setCanaju($arreglo2[$i]->getCanaju());
        $caresordcom->setCanrec($arreglo2[$i]->getCanrec());
        $caresordcom->setCantot($arreglo2[$i]->getCantot());
        $caresordcom->setCosto($arreglo2[$i]->getCantot());
        $caresordcom->setRgoart($arreglo2[$i]->getRgoart());
        $caresordcom->setTotart($arreglo2[$i]->getTotart());
        $caresordcom->setCodart($arreglo2[$i]->getCodart());
        $caresordcom->save();
        $i++;
      }

    } else {
      $c = new Criteria();
      $c->add(CaresordcomPeer :: ORDCOM, $caordcom->getOrdcom());
      CaresordcomPeer :: doDelete($c);

      $c = new Criteria();
      $c->add(CaartordPeer :: ORDCOM, $caordcom->getOrdcom());
      $arreglo = CaartordPeer :: doSelect($c);
      $i = 0;
      While ($i < count($arreglo)) {
        $caresordcom = new Caresordcom();
        $caresordcom->setOrdcom($arreglo[$i]->getOrdcom());
        $caresordcom->setDesres(Herramientas :: getX_vacio('codart', 'caregart', 'desart', $arreglo[$i]->getCodart()));
        $caresordcom->setCodartpro('');
        $caresordcom->setCanord($arreglo[$i]->getCanord());
        $caresordcom->setCanaju($arreglo[$i]->getCanaju());
        $caresordcom->setCanrec($arreglo[$i]->getCanrec());
        $caresordcom->setCantot($arreglo[$i]->getCantot());
        $caresordcom->setCosto($arreglo[$i]->getCantot());
        $caresordcom->setRgoart($arreglo[$i]->getRgoart());
        $caresordcom->setTotart($arreglo[$i]->getTotart());
        $caresordcom->setCodart($arreglo[$i]->getCodart());
        $caresordcom->save();
        $i++;
      }
    }
  }

  public static function Grabar_DetallesEntrega($caordcom) {
    if (Herramientas :: getX_vacio('ordcom', 'Caartfec', 'ordcom', $caordcom->getOrdcom()) == '') {

      $c = new Criteria();
      $c->add(CaartordPeer :: ORDCOM, $caordcom->getOrdcom());
      $arreglo2 = CaartordPeer :: doSelect($c);
      $i = 0;
      While ($i < count($arreglo2)) {
        $caartfec = new Caartfec();
        $caartfec->setOrdcom($arreglo2[$i]->getOrdcom());
        $caartfec->setCodart($arreglo2[$i]->getCodart());
        $caartfec->setDesart(Herramientas :: getX_vacio('codart', 'caregart', 'desart', $arreglo2[$i]->getCodart()));
        $caartfec->setCanart($arreglo2[$i]->getCanord());
        $caartfec->setFecent($caordcom->getFecord());
        $caartfec->save();
        $i++;
      }

    } else {
      $c = new Criteria();
      $c->add(CaartfecPeer :: ORDCOM, $caordcom->getOrdcom());
      CaartfecPeer :: doDelete($c);

      $c = new Criteria();
      $c->add(CaartordPeer :: ORDCOM, $caordcom->getOrdcom());
      $arreglo = CaartordPeer :: doSelect($c);
      $i = 0;
      While ($i < count($arreglo)) {
        $caartfec = new Caartfec();
        $caartfec->setOrdcom($arreglo[$i]->getOrdcom());
        $caartfec->setCodart($arreglo[$i]->getCodart());
        $caartfec->setDesart(Herramientas :: getX_vacio('codart', 'caregart', 'desart', $arreglo[$i]->getCodart()));
        $caartfec->setCanart($arreglo[$i]->getCanord());
        $caartfec->setFecent($caordcom->getFecord());
        $caartfec->save();
        $i++;
      }
    }
  }

  /**************************************************************************
   **           Fin Grid de la Requisición Formulario AmlReq                **
   **                       Jaime Suárez                                    **
   **************************************************************************/

  /**************************************************************************
   **         Grid de la Cotizacion del Formulario Almcotiza               **
   **                       Jesus Lobaton                                  **
   **************************************************************************/
  /**
   * Función para registrar la Cotizacion
   *
   * @static
   * @param $datos Object Cotizacion a Guadar
   * @param $grid Array de Objects Detalle de la Cotizacion.
   * @return void
   */
  public static function salvarAlmcotiza($datos, $grid,$valmon) {
    try {
      if (!$datos->getId()) //COTIZACION NUEVA
        {
        if (Herramientas :: getVerCorrelativo('corcot', 'cacorrel', &$r)) {
          if ($datos->getRefcot() == '########') {
            $encontrado=false;
          while (!$encontrado)
          {
            $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
             $sql="select refcot from cacotiza where refcot='".$numero."'";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
              $r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
          }

            $datos->setRefcot(str_pad($r, 8, '0', STR_PAD_LEFT));
          } else {
            $datos->setRefcot($datos->getRefcot());
          }

          if ($datos->getRefcot() == '########') {
          Herramientas :: getSalvarCorrelativo('corcot', 'cacorrel', 'Cotizaciones', $r, &$msg);}
          if (self :: Grabar_Cotizacion($datos) != -1) {
            return 0;
          }
          if (self :: Grabar_DetallesCotizacion($datos, $grid, "N") != -1) {
            return 0;
          }
        } else {
          return 2;
        }
      } else //modificación
        {
        if (self :: Grabar_Cotizacion($datos) != -1) {
          return 0;
        }
        if (self :: Grabar_DetallesCotizacion($datos, $grid,"M") != -1) {
          return 0;
        }
      }
      return -1;
    } catch (Exception $ex) {
      return 0;
    }
  }

  public static function Grabar_Cotizacion($caordcom) {
    try {

     $caordcom->save();
      return -1;
    } catch (Exception $ex) {

      return 0;

    }

  }

  /**
   * Función para Guardar los Detalles de la Cotizacion
   *
   * @static
   * @param $datos Object de los detalles de Cotizacion a Guadar
   * @param $grid Array de Objects Detalle de la Cotizacion.
   * @return void
   */

  public static function Grabar_DetallesCotizacion($datos, $grid, $tipo) {
    try {
      $id = $datos->getId();
      $refcot = $datos->getRefcot();

       if ($tipo=="M") //Modificacion
       {
        $c = new Criteria();
        $c->add(CadetcotPeer::REFCOT,$refcot);
        CadetcotPeer::doDelete($c);
       }

        $x = $grid[0];
        $j = 0;
        $dateFormat = new sfDateFormat('es_VE');

        while ($j < count($x)) {
        if ($tipo=="N") //Cotizacion Nueva
        {
          if ($datos->getRefsol()!="") {$cantord=$x[$j]['canreq'];}
          else { $cantord=$x[$j]['canord'];}
        }
        else
        {
          $cantord=$x[$j]['canord'];
        }

        if ($x[$j]['codart']!="" && $cantord>0)
        {
          $detalle = new Cadetcot();
          $detalle->setRefcot($refcot);
          $detalle->setCodart($x[$j]['codart']);
          $detalle->setCanord($cantord);
          $detalle->setCosto($x[$j]['costo']);
          $detalle->setMondes($x[$j]['mondes']);
          $detalle->setTotdet($x[$j]['totdet']);
          if ($x[$j]['fecent']!="")  { $detalle->setFecent($x[$j]['fecent']); }
          $detalle->save();
        }
          $j++;
        }

      return -1;
    } catch (Exception $ex) {
      return 0;
    }
  }

  /**
   * Función para Elimnar una Cotizacion
   *
   * @static
   * @param $caotiza Object Cotizacion a Eliminar
   * @return void
   */

  public static function eliminarAlmcotiza($cacotiza) {
    try {
      Herramientas :: EliminarRegistro("Cadetcot", "Refcot", $cacotiza->getRefcot());
      $cacotiza->delete();
      return -1;
    } catch (Exception $ex) {
      return 0;

    }
  }

  public static function Verificaranaliscotizacion($refsol,$codpro)
  {
    $resultado=array();
    if ($refsol!="")
    {
       $sql="SELECT a.REFCOT,a.codart FROM cadetcot a, cacotiza b WHERE  b.REFSOL='".$refsol."' and b.codpro='".$codpro."' and (a.priori isnull or a.priori=0) AND a.REFCOT=b.REFCOT";
      $resul = !Herramientas::BuscarDatos($sql,$resultado);
    }
    else
        $resul=false;
    return $resul;
  }

  /**************************************************************************
   **                        Fin Formulario Amlcotiza                       **
   **                             Jesus Lobtaon                             **
   **************************************************************************/

  /*************************************************************************************************/
  /**************************************************************************
   **                          Prioridad de Cotizaciones (almpriori)        ****
   **                                Gerana                                 **
   **************************************************************************/
  /**
   * Función Principal para guardar datos del formulario almpriori
   * TODO Esta función (y todas las demás de su clase) deben retornar u
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $grid Array de Objects de Cotizaciones a grabar
   * @param $reqart  Número de la solicitud de egreso a actualizar
   * @param $actsolegr trae 'S' si se va actualizar los precios en la solicitud de egreso, 'N' no actualiza
   * @return void
   */

  public static function salvarPrioridadCotizaciones($grid, $reqart, $actsolegr, $casolart, & $error, $grid1) {
    $gridnuevo = array ();
    $gridnuevo2 = array ();
    $gridnuevorec = array ();
    if ($casolart->getPorcostart()=='1')
    {
      self::asignarPrioridadCostArt($reqart,$casolart);
    }else if ($casolart->getPormoncot()=='1')
    {
      self::asignarPrioridadMonCot($reqart,$casolart);
    }
    else if ($casolart->getPortimeent()=='1')
    {
      self::asignarPrioridadTimEnt($reqart,$casolart);
    }
    else if ($casolart->getPorprovee()=='1')
    {
        $x = $grid1[0];
	    $j = 0;
	    while ($j < count($x)) {

	      $t= new criteria();
	      $t->add(CadetcotPeer::REFCOT,$x[$j]->getRefcot());
	      $resul= CadetcotPeer::doSelect($t);
	      if ($resul)
	      {
	      	foreach ($resul as $dat)
	      	{
	      		$dat->setPriori($x[$j]->getPriori2());
	      		$dat->setJustifica($x[$j]->getJustifica());
                        if ($x[$j]->getPriori2()==1 && $casolart->getObservaciones()!="")
                          $dat->setObservaciones($casolart->getObservaciones());
                        else 
                          $dat->setObservaciones($x[$j]->getObservaciones());
	      		$dat->save();
	      	}
	      }
	      $j++;
	    }
    }
    else {
	    $x = $grid[0];
	    $j = 0;
	    while ($j < count($x)) {
              if ($x[$j]->getPriori()!='') {
               if ($x[$j]->getPriori()==1 && $casolart->getObservaciones()!="")
                  $x[$j]->setObservaciones($casolart->getObservaciones());
	      $x[$j]->save();
              }
	      $j++;
	    }
    }

    $error = -1;
    if ($actsolegr == '1') {
      $c = new Criteria();
      $c->addJoin(CacotizaPeer :: REFCOT, CadetcotPeer :: REFCOT);
      $c->add(CacotizaPeer :: REFSOL, $reqart);
      $c->add(CadetcotPeer :: PRIORI, '1');
      $result = CadetcotPeer :: doSelect($c);
      if ($result) {
        foreach ($result as $datos) {
          $c = new Criteria();
          $c->add(CaartsolPeer :: REQART, $reqart);
          $c->add(CaartsolPeer :: CODART, $datos->getCodart());
          $resul = CaartsolPeer :: doSelect($c);
          if ($resul) {
          	foreach ($resul as $resul2)
          	{
            $indice = count($gridnuevo) + 1;
            $gridnuevo[$indice -1][0] = $datos->getCodart();
            $gridnuevo[$indice -1][1] = $resul2->getCanreq();
            $costonew=$datos->getCosto();
            if ($costonew != $resul2->getCosto()) {
              $gridnuevo[$indice -1][2] = $costonew;
            } else {
              $gridnuevo[$indice -1][2] = $resul2->getCosto(); //Costo nuevo
            }
            $monuni = ($gridnuevo[$indice -1][2] * $gridnuevo[$indice -1][1]);
            $gridnuevo[$indice -1][3] = $datos->getMondes();
            $gridnuevo[$indice -1][4] = $resul2->getMonrgo();
            $gridnuevo[$indice -1][5] = $monuni -$gridnuevo[$indice -1][3]+$gridnuevo[$indice -1][4];
            $c=new Criteria();
            $c->add(CadisrgoPeer::REQART,$reqart);
            $reg= CadisrgoPeer::doSelect($c);
            if ($reg) {
              $gridnuevo[$indice -1][6] = 1;
            } else {
              $gridnuevo[$indice -1][6] = 0;
            }
            $gridnuevo[$indice -1][7] = $resul2->getMontot();//$monuni -$gridnuevo[$indice -1][3];
            $gridnuevo[$indice -1][8] = $resul2->getCodcat().'-'.$resul2->getCodpre();
            $gridnuevo[$indice -1][9] = $resul2->getMonrgo();
            $gridnuevo[$indice -1][10] = $resul2->getCodcat();
            $gridnuevo[$indice -1][11] = $resul2->getCosto(); //Costo viejo
          	}
          }
        }
      }

      $c = new Criteria();
      $c->add(CadisrgoPeer :: REQART, $reqart);
      $dat = CadisrgoPeer :: doSelect($c);
      if ($dat) {
        foreach ($dat as $resultado) {
          $indice2 = count($gridnuevorec) + 1;
          $gridnuevorec[$indice2 -1][0] = $resultado->getCodrgo();
          $gridnuevorec[$indice2 -1][1] = $resultado->getMonrgo();
          $gridnuevorec[$indice2 -1][2] = $resultado->getTipdoc();
          $gridnuevorec[$indice2 -1][3] = "";
          $gridnuevorec[$indice2 -1][4] = $resultado->getMonrgo();
          $gridnuevorec[$indice2 -1][5] = $resultado->getCodart();
          $gridnuevorec[$indice2 -1][6] = $resultado->getCodcat();
        }
      }
      $nopuedeaumentar=false;
      $z = 0;
      while ($z < count($gridnuevo)) {
        if ($gridnuevo[$z][2] != "") {
          if (!is_numeric($gridnuevo[$z][2])) {
            $c = new Criteria();
            $c->addJoin(CacotizaPeer :: REFCOT, CadetcotPeer :: REFCOT);
            $c->add(CacotizaPeer :: REFSOL, $reqart);
            $result = CadetcotPeer :: doSelect($c);
            if ($result) {
              foreach ($result as $datos) {
                $datos->setPriori(null);
                $datos->setJustifica(null);
                $datos->save();
              }
            }
            $error = 133;
            return true;
            //break;
          } else
            if ($gridnuevo[$z][2] < 0) {
              $c = new Criteria();
              $c->addJoin(CacotizaPeer :: REFCOT, CadetcotPeer :: REFCOT);
              $c->add(CacotizaPeer :: REFSOL, $reqart);
              $result = CadetcotPeer :: doSelect($c);
              if ($result) {
                foreach ($result as $datos) {
                  $datos->setPriori(null);
                  $datos->setJustifica(null);
                  $datos->save();
                }
              }
              $error = 134;
              return true;
              //break;
            } else {
              if ($gridnuevo[$z][1] != "") { //&& ($gridnuevo[$z][2]>$gridnuevo[$z][11])) {
                $r = 0;
                self :: distribuirRecargos(& $gridnuevo2, & $gridnuevo,'S',&$gridnuevorec);
                self :: recalcularRecargos(&$gridnuevo2, &$gridnuevo, &$nopuedeaumentar, $reqart,&$gridnuevorec);
                if ($gridnuevo[$z][5] > $gridnuevo[$z][7]) {
                  $tiporec = Herramientas :: getX('CODEMP', 'Cadefart', 'Asiparrec', '001');
                  if (!self :: chequearDisponibilidad($gridnuevo, $z, $tiporec, $reqart)) {
                    $nopuedeaumentar = true;
                  }
                }

                if ($nopuedeaumentar==true) {
                  break;
                }
              }
            }
        }
        $z++;
      }

      if ($nopuedeaumentar!=true) {
        self :: actualizarSolicitud($reqart, $gridnuevo, $gridnuevo2,&$gridnuevorec);
      } else {
        $c = new Criteria();
        $c->addJoin(CacotizaPeer :: REFCOT, CadetcotPeer :: REFCOT);
        $c->add(CacotizaPeer :: REFSOL, $reqart);
        $result = CadetcotPeer :: doSelect($c);
        if ($result) {
          foreach ($result as $datos) {
            $datos->setPriori(null);
            $datos->setJustifica(null);
            $datos->save();
          }
          $error = 164;
        }
        $error = 135;
      }
    }
    return true;
  }

  public static function actualizarSolicitud($reqart, $gridnuevo, $gridnuevo2, &$gridnuevorec) {
    $c = new Criteria(); //Maestro
    $c->add(CasolartPeer :: REQART, $reqart);
    $resul = CasolartPeer :: doSelectOne($c);
    if ($resul) {
      self :: montoTotal($gridnuevo, & $montototal1, & $montototal2);
      $resul->setMonreq($montototal1);
      $resul->setMondes($montototal2);


    $actdessol="";  // Se creo para actualizar la descripcion de la solicitud cuando gane un unico proveedor
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almpriori',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('actdessol',$varemp['aplicacion']['compras']['modulos']['almpriori']))
	       {
	       	$actdessol=$varemp['aplicacion']['compras']['modulos']['almpriori']['actdessol'];
	       }
         }
      if ($actdessol=='S') {
        $sql = "select a.refsol, a.codpro, b.priori, a.descot from cacotiza a inner join cadetcot b on a.refcot=b.refcot where b.priori=1 and a.refsol='".$reqart."'
        group by a.refsol, a.codpro, b.priori, a.descot";
        if (Herramientas::BuscarDatos($sql,&$result)){
          if(count($result)==1){
             $resul->setDesreq($result[0]["descot"]);
          }
        }
      }
      $resul->save();
    }

    $genero='';

    $c = new Criteria();
    $resul = CadefartPeer :: doSelectOne($c);
    if ($resul) {
      if ($resul->getPrcasopre() == 'S' && $resul->getPrcreqapr() != 'S') {
        self :: generaPrecompromiso($reqart);
        $genero='a';
      }
    }

    $j = 0;
    while ($j < count($gridnuevo)) //Detalle
      {
      $c = new Criteria();
      $c->add(CaartsolPeer :: REQART, $reqart);
      $c->add(CaartsolPeer :: CODART, $gridnuevo[$j][0]);
      $c->add(CaartsolPeer :: CODCAT, $gridnuevo[$j][10]);
      $dato = CaartsolPeer :: doSelect($c);
      if ($dato) {
        foreach ($dato as $dato2)
        {
        $dato2->setCosto($gridnuevo[$j][2]);
        $dato2->setMondes($gridnuevo[$j][3]);
        $dato2->setMonrgo($gridnuevo[$j][4]);
        $dato2->setMontot($gridnuevo[$j][5]);
        $dato2->save();
        }
      }
      $j++;
    }

  /*  $i = 0;
    while ($i < count($gridnuevo2)) //Recargos
      {
      $c = new Criteria();
      $c->add(CargosolPeer :: REQART, $reqart);
      $c->add(CargosolPeer :: CODRGO, $gridnuevo2[$i][0]);
      $dato1 = CargosolPeer :: doSelectOne($c);
      if ($dato1) {
        $dato1->setMonrgo($gridnuevo2[$i][1]);
        $dato1->save();
      }
      $i++;
    }*/

   /* $acum = 0;
    $r = 0;
    while ($r < count($gridnuevo)) {
      if ($gridnuevo[$r][6] == 1 && $gridnuevo[$r][4] > 0) {
        $acum = $acum + ($gridnuevo[$r][1] * $gridnuevo[$r][2]);
      }
      $r++;
    }

    $l = 0;
    while ($l < count($gridnuevo2)) //Distribucion de Recargos
      {
      $monto = $gridnuevo2[$l][1];
      if ($gridnuevo2[$l][0] != "") {
        $montorecargo = 0;
        $x = 0;
        while ($x < count($gridnuevo)) {
          if ($gridnuevo[$x][6] == 1 && $gridnuevo[$x][4] > 0) {
            $totalarticulo = $gridnuevo[$x][1] * $gridnuevo[$x][2];
            $c = new Criteria();
            $c->add(CadisrgoPeer :: REQART, $reqart);
            $c->add(CadisrgoPeer :: CODART, $gridnuevo[$x][0]);
            $c->add(CadisrgoPeer :: CODRGO, $gridnuevo2[$l][0]);
            $dato2 = CadisrgoPeer :: doSelect($c);
            if ($dato2) {
              $montorecargo = round((($monto * $totalarticulo) / $acum),2);
              foreach ($dato2 as $dato3)
              {
               $dato3->setMonrgo($montorecargo);
               $dato3->save();
              }
            }
          }
          $x++;
        }
      }
      $l++;
    }*/

    $l = 0;
    while ($l < count($gridnuevorec)) //Distribucion de Recargos
      {
            $c = new Criteria();
            $c->add(CadisrgoPeer :: REQART, $reqart);
            $c->add(CadisrgoPeer :: CODART, $gridnuevorec[$l][5]);
            $c->add(CadisrgoPeer :: CODCAT, $gridnuevorec[$l][6]);
            $c->add(CadisrgoPeer :: CODRGO, $gridnuevorec[$l][0]);
            $dato2 = CadisrgoPeer :: doSelect($c);
            if ($dato2) {
              foreach ($dato2 as $dato3)
              {
               $dato3->setMonrgo($gridnuevorec[$l][1]);
               $dato3->save();
              }
            }//if ($dato2) {
        $l++;
      }//while

   //Grabar datos en la  tabla cargosol
   $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
   $c= new Criteria();
   $c->add(CargosolPeer::REQART,$reqart);
   $c->add(CargosolPeer::TIPDOC,$tipdoc);
   CargosolPeer::doDelete($c);


   $sql="select reqart,codrgo,sum(coalesce(monrgo,0)) as monrgo from cadisrgo where reqart='".$reqart."'  group by reqart,codrgo";
   $result=array();
   if (Herramientas::BuscarDatos($sql,&$result))
    {
      $i=0;
      $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
      while ($i<count($result))
      {
        $cargosol= new Cargosol();
        $cargosol->setReqart($reqart);
        $cargosol->setCodrgo($result[$i]['codrgo']);
        $cargosol->setMonrgo($result[$i]['monrgo']);
         $cargosol->setTipdoc($tipdoc);
         $cargosol->save();
         $i++;
       }// while ($i<count($result))
    }


   if ($genero!="")
   {
    SolicituddeEgresos :: generarImputacionesPrecompromiso($reqart);
   }
  }

  public static function generaPrecompromiso($referencia) {

    $c = new Criteria();
    $c->add(CpimpprcPeer :: REFPRC, $referencia);
    CpimpprcPeer :: doDelete($c);

    $c = new Criteria();
    $c->add(CpprecomPeer :: REFPRC, $referencia);
    CpprecomPeer :: doDelete($c);

    $c = new Criteria();
    $c->add(CpprecomPeer :: REFPRC, $referencia);
    $existe = CpprecomPeer :: doSelectOne($c);
    if (!$existe) {
      $c = new Criteria();
      $c->add(CasolartPeer :: REQART, $referencia);
      $data = CasolartPeer :: doSelectOne($c);
      if ($data) {
      	$tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
        $cpprecom = new Cpprecom();
        $cpprecom->setRefprc($referencia);
        $cpprecom->setFecprc($data->getFecreq());
        $cpprecom->setTipprc($tipdoc);
        $cpprecom->setAnoprc(substr($data->getFecreq(), 0, 4));
        $cpprecom->setDesanu(null);
        $cpprecom->setDesprc($data->getDesreq());
        $cpprecom->setMonprc($data->getMonreq());
        $cpprecom->setSalcom(0.00);
        $cpprecom->setSalcau(0.00);
        $cpprecom->setSalpag(0.00);
        $cpprecom->setSalaju(0.00);
        $cpprecom->setStaprc('A');
        $cpprecom->setcedrif(null);
        $cpprecom->save();
      }
    }
  }

  public static function montoTotal($gridnuevo, & $montototal1, & $montototal2) {
    $montototal1 = 0;
    $montototal2 = 0;
    $e = 0;
    while ($e < count($gridnuevo)) {
      $montototal1 = $montototal1 + $gridnuevo[$e][5];
      $montototal2 = $montototal2 + $gridnuevo[$e][3];
      $e++;
    }

  }

/*  public static function distribuirRecargos(& $gridnuevo2, & $gridnuevo, $fila, $sumaresta) {
    $t = 0;
    while ($t < count($gridnuevo2)) {
      if ($gridnuevo2[$t][0] != "") {
        $c = new Criteria();
        $c->add(CarecargPeer :: CODRGO, $gridnuevo2[$t][0]);
        $dato = CarecargPeer :: doselectOne($c);
        if ($dato) {
          $montot = self :: montoMarcados($gridnuevo);
          $gridnuevo2[$t][3] = $dato->getNomrgo();
          if ($dato->getTiprgo() == 'M') {
            $gridnuevo2[$t][1] = $dato->getMonrgo();
          } else
            if ($dato->getTiprgo() == 'P') {
              $gridnuevo2[$t][1] = ($montot * $dato->getMonrgo()) / 100;
            } else {
              $gridnuevo2[$t][1] = "0.00";
              $gridnuevo2[$t][4] = "0.00";
            }
        }
      }
      $t++;
    }

    $monuni = 0;
    if ($gridnuevo2[0][0] != "") {
      $montot = self :: montoMarcados($gridnuevo);
      if ($montot > 0) {
        $l = 0;
        while ($l < count($gridnuevo)) {
          if ($gridnuevo[$l][6] == 1) {
            $monuni = (($gridnuevo[$l][2] * $gridnuevo[$l][1] - $gridnuevo[$l][3]) / $montot) * $gridnuevo2[$fila][1];
            if ($sumaresta == 'S') {
              $gridnuevo[$l][4] = $gridnuevo[$l][4] + $monuni;
              $gridnuevo[$l][5] = $gridnuevo[$l][5] + $monuni;
            } else
              if ($sumaresta == 'R') {
                $gridnuevo[$l][5] = $gridnuevo[$l][5] - $gridnuevo[$l][4];
                $gridnuevo[$l][4] = "0.00";
              }
          }
          $l++;
        }
      }
    }
  }*/


  public static function calcularecargosxart($codart,$codcat,$monuni,&$monrgotot,&$gridnuevorec)
  {
    $t = 0;
    $monrgotot=0;
    while ($t < count($gridnuevorec)) {
      if ($gridnuevorec[$t][0] != "") {
       if ($codart==$gridnuevorec[$t][5] && $codcat==$gridnuevorec[$t][6])
       {
        $c = new Criteria();
        $c->add(CarecargPeer :: CODRGO, $gridnuevorec[$t][0]);
        $dato = CarecargPeer :: doselectOne($c);
        if ($dato) {
          $gridnuevorec[$t][3] = $dato->getNomrgo();
          if ($dato->getTiprgo() == 'M') {
            $gridnuevorec[$t][1] = $dato->getMonrgo();
          } else
            if ($dato->getTiprgo() == 'P') {
              $gridnuevorec[$t][1] = ($monuni * $dato->getMonrgo()) / 100;
            } else {
              $gridnuevorec[$t][1] = 0;
              $gridnuevorec[$t][4] = 0;
            }
           $monrgotot=$monrgotot+$gridnuevorec[$t][1];
        }
      }//if ($codart==$gridnuevorec[$t][5] && $codcat==$gridnuevorec[$t][6])
      }
      $t++;
    }

  }
  public static function distribuirRecargos(& $gridnuevo2, & $gridnuevo, $sumaresta,&$gridnuevorec)
   {
    $monuni = 0;
   if (count($gridnuevorec)>0)
   {
    if ($gridnuevorec[0][0] != "") {
       $l = 0;
        while ($l < count($gridnuevo)) {
          if ($gridnuevo[$l][6] == 1) {
            $monuni = ($gridnuevo[$l][2] * $gridnuevo[$l][1]);
            $mondes=$gridnuevo[$l][3];
            self::calcularecargosxart($gridnuevo[$l][0],$gridnuevo[$l][10],$monuni,&$monrgotot,&$gridnuevorec);
            if ($sumaresta == 'S') {
              $gridnuevo[$l][4] = $monrgotot;
              $gridnuevo[$l][5] = $monuni-$mondes+$monrgotot;
            } else
              if ($sumaresta == 'R') {
                $gridnuevo[$l][5] = $gridnuevo[$l][5] - $gridnuevo[$l][4];
                $gridnuevo[$l][4] = "0.00";
              }
          }
          $l++;
        }//while
      }
   }
    //unir el grid: gridnuevorec, que corresponde a cadisrgo, en un nuevo grid, con la distribucion total por
    //recargo: Cargosol
    $h = 0;
    $gridnuevo2=array();
    $cont=-1;
    while ($h < count($gridnuevorec))
     {
        $codrgo=$gridnuevorec[$h][0];
        if (self::BuscarCodrgoenArreglo($gridnuevo2,$codrgo,&$j))
        {
            $gridnuevo2[$j][1]= $gridnuevo2[$j][1] + $gridnuevorec[$h][1];
        }
        else
        {
            $cont++;
            $gridnuevo2[$cont][0] = $gridnuevorec[$h][0];//codrgo
            $gridnuevo2[$cont][1] = $gridnuevorec[$h][1];//monrgo
            $gridnuevo2[$cont][2] = $gridnuevorec[$h][2]; //tipdoc
            $gridnuevo2[$cont][3] = "";
            $gridnuevo2[$cont][4] = $gridnuevorec[$h][4];
        }
      $h++;
     }
  }


 private static function BuscarCodrgoenArreglo($myarr,$codrgo,&$j)
  {
      $j=0;
      while ($j<count($myarr))
      {
        if ($myarr[$j][0]==$codrgo)
        {
           return true;
        }
        $j++;
      }
      return false;
  }

  public static function recalcularRecargos(&$gridnuevo2, &$gridnuevo, &$nopuedeaumentar, $reqart,&$gridnuevorec) {
  /*  $r = 0;
    while ($r < count($gridnuevo2)) {
      self :: distribuirRecargos(& $gridnuevo2, & $gridnuevo, $r, 'R',&$gridnuevorec);

      $r++;
    }

    $d = 0;
    while ($d < count($gridnuevo2)) {
      self :: distribuirRecargos(& $gridnuevo2, & $gridnuevo, $d, 'S',&$gridnuevorec);
      $d++;
    }*/

   if (count($gridnuevorec)>0)
   {
    if ($gridnuevorec[0][0] != "") {
      $c = new Criteria();
      $dato = CadefartPeer :: doSelectOne($c);
      if ($dato) {
        $tiporec = $dato->getAsiparrec();
        if ($dato->getAsiparrec() == 'C') {
          $j = 0;
          $procede = true;
          while ($j < count($gridnuevo) && $procede) {
            if ($gridnuevo[$j][5] > $gridnuevo[$j][7]) {
              if (!self::chequearDisponibilidad($gridnuevo, $j, $tiporec, $reqart))
              {
                $nopuedeaumentar = true;
                $procede = false;
                $a = 0;
                self :: distribuirRecargos(& $gridnuevo2, & $gridnuevo,'R',&$gridnuevorec);
              }
            }
            $j++;
          }
        } else {
          $gridunidad = array ();
          $j = 0;
          $procede = true;
          while ($j < count($gridnuevo2) && $procede) {
            if ($gridnuevo2[$j][1] > $gridnuevo2[$j][4]) {
              $elmonto = $gridnuevo2[$j][1] - $gridnuevo2[$j][4];
              if (!self :: chequearDisponibilidadRecargo($gridnuevo2[$j][0], $elmonto, $tiporec, $gridunidad, $gridnuevo)) {
                $nopuedeaumentar = true;
                $procede = false;
                $a = 0;
                self :: distribuirRecargos(& $gridnuevo2, & $gridnuevo,'R',&$gridnuevorec);
              }
            }
            $j++;
          }

        }
      }
     }
    }//if (count($gridnuevorec)>0)
  }

  public static function chequearDisponibilidad($elgrid, $fila, $tiporec, $reqart) {
    $mitotal = 0;
    $i = 0;
    while ($i < count($elgrid)) {
      if ($elgrid[$fila][8] == $elgrid[$i][8]) {
        if ($tiporec != 'C') {
          $mitotal = $mitotal + ($elgrid[$i][1] * $elgrid[$i][2]);
        } else {
          $mitotal = $mitotal + $elgrid[$i][4];
        }
      }
      $i++;
    }

    $l = 0;
    while ($l < count($elgrid)) {
      if ($elgrid[$fila][8] == $elgrid[$l][8]) {
        if ($tiporec != 'C') {
          $mitotal = $mitotal - ($elgrid[$l][7] - $elgrid[$l][9]);
        } else {
          $mitotal = $mitotal - $elgrid[$l][7];
        }
      }
      $l++;
    }

    if ($elgrid[$fila][8] != "") {
      $codigopresupuestario = $elgrid[$fila][8];
      $anno = substr(Herramientas :: getX('REQART', 'Casolart', 'Fecreq', $reqart), 0, 4);
      if (Herramientas::Monto_disponible_ejecucion($anno,$codigopresupuestario,&$mondis))
      {
        if ($mitotal > $mondis) {
          $chequeardisponibilidadpresupuesto = false;
          $sobregiro = true;
        } else {
          $chequeardisponibilidadpresupuesto = true;
          $sobregiro = false;
        }
      } else {

        $chequeardisponibilidadpresupuesto = false;
        $sobregiro = true;
      }
    } else {
      $chequeardisponibilidadpresupuesto = false;
      $sobregiro = true;
    }

    return $chequeardisponibilidadpresupuesto;

  }

  public static function chequearDisponibilidadRecargo($elcodigo, $elmonto, $tiporec, $gridunidad, $gridnuevo) {
    if ($elcodigo == "") {
      $mitotal = 0;
    } else {
      $mitotal = $elmonto;
    }

    $c = new Criteria();
    $c->add(CarecargPeer :: CODRGO, $elcodigo);
    $data = CarecargPeer :: doSelectOne($c);
    if ($data) {
      if ($tiporec == 'P') {
        $mitotal = $elmonto;
        $codigopresupuestario = $data->getCodpre();
        $a = new Criteria();
        $a->add(CpasiiniPeer :: PERPRE, '00');
        $a->add(CpasiiniPeer :: CODPRE, $codigopresupuestario);
        $data2 = CpasiiniPeer :: doSelectOne($a);
        if ($data2) {
          $mondis = SolicituddeEgresos :: montoDisponible($codigopresupuestario);
          if ($mitotal > $mondis) {
            $chequeardisponibilidadrecargo = false;
            $sobregirorecargo = true;
          } else {
            $chequeardisponibilidadrecargo = true;
            $sobregirorecargo = false;
          }
        } else {
          $chequeardisponibilidadrecargo = false;
          $sobregirorecargo = true;
        }
      } else {
        self :: acumularUnidad($elmonto, $gridnuevo, & $gridunidad);
        $l = 0;
        while ($l < count($gridunidad)) {
          $codigopresupuestario = $gridunidad[$l][0] . '-' . $data->getCodpre();
          $mitotal = $gridunidad[$l][1];
          $c = new Criteria();
          $c->add(CpasiiniPeer :: PERPRE, '00');
          $c->add(CpasiiniPeer :: CODPRE, $codigopresupuestario);
          $data3 = CpasiiniPeer :: doSelectOne($c);
          if ($data3) {
            $mondis = SolicituddeEgresos :: montoDisponible($codigopresupuestario);
            if ($mitotal > $mondis) {
              $chequeardisponibilidadrecargo = false;
              $sobregirorecargo = true;
            } else {
              $chequeardisponibilidadrecargo = true;
              $sobregirorecargo = false;
            }
          } else {
            $chequeardisponibilidadrecargo = false;
            $sobregirorecargo = true;
          }
          $l++;
        }
      }
    }
    return $chequeardisponibilidadrecargo;
  }

  public static function acumularUnidad($monto, $grid, & $gridunidad) {
    $acum = 0;
    $r = 0;
    while ($r < count($grid)) {
      if ($grid[$r][6] == 1 && $grid[$r][4] > 0) {
        $acum = $acum + ($grid[$r][1] * $grid[$r][2]);
      }
      $r++;
    }

    $totalunidad = 0;
    $k = 0;
    while ($k < count($grid)) {
      if ($grid[$k][6] == 1) {
        if ($grid[$k][9] > 0) {
          $monto = $grid[$k][4] - $grid[$k][9];
        } else {
          $monto = $grid[$k][4];
        }
        $totart = $grid[$k][2] * $grid[$k][1];
        $j = 0;
        if (count($gridunidad) > 0) {
          while ($j < count($gridunidad)) {
            $encontrado = false;
            if ($grid[$k][10] == $gridunidad[$j][0]) {
              $encontrado = true;
              $fila = $j;
              break;
            }
            $j++;
          }
          if ($encontrado == true) {
            $mont = SolicituddeEgresos :: montoRecargo($acum, $monto, $totart);
            $gridunidad[$fila][1] = $gridunidad[$fila][1] + $mont;
          } else {
            $indice = count($gridunidad);
            $gridunidad[$indice][0] = $grid[$k][10];
            $gridunidad[$indice][1] = SolicituddeEgresos :: montoRecargo($acum, $monto, $totart);
          }
        } else {
          $gridunidad[$j][0] = $grid[$k][10];
          $gridunidad[$j][1] = SolicituddeEgresos :: montoRecargo($acum, $monto, $totart);
        }
      }
      $k++;
    }
  }

  public static function montoMarcados($griddetalle) {
    $monto_marcado = 0;
    $i = 0;
    while ($i < count($griddetalle)) {
      if ($griddetalle[$i][6] == 1) {
        $monto_marcado = ($monto_marcado + ($griddetalle[$i][2] * $griddetalle[$i][1]));
      }
      $i++;
    }
    return $monto_marcado;
  }

  /**************************************************************************
   **                      Fin  Prioridad de Cotizaciones (almpriori)      **
   **                                Gerana                                 **
   **************************************************************************/

  /**************************************************************************
   **                         Ajuste Orden de Compra (almajuoc)             **
   **                                Luelher                                **
   **************************************************************************/

  /*
   * Función Principal para guardar datos del formulario almaujoc
   *
   * @static
   * @param $reg Objeto de la tabla maestar del formulario
   * @param $grid Array de Objects de Cotizaciones.
   * @return void
   */
  public static function salvarAlmaujoc($reg, $grid)
  {
      if ($reg->getId() == '')
        $nuevo="S";
      else
        $nuevo="N";
      $Hay_Presupuesto = true;
//    try{
      $result=-1;
      $c = new Criteria();
      $opdefemp = OpdefempPeer :: doSelectOne($c);

      // Grabar Comprobante de Orden

      if ($opdefemp)
      {
        if ($opdefemp->getGenctaord() == 'S')
          $result = self :: Grabar_ComprobanteOrden($reg, $grid);
        if ($result > -1)
          return $result;
      }

      $result = self :: Grabar_Ajuste($reg, $grid);
      if ($result > -1)
        return $result;

      if ($nuevo == 'S')
      {
        self :: Actualizar_ArticulosOrden($reg, $grid);

        if ($Hay_Presupuesto)
        {
          self::Grabar_AjusteCompromiso($reg,$grid);
        }
      }

      return -1;
/*
    }catch (Exception $ex){

      return 0;

    }
*/
  }



  /*
  * Función Principal para guardar datos del formulario almaujoc
  *
  * @static
  * @param $reg Objeto de la tabla maestar del formulario
  * @param $grid Array de Objects de Cotizaciones.
  * @return void
  */
  public static function validarAlmajuoc($reg, $grid) {
    $result = -1;

    // Código para validaciones del negocio
    // Debe retornar el código de error, si existe, si no retorna -1
    $t= new Criteria();
    $t->add(CpimpcauPeer::REFERE,$reg->getOrdcom());
    $t->add(CpimpcauPeer::STAIMP,'N',Criteria::NOT_EQUAL);
    $resultado= CpimpcauPeer::doSelect($t);
    if ($resultado)
    {
    	$result=197;
    }


    return $result;

  }

  public static function Actualizar_ArticulosOrden($reg, $grid) {

    $result = -1;

    $ajus = $grid[0];

    foreach ($ajus as $regaju)
      {

        $caartord = CaartordPeer :: retrieveByPK($regaju->getId());

        $caartord->setCanaju($caartord->getCanaju() + $regaju->getCanaju());
        $caartord->setCantot($caartord->getCanord() - $caartord->getCanaju());


    if ($caartord->getCanord()<>0)
    {
        $caartord->setDtoart(round($caartord->getCantot() * ($caartord->getDtoart() / $caartord->getCanord()),2));
        $caartord->setRgoart(round($caartord->getCantot() * ($caartord->getRgoart() / $caartord->getCanord()),2));
        $caartord->setTotart(round($caartord->getCantot() * ($caartord->getTotart() / $caartord->getCanord()),2));
    }
    else
        {
        $caartord->setDtoart(0);
        $caartord->setRgoart(0);
        $caartord->setTotart(0);
        }

        //TODO: ACtualizar el monto total en el maestro de la orden de compra CAORDCOM
      $caartord->save();
/*
        print '<pre>';
             print_r($caartord);
             print '</pre>-----';
             exit();
*/
        $c = new Criteria();
        $c->add(CaresordcomPeer :: ORDCOM, $caartord->getOrdcom());
        $c->add(CaresordcomPeer :: CODART, $caartord->getCodart());

        $caresordcom = CaresordcomPeer :: doSelectOne($c);

        if ($caresordcom)
        {
      if($caresordcom->getCanord()<>0)
      {
      $caresordcom->setRgoart($caresordcom->getCantot() * round($caresordcom->getRgoart() / $caresordcom->getCanord(), 2));
          $caresordcom->setTotart($caresordcom->getCantot() * round($caresordcom->getTotart() / $caresordcom->getCanord(), 2));
      }
      else
      {
      $caresordcom->setRgoart(0);
          $caresordcom->setTotart(0);
      }
          $caresordcom->setCanaju($caresordcom->getCanaju() + $regaju->getCanaju());
          $caresordcom->setCantot($caresordcom->getCanord() - $caresordcom->getCanaju());

        $caresordcom->save();
        }



    }

    return $result;

  }

  public static function Grabar_Ajuste($reg, $grid)
  {

    $Hay_Presupuesto = true;

    $result = -1;

    $ajus = $grid[0];

    if(!Compras::Hay_CompromisoCausado($reg, $grid))
    {
  //print '<pre>';
  //print_r($ajus);
  //print '</pre>-----';
  //exit();

      if ($reg->getId() != '') {

        $c = new Criteria();
        $c->add(CaajuocPeer :: ID, $reg->getId());

        $ajureg = CaajuocPeer :: doSelectOne($c);

        $ajureg->setDesaju($reg->getDesaju());

        $ajureg->save();

      }
      else
      {

        $reg->setStaaju('A');
        $reg->setRefaju('');

        $reg->save();


        $result = self :: Grabar_DetalleAjuste($reg, $grid, & $totalaju);

       $c = new Criteria();

        $c->add(CaajuocPeer :: AJUOC, $reg->getAjuoc());

        $ajureg = CaajuocPeer :: doSelectOne($c);

        $ajureg->setMonaju($totalaju);

        $ajureg->save();

      }

      return $result;
    }else return 148;


  }

  public static function Grabar_ComprobanteOrden($reg, $grid) {
    $result = -1;





    //$rifprov = Herramientas::getX('codpro','CaProvee','rifpro',$reg->getCodpro());

    // TODO Grabar_ComprobanteOrden

    return $result;

  }

  public static function Grabar_DetalleAjuste($reg, $grid, & $totalaju) {

    $result = -1;

    $ajus = $grid[0];

    $totalaju = 0;

//        print '<pre>';
//        print_r($ajus);
//        print '</pre>';
//        exit();

    foreach ($ajus as $regajus) {

      $caartaoc = new Caartaoc();

      $c = new Criteria();
      $c->add(CaartordPeer :: ORDCOM, $reg->getOrdcom());
      $c->add(CaartordPeer :: CODART, $regajus->getCodart());
      $c->add(CaartordPeer :: CODCAT, $regajus->getCodcat());

      $caartord = CaartordPeer :: doSelectOne($c);

      if ($caartord) {
        $preciounitario = $caartord->getPreciounitario();
        $caartaoc->setAjuoc($reg->getAjuoc());
        $caartaoc->setCodart($caartord->getCodart());
        $caartaoc->setCodcat($caartord->getCodcat());
        $caartaoc->setCanord($caartord->getCanord());
        $caartaoc->setCanaju($regajus->getCanaju());
        $caartaoc->setMonaju($preciounitario * $regajus->getCanaju());
        $monrec = self :: Calcular_Recargo($reg->getOrdcom(), $regajus->getCanaju(), $regajus->getCodart(), $regajus->getCodcat());
        $caartaoc->setMonrec($monrec);
        $caartaoc->setMontot($caartaoc->getMonaju() + $monrec);

        $totalaju = $totalaju + $caartaoc->getMontot();

        $caartaoc->save();

      } else
        return 116;

    }


      $c = new Criteria;
      $c->add(CaordcomPeer::ORDCOM,$reg->getOrdcom());

      $reg_ordcom = CaordcomPeer::doSelectOne($c);

      $totord = $reg_ordcom->getMonord() - $totalaju;

      $reg_ordcom->setMonord($totord);

      $reg_ordcom->save();

    return -1;

  }

  public static function Calcular_Recargo($numordcom, $cantidad, $codart, $codcat) {

    $c = new Criteria();
    $c->add(CaartordPeer :: ORDCOM, $numordcom);
    $c->add(CaartordPeer :: CODART, $codart);
    $c->add(CaartordPeer :: CODCAT, $codcat);

    $caartord = CaartordPeer :: doSelectOne($c);

    //print  $reg->getOrdcom().'---';



    if ($caartord)
    {

      if ($cantidad > 0) {

        return (abs($cantidad) * ($caartord->getRgoart() / $caartord->getCanord()));

      }
      else
      {
        return 0;
      }

    }
    else
    {
      return 0;
    }
  }

  public static function eliminarAlmajuoc($reg)
  {

    $Hay_Presupuesto = true;

    /*sql = "SELECT A.REFPRC FROM CPDOCCOM A, CPCOMPRO B, CAORDCOM C WHERE " + _
        "C.REFCOM=B.REFCOM AND " +
        "B.TIPCOM=A.TIPCOM AND " + _
        "C.ORDCOM='" + DatosAju(1).Text + "'"
    If Buscar_Datos(DATABASEGRID, Tabla, sql) Then
       If Tabla!RefPrc = "N" Then
          If Not Chequear_Disponibilidad("AC" + Mid(DatosAju(0).Text, 3, 6)) Then
             Tabla.Close
             Exit Sub
          End If
       End If
    Else
       MsgBox "No se puede determinar si el tipo de Compromiso refiere a un Precompromiso, no se Grabaran los Datos", vbCritical
       Exit Sub
    End If*/

    $sql = "SELECT A.REFPRC FROM CPDOCCOM A, CPCOMPRO B, CAORDCOM C WHERE
            C.REFCOM=B.REFCOM AND   B.TIPCOM=A.TIPCOM AND
            C.ORDCOM='" . $reg->getOrdcom() . "'";

    if (Herramientas :: BuscarDatos($sql, & $registros))
    {
      if ($registros[0]['refprc'] == 'N')
      {
        $error = self :: chequear_disponibilidad_ajustes($reg);
        if ($error != -1)
          return $error;
      }
    }

    $c = new Criteria();
    $c->add(CaartaocPeer :: AJUOC, $reg->getAjuoc());
    $grid[0] = CaartaocPeer :: doSelect($c);

    if (!self::Queda_Compromiso_mayor_que_Precom($reg, $grid))
    {
      //      try{
      foreach ($grid[0] as $caartaoc)
      {
        $caartaoc->delete();
      }
        $reg->delete();
      //      }catch(Exception $e){return 0;}

      $error = self :: Devolver_ArticulosOrden($reg, $grid);

      if ($error != -1)
        return $error;
      if ($Hay_Presupuesto)
      {
        $error = self :: Eliminar_AjusteCompromiso($reg, $grid);
        if ($error != -1)
          return $error;
      }

      return -1;

    } else
      return 153;

    /*

    If Hay_Presupuesto Then
        If Not Queda_Compromiso_mayor_que_Precom Then
           If EliminarRegistroDetalle(CaArtAoc, "CaArtAoc", "AjuOc", DatosAju(0).Text, True) Then
              EliminarRegistroMaestro CaAjuOC, "CaAjuOC", "AjuOc", DatosAju(0).Text
              'se actualiza la orden de compra
              Devolver_ArticulosOrden
               If Hay_Presupuesto Then
                   ' se elimina el Ajuste
                  Eliminar_AjusteCompromiso
               End If
               'Limpiar
           End If
        Else
           MsgBox "El Compromiso asociado a la Orden de Compra" + _
                  " no puede ser mayor al Precompromiso", vbExclamation
        End If
     Else
        If EliminarRegistroDetalle(CaArtAoc, "CaArtAoc", "AjuOc", DatosAju(0).Text, True) Then
           EliminarRegistroMaestro CaAjuOC, "CaAjuOC", "AjuOc", DatosAju(0).Text
           'Limpiar
        End If
     End If
     'Ahora preguntamos si genero Comprobante de Orden y si lo podemos eliminar
    sql = "Select * from OPDefEmp"
    If Buscar_Datos(DATABASEGRID, OPDefEmp, sql) Then
       If ObtenerValorRegistro(OPDefEmp!GenCtaOrd) = "S" Then
          If Verificar_Status_Comprobante("AO" + Mid(DatosAju(0).Text, 3, 6)) Then
             sql = "DELETE CONTABC1 WHERE NUMCOM='AO" + Mid(DatosAju(0).Text, 3, 6) + "'"
             DATABASEGRID.Execute sql
             sql = "DELETE CONTABC WHERE NUMCOM='AO" + Mid(DatosAju(0).Text, 3, 6) + "'"
             DATABASEGRID.Execute sql
          Else
             MsgBox "No se puede Eliminar el Ajuste ya que el Comprobante de Orden asociado está actualizado", vbCritical
             Limpiar
             Exit Sub
          End If
       End If
       OPDefEmp.Close
    End If
    */

  }

  private static function Devolver_ArticulosOrden($reg, $grid)
  {

    foreach ($grid[0] as $artajuoc) {
      $c = new Criteria();
      $c->add(CaartordPeer :: ORDCOM, $reg->getOrdcom());
      $c->add(CaartordPeer :: CODART, $artajuoc->getCodart());
      $c->add(CaartordPeer :: CODCAT, $artajuoc->getCodcat());

      $caartord = CaartordPeer :: doSelectOne($c);
      if ($caartord) {
        $caartord->setCanaju($caartord->getCanaju() - $artajuoc->getCanaju());
        $caartord->setCantot($caartord->getCanord() + $caartord->getCanaju());
        $caartord->setRgoart($caartord->getRgoart() + $artajuoc->getMonrec());
        $caartord->setTotart($caartord->getTotart() + $artajuoc->getMontot());
        $caartord->save();
      }
    }

    return -1;

  }

  private static function chequear_disponibilidad_ajustes($reg)
  {

    $sql1 = "Select to_char(A.FECAJU,'yyyy') as FECAJU , B.REFAJU as REFAJU, B.CODPRE as CODPRE, B.MONAJU as MONAJU from CPAJUSTE A ,CPMovAju B where A.REFAJU=B.REFAJU and A.RefAju='" .'AC'.$reg->getRefaju(). "'";

    H :: BuscarDatos($sql1, & $reg1);

    if ($reg1)
    {
  foreach ($reg1 as $r)
  {
    // utilizar nueva funcion para chequear la disponibilidad

      $sql2 = "Select MonDis from CPAsiIni where CodPre='" .$r['codpre']. "'" .
                "and PerPre='00' and AnoPre='" .$r['fecaju']. "'";

    H :: BuscarDatos($sql2, & $reg2);

    if ($reg2)
    {
    if ($r['monaju'] > $reg2[0]['mondis'])
    // Cambiar al valor del error
      return 152;
    }
    else
    return 152;

  }
    }


    /*
      Function Chequear_Disponibilidad(NumeroAjuste As String) As Boolean
      Dim CPASIINI As rdoResultset
      Dim CPMovAju As rdoResultset
      Dim Ano As String
      Chequear_Disponibilidad = True
      sql = "Select to_char(A.FECAJU,'yyyy') as FECAJU,B.REFAJU,B.CODPRE,B.MONAJU from CPAJUSTE A,CPMovAju B where A.REFAJU=B.REFAJU A.RefAju='" + NumeroAjuste + "'"
      If Buscar_Datos(DATABASEGRID, CPMovAju, sql) Then
         Ano = Format(ObtenerValorRegistro(CPMovAju!FECAJU), "YYYY")
         While Not CPMovAju.EOF
            sql = "Select MonDis from CPAsiIni where CodPre='" + ObtenerValorRegistro(CPMovAju!CodPre) + "'" + _
                  "and PerPre='00' and AnoPre='" + Ano + "'"
            If Buscar_Datos(DATABASEGRID, CPASIINI, sql) Then
               If ObtenerValorRegistro(CPMovAju!MONAJU) > ObtenerValorRegistro(CPASIINI!MonDis) Then
                  Chequear_Disponibilidad = False
                  MsgBox "No existe disponibilidad presupuestaria para efectuar la Operación", vbCritical
                  Exit Function
               End If
            Else
               Chequear_Disponibilidad = False
               MsgBox "No existe disponibilidad presupuestaria para efectuar la Operación", vbCritical
               Exit Function
            End If
            CPMovAju.MoveNext
         Wend
         CPMovAju.Close
      End If
      End Function
    */
    return -1;

  }

  private static function Hay_CompromisoCausado($reg, $grid) {

    /*
    Function Hay_CompromisoCausado() As Boolean
    On Error GoTo errores
    Dim CPCOMPRO As rdoResultset
    Dim Referencia As String
    Dim CAOrdCom As rdoResultset
    Dim i As Long
    Dim Monto As Double

    sql = "Select RefCom from CAOrdCom where OrdCom='" + DatosAju(1).Text + "'"
    If Buscar_Datos(DATABASEGRID, CAOrdCom, sql) Then
      Referencia = ObtenerValorRegistro(CAOrdCom!RefCom)
      CAOrdCom.Close
    Else
      Referencia = DatosAju(1).Text
    End If
    Hay_CompromisoCausado = False
    For i = 1 To GridBd2.Rows - 1
       'evaluamos la orden a ajustar y det. si el compromiso asociado a al misma
       'ha sido causado lo cual implica que la orden no puede ser eliminada
        sql = "Select * From CpImpCom Where Rtrim(RefCom) = '" + RTrim(Referencia) + "' and CodPre='" + GridBd2.TextMatrix(i, 11) + "'"
        If Buscar_Datos(DATABASEGRID, CPCOMPRO, sql) Then
           Monto = Agrupar_por_Codigos(GridBd2.TextMatrix(i, 11), "A")
           If CDbl((ObtenerValorNumericoReal(CPCOMPRO!MonImp) - ObtenerValorNumericoReal(CPCOMPRO!MONAJU))) - Monto < ObtenerValorNumericoReal(CPCOMPRO!MonCau) Then
              Hay_CompromisoCausado = True
              Exit Function
           End If
        End If
    Next i
    Exit Function
     */

    $artAju = $grid[0];

    $c = new Criteria();
    $c->add(CaordcomPeer :: ORDCOM, $reg->getOrdcom());
    $ordcom = CaordcomPeer :: doSelectOne($c);

    if ($ordcom)
      $referencia = $ordcom->getRefcom();
    else
      $referencia = $reg->getOrdcom();

    foreach($artAju as $art){

      $codpre = Orden_compra::Obtener_codigo_presupuestario_v2($art->getCodart(),$art->getCodcat());
      $c = new Criteria();
      $c->add(CpimpcomPeer::REFCOM,$referencia);
      $c->add(CpimpcomPeer::CODPRE,$codpre);

      $cpimpcom = CpimpcomPeer::doSelectOne($c);

      if($cpimpcom){
        $monto = Compras::Agrupar_por_Codigos($codpre,$artAju,'A',$reg->getOrdcom());
        if( ($cpimpcom->getMonimp() - $cpimpcom->getMonaju() - $monto) < $cpimpcom->getMoncau()){
          return true;
        }

         }
      }
    return false;

  }

  private static function Agrupar_por_Codigos($codpre,$arts, $tipo, $numordcom)
  {
    /*
    Function Agrupar_por_Codigos(Codigo_Presup As String, tipo As String) As Double
    Dim I As Long
    Agrupar_por_Codigos = 0
    For I = 1 To GridBd2.Rows - 1
           If GridBd2.TextMatrix(I, 11) = Codigo_Presup Then
              If tipo = "A" Then
                 Agrupar_por_Codigos = Agrupar_por_Codigos + CDbl(GridBd2.TextMatrix(I, 8))
              Else
                 Agrupar_por_Codigos = Agrupar_por_Codigos + CDbl(GridBd2.TextMatrix(I, 9))
              End If
           End If
    Next I
    End Function
     */

    $cantidadgrupo = 0;

    foreach($arts as $artAju)
    {
      $codpreart = Orden_compra::Obtener_codigo_presupuestario_v2($artAju->getCodart(),$artAju->getCodcat());
      if($codpreart==$codpre)
      {
        if($tipo=='A') $cantidadgrupo = $cantidadgrupo + ($artAju->getPreciounitario() * $artAju->getCanaju());
        else
        {
          $monrec = self :: Calcular_Recargo($numordcom, $artAju->getCanaju(), $artAju->getCodart(), $artAju->getCodcat());
          $cantidadgrupo = $cantidadgrupo + $monrec;
        }
      }
    }
    return $cantidadgrupo;

  }

  private static function Queda_Compromiso_mayor_que_Precom($reg, $grid) {

    $referencia = 'AC'.substr($reg->getRefaju(),2);
    $sql1 = "SELECT A.MONIMP-A.MONAJU+C.MONAJU as MONCOM, B.MONIMP-B.MONAJU as MONPRC " .
        "FROM CPIMPCOM A,CPIMPPRC B,CPMOVAJU C " .
        "WHERE A.REFERE=B.REFPRC AND " .
        "C.REFCOM=A.REFCOM AND " .
        "C.CODPRE=A.CODPRE AND " .
        "C.CODPRE=B.CODPRE AND " .
        "C.REFAJU='" . $referencia . "'";

    H :: BuscarDatos($sql1, & $reg1);

    if ($reg1)
    {
  foreach ($reg1 as $r)
  {
    if ($r['moncom'] > $r['monprc'])
      return true;
  }
    }

    return false;

    /*
    Function Queda_Compromiso_mayor_que_Precom() As Boolean
    Dim CPIMPCOM As rdoResultset
    Dim Referencia As String
    Queda_Compromiso_mayor_que_Precom = False
    Referencia = "AC" + Mid(DatosAju(0).Text, 3, 6)
    sql = "SELECT A.MONIMP-A.MONAJU+C.MONAJU MONCOM,B.MONIMP-B.MONAJU MONPRC " + _
        "FROM CPIMPCOM A,CPIMPPRC B,CPMOVAJU C " + _
        "WHERE A.REFERE=B.REFPRC AND " + _
        "C.REFCOM=A.REFCOM AND " + _
        "C.CODPRE=A.CODPRE AND " + _
        "C.CODPRE=B.CODPRE AND " + _
        "C.REFAJU='" + Referencia + "'"
    If Buscar_Datos(DATABASEGRID, CPIMPCOM, sql) Then
     While Not CPIMPCOM.EOF
         If ObtenerValorNumericoReal(CPIMPCOM!MonCom) > ObtenerValorNumericoReal(CPIMPCOM!MonPrc) Then
            Queda_Compromiso_mayor_que_Precom = True
            Exit Function
         End If
         CPIMPCOM.MoveNext
     Wend
     CPIMPCOM.Close
    End If
    End Function
     */



  }

  private static function ObtenerRecargoAjusteGuardado($ajuoc, $codart, $codcat)
  {
      $c = new Criteria();
      $c->add(CaartaocPeer :: AJUOC, $ajuoc);
      $c->add(CaartaocPeer :: CODART, $codart);
      $c->add(CaartaocPeer :: CODCAT, $codcat);
      $caartaoc = CaartaocPeer :: doSelectOne($c);
      if ($caartaoc)
         return $caartaoc->getMonrec();
      else
        return 0;
  }

  private static function BuscarDatosenArreglo($myarr,$codpre,$refaju,&$j)
  {
      $j=0;
      while ($j<count($myarr))
      {
        if ($myarr[$j]['codpre']==$codpre and $myarr[$j]['refaju']==$refaju)
        {
           return true;
        }
        $j++;
      }
      return false;
  }

  private static function Grabar_AjusteCompromiso($reg, $grid)
  {

    $detaju = $grid[0];

    $c = new Criteria();
    $c->add(CpdocajuPeer::REFIER,'C');

    $cpdocaju = CpdocajuPeer::doSelectOne($c);

    if($cpdocaju)
      $tipoajuste = $cpdocaju->getTipaju();
    else
      $tipoajuste = 'DAC';


    $c= new Criteria();
    $c->add(CaordcomPeer::ORDCOM,$reg->getOrdcom());
    $caordcom=CaordcomPeer::doSelectOne($c);
    if ($caordcom)
        $referenciaorden = $caordcom->getRefcom();
    else
      $referenciaorden = $reg->getOrdcom();

    $c = new Criteria();
    $c->add(CpimpcomPeer::REFCOM,$referenciaorden);

    $cpimpcom = CpimpcomPeer::doSelectOne($c);

    if($cpimpcom) $refereprecom = $cpimpcom->getRefere();
    else $refereprecom = 'NULO';

    $c = new Criteria();
    $c->add(CpcomproPeer::REFCOM,$reg->getOrdcom());

    $cpcompro = CpcomproPeer::doSelect($c);

    if($cpcompro)
    {
      //Compromiso
      $referencia = 'AC'.substr($reg->getOrdcom(),2);

      $c = new Criteria();
      $c->add(CpajustePeer::REFAJU,$referencia);

      $cpajuste = CpajustePeer::doSelect($c);

      if(!$cpajuste)
      {
        $cpajus = new Cpajuste();
        $cpajus->setRefaju($referencia);
        $cpajus->setTipaju($tipoajuste);
        $cpajus->setFecaju($reg->getFecaju());
        $cpajus->setAnoaju($reg->getFecaju('Y'));
        if($referenciaorden=='') $referenciaorden = $reg->getOrdcom();
        $cpajus->setRefere($referenciaorden);
        $cpajus->setDesaju($reg->getDesaju());
        $cpajus->setTotaju($reg->getMonaju());
        $cpajus->setStaaju('A');
        $cpajus->save();

        //imputaciones
        $arrmovajurgo=array();
        $indact=-1;
        foreach($detaju as $art)
        {
          if ($art->getCodart()!='' && ($art->getPreciounitario()*$art->getCanaju())>0)
          {
            $codigoarticulo = $art->getCodart();
            $codigopresupuestario = Orden_compra::Obtener_codigo_presupuestario_v2($art->getCodart(),$art->getCodcat());

            $c = new Criteria();
            $c->add(CpmovajuPeer::REFAJU,$referencia);
            $c->add(CpmovajuPeer::CODPRE,$codigopresupuestario);

            $movaju = CpmovajuPeer::doSelectOne($c);

            if(!$movaju)
            {
              $cpmovajuste = new Cpmovaju();
              $cpmovajuste->setRefaju($referencia);
              $cpmovajuste->setCodpre($codigopresupuestario);
              $monaju=Compras::Agrupar_por_Codigos($codigopresupuestario,$detaju,'A', $reg->getOrdcom());
              $cpmovajuste->setMonaju($monaju);
              $cpmovajuste->setRefprc($refereprecom);
              $cpmovajuste->setRefcom($referenciaorden);
              $cpmovajuste->setRefcau('NULO');
              $cpmovajuste->setRefpag('NULO');
              $cpmovajuste->setStamov('A');
              $cpmovajuste->save();

          $sql = "Select Sum(MonRgo) as MonRgo,CodPre From CADisRgo
              where ReqArt='"  .$referenciaorden . "'
            and CodArt='" . $art->getCodart() . "'
            Group By CodPre";

      Herramientas::BuscarDatos($sql,&$arr);

      if ($arr)
      {
        foreach ($arr as $cadisrgo)
        {
            if ($cadisrgo['codpre'] <> '')
            {
                   if (self::BuscarDatosenArreglo($arrmovajurgo,$cadisrgo['codpre'],$referencia,&$indenc))
                   {//ya existe esa referencia y ese codpre
                      $indact=$indenc;
                      $acumulaajuste = $arrmovajurgo[$indact]['monaju'];
                   }
                   else
                   {
                     $acumulaajuste=0;
                     $indact++;
                     $arrmovajurgo[$indact]['refprc']=$refereprecom;
              $arrmovajurgo[$indact]['refcau']='NULO';
              $arrmovajurgo[$indact]['refcom']=$referenciaorden;
                $arrmovajurgo[$indact]['refpag']='NULO';
                $arrmovajurgo[$indact]['stamov']='A';
                $arrmovajurgo[$indact]['refaju']=$referencia;
                $arrmovajurgo[$indact]['codpre']=$cadisrgo['codpre'];
                   }


              $sqlrec="Select sum(MonRgo) as summonrec from CADisRgo
                    where ReqArt='"  .$referenciaorden . "' and CodArt='" . $art->getCodart() . "'";

              Herramientas::BuscarDatos($sqlrec,&$dat);
              $monagrupaart=$dat[0]['summonrec'];
              $monagrupaartcodpre=$cadisrgo['monrgo'];
              $monrecaju = self :: ObtenerRecargoAjusteGuardado($reg->getAjuoc(), $art->getCodart(), $art->getCodcat());
              $x=($monagrupaartcodpre*100)/$monagrupaart;
              $monaju = ($monrecaju *  $x)/100;
              $totmonrgoaju=$acumulaajuste+$monaju;
              /*print "<br> ref ".$reg->getAjuoc()."  y  canaju " .$art->getCanaju()." y codart". $art->getCodart()." y codcat" .$art->getCodcat();
              print "<br> MonRec ". $monrecaju . " y monagrupaartcodpre ".$cadisrgo['monrgo'] ." y monagrupaart ".$dat[0]['summonrec'];
              print "<br> codpre ". $cadisrgo['codpre']. " y monaju :".$monaju. " y ACUMULA ajuste :".$acumulaajuste. " total a guardar ". $totmonrgoaju;*/
              $arrmovajurgo[$indact]['monaju']=$totmonrgoaju;
            }
        }
      }
          }//  if(!$movaju)
          else
          {
      $sql = "Select Sum(MonRgo) as MonRgo,CodPre From CADisRgo
                where ReqArt='".$referenciaorden . "'
            and CodArt='" . $art->getCodart() . "'
            Group By CodPre";

      Herramientas::BuscarDatos($sql,&$arr);

      if ($arr)
      {
      foreach ($arr as $cadisrgo)
        {
            if ($cadisrgo['codpre'] <> '')
            {
          if (self::BuscarDatosenArreglo($arrmovajurgo,$cadisrgo['codpre'],$referencia,&$indenc))
                   {//ya existe esa referencia y ese codpre
                      $indact=$indenc;
                      $acumulaajuste = $arrmovajurgo[$indact]['monaju'];
                   }
                   else
                   {
                     $acumulaajuste=0;
                     $indact++;
                     $arrmovajurgo[$indact]['refprc']=$refereprecom;
              $arrmovajurgo[$indact]['refcau']='NULO';
              $arrmovajurgo[$indact]['refcom']=$referenciaorden;
                $arrmovajurgo[$indact]['refpag']='NULO';
                $arrmovajurgo[$indact]['stamov']='A';
                $arrmovajurgo[$indact]['refaju']=$referencia;
                $arrmovajurgo[$indact]['codpre']=$cadisrgo['codpre'];
                   }


              $sqlrec="Select sum(MonRgo) as summonrec from CADisRgo
                    where ReqArt='"  .$referenciaorden . "' and CodArt='" . $art->getCodart() . "'";

              Herramientas::BuscarDatos($sqlrec,&$dat);
              $monagrupaart=$dat[0]['summonrec'];
              $monagrupaartcodpre=$cadisrgo['monrgo'];
              $monrecaju = self :: ObtenerRecargoAjusteGuardado($reg->getAjuoc(), $art->getCodart(), $art->getCodcat());
              $x=($monagrupaartcodpre*100)/$monagrupaart;
              $monaju = ($monrecaju *  $x)/100;
              $totmonrgoaju=$acumulaajuste+$monaju;
              /*print "<br> ref ".$reg->getAjuoc()."  y  canaju " .$art->getCanaju()." y codart". $art->getCodart()." y codcat" .$art->getCodcat();
              print "<br> MonRec ". $monrecaju . " y monagrupaartcodpre ".$cadisrgo['monrgo'] ." y monagrupaart ".$dat[0]['summonrec'];
              print "<br> codpre ". $cadisrgo['codpre']. " y monaju :".$monaju. " y ACUMULA ajuste :".$acumulaajuste. " total a guardar ". $totmonrgoaju;*/
              $arrmovajurgo[$indact]['monaju']=$totmonrgoaju;
          }
        }
      }
          }
          }
        }

      //grabar el arreglo de ajustes de recargo en la tabla CPMOVAJU
      $m=0;
      while ($m<count($arrmovajurgo))
       {
      $objCpmovaju = new Cpmovaju();
        $objCpmovaju->setRefprc($arrmovajurgo[$m]['refprc']);
        $objCpmovaju->setRefcau($arrmovajurgo[$m]['refcau']);
        $objCpmovaju->setRefcom($arrmovajurgo[$m]['refcom']);
        $objCpmovaju->setRefpag($arrmovajurgo[$m]['refpag']);
        $objCpmovaju->setStamov($arrmovajurgo[$m]['stamov']);
        $objCpmovaju->setRefaju($arrmovajurgo[$m]['refaju']);
        $objCpmovaju->setCodpre($arrmovajurgo[$m]['codpre']);
        $objCpmovaju->setMonaju($arrmovajurgo[$m]['monaju']);
        $objCpmovaju->save();
        $m++;
       }
      ////////////////////////////////////////////////////////////
      $c = new Criteria();
    $c->add(CaajuocPeer::AJUOC,$reg->getOrdcom());
    if (CaajuocPeer::doSelectOne($c))
    {
      $objCaajuoc = CaajuocPeer::doSelectOne($c);
    $objCaajuoc->setRefaju($referencia);
    $objCaajuoc->save();

    }

      }

    }
    else
    {
      return 149;
    }

    return -1;


  }

  private static function Eliminar_AjusteCompromiso($reg, $grid)
  {
    $nroajuste = 'AC'.substr($reg->getOrdcom(),2);

    $c = new Criteria();
    $c->add(CpmovajuPeer::REFAJU,$nroajuste);
    $c->addAscendingOrderByColumn(CpmovajuPeer::REFAJU);
    $objsCpmovaju = CpmovajuPeer::doSelect($c);

    if ($objsCpmovaju)
        foreach ($objsCpmovaju as $cpmovaju)
    		$cpmovaju->delete();


    $c = new Criteria();
    $c->add(CpajustePeer::REFAJU,$nroajuste);
    $cpajustes = CpajustePeer::doSelectOne($c);

    if ($cpajustes) $cpajustes->delete();

    return -1;

  }

  /**************************************************************************
   **                    Fin Ajuste Orden de Compra (almajuoc)             **
   **                               Luelher                                **
   **************************************************************************/

  /**************************************************************************
   **                         Rangos de Cotizaciones (Almdefcot)             **
   **                                Luelher                                **
   **************************************************************************/

  public static function validarAlmdefcot($reg) {
    $c = new Criteria();
    $c->addDescendingOrderByColumn(CarancotPeer :: ID);
    $carancots = CarancotPeer :: doSelectOne($c);
    if ($carancots) {
      $maxUT = $carancots->getCanhas(false) + 1;
      if ($reg->getCandes() < $maxUT)
        return 110;

      if ($reg->getCandes() > $reg->getCanhas())
        return 111;
    }
    return -1;

  }

  /**************************************************************************
   **                    Fin Ajuste Rangos de Cotizaciones (almdefcot)     **
   **                               Luelher                                **
   **************************************************************************/

  public static function Monto_disponible($codigo) {
    $c = new Criteria();
    $c->add(CpdefnivPeer :: CODEMP, '001');
    $cpdefniv = CpdefnivPeer :: doSelectOne($c);
    if (count($cpdefniv) > 0) {
      $ano = substr($cpdefniv->getFeccie(), 0, 4);
      //   $b= new Criteria();
      //  $b->addAscendingOrderByColumn(CpnivelesPeer::CONSEC);
      //  $resul2= CpnivelesPeer::doSelect($b);
      $resul2 = array ();
      $sql1 = "SELECT nomabr FROM CPNIVELES ORDER BY CONSEC";
      if (Herramientas :: BuscarDatos($sql1, & $resul2)) {
        $longitud = 0;
        for ($a = 0; $a < count($resul2); $a++) {
          $longitud = $longitud +strlen($resul2[$a]['nomabr']) + 1;
          ;
        }

        $longitud = $longitud -1;
        $var = substr($codigo, 0, $longitud);
        $sql = "SELECT SUM(mondis) as mondis FROM CPASIINI WHERE codpre LIKE '" . $var . "%' AND ANOPRE='" . $ano . "' AND PERPRE='00'";
        if (Herramientas :: BuscarDatos($sql, & $result)) {
          $montodisponible = $result[0]['mondis'];
        } else {
          $montodisponible = 0;
        }
      } //  if (Herramientas::BuscarDatos($sql1,&$resul2))
      else {
        $montodisponible = 0;
      }
    } else {
      $montodisponible = 0;
    }
    return $montodisponible;
  }

  /**************************************************************************
  **     Crear Clasificador De Partidas Presupuestarias (nommanclapre)     **
  **                               Gerana                                 **
  **************************************************************************/

  public static function EjecutaClasificador() {
    $result = array ();
    $sql = "Select rupcat, ruppar, forpre from CPDefNiv";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      $LongitudFormato = strlen(trim($result[0]['forpre']));
      $categoria = $result[0]['rupcat'];
      $partidas = $result[0]['ruppar'];
      $codpre = $result[0]['forpre'];
      $posicion = 0;
      $i = 1;
      while ($i <= $categoria) {
        $posicion = Herramientas :: instr($codpre, '-', $posicion, 1) + $posicion;
        $i++;
      }

      $sql_D = "Delete from Nppartidas";
      Herramientas :: insertarRegistros($sql_D);

      $posicion++;
      $sql_I = "Insert into NPPartidas (Select Distinct(Substr(CodPre," . $posicion . "," . $LongitudFormato . ")),Max(NomPre) From CPDefTit Where Length(Rtrim(CodPre))=" . $LongitudFormato . "Group By Substr(CodPre," . $posicion . "," . $LongitudFormato . "))";
      Herramientas :: insertarRegistros($sql_I);

      $poscat = $posicion -2;
      $sql_D = "Delete from NPCatPre where CodCat not in (Select Substr(CodPre,1," . $poscat . ") From CPDefTit Where Length(Rtrim(CodPre))=" . $poscat . ")";
      Herramientas :: insertarRegistros($sql_D);

      $sql_II = "Insert into NPCatPre (Select substr(CodPre,1," . $poscat . "),NomPre From CPDefTit Where Length(Rtrim(CodPre))=" . $poscat . " AND Substr(CodPre,1," . $poscat . ") not in (Select CodCat From NPCatPre))";
      Herramientas :: insertarRegistros($sql_II);

      return true;
    } else {
    }
  } //end function

//**************** Programar Compra de Artículos-- AlmProComArt ***********************************
  public static function Grabar_Almprocomart($caprocomart,$grid)
  {
  $codcat=$caprocomart->getCodcat();
  $fecprocom=$caprocomart->getFecprocom();
  $x=$grid[0];
  $j=0;
  while ($j<count($x))
  {
    if ($x[$j]->getCodart()!="")
    {
      $x[$j]->setFecprocom($fecprocom);
      $x[$j]->setCodcat($codcat);
      $x[$j]->save();
    }
   $j++;
  }

    $z=$grid[1];
    $j=0;
    while ($j<count($z))
    {
    $z[$j]->delete();
    $j++;
    }
  }

  public static function Validar_Almprocomart($fecha,$coduni)
  {
        $c = new Criteria();
          $c->add(CaprocomartPeer::FECPROCOM,$fecha);
         $c->add(CaprocomartPeer::CODCAT,$coduni);
         $per = CaprocomartPeer::doSelect($c);
         if ($per) //hay datos
         {
              return 141;
         }
           else
           {
               return -1;
           }
  }

    public static function verificarexistenciaubialm($codalm,$codubi)
  {
      $c = new Criteria();
             $c->add(CaalmubiPeer::CODALM,$codalm);
             $c->add(CaalmubiPeer::CODUBI,$codubi);
             $alm = CaalmubiPeer::doSelectOne($c);
              if ($alm)
              {
              return true;
              }
              else
              {
                return false;
              }
    }

    public static function validarAlmpriori($grid)
  {
    $x=$grid[0];
    $j=0;
    $total1=0;
    $total2=0;

    while ($j<count($x))
    {
      if ($x[$j]->getPriori()==1)
      {
        $total1=$total1 +1;
      }
      else
      {
        $total2=$total2 +1;
      }
      $j++;
    }

    if ($total1==0)
    {
      return 164;
    }
    else if ($total1>1)
    {
     return 165;
    }
    else
    {
      return -1;
    }
  }

    public static function validarAlmpriori2($grid)
  {
    $x=$grid[0];
    $j=0;
    $total1=0;
    $total2=0;

    while ($j<count($x))
    {
      if ($x[$j]->getPriori2()==1)
      {
        $total1=$total1 +1;
      }
      else
      {
        $total2=$total2 +1;
      }
      $j++;
    }

    if ($total1==0)
    {
      return 164;
    }
    else if ($total1>1)
    {
     return 165;
    }
    else
    {
      return -1;
    }
  }

  public static function ObtenerTipoDocumentoPrecompromiso()
  {
      $cri= new Criteria();
      $dato= CadefartPeer::doSelectOne($cri);
      if ($dato)
      {
      	if (is_null($dato->getTipdocpre()) || $dato->getTipdocpre()=="")
      	{
      	  $tipdoc="SAE";
      	}else {
      	$tipdoc=$dato->getTipdocpre();
      	}
      }
      else
      {
      	$tipdoc="SAE";
      }
      return $tipdoc;
  }

  public static function asignarPrioridadCostArt($reqart,$casolart)
  {
     $sql="select a.refcot,a.codart,a.canord,a.costo,a.totdet,b.codpro,
        (case when a.costo>0 then a.costo else 1000000000000000000000000 end) as orden,
        (case when a.costo=0 then null else (select count(x.*)+1
         from cadetcot x,cacotiza y
         where y.refsol=b.refsol
         and x.codart=a.codart
         and x.refcot=y.refcot
         and y.codpro<>b.codpro
         and (case when x.costo>0 then x.costo else 1000000000000000000000000 end)<
             (case when a.costo>0 then a.costo else 1000000000000000000000000 end)) end) as priori
        from cadetcot a,cacotiza b
        where b.refsol='".$reqart ."'
        and a.refcot=b.refcot
        order by a.codart,(case when a.costo>0 then a.costo else 1000000000000000000000000 end)";

       Herramientas::BuscarDatos($sql,&$arr);
       $con=0;
       $priori=0;
       if ($arr)
       {
           $codartori=$arr[0]['codart'];
           while ($con<count($arr))
           {
            if ($codartori==$arr[$con]['codart'])
            {
              $priori++;
            }
            else
            {
            $priori=1;
            }
            $c=new Criteria();
            $c->add(CadetcotPeer::CODART,$arr[$con]['codart']);
            $c->add(CadetcotPeer::REFCOT,$arr[$con]['refcot']);
            $detcot=CadetcotPeer::doSelectOne($c);
            if ($detcot)
            {
                $detcot->setPriori($priori);
                if ($priori==1 && $casolart->getObservaciones()!="")
                  $detcot->setObservaciones($casolart->getObservaciones());
                $detcot->save();
            }
            $codartori=$arr[$con]['codart'];
            $con++;
              }//while
       }//if ($arr)
  }

  public static function asignarPrioridadMonCot($reqart,$casolart)
  {
      $c = new Criteria();
      $c->add(CacotizaPeer :: REFSOL, $reqart);
      $c->addAscendingOrderByColumn(CacotizaPeer::MONCOT);
      $result = CacotizaPeer :: doSelect($c);
      if ($result)
      {
      	$priori=1;
      	foreach ($result as $datos)
      	{
	        $r= new Criteria();
	        $r->add(CadetcotPeer::REFCOT,$datos->getRefcot());
	        $c->addAscendingOrderByColumn(CadetcotPeer::TOTDET);
	        $data= CadetcotPeer::doSelect($r);
	        if ($data)
	        {
	          foreach ($data as $obj)
	          {
	          	$obj->setPriori($priori);
                        if ($priori==1 && $casolart->getObservaciones()!="")
                           $obj->setObservaciones($casolart->getObservaciones());
	          	$obj->setJustifica(null);
	          	$obj->save();
	          }
	        }
        $priori=$priori+1;
      }
    }
  }
  public static function salvarSolicitudPago($casolpag,$grid)
  {
  	$tienecorrelativo=false;
    if (Herramientas::getVerCorrelativo('corpag','cacorrel',&$r))
    {
      if ($casolpag->getSolpag()=='########')
      {
      	$tienecorrelativo=true;
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

          $sql="select solpag from casolpag where solpag='".$numero."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $cor=str_pad($r, 8, '0', STR_PAD_LEFT);
        $solpa='SP'.(substr($cor,2,strlen($cor)));
        $casolpag->setSolpag($solpa);
      }
   }

   if ($tienecorrelativo)
   {
     Herramientas::getSalvarCorrelativo('corpag','cacorrel','Referencia',$r,&$msg);
   }
  	$casolpag->setStasol('A');
  	$casolpag->save();
  	self::grabarDetalleSolicitudPago($casolpag,$grid);
  	self::grabarCompromisoSolicitudPago($casolpag,$grid);
  }

  public static function grabarDetalleSolicitudPago($casolpag,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodpre()!='' && $x[$j]->getMoncom()>0)
      {
      	$x[$j]->setSolpag($casolpag->getSolpag());
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarCompromisoSolicitudPago($casolpag,$grid)
  {
    $cpcompro= new Cpcompro();
    $cpcompro->setRefcom($casolpag->getSolpag());
    $cpcompro->setTipcom($casolpag->getTipcom());
    $cpcompro->setCedrif($casolpag->getCedrif());
    $cpcompro->setFeccom($casolpag->getFecsol());
    $cpcompro->setAnno(substr($casolpag->getFecsol(),0,4));
    $cpcompro->setRefprc(null);
    $cpcompro->setTipprc(null);
    $cpcompro->setDescom($casolpag->getDessol());
    $cpcompro->setDesanu(null);
    $cpcompro->setMoncom($casolpag->getMonsol());
    $cpcompro->setSalcau(0);
    $cpcompro->setSalpag(0);
    $cpcompro->setSalaju(0);
    $cpcompro->setStacom('A');
    $cpcompro->save();

    self::grabarDetalleImputacionesSolPag($casolpag,$grid);
  }

  public static function grabarDetalleImputacionesSolPag($casolpag,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodpre()!='' && $x[$j]->getMoncom()>0)
      {
      	$cpimpcom= new Cpimpcom();
      	$cpimpcom->setRefcom($casolpag->getSolpag());
      	$cpimpcom->setCodpre($x[$j]->getCodpre());
      	$cpimpcom->setMonimp($x[$j]->getMoncom());
        $cpimpcom->setMoncau(0);
        $cpimpcom->setMonpag(0);
        $cpimpcom->setMonaju(0);
        $cpimpcom->setStaimp('A');
        $cpimpcom->setRefere('NULO');
      	$cpimpcom->save();
      }
      $j++;
    }
  }

  public static function eliminarSolicitudPago($casolpag)
  {
     Herramientas::EliminarRegistro('Cpimpcom','Refcom',$casolpag->getSolpag());
     Herramientas::EliminarRegistro('Cpcompro','Refcom',$casolpag->getSolpag());
     Herramientas::EliminarRegistro('Cadetpag','Solpag',$casolpag->getSolpag());
     $casolpag->delete();
  }

    public static function actualizacionSolicitudEgresos($reqart, $actsolegr, & $error) {
    $gridnuevo = array ();
    $gridnuevo2 = array ();
    $gridnuevorec = array ();

    $error = -1;
    if ($actsolegr == '1') {
      $c = new Criteria();
      $c->addJoin(CacotizaPeer :: REFCOT, CadetcotPeer :: REFCOT);
      $c->add(CacotizaPeer :: REFSOL, $reqart);
      $c->add(CadetcotPeer :: PRIORI, '1');
      $result = CadetcotPeer :: doSelect($c);
      if ($result) {
        foreach ($result as $datos) {
          $c = new Criteria();
          $c->add(CaartsolPeer :: REQART, $reqart);
          $c->add(CaartsolPeer :: CODART, $datos->getCodart());
          $resul = CaartsolPeer :: doSelect($c);
          if ($resul) {
          	foreach ($resul as $resul2)
          	{
            $indice = count($gridnuevo) + 1;
            $gridnuevo[$indice -1][0] = $datos->getCodart();
            $gridnuevo[$indice -1][1] = $resul2->getCanreq();
            $costonew=$datos->getCosto();
            if ($costonew != $resul2->getCosto()) {
              $gridnuevo[$indice -1][2] = $costonew;
            } else {
              $gridnuevo[$indice -1][2] = $resul2->getCosto();
            }
            $monuni = ($gridnuevo[$indice -1][2] * $gridnuevo[$indice -1][1]);
            $gridnuevo[$indice -1][3] = $datos->getMondes();
            $gridnuevo[$indice -1][4] = $resul2->getMonrgo();
            $gridnuevo[$indice -1][5] = $monuni -$gridnuevo[$indice -1][3];
            $c=new Criteria();
            $c->add(CadisrgoPeer::REQART,$reqart);
            $reg= CadisrgoPeer::doSelect($c);
            if ($reg) {
              $gridnuevo[$indice -1][6] = 1;
            } else {
              $gridnuevo[$indice -1][6] = 0;
            }
            $gridnuevo[$indice -1][7] = $monuni -$gridnuevo[$indice -1][3];
            $gridnuevo[$indice -1][8] = $resul2->getCodcat().'-'.$resul2->getCodpre();
            $gridnuevo[$indice -1][9] = $resul2->getMonrgo();
            $gridnuevo[$indice -1][10] = $resul2->getCodcat();
          	}
          }
        }
      }

      $c = new Criteria();
      $c->add(CadisrgoPeer :: REQART, $reqart);
      $dat = CadisrgoPeer :: doSelect($c);
      if ($dat) {
        foreach ($dat as $resultado) {
          $indice2 = count($gridnuevorec) + 1;
          $gridnuevorec[$indice2 -1][0] = $resultado->getCodrgo();
          $gridnuevorec[$indice2 -1][1] = $resultado->getMonrgo();
          $gridnuevorec[$indice2 -1][2] = $resultado->getTipdoc();
          $gridnuevorec[$indice2 -1][3] = "";
          $gridnuevorec[$indice2 -1][4] = $resultado->getMonrgo();
          $gridnuevorec[$indice2 -1][5] = $resultado->getCodart();
          $gridnuevorec[$indice2 -1][6] = $resultado->getCodcat();
        }
      }
      $nopuedeaumentar=true;
      $z = 0;
      while ($z < count($gridnuevo)) {
        if ($gridnuevo[$z][2] != "") {
          if (!is_numeric($gridnuevo[$z][2])) {
            $c = new Criteria();
            $c->addJoin(CacotizaPeer :: REFCOT, CadetcotPeer :: REFCOT);
            $c->add(CacotizaPeer :: REFSOL, $reqart);
            $result = CadetcotPeer :: doSelect($c);
            if ($result) {
              foreach ($result as $datos) {
                $datos->setPriori(null);
                $datos->setJustifica(null);
                $datos->save();
              }
            }
            $error = 133;
            return true;
            //break;
          } else
            if ($gridnuevo[$z][2] < 0) {
              $c = new Criteria();
              $c->addJoin(CacotizaPeer :: REFCOT, CadetcotPeer :: REFCOT);
              $c->add(CacotizaPeer :: REFSOL, $reqart);
              $result = CadetcotPeer :: doSelect($c);
              if ($result) {
                foreach ($result as $datos) {
                  $datos->setPriori(null);
                  $datos->setJustifica(null);
                  $datos->save();
                }
              }
              $error = 134;
              return true;
              //break;
            } else {
              if ($gridnuevo[$z][1] != "") {
                $r = 0;
                self :: distribuirRecargos(& $gridnuevo2, & $gridnuevo,'S',&$gridnuevorec);
                self :: recalcularRecargos(&$gridnuevo2, &$gridnuevo, &$nopuedeaumentar, $reqart,&$gridnuevorec);
                if ($gridnuevo[$z][5] > $gridnuevo[$z][7]) {
                  $tiporec = Herramientas :: getX('CODEMP', 'Cadefart', 'Asiparrec', '001');
                  if (!self :: chequearDisponibilidad($gridnuevo, $z, $tiporec, $reqart)) {
                    $nopuedeaumentar = true;
                  }
                }

                if ($nopuedeaumentar==true) {
                  break;
                }
              }
            }
        }
        $z++;
      }

      if ($nopuedeaumentar!=true) {
        self :: actualizarSolicitud($reqart, $gridnuevo, $gridnuevo2,&$gridnuevorec);
      } else {
        $c = new Criteria();
        $c->addJoin(CacotizaPeer :: REFCOT, CadetcotPeer :: REFCOT);
        $c->add(CacotizaPeer :: REFSOL, $reqart);
        $result = CadetcotPeer :: doSelect($c);
        if ($result) {
          foreach ($result as $datos) {
            $datos->setPriori(null);
            $datos->setJustifica(null);
            $datos->save();
          }
        $error = 164;
      }
        $error = 135;
    }
    }
    return true;
  }



  public static function ValidarAlmRamart($clasemodelo)
  {

      $reg2 = Herramientas::getX_vacio('codram','caprovee','ramart',$clasemodelo->getRamart());
      $reg = Herramientas::getX_vacio('ramart','caregart','ramart',$clasemodelo->getRamart());

     if ($reg=='' && $reg2=='')
     {
     	$clasemodelo->delete();
     	return -1;
     }else{
     	return 6;
     }
  }

  public static function validarRecaudosVen($rifpro,$fecha)
  {
     $dateFormat = new sfDateFormat('es_VE');
     $fecval = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

     $codpro=H::getX('RIFPRO','Caprovee','Codpro',$rifpro);
     $l= new Criteria();
     $l->add(CarecproPeer::CODPRO,$codpro);
     $resul= CarecproPeer::doSelect($l);
     if ($resul)
     {
     	foreach ($resul as $obj)
     	{
           if ($obj->getFecven()<$fecval)
           {
           	return 20;
           }
     	}
     }else {
       return 21;
     }

     return -1;
  }

  public static function asignarPrioridadTimEnt($reqart,$casolart)
  {
      $c = new Criteria();
      $c->add(CacotizaPeer :: REFSOL, $reqart);
      $c->addJoin(CacotizaPeer :: REFCOT, CadetcotPeer :: REFCOT);
      $c->addAscendingOrderByColumn(CadetcotPeer::CODART);
      $c->addAscendingOrderByColumn(CadetcotPeer::FECENT);
      $result = CadetcotPeer :: doSelect($c);
      if ($result)
      {
      	$priori=0;
      	$j=1;
      	foreach ($result as $datos)
      	{
            if ($j==1) $codartori=$datos->getCodart();
      	    if ($codartori==$datos->getCodart())
            {
              $priori++;
            }
            else
            {
             $codartori=$datos->getCodart();
             $priori=1;
            }
		  	$datos->setPriori($priori);
                        if ($priori==1 && $casolart->getObservaciones()!="")
                          $datos->setObservaciones($casolart->getObservaciones());
		  	$datos->setJustifica(null);
		  	$datos->save();

		   $j++;
        }
      }
  }

  public static function salvarUnidadesUsuari($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcat()!='')
      {
      	$x[$j]->setLoguse($clasemodelo->getloguse());
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function MigrarVentas($clase,&$cadena, &$caderr=array(), $urlauto='')
  {
    $err=-1;
    $cadena="";
    $arreglo=array();
    if($urlauto) $url = $urlauto;
    else $url = sfConfig::get('sf_upload_dir')."//".$clase->getArchivo();
    $file = fopen($url,  "r");
    if ($file)
    {
        if(true)
        {
            $delimiter=";";
        $cont=0;
            $rr=0;
            $valor='';
            $codqpr='';#CODIGO ARTICULO QPR
            $nomqpr='';#NOMBRE ARTICULO QPR
            $canqpr=0;#CANTIDAD
            $preqpr=0;#TOTAL SIN IVA
            $depiva='';#DEPARTAMENTO IVA
            $preuni=0;#PRECIO UNITARIO
            $col_codqpr=5;#COLUMNA CODIGO ARTICULO QPR DEL CSV
            $col_nomqpr=6;#COLUMNA NOMBRE ARTICULO QPR DEL CSV
            $col_canqpr=8;#COLUMNA CANTIDAD DEL CSV
            $col_preqpr=9;#COLUMNA TOTAL SIN IVA DEL CSV
            $col_depiva=15;#COLUMNA DEPARTAMENTO IVA DEL CSV
            $col_preuni=17;#COLUMNA PRECIO UNITARIO DEL CSV

            while(!feof($file))
            {
                $line=fgets($file, 255);
                if ($cont>=4)
                {
                    $codalm=$clase->getCodalm();
                    $fecven=$clase->getFecven();
                    $auxline=explode(";",$line);
                    array_key_exists($col_codqpr-1,$auxline) ? $codqpr=$auxline[$col_codqpr-1] : '';
                    array_key_exists($col_nomqpr-1,$auxline) ? $nomqpr=$auxline[$col_nomqpr-1] : '';
                    array_key_exists($col_canqpr-1,$auxline) ? $canqpr=H::FormatoNum($auxline[$col_canqpr-1]) : '';
                    array_key_exists($col_preqpr-1,$auxline) ? $preqpr=H::FormatoNum($auxline[$col_preqpr-1]) : '';
                    array_key_exists($col_depiva-1,$auxline) ? $depiva=$auxline[$col_depiva-1] : '';
                    array_key_exists($col_preuni-1,$auxline) ? $preuni=H::FormatoNum($auxline[$col_preuni-1]) : '';

                   $y= new Criteria();
                   $y->add(CaequiartPeer::CODQPR,$codqpr);
                   $resul= CaequiartPeer::doSelectOne($y);
                   if ($resul)
                   {
                       $arreglo[$rr]["codalm"]=$codalm;
                       $arreglo[$rr]["fecven"]=$fecven;
                       $arreglo[$rr]["codart"]=$codqpr;
                       $arreglo[$rr]["desart"]=$nomqpr;
                       $arreglo[$rr]["fecmig"]=date('Y-m-d');
                       $arreglo[$rr]["cantidad"]=floatval($canqpr);
                       $arreglo[$rr]["subtot"]=floatval($preqpr);
                       $sql = "select moniva from caivaqpro where depto='$depiva'";
                       if(H::BuscarDatos($sql, $rs))
                          $moniva = $rs[0]['moniva'];
                       else
                          $moniva = 0;
                       $iva = ($preqpr * $moniva)/100;
                       $arreglo[$rr]["iva"]=$iva;
                       $arreglo[$rr]["precio"]=floatval($preuni);
                       $arreglo[$rr]["usumig"]=sfContext::getInstance()->getUser()->getAttribute('loguse');
                       $arreglo[$rr]["codart2"]=$resul->getCodart();
                       $arreglo[$rr]["coding"]=H::getX_vacio('codart', 'caregart', 'coding', $resul->getCodart());
                       $rr++;
                   }else {
                     if(strlen($codqpr)==13){
                       $cadena.=$codqpr."-";
                       $caderr[] = $line;
                     } else $cadena = '';
                   }
                }
                $cont++;
            }
            $arrasientos=array();
            $pos=0;
            $i=0;
            while ($i<count($arreglo))
            {
                if ($arreglo[$i]["codart"]!="")
                {
                  if ($arreglo[$i]["coding"]!="")
                    {
                      self::guardarAsientos($arreglo[$i]["coding"],$arreglo[$i]["subtot"],$arreglo[$i]["iva"],&$arrasientos,&$pos);
                    }else {
                      return 557;
                    }
                }
                $i++;
            }
          self::grabarMigracion($arreglo);
          self::grabarIngreso($codalm,$arreglo,&$cireging);
          self::grabarImpIng($cireging,$arrasientos);
        }else
        {
            $cont=0;
        $t= new Criteria();
        $t->add(CacontxtalmPeer::CODALM,$clase->getCodalm());
        $regis= CacontxtalmPeer::doSelectOne($t);
        if ($regis)
        {
          while(!feof($file))
          {
            $almacen=fgets($file, 255);
            if ($cont>=4)
            {             
               $codalm=$clase->getCodalm();
               $fecven=$clase->getFecven();

               $codartqprg= trim(substr($almacen,$regis->getIniart()-1,$regis->getFinart()));
               if ($codartqprg!='') {
               $desartqprg= trim(substr($almacen,$regis->getInides()-1,$regis->getFindes()));
               $cantidad=trim(substr($almacen,$regis->getInican()-1,$regis->getFincan()));
               if (is_numeric(H::toFloat($cantidad)))
                 {
                   $canart=H::toFloat($cantidad);
                 }else $canart=0;

               $subtot=trim(substr($almacen,$regis->getInisub()-1,$regis->getFinsub()));
               if (is_numeric(H::toFloat($subtot)))
                 {
                   $subart=H::toFloat($subtot);
                 }else $subart=0;
               $iva=trim(substr($almacen,$regis->getIniiva()-1,$regis->getFiniva()));
               $precio=trim(substr($almacen,$regis->getInipre()-1,$regis->getFinpre()));
               if (is_numeric(H::toFloat($precio)))
                 {
                   $preart=H::toFloat($precio);
                 }else $preart=0;

               $y= new Criteria();
               $y->add(CaequiartPeer::CODQPR,$codartqprg);
               $resul= CaequiartPeer::doSelectOne($y);
               if ($resul)
               {                 
                   $arreglo[$cont]["codalm"]=$codalm;
                   $arreglo[$cont]["fecven"]=$fecven;
                   $arreglo[$cont]["codart"]=$codartqprg;
                   $arreglo[$cont]["desart"]=$desartqprg;
                   $arreglo[$cont]["fecmig"]=date('Y-m-d');
                   $arreglo[$cont]["cantidad"]=$canart;
                   $arreglo[$cont]["subtot"]=$subart;
                   $arreglo[$cont]["iva"]=$iva;
                   $arreglo[$cont]["precio"]=$preart;
                   $arreglo[$cont]["usumig"]=sfContext::getInstance()->getUser()->getAttribute('loguse');
                   $arreglo[$cont]["codart2"]=$resul->getCodart();
                   $arreglo[$cont]["coding"]=H::getX_vacio('codart', 'caregart', 'coding', $resul->getCodart());
               }
               else {
                 $cadena=$cadena.$codartqprg."-";
               }
               }
            }
            $cont++;
          }
            $arrasientos=array();
            $pos=0;
            $i=0;
            while ($i<count($arreglo))
            {
                if ($arreglo[$i]["codart"]!="")
                {
                  if ($arreglo[$i]["coding"]!="")
                    {
                      self::guardarAsientos($arreglo[$i]["coding"],$arreglo[$i]["subtot"],$arreglo[$i]["iva"],&$arrasientos,&$pos);
                    }else {
                        return 557;
                    }
                }
                $i++;
            }

          self::grabarMigracion($arreglo);
          self::grabarIngreso($codalm,$arreglo,&$cireging);
          self::grabarImpIng($cireging,$arrasientos);
        }else {
          $err=556;
        }
        }
    }else {
      $err=541;
    }
    fclose ($file);
    unlink($url);

    return $err;
  }

  public static function grabarMigracion($arreglo)
  {
    $i=0;
    while ($i<count($arreglo))
    {
                 //Actualizo el Articulo y el Inventario
                   $u= new Criteria();
       $u->add(CaregartPeer::CODART,$arreglo[$i]["codart2"]);
                   $resg= CaregartPeer::doSelectOne($u);
                   if ($resg)
                   {
                     $tipoart=$resg->getTipo();
                     if ($tipoart=='A')
                     {
             $act1=$resg->getExitot() - H::toFloat($arreglo[$i]["cantidad"]);
             $dis1=$resg->getDistot() - H::toFloat($arreglo[$i]["cantidad"]);
                         $resg->setExitot($act1);
                         $resg->setDistot($dis1);
                         $resg->save();

                         $c = new Criteria();
             $c->add(CaartalmubiPeer::CODART,$arreglo[$i]["codart2"]);
             $c->add(CaartalmubiPeer::CODALM,$arreglo[$i]["codalm"]);
                         $alm = CaartalmubiPeer::doSelectOne($c);
                         if ($alm)
                         {
                if($alm->getExiact()>=H::toFloat($arreglo[$i]["cantidad"]))
                             {
                     $act2=$alm->getExiact() - H::toFloat($arreglo[$i]["cantidad"]);
                                 $alm->setExiact($act2);
                                 $alm->save();
                             }
                         }// if ($alm)
                         $c = new Criteria();
             $c->add(CaartalmPeer::CODART,$arreglo[$i]["codart2"]);
             $c->add(CaartalmPeer::CODALM,$arreglo[$i]["codalm"]);
                         $reg = CaartalmPeer::doSelectOne($c);
                         if ($reg)
                         {
                if($reg->getExiact()>=H::toFloat($arreglo[$i]["cantidad"]))
                             {
                     $act2=$reg->getExiact() - H::toFloat($arreglo[$i]["cantidad"]);
                                 $reg->setExiact($act2);
                                 $reg->save();
                             }
                         }// if ($alm)
                       }//   if ($tipoart='A')
                   }

               //Grabo todos los movimientos de ventas
               $camigtxtven = new Camigtxtven();
       $camigtxtven->setCodalm($arreglo[$i]["codalm"]);
       $camigtxtven->setFecven($arreglo[$i]["fecven"]);
       $camigtxtven->setCodart($arreglo[$i]["codart"]);
       $camigtxtven->setDesart(utf8_encode($arreglo[$i]["desart"]));
       $camigtxtven->setFecmig($arreglo[$i]["fecmig"]);
       $camigtxtven->setCantidad($arreglo[$i]["cantidad"]);
       $camigtxtven->setSubtot($arreglo[$i]["subtot"]);
       $camigtxtven->setIva($arreglo[$i]["iva"]);
       $camigtxtven->setPrecio($arreglo[$i]["precio"]);
       $camigtxtven->setUsumig($arreglo[$i]["usumig"]);
               $camigtxtven->save();

        $i++;
              }
            }


  public static function guardarAsientos($coding,$subtot,$iva,&$arrasientos,&$pos)
  {
    $i=0;
	while ($i<=($pos-1))
	{
          if ($arrasientos[$i]["0"]==$coding)
          {
            $arrasientos[$i]["1"]=($arrasientos[$i]["1"] + $subtot);
            $arrasientos[$i]["2"]=($arrasientos[$i]["2"] + $iva);
            return true;
          }
	   $i++;
        }   
	$arrasientos[$pos]["0"]=$coding;
        $arrasientos[$pos]["1"]=$subtot;
        $arrasientos[$pos]["2"]=$iva;
        $pos= $pos +1;
    return true;
    }

  public static function grabarIngreso($codalm,$arreglo,&$cireging)
  {
    if (Herramientas::getVerCorrelativo('coring','cidefniv',&$r))
    {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $sql="select refing from cireging where refing='".$numero."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $r=$r+1;
  }
          else
          {
            $encontrado=true;
          }
        }
    }

    $acumnet=0;
    $acumrec=0;
    $i=0;
    while ($i<count($arreglo))
    {
        if ($arreglo[$i]["codart"]!="")
        {
          $acumnet=$acumnet+$arreglo[$i]["subtot"];  //Acumulador del Neto
          $acumrec=$acumrec+$arreglo[$i]["iva"];     //Acumulador del Recargo
}
        $i++;
    }

     $sql="select codtip, rifcon from cidefniv";
     if (Herramientas::BuscarDatos($sql,&$result2))
     {
  	$cireging= new Cireging();
  	$cireging->setRefing($numero);
  	$cireging->setCodtip($result2[0]["codtip"]);
  	$cireging->setFecing(date('Y-m-d'));
  	$cireging->setAnoing(date('Y'));
  	$cireging->setDesing('INGRESO GENERADO POR MIGRACIÓN DE PUNTO DE VENTA DEL ALMACÉN '.$codalm);
  	$cireging->setRifcon($result2[0]["codtip"]);
  	$cireging->setDesanu(null);
  	$moning= $acumnet;
  	$cireging->setMoning($moning);
  	$cireging->setMonrec($acumrec);
  	$cireging->setMondes(0);
  	$cireging->setMontot($moning);
  	$cireging->setPrevis('S');
  	$cireging->setStaing('A');
        $cireging->save();

        Herramientas::getSalvarCorrelativo('coring','cidefniv','Referencia',$r,$msg);
    }
  }

  public static function grabarImpIng($cireging,$arrasientos)
  {
    $c= new Criteria();
    $c->add(CiimpingPeer::REFING,$cireging->getRefing());
    $c->add(CiimpingPeer::FECING,$cireging->getFecing());
    CiimpingPeer::doDelete($c);

      $i=0;
      while ($i<count($arrasientos))
      {
        $ciimping= new Ciimping();
        $ciimping->setRefing($cireging->getRefing());
        $ciimping->setFecing($cireging->getFecing());
        $ciimping->setCodpre($arrasientos[$i]["0"]);
        $ciimping->setMoning($arrasientos[$i]["1"]);
        $ciimping->setMonrec($arrasientos[$i]["2"]);
        $ciimping->setMondes(0);
        $ciimping->setMontot($arrasientos[$i]["1"]);
        $ciimping->setMonaju(0);
        $ciimping->setStaimp('A');
        $ciimping->save();
        $i++;
      }

    return true;
  }

  public static function grabarContrato($caordcon,$grid,$grid2,$grid3,$grid4)
  {
      if (!$caordcon->getId()) {

           $t= new Criteria();
           $t->setLimit(1);
           $t->addDescendingOrderByColumn(CaordconPeer::ORDCON);
           $reg= CaordconPeer::doSelectOne($t);
           if ($reg)
           {
               $caordcon->setOrdcon(str_pad(($reg->getOrdcon()+1),8,'0',STR_PAD_LEFT));
           }else $caordcon->setOrdcon('00000001');
}
      $caordcon->setStacon('A');
      if ($caordcon->getFeccon()=="")
      {
          $caordcon->setFeccon(date('Y-m-d'));
      }
      $caordcon->save();
      self::grabarDetalleContrato($caordcon, $grid);
      self::grabarFianzasContrato($caordcon, $grid2);
      self::grabarClausulasContrato($caordcon, $grid3);
      self::grabarCronogramaContrato($caordcon, $grid4);
  }

  public static function grabarDetalleContrato($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodpre()!='')
      {
      	$x[$j]->setOrdcon($clasemodelo->getOrdcon());
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarFianzasContrato($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getNumfia()!='' && $x[$j]->getMonfia()>0)
      {
      	$x[$j]->setOrdcon($clasemodelo->getOrdcon());
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarClausulasContrato($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getDescla()!='')
      {
      	$x[$j]->setOrdcon($clasemodelo->getOrdcon());
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarCronogramaContrato($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getNropag()!='')
      {
      	$x[$j]->setOrdcon($clasemodelo->getOrdcon());
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarClausulasGrupo($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcla()!='')
      {
      	$x[$j]->setCodgru($clasemodelo->getCodgru());
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function GenerarCompromisov2($clasemodelo,$monto,&$refcom)
  {
  try{
       $refcom='';
       if (Herramientas::getVerCorrelativo('corcom','cpdefniv',&$r))
          {
            $ref = str_pad($r, 8, '0', STR_PAD_LEFT);
            $refcom = Herramientas::getBuscar_correlativoV2($ref,'cpdefniv','corcom','cpcompro','refcom');

            H::getSalvarCorrelativo('corcom','cpdefniv','Registo Contrato',$refcom,&$msg);

            if($clasemodelo->getTipcon()=='O')
                $tipcom='001';
            else#if($clasemodelo->getTipcon()=='S')
                $tipcom='CS';

            $cpcompro_new = new Cpcompro();
            $cpcompro_new->setRefcom($refcom);
            $cpcompro_new->setTipcom($tipcom);
            $cpcompro_new->setFeccom($clasemodelo->getFeccon());
            $cpcompro_new->setAnocom(substr($clasemodelo->getFeccon(),0,4));
            $cpcompro_new->setStacom('A');
            $cpcompro_new->setRefprc('NULO');
            $cpcompro_new->setDescom($clasemodelo->getDescon());
            $cpcompro_new->setMoncom($monto);
            $cpcompro_new->setSalcau(0);
            $cpcompro_new->setSalpag(0);
            $cpcompro_new->setSalaju(0);
            $cpcompro_new->setCedrif($clasemodelo->getCodpro());
            $cpcompro_new->save();

        //Imputaciones
            $c = new Criteria();
            $c->add(CadetordcPeer::ORDCON,$clasemodelo->getOrdcon());
            $per = CadetordcPeer::doSelect($c);
            if($per)
            {
                foreach($per as $r)
                {
                    $cpimpcom_new = new Cpimpcom();
                    $cpimpcom_new->setRefcom($refcom);
                    $cpimpcom_new->setCodpre($r->getCodpre());
                    $cpimpcom_new->setMonimp($r->getMoncon());
                    $cpimpcom_new->setMoncau(0);
                    $cpimpcom_new->setMonpag(0);
                    $cpimpcom_new->setMonaju(0);
                    $cpimpcom_new->setRefere('NULO');
                    $cpimpcom_new->setStaimp('A');
                    $cpimpcom_new->save();
}

            }
          }else{
            return 2;  //El numero inicial del Correlativo no ha sido definido
          }
      return -1;
  } catch (Exception $ex){
    //exit($ex);
    return 0;
  }

  }

}