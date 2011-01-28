<?php

/**
 * Subclass for representing a row from the 'fcdefins'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdefins.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcdefins extends BaseFcdefins
{
	public function getNomemp()
	  {
	  	  $c = new Criteria();
	  	  $c->add(EmpresaUserPeer::CODEMP,self::getCodemp());
	  	  $nombre = EmpresaUserPeer::doSelectone($c);
		  if ($nombre)
		  	return $nombre->getNomemp();
		  else
		    return 'No encontrado';
	  }

	public function getNomfuep()
	  {
	  	return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodpic());
	  }

	public function getNomfuev()
		  {
		  	return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodveh());
		  }

	public function getNomfuei()
		  {
		  	return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodinm());
		  }

    public function getNomfuepr()
	  {
	  	return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodpro());
	  }

	public function getNomfuee()
		  {
		  	return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodesp());
		  }

	public function getNomfuea()
		  {
		  	return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodapu());
		  }
//inicio

	public function getNomfue()
    {
  		return Herramientas::getX('CODFUE','FCFuePre','Nomfue',self::getCodpic());
    }

	public function getCodfue()
    {
  		return self::getCodpic();
    }


	public function getCodfue_esp()
    {
  		return self::getCodesp();
    }

	public function getDescripcioncodpic()
	{
  		return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodpic());
	}

	public function getDescripcioncodveh()
	{
  		return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodveh());
	}

	public function getDescripcioncodinm()
	{
  		return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodinm());
	}

	public function getDescripcioncodpro()
	{
  		return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodpro());
	}

	public function getDescripcioncodesp()
	{
  		return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodesp());
	}

	public function getDescripcioncodapu()
	{
  		return Herramientas::getX('CODFUE','Fcfuepre','Nomfue',self::getCodapu());
	}


}
