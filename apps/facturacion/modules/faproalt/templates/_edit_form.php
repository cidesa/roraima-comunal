<?php
// auto-generated by PropelCidesa
// date: 2008/12/12 17:54:53
?>
<?php echo form_tag('faproalt/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','PopUp','Grid') ?>
<?php echo javascript_include_tag('dFilter','tools','observe','ajax') ?>

<?php echo object_input_hidden_tag($faproalt, 'getId') ?>



<h2 class="h2" onclick="javascript: return $('divDatos del Artículo').toggle();"><?php echo __('Datos del Artículo') ?></h2>
<fieldset id="sf_fieldset_datos_del_art__culo" class="">

<div class="form-row" id="divDatos del Artículo">
<div id="divcodart">
  <?php echo label_for('faproalt[codart]', __($labels['faproalt{codart}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faproalt{codart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faproalt{codart}')): ?>
    <?php echo form_error('faproalt{codart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_tag($faproalt, 'getCodart', array (
  'size' => 20,
  'control_name' => 'faproalt[codart]',
  'readonly'  =>  $faproalt->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this)",
  'onBlur'=> remote_function(array(
			  'url'      => 'faproalt/ajax',
			  'script' => true,
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('faproalt_codart').value != ''",
  			  'with' => "'ajax=1&cajtexmos=faproalt_desart&codigo='+this.value"
			  ))
  )); echo $value ? $value : '&nbsp;' ?>

   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caregart_Faproalt/clase/Caregart/frame/sf_admin_edit_form/obj1/faproalt_codart/obj2/faproalt_desart/campo1/codart/campo2/desart','','','botoncat')?></th>

  <?php $value = object_input_tag($faproalt, 'getDesart', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'faproalt[desart]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</div>
</fieldset>

<?php echo grid_tag($obj);?>

<?php include_partial('edit_actions', array('faproalt' => $faproalt)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($faproalt->getId()): ?>
<?php echo button_to(__('delete'), 'faproalt/delete?id='.$faproalt->getId().'&articulo='.$faproalt->getCodart(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

  <script language="JavaScript" type="text/javascript">
  var idf='<?php echo $faproalt->getId()?>';
  if (idf!="")
  {
    $$('.botoncat')[0].disabled=true;
  }
</script>
