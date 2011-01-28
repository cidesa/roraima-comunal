<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/30 16:38:13
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Linktoapp', 'Javascript', 'Grid') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Movimientos Segun Libros',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesmovseglib/edit_header', array('tsmovlib' => $tsmovlib)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesmovseglib/edit_messages', array('tsmovlib' => $tsmovlib, 'labels' => $labels)) ?>
<?php include_partial('tesmovseglib/edit_form', array('tsmovlib' => $tsmovlib, 'labels' => $labels, 'obj' => $obj,
'compadic' => $compadic,'eti'=>$eti,'color'=>$color,
'ctaeje'=>$ctaeje,'desctaeje'=>$desctaeje,'ctaingdif'=>$ctaingdif,'desctaingdif'=>$desctaingdif,
'ctaing'=>$ctaing,'desctaing'=>$desctaing,
'anular'=>$anular, 'oculeli' => $oculeli, 'bloqfec' => $bloqfec, 
'gencorrel'=>$gencorrel,
)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesmovseglib/edit_footer', array('tsmovlib' => $tsmovlib)) ?>
</div>

</div>
