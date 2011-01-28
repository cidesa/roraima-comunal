<?php

/**
 * Subclase para representar una fila de la tabla 'faregots'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Faregots extends BaseFaregots
{
    public function getNompro()
    {
      return Herramientas::getX('RIFPRO','Caprovee','Nompro',self::getRifpro());
    }
}
