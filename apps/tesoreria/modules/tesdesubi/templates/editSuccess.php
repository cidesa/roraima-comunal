<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/27 09:05:31
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Ubicación',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesdesubi/edit_header', array('bnubica' => $bnubica)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesdesubi/edit_messages', array('bnubica' => $bnubica, 'labels' => $labels)) ?>
<?php include_partial('tesdesubi/edit_form', array('bnubica' => $bnubica, 'mascaraubi' => $mascaraubi, 'lonubi' => $lonubi, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesdesubi/edit_footer', array('bnubica' => $bnubica)) ?>
</div>

</div>
