<?php

/**
 * Subclass for representing a row from the 'cpdefniv'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpdefniv.php 36423 2010-02-09 21:11:15Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpdefniv extends BaseCpdefniv
{
	protected $nomemp='';
	protected $gridper= array();
	protected $objniv= array();
    protected $defcod="";


	public function afterHydrate(){
		$this->nomemp = H::getX('CODEMP','Empresa','nomemp',self::getCodemp());
	}

    public function getDefcod()
    {
        $reg=CpdeftitPeer::doSelect(new Criteria());
          if ($reg)
              return $this->defcod='S';
           else  return  $this->defcod='N';
    }


}
