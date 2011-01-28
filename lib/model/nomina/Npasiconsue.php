<?php

/**
 * Subclase para representar una fila de la tabla 'npasiconsue'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npasiconsue extends BaseNpasiconsue
{
  protected $obj1=array();
  protected $obj2=array();
  protected $obj3=array();
  protected $obj4=array();
  protected $obj5=array();
  protected $obj6=array();
  protected $tippres="";

  public function getNomnom()
  {
  	$dato= Herramientas::getX('codnom','npnomina','Nomnom',self::getCodnom());
    return $dato;
  }

  public function getNomcon()
  {
  	$dato= Herramientas::getX('codcon','npdefcpt','Nomcon',self::getCodcon());
    return $dato;
  }

  public function getNomcon2()
  {
  	$dato= Herramientas::getX('codcon','npdefcpt','Nomcon',self::getCodcom());
    return $dato;
  }

}
