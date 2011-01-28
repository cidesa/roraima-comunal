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
<?php echo form_tag('tesmovseglib/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>
<?php echo object_input_hidden_tag($tsmovlib, 'getId') ?>
<input id="idrefer" name="idrefer" type="hidden" value="<? print $tsmovlib->getIdrefer(); ?>">
<input id="ctaeje" name="ctaeje" type="hidden" value="<? print $ctaeje; ?>">
<input id="desctaeje" name="desctaeje" type="hidden" value="<? print $desctaeje; ?>">
<input id="ctaingdif" name="ctaingdif" type="hidden" value="<? print $ctaingdif; ?>">
<input id="desctaingdif" name="desctaingdif" type="hidden" value="<? print $desctaingdif; ?>">
<input id="ctaing" name="ctaing" type="hidden" value="<? print $ctaing; ?>">
<input id="desctaing" name="desctaing" type="hidden" value="<? print $desctaing; ?>">
<input id="numcomadi" name="numcomadi" type="hidden" value="<? print $tsmovlib->getNumcomadi(); ?>">
<input id="feccomadi" name="feccomadi" type="hidden" value="<? print $tsmovlib->getFeccomadi(); ?>">
<input id="compadic" name="comapdic" type="hidden" value="<? print $compadic; ?>">
<input id="fechacom" name="fechacom" type="hidden" value="<? print $tsmovlib->getFeccom(); ?>">
<input id="numcom" name="numcom" type="hidden" value="<? print $tsmovlib->getNumcom(); ?>">
<input id="refpag" name="refpag" type="hidden" value="<? print $tsmovlib->getRefpag(); ?>">
<input id="formulario" name="formulario" type="hidden">
<?php echo input_hidden_tag('tsmovlib[savemovcero]', $tsmovlib->getSavemovcero()) ?>

<table width="100%">
  <tr>
    <th width="800"></th>
    <th width="200"><strong><font color="<? print $color;?>" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $eti;?></font></strong></th>
    <th width="100"></th>
    <?php if ($tsmovlib->getId()!='')
    {?>
	    <th><input name="C" type="button" value="Comprobante" onClick="mostrarC()"></th>
	    <th><input name="O" type="button" value="Ordenes Pago Canceladas" onClick="mostrarO();"></th>
    <?}?>
  </tr>
</table>

<fieldset>
<h2><?php echo __('Datos del Movimiento')?></h2>
<div class="form-row">
  <?php echo label_for('tsmovlib[numcue]', __($labels['tsmovlib{numcue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{numcue}')): ?>
    <?php echo form_error('tsmovlib{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('tsmovlib[numcue]', $tsmovlib->getNumcue(),
    'tesmovseglib/autocomplete?ajax=1',  array('autocomplete' => 'off','size' => 25, 'maxlength' => 20,
    'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
        'url'      => 'tesmovseglib/ajax',
        'condition' => "$('tsmovlib_numcue').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=tsmovlib_nomcue&cajtexcom=tsmovlib_numcue&codigo='+this.value",

        ))),
     array('use_style' => 'true')
  )
  ?><?php echo input_hidden_tag('tsmovlib[ctacon]', $tsmovlib->getCtacon()) ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsmovlib_tesmovdeglib/clase/Tsdefban/frame/sf_admin_edit_form/obj1/tsmovlib_numcue/obj2/tsmovlib_nomcue/obj3/tsmovlib_ctacon/campo1/numcue/campo2/nomcue/campo3/codcta/param1/1','','','botoncat')?>

