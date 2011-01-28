<?php

/**
 * tesretislr actions.
 *
 * @package    Roraima
 * @subpackage tesretislr
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesretislrActions extends autotesretislrActions
{
	 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
	$cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
	if ($this->getRequestParameter('ajax')=='1')
	 {
	   $dato=date("d/m/Y",strtotime(TsmovlibPeer::getNumero($this->getRequestParameter('codigo'))));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }

  	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='1')
	{
	  $this->tags=Herramientas::autocompleteAjax('REFLIB','Tsmovlib','Reflib',$this->getRequestParameter('tsentislr[numord]'));
    }
  }
}
