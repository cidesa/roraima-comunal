<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/06 19:42:24
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Solicitud de Servicio',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almreqser/edit_header', array('careqartser' => $careqartser)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almreqser/edit_messages', array('careqartser' => $careqartser, 'labels' => $labels)) ?>
<?php include_partial('almreqser/edit_form', array('careqartser' => $careqartser, 'labels' => $labels, 'forubi' => $forubi, 'lonubi'=>$lonubi, 'grid' => $grid)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almreqser/edit_footer', array('careqartser' => $careqartser)) ?>
</div>

</div>
