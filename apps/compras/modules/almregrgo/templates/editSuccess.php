<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 23:05:39
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'SubmitClick', 'PopUp', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Recargos',array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almregrgo/edit_header', array('carecarg' => $carecarg)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almregrgo/edit_messages', array('carecarg' => $carecarg, 'labels' => $labels)) ?>
<?php include_partial('almregrgo/edit_form', array('carecarg' => $carecarg, 'tipoformato' => $tipoformato, 'longpre' => $longpre, 'longcon'=> $longcon, 'mascarapresupuestaria' => $mascarapresupuestaria, 'mascaracontabilidad' => $mascaracontabilidad, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almregrgo/edit_footer', array('carecarg' => $carecarg)) ?>
</div>

</div>
