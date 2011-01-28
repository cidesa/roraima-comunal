<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/23 17:06:25
?>
<?php echo form_tag('almtippro/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo object_input_hidden_tag($catippro, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">


  <?php echo label_for('catippro[codpro]', __($labels['catippro{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catippro{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catippro{codpro}')): ?>
    <?php echo form_error('catippro{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catippro, 'getCodpro', array (
  'size' => 6,
  'maxlength'=> 4,
  'control_name' => 'catippro[codpro]',
  'readonly'  =>  $catippro->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('catippro_codpro').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('catippro[despro]', __($labels['catippro{despro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catippro{despro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catippro{despro}')): ?>
    <?php echo form_error('catippro{despro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catippro, 'getDespro', array (
  'size' => 80,
  'maxlength'=> 100,
  'control_name' => 'catippro[despro]',
   'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('catippro[ctaord]', __($labels['catippro{ctaord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catippro{ctaord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catippro{ctaord}')): ?>
    <?php echo form_error('catippro{ctaord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($catippro, 'getCtaord', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'catippro[ctaord]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
     	  'url'      => 'almtippro/ajax',
		  'complete' => 'AjaxJSON(request, json)',
		  'condition' => "$('catippro_ctaord').value != ''",
  		  'with' => "'ajax=1&cajtexmos=catippro_descta_ord&cajtexcom=catippro_ctaord&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almtippro/clase/Contabb/frame/sf_admin_edit_form/obj1/catippro_ctaord/obj2/catippro_descta_ord/campo1/codcta/campo2/descta')?>

<?php $value = object_input_tag($catippro,array('getDescta_ord','catippro[ctaord]'), array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'catippro[descta_ord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('catippro[ctaper]', __($labels['catippro{ctaper}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catippro{ctaper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catippro{ctaper}')): ?>
    <?php echo form_error('catippro{ctaper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($catippro, 'getCtaper', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'catippro[ctaper]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
     	  'url'      => 'almtippro/ajax',
		  'complete' => 'AjaxJSON(request, json)',
		  'condition' => "$('catippro_ctaper').value != ''",
  		  'with' => "'ajax=1&cajtexmos=catippro_descta_pre&cajtexcom=catippro_ctaper&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almtippro/clase/Contabb/frame/sf_admin_edit_form/obj1/catippro_ctaper/obj2/catippro_descta_pre/campo1/codcta/campo2/descta')?>
&nbsp;
<?php $value = object_input_tag($catippro, array('getDescta_pre','catippro[ctaper]'), array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'catippro[descta_pre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('catippro' => $catippro)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($catippro->getId()): ?>
<?php echo button_to(__('delete'), 'almtippro/delete?id='.$catippro->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

