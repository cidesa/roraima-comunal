<?php

/**
 * Subclass for representing a row from the 'cpimpcom'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpimpcom.php 36423 2010-02-09 21:11:15Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpimpcom extends BaseCpimpcom
{
  private $comprometido = '';
  private $acausar = '';
  private $check = '';
  private $retiva = '';
  private $monporpag = 0.00;
  protected $mondis = 0.00;
  protected $mondescre = 0.00;

  public function setComprometido($val)
  {
	$this->comprometido = $val;
  }

  public function getComprometido()
  {
  	$comprometido= self::getMonimp() - self::getMonaju();
	return $comprometido;
  }

  public function setAcausar($val)
  {
	  $this->acausar = $val;
  }

  public function getAcausar()
  {
    if($this->mondescre>0) $acausar= $this->mondescre;
    else $acausar= self::getMonimp() - self::getMoncau() - self::getMonaju();
	  return $acausar;
  }

  public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
	return $this->check;
  }

  public function getMonporpag()
  {
	$montot= (self::getMonimp()-self::getMonpag()-self::getMonaju());
	return $montot;
  }


   public function setMonporpag($val)
  {
	$this->monporpag = $val;
  }

    public function getMonporpagGrid()
  {
	return $this->monporpag;
  }

  public function getRetiva()
  {
  	$c= new Criteria();
  	$reg= CadefartPeer::doSelectOne($c);
  	if ($reg)
  	{ $afectarecargo=$reg->getAsiparrec();
  	}else {$afectarecargo='C';}

  	if ($afectarecargo=='R' || $afectarecargo=='S')
  	{
  	  Herramientas::obtenerFormatoCategoria(&$formatopar,&$iniciopartida);
  	  $par=substr(self::getCodpre(),$iniciopartida,strlen($formatopar));
  	  $c= new Criteria();
  	  $c->add(TsretivaPeer::CODPAR,$par);
  	  $datos= TsretivaPeer::doSelectOne($c);
  	  if ($datos)
  	  {
  		return 'S';
  	  }else return 'N';
   }else if ($afectarecargo=='P')
   {
   	  $c= new Criteria();
  	  $c->add(TsretivaPeer::CODPAR,self::getCodpre());
  	  $datos= TsretivaPeer::doSelectOne($c);
  	  if ($datos)
  	  {
  		return 'S';
  	  }else return 'N';

   }
  }

  public function setRetiva($val)
  {
	$this->retiva = $val;
  }

  public function setMondescre($val)
  {
    $this->mondescre = $val;
  }

}
