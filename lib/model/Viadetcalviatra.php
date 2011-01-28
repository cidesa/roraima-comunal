<?php

/**
 * Subclase para representar una fila de la tabla 'viadetcalviatra'.
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
class Viadetcalviatra extends BaseViadetcalviatra
{
    protected $check=0;
    protected $mondiadol=0;
    protected $montotdol=0;

    public function getPartida()
    {
        return H::GetX('Codrub','Viadefrub','Codpar',$this->codrub);
    }
}
