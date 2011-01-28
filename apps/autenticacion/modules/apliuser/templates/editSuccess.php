<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2008/04/24 13:03:04
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'SubmitClick', 'tabs', 'Linktoapp', 'Javascript', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Asignación de Perfiles por Usuarios',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('apliuser/edit_header', array('apli_user' => $apli_user)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('apliuser/edit_messages', array('apli_user' => $apli_user, 'labels' => $labels)) ?>
<?php include_partial('apliuser/edit_form', array('apli_user' => $apli_user, 'obj' => $obj, 'modulos' => $modulos, 'labels' => $labels, 'totfil' => $totfil)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('apliuser/edit_footer', array('apli_user' => $apli_user)) ?>
</div>

</div>
