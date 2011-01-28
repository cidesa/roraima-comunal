<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 16:28:18
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Linktoapp', 'SubmitClick', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Recaudos', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almregrec/edit_header', array('carecaud' => $carecaud)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almregrec/edit_messages', array('carecaud' => $carecaud, 'labels' => $labels)) ?>
<?php include_partial('almregrec/edit_form', array('carecaud' => $carecaud, 'labels' => $labels, 'mansolocor' => $mansolocor)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almregrec/edit_footer', array('carecaud' => $carecaud)) ?>
</div>

</div>
