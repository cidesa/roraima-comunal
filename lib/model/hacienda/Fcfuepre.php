<?php

/**
 * Subclass for representing a row from the 'fcfuepre'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcfuepre.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcfuepre extends BaseFcfuepre
{
  protected $fueing="";
  public function getDescta()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getIngrec());
  }

  public function getDescta1()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getFueing());
  }

  public function getDescta2()
  {
    return Herramientas::getX('codpar','fcpreing','nompar',self::getCodprei());
  }

  public function getCodcta()
  {
    return self::getIngrec();
  }

  public function getCodparing()
  {
    return self::getCodprei();
  }

  public function getNomparing()
  {
    return Herramientas::getX('codparing','fordefparing','nomparing',self::getCodprei());
  }

  public function getCodrede()
  {
    return self::getFueing();
  }

  public function getDesrede()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getFueing());
  }

  public function getDescripcioncodpic()
  {
    return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodveh()
  {
    return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodinm()
  {
    return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodpro()
  {
  	return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodesp()
  {
    return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodapu()
  {
  	return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getCodveh()
  {
    return self::getCodfue();
  }

  public function getCodinm()
  {
  	return self::getCodfue();
  }

  public function getCodpro()
  {
  	return self::getCodfue();
  }

  public function getCodfue_esp()
  {
  	return self::getCodfue();
  }

  public function getCodapu()
  {
  	return self::getCodfue();
  }

  /*public function getFueing()
  {
  	return self::getCodfue();
  }
  */


}
