<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/20 10:29:35
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Linktoapp', 'Grid', 'SubmitClick', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Registro de Artículos ó Servicios',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almregartv2/edit_header', array('caregart' => $caregart)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almregartv2/edit_messages', array('caregart' => $caregart, 'labels' => $labels)) ?>
<?php include_partial('almregartv2/edit_form', array('caregart' => $caregart, 'mascaraarticulo' => $mascaraarticulo, 'longart' => $longart, 'mascaracontabilidad' => $mascaracontabilidad, 'longcont' => $longcont, 'mascarapartida' => $mascarapartida, 'longpar' => $longpar, 'mascaraubicacion' => $mascaraubicacion, 'longubi' => $longubi, 'mascaracatsnc' => $mascaracatsnc, 'longcatsnc' => $longcatsnc, 'labels' => $labels, 'obj' => $obj, 'mensaler' => $mensaler, 'obj5' => $obj5, 'objAlmUbi' => $objAlmUbi)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almregartv2/edit_footer', array('caregart' => $caregart)) ?>
</div>
</div>
