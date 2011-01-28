<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/23 15:30:38
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Recepción de Articulos por Orden de Compra',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almordrec/edit_header', array('carcpart' => $carcpart)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almordrec/edit_messages', array('carcpart' => $carcpart, 'labels' => $labels)) ?>
<?php include_partial('almordrec/edit_form', array('carcpart' => $carcpart, 'labels' => $labels, 'grid' => $grid, 'mascaraubi' => $mascaraubi, 'lonubi' => $lonubi, 'recmer' => $recmer, 'mansolocor' => $mansolocor, 'bloqfec' => $bloqfec, 'oculeli' => $oculeli )) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almordrec/edit_footer', array('carcpart' => $carcpart)) ?>
</div>

</div>
