<?php

/**
 * Subclass for representing a row from the 'cadetent'.
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
class Cadetent extends BaseCadetent
{
	public function getDesart()
	{
		return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
	}

	public function getNomalm()
	{
		return Herramientas::getX('CODALM','cadefalm','Nomalm',self::getCodalm());
	}

	public function getNomubi()
	{
		return Herramientas::getX('CODUBI','cadefubi','Nomubi',self::getCodubi());
	}

}
