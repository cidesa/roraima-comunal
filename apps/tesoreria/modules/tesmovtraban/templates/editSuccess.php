<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 20:28:32
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Transferencias Bancarias',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesmovtraban/edit_header', array('tsmovtra' => $tsmovtra)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesmovtraban/edit_messages', array('tsmovtra' => $tsmovtra, 'labels' => $labels)) ?>
<?php include_partial('tesmovtraban/edit_form', array('new' => $new, 'tsmovtra' => $tsmovtra, 'labels' => $labels,  'etiqueta' => $etiqueta, 'comprobaut' => $comprobaut)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesmovtraban/edit_footer', array('tsmovtra' => $tsmovtra)) ?>
</div>

</div>
