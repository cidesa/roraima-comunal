<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cpdoccau'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: CpdoccauPeer.php 36423 2010-02-09 21:11:15Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class CpdoccauPeer extends BaseCpdoccauPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CpdoccauPeer::TIPCAU => 'Tipo', CpdoccauPeer::NOMEXT => 'Nombre', CpdoccauPeer::REFIER => 'Refiere'),);


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
	
  public static function getNombre($tipo)
  {
	return Herramientas::getX('TIPCAU','Cpdoccau','Nomext',strtoupper($tipo));	  
  }  

  public static function getDato($referencia, $nomdat)
  {
   	return Herramientas::getX('TIPCAU','Cpdoccau',$nomdat,strtoupper($referencia)); 	
  }
  
  public static function getRefier($referencia)
  {
   	return Herramientas::getX('TIPCAU','Cpdoccau','Refier',$referencia); 	
  }
}
