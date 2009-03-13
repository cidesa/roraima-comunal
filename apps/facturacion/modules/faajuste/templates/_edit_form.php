<?php
// auto-generated by PropelCidesa
// date: 2008/11/18 23:35:15
?>
<?php echo form_tag('faajuste/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($faajuste, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe','facturacion/faajuste') ?>
<?php use_helper('Javascript', 'tabs', 'Grid') ?>

<?php echo input_hidden_tag('faajuste[codpro]', $faajuste->getCodpro()) ?>


<h2 class="h2" onclick="javascript: return $('divDatos del Ajuste').toggle();"><?php echo __('Datos del Ajuste') ?></h2>
<fieldset id="sf_fieldset_datos_del_ajuste" class="">

<div class="form-row" id="divDatos del Ajuste">

<table>
  <tr>
    <th>
		<div id="divrefaju">
		  <?php echo label_for('faajuste[refaju]', __($labels['faajuste{refaju}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('faajuste{refaju}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('faajuste{refaju}')): ?>
		    <?php echo form_error('faajuste{refaju}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($faajuste, 'getRefaju', array (
		  'size' => 8,
		  'control_name' => 'faajuste[refaju]',
		  'maxlength' => 8,
		  'onBlur'  => "javascript:event.keyCode=13; enters(event,this.value);",
		  'readonly'  =>  true,
		)); echo $value ? $value : '&nbsp;' ?>

		    </div>
		</div>
	</th>
	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
	<th>
		<div id="divfecaju">
		  <?php echo label_for('faajuste[fecaju]', __($labels['faajuste{fecaju}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
		  <div class="content<?php if ($sf_request->hasError('faajuste{fecaju}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('faajuste{fecaju}')): ?>
		    <?php echo form_error('faajuste{fecaju}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_date_tag($faajuste, 'getFecaju', array (
		  'rich' => true,
		  'calendar_button_img' => '/sf/sf_admin/images/date.png',
		  'control_name' => 'faajuste[fecaju]',
		  'date_format' => 'dd/MM/yyyy',
		  'maxlength' => 10,
		  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
		  'readonly'  =>  $faajuste->getId()!='' ? true : false ,
		 ),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

		    </div>
		</div>
	</th>
  </tr>
</table>

<br/>

<table>
  <tr>
    <th>
		<div id="divtipaju">
		  <?php echo label_for('faajuste[tipaju]', __($labels['faajuste{tipaju}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('faajuste{tipaju}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('faajuste{tipaju}')): ?>
		    <?php echo form_error('faajuste{tipaju}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

           <?php echo select_tag('faajuste[tipaju]', options_for_select(Constantes::ListaRefiereAjuste(),$faajuste->getTipaju(),'include_custom=Seleccione Uno'),array(
             'onchange' => "habilitarefere(this.id)",
             'onFocus'  =>  $faajuste->getId()!='' ? "this.blur()" : false ,
	       )) ?>

		    </div>
		</div>
	</th>
	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
	<th>
		<div id="divcodref">
		  <?php echo label_for('faajuste[codref]', __($labels['faajuste{codref}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('faajuste{codref}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('faajuste{codref}')): ?>
		    <?php echo form_error('faajuste{codref}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($faajuste, 'getCodref', array (
		  'size' => 20,
		  'control_name' => 'faajuste[codref]',
		  'readonly'  =>  $faajuste->getId()!='' ? true : false ,
		  'onBlur'=> remote_function(array(
				'update'   => 'divGrid',
		        'url'      => 'faajuste/grid',
		        'condition' => "$('faajuste_codref').value != '' && $('id').value == ''",
		        'complete' => 'AjaxJSON(request, json)',
		        'script'   => true,
		          'with' => "'ajax=1&cajtexmos=&cajtexcom=&codigo='+this.value+'&tipaju='+$('faajuste_tipaju').value"
		        )))); echo $value ? $value : '&nbsp;' ?>

		    </div>
		</div>
	</th>
	<th>
		<div id="divrefpedido">
	   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fapedido_Fanotent/clase/Fapedido/frame/sf_admin_edit_form/obj1/faajuste_codref/campo1/nroped/','','','botoncat')?></th>
		</div>
	</th>
	<th>
		<div id="divrefnotaentrega">
	   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Faajuste_Fanotent/clase/Fanotent/frame/sf_admin_edit_form/obj1/faajuste_codref/campo1/nronot/','','','botoncat')?></th>
		</div>
	</th>
	<th>
		<div id="divreffactura">
	   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Factura_Fanotent/clase/Fafactur/frame/sf_admin_edit_form/obj1/faajuste_codref/campo1/reffac/','','','botoncat')?></th>
		</div>
	</th>
  </tr>
</table>

<br/>

<table>
  <tr>
    <th>
		<div id="divcodpro">
		  <?php echo label_for('faajuste[rifpro]', __($labels['faajuste{rifpro}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('faajuste{rifpro}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('faajuste{rifpro}')): ?>
		    <?php echo form_error('faajuste{rifpro}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php //$value = get_partial('codcli', array('type' => 'edit', 'faajuste' => $faajuste)); echo $value ? $value : '&nbsp;' ?>

			<?php $value = object_input_tag($faajuste, 'getRifpro', array (
			  'size' => 20,
			  'control_name' => 'faajuste[rifpro]',
			  'readonly'  =>  true,
			  )); echo $value ? $value : '&nbsp;' ?>
			<th>
			   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Rifcli_Fapedido/clase/Facliente/frame/sf_admin_edit_form/obj1/faajuste_rifpro/obj2/faajuste_nompro/campo1/rifpro/campo2/nompro','','','botoncat')?></th>
			</th>
			<th>
			  <?php $value = object_input_tag($faajuste, 'getNompro', array (
			  'size' => 70,
			  'disabled' => true,
			  'control_name' => 'faajuste[nompro]',
			)); echo $value ? $value : '&nbsp;' ?>
			</th>

		    </div>
		</div>
	</th>
  </tr>
</table>

<br>

<table>
  <tr>
    <th>
		<div id="divdirpro">
		  <?php echo label_for('faajuste[dirpro]', __($labels['faajuste{dirpro}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('faajuste{dirpro}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('faajuste{dirpro}')): ?>
		    <?php echo form_error('faajuste{dirpro}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($faajuste, 'getDirpro', array (
		  'disabled' => true,
		  'size' => '100',
		  'control_name' => 'faajuste[dirpro]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
		</div>
	</th>
</table>

<br/>

<table>
	<th>
		<div id="divtelpro">
		  <?php echo label_for('faajuste[telpro]', __($labels['faajuste{telpro}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('faajuste{telpro}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('faajuste{telpro}')): ?>
		    <?php echo form_error('faajuste{telpro}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($faajuste, 'getTelpro', array (
		  'disabled' => true,
		  'control_name' => 'faajuste[telpro]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
		</div>
	</th>
  </tr>
</table>

<br>

<table>
  <tr>
    <th>
		<div id="divdesaju">
		  <?php echo label_for('faajuste[desaju]', __($labels['faajuste{desaju}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('faajuste{desaju}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('faajuste{desaju}')): ?>
		    <?php echo form_error('faajuste{desaju}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_textarea_tag($faajuste, 'getDesaju', array (
		  'size' => '90x3',
		  'maxlength'=>250,
		  'control_name' => 'faajuste[desaju]',
		  'readonly'  =>  $faajuste->getId()!='' ? true : false ,
		)); echo $value ? $value : '&nbsp;' ?>

		    </div>
		</div>
	</th>
  </tr>
</table>

<br/>

<table>
  <tr>
    <th>
		<div id="divmonaju">
		  <?php echo label_for('faajuste[monaju]', __($labels['faajuste{monaju}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('faajuste{monaju}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('faajuste{monaju}')): ?>
		    <?php echo form_error('faajuste{monaju}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($faajuste, 'getMonaju', array (
		  'size' => 20,
		  'readonly' => true,
		  'control_name' => 'faajuste[monaju]',
		),$default_value = number_format($value,2,',','.')); echo $value ? $value : '&nbsp;' ?>

		    </div>
		</div>
	</th>
  </tr>
</table>

</div>
</fieldset>

<div class="form-row" id="divGrid">
<!--<form name="form1" id="form1">-->
<?
echo grid_tag($obj);
?>
<!--</form>-->
</div>
<br/>
</div>
</fieldset>
<h2 class="h2" onclick="javascript: return $('divObservación').toggle();"><?php echo __('Observación') ?></h2>
<fieldset id="sf_fieldset_observaci__n" class="">

<div class="form-row" id="divObservación">
<div id="divobsaju">
  <?php echo label_for('faajuste[obsaju]', __($labels['faajuste{obsaju}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faajuste{obsaju}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faajuste{obsaju}')): ?>
    <?php echo form_error('faajuste{obsaju}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($faajuste, 'getObsaju', array (
  'size' => '90x3',
  'maxlength'=>250,
  'control_name' => 'faajuste[obsaju]',
  'readonly'  =>  $faajuste->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>
<br/>
</div>
</fieldset>

<?php include_partial('edit_actions', array('faajuste' => $faajuste)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($faajuste->getId()): ?>
<?php echo button_to(__('delete'), 'faajuste/delete?id='.$faajuste->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="javascript">
 $$('.botoncat')[2].disabled=true; //rif
 //$$('.botoncat')[3].disabled=true; //codalm
 $('divrefpedido').hide();
 $('divrefnotaentrega').hide();
 $('divreffactura').hide();

  function enters(e,valor)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('faajuste_refaju').value=valor;

   }
  }

 function habilitarefere(id)
 {
	 var neww='<?php echo $faajuste->getId()?>';
	 if ($(id).value!="" && neww=="")
	 {
	      $('faajuste_rifpro').value='';
	      $('faajuste_nompro').value='';
	      $('faajuste_telpro').value='';
	      $('faajuste_dirpro').value='';
	 	if ($(id).value=='P')
	 	{
	      $('faajuste_codref').readOnly=false;
	      $('faajuste_codref').value='';
	      $$('.botoncat')[1].disabled=false;
		  $('divrefnotaentrega').hide();
		  $('divreffactura').hide();
		  $('divrefpedido').show();
	 	}
	 	else if ($(id).value=='NE')
	 	{
	      $('faajuste_codref').readOnly=false;
	      $('faajuste_codref').value='';
	      $$('.botoncat')[0].disabled=false;
		  $('divrefnotaentrega').show();
		  $('divreffactura').hide();
		  $('divrefpedido').hide();
	 	}
	 	else if ($(id).value=='F')
	 	{
	      $('faajuste_codref').readOnly=false;
	      $('faajuste_codref').value='';
	      $$('.botoncat')[2].disabled=false;
		  $('divreffactura').show();
		  $('divrefpedido').hide();
		  $('divrefnotaentrega').hide();
	 	}
	 	else
	 	{
	      $('faajuste_codref').value='';
	 	}
	 }
	 else{
	      $('faajuste_codref').value='';
	      $('faajuste_codref').readOnly=true;
	      $$('.botoncat')[0].disabled=true;
	      $$('.botoncat')[1].disabled=true;
	      $('faajuste_rifpro').value='';
	      $('faajuste_nompro').value='';
	      $('faajuste_telpro').value='';
	      $('faajuste_dirpro').value='';
	 }
 }

</script>