<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 37135 2010-03-17 14:54:38Z dmartinez $
 */
// date: 2007/06/01 18:07:32
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Contratistas de Bienes o Servicio y Cooperativas',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almregpro/edit_header', array('caprovee' => $caprovee)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almregpro/edit_messages', array('caprovee' => $caprovee, 'labels' => $labels)) ?>
<?php include_partial('almregpro/edit_form', array('caprovee' => $caprovee, 'encontrado' => $encontrado, 'mascara' => $mascara, 'loncta' => $loncta, 'labels' => $labels, 'c' => $c, 'ent' => $ent, 'corcodpro' => $corcodpro, 'mascararif' => $mascararif, 'manprocor' => $manprocor)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almregpro/edit_footer', array('caprovee' => $caprovee)) ?>
</div>

</div>
<?php echo javascript_tag("
  salvar=function()
	{
      f=document.sf_admin_edit_form;
	  //ObjetosSelectMultiple(f.associated_recargo);
	  f.action=location.pathname;
      f.submit();
	}


") ?>