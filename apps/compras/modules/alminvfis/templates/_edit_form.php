<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/29 11:26:36
?>
<?php echo form_tag('alminvfis/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','Grid','PopUp') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe','cainvfis','compras/alminvfis') ?>
<?php echo input_hidden_tag('totalfilas', '') ?>

<?php echo object_input_hidden_tag($cainvfis, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('cainvfis[fecinv]', __($labels['cainvfis{fecinv}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cainvfis{fecinv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cainvfis{fecinv}')): ?>
    <?php echo form_error('cainvfis{fecinv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cainvfis, 'getFecinv', array (
  'size' => 12,
  'readonly'  =>  $cainvfis->getId()!='' ? true : false ,
  'maxlength' => 10,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cainvfis[fecinv]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cainvfis[artdesde]', __($labels['cainvfis{artdesde}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cainvfis{artdesde}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cainvfis{artdesde}')): ?>
    <?php echo form_error('cainvfis{artdesde}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php  $value = object_input_tag($cainvfis, 'getArtdesde', array (
  'size' => 15,
  'control_name' => 'cainvfis[artdesde]',
  'maxlength' => $longitudarticulo,
  'readonly'  =>  $cainvfis->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraarticulo')",
      'onBlur'=> remote_function(array(
      'url'      => 'alminvfis/ajax',
      'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('cainvfis_artdesde').value != ''",
      'with' => "'ajax=1&cajtexmos=cainvfis_desartdesde&cajtexcom=cainvfis_artdesde&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;'?> &nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Caregart_Alminvfis/clase/Caregart/frame/sf_admin_edit_form/obj1/cainvfis_artdesde/obj2/cainvfis_desartdesde/campo1/codart/campo2/desart/param1/".$longitudarticulo)?>

  <?php $value = object_input_tag($cainvfis, 'getDesartdesde', array (
  'disabled' => true,
  'control_name' => 'cainvfis[desartdesde]',
  'size' => 70,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <?php echo label_for('cainvfis[arthasta]', __($labels['cainvfis{arthasta}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cainvfis{arthasta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cainvfis{arthasta}')): ?>
    <?php echo form_error('cainvfis{arthasta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($cainvfis, 'getArthasta', array (
  'size' => 15,
  'control_name' => 'cainvfis[arthasta]',
  'maxlength' => $longitudarticulo,
  'readonly'  =>  $cainvfis->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraarticulo')",
      'onBlur'=> remote_function(array(
      'url'      => 'alminvfis/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('cainvfis_arthasta').value != ''",
      'with' => "'ajax=1&cajtexmos=cainvfis_desarthasta&cajtexcom=cainvfis_arthasta&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Caregart_Alminvfis/clase/Caregart/frame/sf_admin_edit_form/obj1/cainvfis_arthasta/obj2/cainvfis_desarthasta/campo1/codart/campo2/desart/param1/".$longitudarticulo)?>

  <?php $value = object_input_tag($cainvfis, 'getDesarthasta', array (
  'disabled' => true,
  'control_name' => 'cainvfis[desarthasta]',
  'size' => 70,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cainvfis[codalm]', __($labels['cainvfis{codalm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cainvfis{codalm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cainvfis{codalm}')): ?>
    <?php echo form_error('cainvfis{codalm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php  $value = object_input_tag($cainvfis, 'getCodalm', array (
      'size' => 10,
      'maxlength' => 10,
      'control_name' => 'cainvfis[codalm]',
      'readonly'  =>  $cainvfis->getId()!='' ? true : false ,
      'onBlur'=> remote_function(array(
       	  'update'   => 'grid',
       	  'script'   => true,
	      'url'      => 'alminvfis/ajax',
	      'complete' => 'AjaxJSON(request, json)',
	      'condition' => "$('cainvfis_codalm').value != ''",
	      'with' => "'ajax=3&cajtexmos=cainvfis_desalm&codigo='+this.value+'&cajtexcom=cainvfis_codalm&artdesde='+document.getElementById('cainvfis_artdesde').value+'&arthasta='+document.getElementById('cainvfis_arthasta').value+'&fecinv='+document.getElementById('cainvfis_fecinv').value+'&id='+document.getElementById('id').value",
        ))
)); echo $value ? $value : '&nbsp;' ?>&nbsp;

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cadefalm_Alminvfis/clase/Cadefalm/frame/sf_admin_edit_form/obj1/cainvfis_codalm/obj2/cainvfis_desalm/campo1/codalm/campo2/desalm")?>

  <?php $value = object_input_tag($cainvfis, 'getDesalm', array (
  'disabled' => true,
  'control_name' => 'cainvfis[desalm]',
  'size' => 70,

)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<div id="gridubi">
</div>
<div id="grid">
<?php echo grid_tag($obj);?>
</div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('cainvfis' => $cainvfis)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($cainvfis->getId()): ?>
<?php echo button_to(__('delete'), 'alminvfis/delete?id='.$cainvfis->getFecinv().'&codalm='.$cainvfis->getCodalm(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
