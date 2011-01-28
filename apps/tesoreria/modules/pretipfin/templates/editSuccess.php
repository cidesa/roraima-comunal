<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/26 17:34:14
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Tipos de Financiamiento', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pretipfin/edit_header', array('fortipfin' => $fortipfin)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pretipfin/edit_messages', array('fortipfin' => $fortipfin, 'labels' => $labels)) ?>
<?php include_partial('pretipfin/edit_form', array('fortipfin' => $fortipfin, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pretipfin/edit_footer', array('fortipfin' => $fortipfin)) ?>
</div>

</div>
