<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/14 13:05:04
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Proyectos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almtippro/edit_header', array('catippro' => $catippro)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almtippro/edit_messages', array('catippro' => $catippro, 'labels' => $labels)) ?>
<?php include_partial('almtippro/edit_form', array('catippro' => $catippro, 'loncta'=>$loncta, 'mascara'=>$mascara, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almtippro/edit_footer', array('catippro' => $catippro)) ?>
</div>

</div>
