<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript') ?>
<?php
  if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='ordpag')
  {
     $value = get_partial('grid', array('tscheemi' => $tscheemi, 'gridOrdPag' => $gridOrdPag, 'mensajeBen' => $mensajeBen, 'bloqueaopc' => $bloqueaopc, 'valoropc' => $valoropc)); echo $value ? $value : '&nbsp;';
  }
  if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='compro')
  {
     $value = get_partial('grid', array('tscheemi' => $tscheemi, 'gridCompro' => $gridCompro, 'mensajeBen' => $mensajeBen)); echo $value ? $value : '&nbsp;';
  }
  if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='precom')
  {
     $value = get_partial('grid', array('tscheemi' => $tscheemi, 'gridPrecom' => $gridPrecom, 'mensajeBen' => $mensajeBen)); echo $value ? $value : '&nbsp;';
  }
  else if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='pagnopre')
  {
     $value = get_partial('grid', array('tscheemi' => $tscheemi)); echo $value ? $value : '&nbsp;';
  }
  else if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='pagdir')
  {
     $value = get_partial('grid', array('tscheemi' => $tscheemi, 'gridPagdir' => $gridPagdir)); echo $value ? $value : '&nbsp;';
  }
 ?>
