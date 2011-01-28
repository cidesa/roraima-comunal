<?php

/**
 * Subclass for representing a row from the 'cppereje'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cppereje.php 36423 2010-02-09 21:11:15Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cppereje extends BaseCppereje
{
	protected $fecdes2;
	protected $fechas2;

	public function getfecdes2($format = 'd/m/Y') {
		return parent::getFecdes($format);
	}

	public function getfechas2($format = 'd/m/Y') {
		return parent::getFechas($format);
	}
}
