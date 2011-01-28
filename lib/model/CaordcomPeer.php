<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'caordcom'.
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
class CaordcomPeer extends BaseCaordcomPeer
{
   public static function getDato($ordcom, $nomdat)
   {
   	return Herramientas::getX_vacio('ORDCOM','Caordcom',$nomdat,$ordcom);
   }

	const COLUMNS = 'columns';

	public static $columsname = array (
	//self::COLUMNS => array (CaordcomPeer::ORDCOM => 'Código', CaordcomPeer::FECORD => 'Fecha', CaordcomPeer::CODPRO => 'Cod. Prov.', CaproveePeer::NOMPRO => 'Nombre Prov.', CaconpagPeer::DESCONPAG => 'Con. Pago', CaforentPeer::DESFORENT => 'Forma Entrega'),);
	self::COLUMNS => array (CaordcomPeer::ORDCOM => 'Código', CaordcomPeer::FECORD => 'Fecha', CaordcomPeer::DESORD => 'Descripción'),);


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

   public static function getCodpro($cod)
    {
  	  return Herramientas::getX('ORDCOM','Caordcom','codpro',str_pad($cod,8,'0',STR_PAD_LEFT));
    }

   public static function getFecord($cod)
    {
  	  return Herramientas::getX('ORDCOM','Caordcom','fecord',str_pad($cod,8,'0',STR_PAD_LEFT));
    }
}
