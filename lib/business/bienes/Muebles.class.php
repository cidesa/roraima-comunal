<?php
/**
 * Clase para el Manejo de Muebles
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */

class Muebles
{

    /**************************************************************************
	 **                       Formulario bieregsegmue                         **
	 **                       Jesus Lobaton                                   **
	 **************************************************************************/
	/**
	 * Función para registrar
	 *
	 * @static
	 * @param $Bnsegmue Object a guardar
	 * @return void
	 */
  public static function salvarbieregsegmue($bnsegmue,$grid)
  {
  	if ( self::salvarsegmue($bnsegmue)==-1)
  	{
  	//salvar detalle
  	$codact = $bnsegmue->getCodact();
  	$codmue = $bnsegmue->getCodmue();
  	$nrosegmue = $bnsegmue->getNrosegmue();

    $x = $grid[0];
    $j = 0;

    while ($j < count($x)) {
      $x[$j]->setCodact($codact);
      $x[$j]->setCodmue($codmue);
      $x[$j]->setNrosegmue($nrosegmue);
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
   return -1;
  	}

  }

  public static function salvarsegmue($bnsegmue)
  {
   if (date('Y-m-d') > $bnsegmue->getFecsegven())
   	{
   		$bnsegmue->setStasegmue('V');
   	}else{
   		$bnsegmue->setStasegmue('A');
   	}
  	$bnsegmue->save();
  return '-1';
  }
    /**************************************************************************
	 **                           FIN                                         **
	 **                       Jesus Lobaton                                   **
	 **************************************************************************/

public static function validarBieregsegmue($bnsegmue,&$msj)
 {
    $c= new Criteria();
  	$c->add(BnsegmuePeer::CODACT,$bnsegmue->getCodact());
  	$c->add(BnsegmuePeer::CODMUE,$bnsegmue->getCodmue());
  	$c->add(BnsegmuePeer::NROSEGMUE,$bnsegmue->getNrosegmue());
  	$resul= BnsegmuePeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $msj=201;
  	}
  	else
  	{
  		return $msj=-1;
  	}

 }

 public static function validarBndefcon($bndefcon,&$msj)
 {
    $c= new Criteria();
  	$c->add(BndefconPeer::CODACT,$bndefcon->getCodact());
  	$c->add(BndefconPeer::CODMUE,$bndefcon->getCodmue());
  	$resul= BndefconPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $msj=202;
  	}
  	else
  	{
  		return $msj=-1;
  	}

 }

public static function Validar_biedisactmuenew($valor1,$valor2)
{
	$val = -1;
	{


               	    if (($valor1>= $valor2) and ($valor2))
               	     { // print 'entre';exit;
               	     	$val=416;

               	     }

        return $val;
 }


}
}
?>