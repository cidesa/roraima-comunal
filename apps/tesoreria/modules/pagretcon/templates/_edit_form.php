<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/10 14:58:09
?>
<?php echo form_tag('pagretcon/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript', 'Grid', 'PopUp', 'tabs') ?>
<?php echo javascript_include_tag('ajax', 'tools', 'dFilter','observe') ?>

<?php echo object_input_hidden_tag($opretcon, 'getId') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset>
<legend><? echo __('Datos del Tipo de Nómina')?></legend>
<div class="form-row">
  <?php echo label_for('opretcon[codnom]', __($labels['opretcon{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opretcon{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opretcon{codnom}')): ?>
    <?php echo form_error('opretcon{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag_('opretcon[codnom]', $opretcon->getCodnom(),
    '/fieldwhere/CODnom/table/Npnomina/fieldget/Codnom/val/opretcon[codnom]',  array('autocomplete' => 'off','size' => 5, 'maxlength' => 3,
    'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opretcon_codnom').value=cadena",
    'readonly'  =>  $opretcon->getId()!='' ? true : false ,
     'onBlur'=> remote_function(array(
        'url'      => 'pagretcon/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opretcon_codnom').value != '' && $('id').value == ''",
          'with' => "'ajax=3&cajtexmos=opretcon_desnom&cajtexcom=opretcon_codnom&codigo='+this.value",

        ))),
     array('use_style' => 'true')
  )
?>
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npnomina_nomdefespvar/clase/Npnomina/frame/sf_admin_edit_form/obj1/opretcon_codnom/obj2/opretcon_desnom/campo1/codnom/campo2/nomnom','','','botoncat')?>

  <?php $value = object_input_tag($opretcon, 'getDesnom', array (
  'disabled' => true,
  'control_name' => 'opretcon[desnom]',
  'size' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset>
<legend><? echo __('Datos del Concepto')?></legend>
<div class="form-row">
  <?php echo label_for('opretcon[codcon]', __($labels['opretcon{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opretcon{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opretcon{codcon}')): ?>
    <?php echo form_error('opretcon{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag_('opretcon[codcon]', $opretcon->getCodcon(),
    '/fieldwhere/CODCON/table/Npdefcpt/fieldget/Codcon/val/opretcon[codcon]',  array('autocomplete' => 'off','size' => 5, 'maxlength' => 3,
     'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opretcon_codcon').value=cadena",
  'readonly'  =>  $opretcon->getId()!='' ? true : false ,
   'onBlur'=> remote_function(array(
        'url'      => 'pagretcon/ajax',
        'complete' => 'AjaxJSON(request, json), confirmar()',
        'condition' => "$('opretcon_codcon').value != '' && $('id').value == ''",
          'with' => "'ajax=1&cajtexmos=opretcon_descon&cajtexcom=opretcon_codcon&nomina='+$('opretcon_codnom').value+'&codigo='+this.value",
        ))),
     array('use_style' => 'true')
  )
?><?php echo input_hidden_tag('pertenece', '') ?>
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npdefcpt_Pagretcon/clase/Npdefcpt/frame/sf_admin_edit_form/obj1/opretcon_codcon/obj2/opretcon_descon/campo1/codcon/campo2/nomcon/param1/'+$('opretcon_codnom').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($opretcon, 'getDescon', array (
  'disabled' => true,
  'control_name' => 'opretcon[descon]',
  'size' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset>
<legend><? echo __('Datos del Tipo de Retención')?></legend>
<div class="form-row">
  <?php echo label_for('opretcon[codtip]', __($labels['opretcon{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opretcon{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opretcon{codtip}')): ?>
    <?php echo form_error('opretcon{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag_('opretcon[codtip]', $opretcon->getCodtip(),
    '/fieldwhere/CODtip/table/Optipret/fieldget/Codtip/val/opretcon[codtip]',  array('autocomplete' => 'off','size' => 5, 'maxlength' => 3,
    'readonly'  =>  $opretcon->getId()!='' ? true : false ,
     'onBlur'=> remote_function(array(
        'url'      => 'pagretcon/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opretcon_codtip').value != '' && $('id').value == ''",
          'with' => "'ajax=2&cajtexmos=opretcon_destip&cajtexcom=opretcon_codtip&codigo='+this.value",

        ))),
     array('use_style' => 'true')
  )
?>
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Optipret_Pagemiret/clase/Optipret/frame/sf_admin_edit_form/obj1/opretcon_codtip/obj2/opretcon_destip/campo1/codtip/campo2/destip','','','botoncat')?>

  <?php $value = object_input_tag($opretcon, 'getDestip', array (
  'disabled' => true,
  'control_name' => 'opretcon[destip]',
  'size' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

</div>
</fieldset>



<?php include_partial('edit_actions', array('opretcon' => $opretcon)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($opretcon->getId()): ?>
<?php echo button_to(__('delete'), 'pagretcon/delete?id='.$opretcon->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>


<script language="JavaScript" type="text/javascript">
 var id='<?php echo $opretcon->getId()?>';
 if (id)
 {
 	 $$('.botoncat')[0].disabled=true;
  	 $$('.botoncat')[1].disabled=true;
  	 $$('.botoncat')[2].disabled=true;
 }

  function confirmar()
  {
  	if ($('pertenece').value=='N' && ($('opretcon_codcon').value!=""))
  	{
  		alert('Este Concepto no se encuentra asociado a esta Nómina');
  		$('opretcon_codcon').value="";
  		$('opretcon_descon').value="";
  	}
  }
</script>
