<?php
// auto-generated by sfPropelAdmin
// date: 2007/05/16 18:38:01
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Declaración de Licencia - Actividades Económicas', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('facpicliq/edit_header', array('fcdeclar' => $fcdeclar)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('facpicliq/edit_messages', array('fcdeclar' => $fcdeclar, 'labels' => $labels)) ?>
<?php include_partial('facpicliq/edit_form', array('fcdeclar' => $fcdeclar, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('facpicliq/edit_footer', array('fcdeclar' => $fcdeclar)) ?>
</div>

</div>
