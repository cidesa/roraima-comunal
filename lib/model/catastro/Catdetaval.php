<?php

/**
 * Subclase para representar una fila de la tabla  'catdetaval'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.catastro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Catdetaval extends BaseCatdetaval
{
  protected $valor="0";
  protected $costo="0,00";

  public function getValor()
  {
    $t= new Criteria();
    $t->add(CatdefavalPeer::ID,self::getCatdefavalId());
    $reg= CatdefavalPeer::doSelectOne($t);
    if ($reg)
    {
      $y= new Criteria();
      $y->add(CatreginmPeer::CODDIVGEO,$reg->getCoddivgeo());
      $y->add(CatreginmPeer::NROCAS,$reg->getNrocas());
      $reg2= CatreginmPeer::doSelectOne($y);
      if ($reg2)
      {
        $e= new Criteria();
        $e->add(CatusoespinmPeer::CATREGINM_ID,$reg2->getId());
        $e->add(CatusoespinmPeer::TIPO,self::getTipo());
        $e->add(CatusoespinmPeer::CATUSOESP_ID,self::getCatusoespId());
        $reg3= CatusoespinmPeer::doSelectOne($e);
        if ($reg3)
        {
        	$this->valor=$reg3->getValor();
        }
      }
    }
   return $this->valor;
  }

  public function getCosto()
  {
    $t= new Criteria();
    $t->add(CatdefavalPeer::ID,self::getCatdefavalId());
    $reg= CatdefavalPeer::doSelectOne($t);
    if ($reg)
    {
      $y= new Criteria();
      $y->add(CatcosavalPeer::CODDIVGEO,$reg->getCoddivgeo());
      $y->add(CatcosavalPeer::TIPO,self::getTipo());
      $y->add(CatcosavalPeer::CATUSOESP_ID,self::getCatusoespId());
      $reg2= CatcosavalPeer::doSelectOne($y);
      if ($reg2)
      {
        $this->costo=number_format($reg2->getCosto(), 2, ',', '.');
      }
    }
   return $this->costo;
  }

}
