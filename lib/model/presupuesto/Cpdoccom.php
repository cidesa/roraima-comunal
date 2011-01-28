<?php

/**
 * Subclass for representing a row from the 'cpdoccom'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpdoccom.php 38954 2010-06-15 16:05:38Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpdoccom extends BaseCpdoccom
{
	protected $etadef="";

  public function getEtadef() {
    $cpdefniv=CpdefnivPeer::doSelectOne(new Criteria());
	if ($cpdefniv){
	   return $cpdefniv->getEtadef();
	 } else return 1;
    }

    public function setEtadef()
    {
        return $this->etadef;
    }

   public function getTipodoc()
  {
  	return self::getTipcom();
  }

  public function getNomdoc()
  {
  	return self::getNomext();
  }
}
