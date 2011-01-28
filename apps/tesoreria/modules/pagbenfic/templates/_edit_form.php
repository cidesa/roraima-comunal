<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 20:39:24
?>
<?php echo form_tag('pagbenfic/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('dFilter', 'tools','observe', 'ajax') ?>
<?php echo object_input_hidden_tag($opbenefi, 'getId') ?>
<?php echo input_hidden_tag('cargable', '') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Beneficiario') ?></legend>
<div class="form-row">
<table>
 <tr>
  <th>
<?php echo label_for('opbenefi[cedrif]', __($labels['opbenefi{cedrif}']), 'class="required" ') ?>
    <div
      class="content<?php if ($sf_request->hasError('opbenefi{cedrif}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('opbenefi{cedrif}')): ?> <?php echo form_error('opbenefi{cedrif}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
       <?php $value = object_input_tag($opbenefi, 'getCedrif', array (
      'size' => 20,
      'control_name' => 'opbenefi[cedrif]',
      'readonly' => $opbenefi->getId()!='' ? true : false ,
      'maxlength' => 15,
      )); echo $value ? $value : '&nbsp;' ?>
  </div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
 <fieldset><legend><?php echo __('Tipo de Persona')?></legend>
      <div class="form-row"><?php if($opbenefi->getTipper()=='N') $val = true; else $val=false; ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Natural ".radiobutton_tag('opbenefi[tipper]', 'N', $val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Jurídico ".radiobutton_tag('opbenefi[tipper]', 'J', !$val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      </div>
      </fieldset>
  </th>
 </tr>
 <tr>
 <th>
  <?php echo label_for('opbenefi[nitben]', __($labels['opbenefi{nitben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{nitben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{nitben}')): ?>
    <?php echo form_error('opbenefi{nitben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNitben', array (
  'size' => 20,
  'control_name' => 'opbenefi[nitben]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
 </tr>
</table>

<br>

    <?php echo label_for('opbenefi[nomben]', __($labels['opbenefi{nomben}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{nomben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{nomben}')): ?>
    <?php echo form_error('opbenefi{nomben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNomben', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'opbenefi[nomben]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

 <table>
  <tr>
  <th>
  <fieldset><legend><?php echo __('Nacionalidad')?></legend>
      <div class="form-row"><?php if($opbenefi->getNacionalidad()=='V') $val = true; else $val=false; ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'."Venezolano ".radiobutton_tag('opbenefi[nacionalidad]', 'V', $val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>&nbsp;
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Extranjero ".radiobutton_tag('opbenefi[nacionalidad]', 'E', !$val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      </div>
      </fieldset>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
   <fieldset><legend><?php echo __('Residente')?></legend>
      <div class="form-row"><?php if($opbenefi->getResidente()=='S') $val = true; else $val=false; ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Si             ".radiobutton_tag('opbenefi[residente]', 'S', $val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."No             ".radiobutton_tag('opbenefi[residente]', 'N', !$val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      </div>
      </fieldset>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
    <fieldset><legend><?php echo __('Constituida')?></legend>
    <div class="form-row"><?php if($opbenefi->getConstituida()=='S') $val = true; else $val=false; ?>
    <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'."Si ".radiobutton_tag('opbenefi[constituida]', 'S', $val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
     <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'."No ".radiobutton_tag('opbenefi[constituida]', 'N', !$val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
    </div>
    </fieldset>
  </th>
  </tr>
 </table>

 <br>

<?php echo label_for('opbenefi[dirben]', __($labels['opbenefi{dirben}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{dirben}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{dirben}')): ?> <?php echo form_error('opbenefi{dirben}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getDirben', array (
'size' => 80,
'control_name' => 'opbenefi[dirben]',
'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[telben]', __($labels['opbenefi{telben}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{telben}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{telben}')): ?> <?php echo form_error('opbenefi{telben}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getTelben', array (
'size' => 20,
'maxlength' => 32,
'control_name' => 'opbenefi[telben]',
'onBlur' =>"javascript:event.keyCode=13; return num(event)",
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Cuentas');?>
<fieldset>
<div class="form-row">
<?php echo label_for('opbenefi[codcta]', __($labels['opbenefi{codcta}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codcta}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codcta}')): ?> <?php echo form_error('opbenefi{codcta}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodcta', array (
  'size' => 32,
  'control_name' => 'opbenefi[codcta]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codcta","opbenefi_nomcuentacont")',
        'condition' => "$('opbenefi_codcta').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentacont&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codcta/obj2/opbenefi_nomcuentacont/campo1/codcta/campo2/descta/param1/1')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentacont', array (
'size' => 62,
'maxlength' => 32,
'disabled' => true,
'control_name' => 'opbenefi[nomcuentacont]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>

<br>

<?php echo label_for('opbenefi[codord]', __($labels['opbenefi{codord}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codord}')): ?> <?php echo form_error('opbenefi{codord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodord', array (
  'size' => 32,
  'control_name' => 'opbenefi[codord]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codord","opbenefi_nomcuentaord")',
        'condition' => "$('opbenefi_codord').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentaord&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codord/obj2/opbenefi_nomcuentaord/campo1/codcta/campo2/descta/param1/2')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentaord', array (
  'size' => 62,
  'maxlength' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentaord]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codpercon]', __($labels['opbenefi{codpercon}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codpercon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codpercon}')): ?> <?php echo form_error('opbenefi{codpercon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodpercon', array (
  'size' => 32,
  'control_name' => 'opbenefi[codpercon]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codpercon","opbenefi_nomcuentapercon")',
        'condition' => "$('opbenefi_codpercon').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentapercon&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?> &nbsp;
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codpercon/obj2/opbenefi_nomcuentapercon/campo1/codcta/campo2/descta/param1/3')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentapercon', array (
  'size' => 62,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentapercon]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codtipben]', __($labels['opbenefi{codtipben}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codtipben}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codtipben}')): ?> <?php echo form_error('opbenefi{codtipben}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('opbenefi[codtipben]', $opbenefi->getCodtipben(),
    'pagbenfic/autocomplete?ajax=1', array ('size' => 20, 'autocomplete' => 'off', 'maxlength' => 3, 'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opbenefi_codtipben').value != '' && $('id').value == ''",
        'with' => "'ajax=2&cajtexcom=opbenefi_codtipben&cajtexmos=opbenefi_tipobene&codigo='+this.value"
        ))),
   array('use_style' => 'true',)
  )
?>&nbsp;&nbsp;
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Optipben_Pagbenfi/clase/Optipben/frame/sf_admin_edit_form/obj1/opbenefi_codtipben/obj2/opbenefi_tipobene/campo1/codtipben/campo2/destipben')?>

<?php $value = object_input_tag($opbenefi, 'getTipobene', array (
  'size' => 62,
  'maxlength' => 50,
  'disabled' => true,
  'control_name' => 'opbenefi[tipobene]',
  )); echo $value ? $value : '&nbsp;' ?></div></div>

</fieldset>
<?php tabPageOpenClose("tp1", "tabPage2", 'Otras Cuentas (Actividad Secundaria)');?>
<fieldset>
<div class="form-row">
<?php echo label_for('opbenefi[codctasec]', __($labels['opbenefi{codctasec}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codctasec}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codctasec}')): ?> <?php echo form_error('opbenefi{codctasec}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodctasec', array (
  'size' => 32,
  'control_name' => 'opbenefi[codctasec]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codctasec","opbenefi_nomcuentacontsecun")',
        'condition' => "$('opbenefi_codctasec').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentacontsecun&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>

    <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codctasec/obj2/opbenefi_nomcuentacontsecun/campo1/codcta/campo2/descta/param1/6')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentacontsecun', array (
  'size' => 62,
  'maxlength' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentacontsecun]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codordadi]', __($labels['opbenefi{codordadi}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codordadi}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codordadi}')): ?> <?php echo form_error('opbenefi{codordadi}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodordadi', array (
  'size' => 32,
  'control_name' => 'opbenefi[codordadi]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codordadi","opbenefi_nomcuentaordsecun")',
        'condition' => "$('opbenefi_codordadi').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentaordsecun&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
      <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codordadi/obj2/opbenefi_nomcuentaordsecun/campo1/codcta/campo2/descta/param1/4')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentaordsecun', array (
  'size' => 62,
  'maxlength' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentaordsecun]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codperconadi]', __($labels['opbenefi{codperconadi}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codperconadi}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codperconadi}')): ?> <?php echo form_error('opbenefi{codperconadi}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodperconadi', array (
  'size' => 32,
  'control_name' => 'opbenefi[codperconadi]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codperconadi","opbenefi_nomcuentaperconsecun")',
        'condition' => "$('opbenefi_codperconadi').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentaperconsecun&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
        <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codperconadi/obj2/opbenefi_nomcuentaperconsecun/campo1/codcta/campo2/descta/param1/5')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentaperconsecun', array (
  'size' => 62,
  'maxlength' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentaperconsecun]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codctacajchi]', __($labels['opbenefi{codctacajchi}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codctacajchi}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codctacajchi}')): ?> <?php echo form_error('opbenefi{codctacajchi}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodctacajchi', array (
  'size' => 32,
  'control_name' => 'opbenefi[codctacajchi]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codctacajchi","opbenefi_nomctacajchi")',
        'condition' => "$('opbenefi_codctacajchi').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomctacajchi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
       <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codctacajchi/obj2/opbenefi_nomctacajchi/campo1/codcta/campo2/descta/param1/7')?>

<?php $value = object_input_tag($opbenefi, 'getNomctacajchi', array (
  'size' => 62,
  'maxlegth' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomctacajchi]',
  )); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>
  <?php tabInit('tp1','0');?>
<?php include_partial('edit_actions', array('opbenefi' => $opbenefi)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($opbenefi->getId()): ?>
<?php echo button_to(__('delete'), 'pagbenfic/delete?id='.$opbenefi->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
function num(e) {
    evt = e ? e : event;
    tcl = (window.Event) ? evt.which : evt.keyCode;
    if ((tcl < 48 || tcl > 57 ) && tcl != '8')
    {
        return false;
    }
    return true;
}

function verificar(id,id2)
{
  if ($('cargable').value!='C' && $(id).value!="")
  {
  	alert('La Cuenta Contable no es Cargable, Por favor Cambiela por una Cuenta Cargable');
  	$(id).value="";
  	$(id2).value="";
  	$('cargable').value="";

  }
}
</script>