<?php $value = object_input_tag($tsmovlib, 'getNomcue', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'tsmovlib[nomcue]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>

  <table>
  <tr>
   <th>
      <?php echo label_for('tsmovlib[reflib]', __($labels['tsmovlib{reflib}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('tsmovlib{reflib}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('tsmovlib{reflib}')): ?>
        <?php echo form_error('tsmovlib{reflib}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($tsmovlib, 'getReflib', array (
      'size' => 12,
      'maxlength' => 8,
      'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
      'control_name' => 'tsmovlib[reflib]',
      'onBlur'  => "javascript: reflib(this.value);",
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
   <?php echo label_for('tsmovlib[feclib]', __($labels['tsmovlib{feclib}']), 'class="required" Style="width:130px"') ?>
      <div class="content<?php if ($sf_request->hasError('tsmovlib{feclib}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('tsmovlib{feclib}')): ?>
        <?php echo form_error('tsmovlib{feclib}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_date_tag($tsmovlib, 'getFeclib', array (
      'rich' => true,
      'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'tsmovlib[feclib]',
      'date_format' => 'dd/MM/yy',
      'onkeyup' => "javascript: mascara(this,'/',patron,true)",
      'onchange'  => "javascript: fecmov(this.value);",
      'onblur'  => "javascript: fecmov(this.value);",
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
   </th>
  </tr>
  </table>

<div id="divbene" style="display:none">
<br>
<?php echo label_for('tsmovlib[cedrif]', __($labels['tsmovlib{cedrif}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{cedrif}')): ?>
    <?php echo form_error('tsmovlib{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_tag($tsmovlib, 'getCedrif', array (
  'size' => 10,
  'maxlength' => 15,
  'control_name' => 'tsmovlib[cedrif]',  
  'onBlur'=> remote_function(array(
        'url'      => 'tesmovseglib/ajax',
        'condition' => "$('tsmovlib_cedrif').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=6&cajtexmos=tsmovlib_nomben&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
 &nbsp;
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Pagemiord/clase/Opbenefi/frame/sf_admin_edit_form/obj1/tsmovlib_cedrif/obj2/tsmovlib_nomben/campo1/cedrif/campo2/nomben','','','botoncat')?>
&nbsp;
 <?php $value = object_input_tag($tsmovlib, 'getNomben', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'tsmovlib[nomben]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>

<?php if ($tsmovlib->getId()!='')
    {?>
    	<br>
  <?php echo label_for('tsmovlib[refpag]', __($labels['tsmovlib{refpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{refpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{refpag}')): ?>
    <?php echo form_error('tsmovlib{refpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovlib, 'getRefpag', array (
  'size' => 20,
  'control_name' => 'tsmovlib[refpag]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<?}?>

<div class="form-row" id="divx" style="display : none">
<form name="form1" id="form1">
<? echo grid_tag($obj);?>
</form>
</div>

<br>

  <?php echo label_for('tsmovlib[tipmov]', __($labels['tsmovlib{tipmov}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{tipmov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{tipmov}')): ?>
    <?php echo form_error('tsmovlib{tipmov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('tsmovlib[tipmov]', $tsmovlib->getTipmov(),
    'tesmovseglib/autocomplete?ajax=2',  array('autocomplete' => 'off','size' => 5, 'maxlength' => 4,
    'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
        'url'      => 'tesmovseglib/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('tsmovlib_tipmov').value != '' && $('id').value == ''",
          'with' => "'ajax=2&cajtexmos=tsmovlib_destip&cajtexcom=tsmovlib_tipmov&codigo='+this.value",

        ))),
     array('use_style' => 'true')
  )
  ?>&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp3/clase/Tstipmov/frame/sf_admin_edit_form/obj1/tsmovlib_tipmov/obj2/tsmovlib_destip/obj3/tsmovlib_debcre/campo1/codtip/campo2/destip/campo3/debcre','','','botoncat')?>

  <?php $value = object_input_tag($tsmovlib, 'getDestip', array (
  'disabled' => true,
  'size' => 50,
  'maxlength' => 80,
  'control_name' => 'tsmovlib[destip]',
   )); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('tsmovlib[debcre]', $tsmovlib->getDebcre()) ?> <?php echo input_hidden_tag('tsmovlib[codcon]', $tsmovlib->getCodcon()) ?>
  <?php echo input_hidden_tag('tsmovlib[ctaeje]', $tsmovlib->getCtaeje()) ?>
    </div>

<br>

  <?php echo label_for('tsmovlib[deslib]', __($labels['tsmovlib{deslib}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{deslib}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{deslib}')): ?>
    <?php echo form_error('tsmovlib{deslib}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovlib, 'getDeslib', array (
  'size' => 120,
  'readonly'  =>  ($tsmovlib->getId()!='' && $tsmovlib->getSavecedrif()!='S') ? true : false ,
  'maxlength' => 4000,
  'control_name' => 'tsmovlib[deslib]',
  'onBlur'  => "javascript: deslib()",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <table>
   <tr>
    <th>
    <?php echo label_for('tsmovlib[monmov]', __($labels['tsmovlib{monmov}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{monmov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{monmov}')): ?>
    <?php echo form_error('tsmovlib{monmov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovlib, array('getMonmov',true), array (
  'size' => 12,
  'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
  'control_name' => 'tsmovlib[monmov]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('tsmovlib_fecing').focus();}",
//  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
    'onBlur'=> "javascript:event.keyCode=13;entermontootro(event, this.id); ".remote_function(array(
        'url'      => 'tesmovseglib/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('tsmovlib_monmov').value != '0,00' && $('id').value == ''",
          'with' => "'ajax=5&cajtexmos=tsmovlib_monmov&monmov='+this.value+'&numcue='+$('tsmovlib_numcue').value+'&tipmov='+$('tsmovlib_tipmov').value+'&feclib='+$('tsmovlib_feclib').value",

        )),
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
    <th>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
      <?php echo label_for('tsmovlib[fecing]', __($labels['tsmovlib{fecing}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{fecing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{fecing}')): ?>
    <?php echo form_error('tsmovlib{fecing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_date_tag($tsmovlib, 'getFecing', array (
  'rich' => true,
  'size' => '10',
  'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsmovlib[fecing]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
</div>
    </th>
   </tr>
  </table>
</div>
</fieldset>


<fieldset>
<h2><?php echo __('Comprobante Contable')?></h2>
<div class="form-row">
  <?php echo label_for('tsmovlib[numcom]', __($labels['tsmovlib{numcom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{numcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{numcom}')): ?>
    <?php echo form_error('tsmovlib{numcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovlib, 'getNumcom', array (
  'size' => 20,
  'readonly'  =>  ($tsmovlib->getId()!='' || $gencorrel=='S') ? true : false ,
  'control_name' => 'tsmovlib[numcom]',
  'onBlur' => "javascript:event.keyCode=13; enter(event,this.value,this.id);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('tsmovlib[feccom]', __($labels['tsmovlib{feccom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{feccom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{feccom}')): ?>
    <?php echo form_error('tsmovlib{feccom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsmovlib, 'getFeccom', array (
  'rich' => true,
  'size' => '10',
  'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsmovlib[feccom]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <?php echo label_for('label1', __('Descripción'), 'class="required" ') ?>
    <?php $value = object_input_tag($tsmovlib, 'getDeslib', array (
  'size' => 120,
  'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
  'control_name' => 'descom',
  'onBlur'  => "javascript: document.getElementById('descom').value=document.getElementById('tsmovlib_deslib').value",
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;<br><br>
<? if ($tsmovlib->getId()=='') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'tesmovseglib/ajax',
         'before'   => 'if ($("tsmovlib_debcre").value=="C"){ var dc="D"}else { var dc="C"}',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=3&reftra='+document.getElementById('tsmovlib_reflib').value+'&tipo='+document.getElementById('tsmovlib_tipmov').value+'&fectra='+document.getElementById('tsmovlib_feccom').value+'&grabar=N'+'&destra='+document.getElementById('descom').value.replace(/%/gi,'*')+'&ctas='+document.getElementById('tsmovlib_ctacon').value+'_'+document.getElementById('tsmovlib_ctaeje').value+'&tipmov=X&mov='+document.getElementById('tsmovlib_debcre').value+'_'+dc+'&montos='+document.getElementById('tsmovlib_monmov').value+'_'+document.getElementById('tsmovlib_monmov').value+'&formulario=sf_admin/tesmovseglib/confincomgen&numcom='+$('tsmovlib_numcom').value.replace(/#/gi,'*')")
         ,array('id' => 'btncompro',)) ?>
<? }?>
</div>

<div id="comp">
<form name="form1" id="form1">
<?

?>
</form>
</div>

</fieldset>



<?php include_partial('edit_actions', array('tsmovlib' => $tsmovlib)) ?>

</form>
<script>
deshabilitarbotones();
function deshabilitarbotones()
  { var id="";
    var id='<?php echo $tsmovlib->getId()?>';
    var savecedrif='<?php echo $tsmovlib->getSavecedrif()?>';
    if (savecedrif=='S') $('divbene').show();
    if (id!="")
    {
     $$('.botoncat')[0].disabled=true;
  	 //$$('.botoncat')[1].disabled=true;
         $$('.botoncat')[2].disabled=true;
   	 $('trigger_tsmovlib_feclib').hide();
  	 $('trigger_tsmovlib_feccom').hide();
    }

    var deshab='<?php echo $bloqfec; ?>';
    if (deshab=='S')
    {
    	$('trigger_tsmovlib_fecing').hide();
    	$('tsmovlib_fecing').readOnly=true;
    	$('trigger_tsmovlib_feccom').hide();
    	$('tsmovlib_feccom').readOnly=true;
    }     
  }


  function comprobante(formulario)
  {
      window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }


  function anular()
  {
    if (confirm('¿Desea Anular el Movimiento Segun Libros?')) {
      var numcue=document.getElementById('tsmovlib_numcue').value;
      var reflib=document.getElementById('tsmovlib_reflib').value;
      var refpag=document.getElementById('refpag').value;
      var feclib=document.getElementById('tsmovlib_feclib').value;
      var compadic=document.getElementById('compadic').value;
      window.open('/tesoreria_dev.php/tesmovseglib/anular?numcue='+numcue+'&reflib='+reflib+'&refpag='+refpag+'&feclib='+feclib+'&compadic='+compadic,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
    }
  }

  function eliminar()
  {
    if (confirm('¿Desea Eliminar el Movimiento Segun Libros?')) {
      var numcue=document.getElementById('tsmovlib_numcue').value;
      var reflib=document.getElementById('tsmovlib_reflib').value;
      var refpag=document.getElementById('refpag').value;
      var feclib=document.getElementById('tsmovlib_feclib').value;
      var monmov=document.getElementById('tsmovlib_monmov').value;
      var numcom=document.getElementById('tsmovlib_numcom').value;
      var feccom=document.getElementById('tsmovlib_feccom').value;
      var tipmov=document.getElementById('tsmovlib_tipmov').value;
      var numcomadi=document.getElementById('numcomadi').value;
      var feccomadi=document.getElementById('feccomadi').value;
      var compadic=document.getElementById('compadic').value;
      var debcre=document.getElementById('tsmovlib_debcre').value;
      location.href='/tesoreria_dev.php/tesmovseglib/ajax?ajax=4&numcue='+numcue+'&reflib='+reflib+'&refpag='+refpag+'&feclib='+feclib+'&numcom='+numcom+'&feccom='+feccom+'&tipmov='+tipmov+'&debcre='+debcre+'&monmov='+monmov+'&numcomadi='+numcomadi+'&feccomadi='+feccomadi+'&compadic='+compadic;
    }
  }

</script>


<script type="text/javascript">
function mostrarO()
{
  var id='<?php print $tsmovlib->getId(); ?>';
  if (id!='')
  {
    if (document.getElementById('divx').style.display=="block")
    {
      document.getElementById('divx').style.display="none";
    }
    else
    {
      document.getElementById('divx').style.display="block";
    }
  }
}

  function validar()
  {
    if ((document.getElementById('tsmovlib_numcue').value!='') &&
      (document.getElementById('tsmovlib_debcre').value!='') &&
      (document.getElementById('tsmovlib_monmov').value!='') &&
      (document.getElementById('tsmovlib_numcom').value!='') &&
      (document.getElementById('tsmovlib_feccom').value!='') &&
      (document.getElementById('descom').value!=''))
      {return true;}else{ return false;}
  }

  function mostrarC()
  {
    window.open('/tesoreria_dev.php/confincomgen/edit/id/'+document.getElementById('idrefer').value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
</script>

<ul class="sf_admin_actions">

<?
$mod=true;
if ($tsmovlib->getId()!='' && $anular=='S' && $tsmovlib->getTipmov()!='ANUC') { ?>
<li class="float-rigth">
  <input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
</li>
<?php if ($oculeli!="S") { ?>
<li class="float-rigth">
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
</li>
<?php } ?>
 <script type="text/javascript">
 	//$('eliminarboton').hide();
  //$('eliminarboton').hide();

 </script>
<?
$mod=false;
} ?>
  </ul>

<script language="JavaScript" type="text/javascript">
function reflib(v)
{
  var mod='<? print $mod;?>';
  var genco='<?php echo $gencorrel?>';
  if (mod)
  {
  	valor=v;
  	valor=valor.pad(8, '0',0);
  	document.getElementById('tsmovlib_reflib').value=valor;
  	if (genco!='S') {
            document.getElementById('tsmovlib_numcom').value= document.getElementById('tsmovlib_reflib').value;
            document.getElementById('tsmovlib_numcom').readOnly=true;
        }

  }
}

 function fecmov(v)
{
  var mod='<? print $mod;?>';
  var deshab='<?php echo $bloqfec; ?>';
  if (mod && deshab!="S")
  {
  	document.getElementById('tsmovlib_feccom').value= document.getElementById('tsmovlib_feclib').value;
  	$('tsmovlib_tipmov').focus();
  }
}

function deslib()
{
  var mod='<? print $mod;?>';
  if (mod)
  {
  	document.getElementById('descom').value=document.getElementById('tsmovlib_deslib').value;
  }
}


</script>
