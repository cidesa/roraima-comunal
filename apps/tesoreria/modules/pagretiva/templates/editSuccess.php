<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 20:33:35
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición del Iva para Agentes de Retención',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pagretiva/edit_header', array('tsretiva' => $tsretiva)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pagretiva/edit_messages', array('tsretiva' => $tsretiva, 'labels' => $labels)) ?>
<?php include_partial('pagretiva/edit_form', array('tsretiva' => $tsretiva, 'obj' => $obj, 'labels' => $labels, 'fila' => $fila)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagretiva/edit_footer', array('tsretiva' => $tsretiva)) ?>
</div>

</div>
