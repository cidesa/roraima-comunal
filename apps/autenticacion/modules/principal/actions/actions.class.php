<?php

/**
 * principal actions.
 *
 * @package    cidesa
 * @subpackage principal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class principalActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->menu=$this->getUser()->obtenerModulos();

  }

  public function executeMenu()
  {

    $this->modulo = $this->getRequestParameter('m','');

    $this->getUser()->setAttribute('menu',$this->modulo,'autenticacion');


  }
}
