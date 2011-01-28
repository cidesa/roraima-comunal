<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cpdocpag'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: CpdocpagPeer.php 36423 2010-02-09 21:11:15Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class CpdocpagPeer extends BaseCpdocpagPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CpdocpagPeer::TIPPAG => 'Tipo', CpdocpagPeer::NOMEXT => 'Descripción', CpdocpagPeer::REFIER => 'Refiere', CpdocpagPeer::AFEPRC => 'Afe. Precom.', CpdocpagPeer::AFECOM => 'Afe. Comp', CpdocpagPeer::AFECAU => 'Afe. Cau.', CpdocpagPeer::AFEPAG => 'Afe. Pag.', CpdocpagPeer::AFEDIS => 'Afe. Dis.'),);

	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}

	static public function getColumsNames()
	{
		return self::$columsname[self::COLUMNS];
	}


	static public function getArrayFieldsNames()
	{
		$col = self::$columsname[self::COLUMNS];
		$columnas = array();
		foreach($col as $key => $value)
		{
			$punto = strpos($key,'.');
			$tabla = substr($key,0,$punto);
			$campo = substr($key,$punto+1);
			$columnas[] = ucfirst(strtolower($campo));
			
		}
		return $columnas;
	}		
	

	public static function getNomext($codigo)
	{
    	return Herramientas::getX('Tippag','Cpdocpag','Nomext',$codigo);		
	}  

}
