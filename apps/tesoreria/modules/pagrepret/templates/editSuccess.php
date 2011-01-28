<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/06 11:05:52
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Comprobantes de Retencion', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pagrepret/edit_header', array('tsrepret' => $tsrepret)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pagrepret/edit_messages', array('tsrepret' => $tsrepret, 'labels' => $labels)) ?>
<?php include_partial('pagrepret/edit_form', array('tsrepret' => $tsrepret, 'labels' => $labels, 'tiposreportes' => $tiposreportes, 'grid' => $grid)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagrepret/edit_footer', array('tsrepret' => $tsrepret)) ?>
</div>

</div>
