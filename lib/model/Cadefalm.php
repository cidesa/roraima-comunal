<?php

/**
 * Subclass for representing a row from the 'cadefalm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cadefalm.php 41066 2010-10-20 17:11:01Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cadefalm extends BaseCadefalm
{

  public function getNomcat(){
     return Herramientas::getX('codubi','Bnubibie','Desubi',self::getCodcat());
  }

  public function setCodalm($v){

    parent::setCodalm(str_pad($v, 6 , "0", STR_PAD_LEFT));

  }

 private $check = '';


 public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
	return $this->check;
  }

  public function getNomtip(){
     return Herramientas::getX('id','Catipalm','Nomtip',self::getCodtip());
  }

  public function getCodlongveinte()
  {
     return H::getConfApp('codlongveinte', 'compras', 'almdefalm');
  }

}
