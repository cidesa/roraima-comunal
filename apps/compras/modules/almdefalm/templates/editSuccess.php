<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 14:15:33
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Almacen',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almdefalm/edit_header', array('cadefalm' => $cadefalm)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almdefalm/edit_messages', array('cadefalm' => $cadefalm, 'labels' => $labels)) ?>
<?php include_partial('almdefalm/edit_form', array('cadefalm' => $cadefalm,'mascaraubicacion' => $mascaraubicacion , 'lonmascara' => $lonmascara, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almdefalm/edit_footer', array('cadefalm' => $cadefalm)) ?>
</div>

</div>
