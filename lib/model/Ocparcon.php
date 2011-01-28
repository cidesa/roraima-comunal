<?php

/**
 * Subclass for representing a row from the 'ocparcon'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Ocparcon extends BaseOcparcon
{
  private $cantidad='0,00';
  protected $despar="";
  protected $coduni="";

  public function getDespar()
  {
    return Herramientas::getX('CODPAR','Ocdefpar','despar',self::getCodpar());
  }

   public function getCoduni()
  {
   $valor=Herramientas::getX('CODPAR','Ocdefpar','coduni',self::getCodpar());
   $abruni=Herramientas::getX('CODUNI','Ocunidad','abruni',$valor);
    return $abruni;
  }
  public function getCosuni()
  {
   $codobr=Herramientas::getX('CODCON','Ocregcon','codobr',self::getCodcon());
   $c= new Criteria();
   $c->add(OcpreobrPeer::CODOBR,$codobr);
   $c->add(OcpreobrPeer::CODPAR,self::getCodpar());
   $regis= OcpreobrPeer::doSelectOne($c);
   if ($regis)
   {
   	$costouni= $regis->getCosuni();
   }else $costouni='0,00';
    return $costouni;
  }

  public function getMontot2()
  {
	 $totdet= self::getCancon() * self::getCosuni();
    return number_format($totdet,2,',','.');
  }


  public function setCantidad($val)
  {
    $this->cantidad = $val;
  }

  public function getCantidad()
  {
    return $this->cantidad;
  }

  public function getMontot()
  {
	 $totval= self::getCantidad() * self::getCosuni();
    return number_format($totval,2,',','.');
  }

}
