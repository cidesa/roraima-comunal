<?php
// auto-generated by sfPropelAdmin
// date: 2007/05/10 16:06:05
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php javascript_include_tag('prototype.js') ?>
<?php javascript_include_tag('effects.js') ?>
<?php javascript_include_tag('window.js') ?>
<?php javascript_include_tag('window_effects.js') ?>
<?php javascript_include_tag('debug.js') ?>
<div id="sf_admin_container">

<h1><?php echo __('Licencia - Patente de Industria y Comercio', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('Facpiclic/edit_header', array('fcsollic' => $fcsollic)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('Facpiclic/edit_messages', array('fcsollic' => $fcsollic, 'labels' => $labels)) ?>
<?php include_partial('Facpiclic/edit_form', array('fcsollic' => $fcsollic, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('Facpiclic/edit_footer', array('fcsollic' => $fcsollic)) ?>
</div>

</div>
