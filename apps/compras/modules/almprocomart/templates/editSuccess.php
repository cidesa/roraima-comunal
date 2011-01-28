<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/23 16:21:48
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Programar Compra de Artículos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almprocomart/edit_header', array('caprocomart' => $caprocomart)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almprocomart/edit_messages', array('caprocomart' => $caprocomart, 'labels' => $labels)) ?>
<?php include_partial('almprocomart/edit_form', array('caprocomart' => $caprocomart, 'labels' => $labels, 'mascaracategoria' => $mascaracategoria, 'loncategoria' => $loncategoria, 'obj' => $obj, 'estados' => $estados, 'municipios' => $municipios, 'parroquias' => $parroquias )) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almprocomart/edit_footer', array('caprocomart' => $caprocomart)) ?>
</div>
</div>
