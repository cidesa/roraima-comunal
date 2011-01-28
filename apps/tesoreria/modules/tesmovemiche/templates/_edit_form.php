<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 16:38:19
?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tesoreria/tesmovemiche', 'tools', 'observe', 'grid') ?>

<?php echo form_tag('tesmovemiche/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tscheemi, 'getId') ?>
<?php echo input_hidden_tag('desctacre', '') ?>
<?php echo input_hidden_tag('ctapag', '') ?>
<?php echo input_hidden_tag('tscheemi[operacion]', $tscheemi->getOperacion() ) ?>
<?php echo input_hidden_tag('totalcomprobantes', '') ?>
<?php echo input_hidden_tag('tipdocact',  $tscheemi->getTipdoc()) ?>
<?php echo input_hidden_tag('tscheemi[bloqueado]',  $tscheemi->getBloqueado()) ?>
<div id="sf_admin_container">
<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Datos del Cheque')?></legend>
<div class="form-row">
  <?php echo label_for('tscheemi[tipdoc]', __($labels['tscheemi{tipdoc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{tipdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{tipdoc}')): ?>
    <?php echo form_error('tscheemi{tipdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('tscheemi[tipdoc]', $tscheemi->getTipdoc(),
    'tesmovemiche/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 4, 'size' => 23, 'onBlur'=> remote_function(array(
       'update'   => 'divGrid',
       'url'      => 'tesmovemiche/ajax',
       'condition' => "$('tscheemi_tipdoc').value != '' && $('tscheemi_tipdoc').value != $('tipdocact').value ",
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=1&cajtexmos=tscheemi_destip&cajtexcom=tscheemi_tipdoc&mostrardato=N&tipdoc='+this.value"
        ))),
     array('use_style' => 'true')
  )
  ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdocpag_Tesmovemiche/clase/Cpdocpag/frame/sf_admin_edit_form/obj1/tscheemi_tipdoc/obj2/tscheemi_destip/campo1/tippag/campo2/nomext')?>

&nbsp;
  <?php $value = object_input_tag($tscheemi, 'getDestip', array (
   'disabled' => true,
  'control_name' => 'tscheemi[destip]',
  'size'=> 60,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
  <?php echo label_for('tscheemi[numcue]', __($labels['tscheemi{numcue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numcue}')): ?>
    <?php echo form_error('tscheemi{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('tscheemi[numcue]', $tscheemi->getNumcue(),
    'tesmovemiche/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 20, 'size' => 23, 'onBlur'=> remote_function(array(
        'url'      => 'tesmovemiche/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('tscheemi_numcue').value != ''",
          'with' => "'ajax=3&cajtexmos=tscheemi_nomcue&cajtexcom=tscheemi_numcue&bloq='+$('tscheemi_bloqueado').value+'&codigo='+this.value+'&tipdoc='+$('tscheemi_tipdoc').value"
        ))),
     array('use_style' => 'true')
  )
?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsdefban_Tesmovemiche/clase/Tsdefban/frame/sf_admin_edit_form/obj1/tscheemi_numcue/obj2/tscheemi_nomcue/campo1/numcue/campo2/nomcue')?>

&nbsp;
  <?php $value = object_input_tag($tscheemi, 'getNomcue', array (
  'disabled' => true,
  'control_name' => 'tscheemi[nomcue]',
  'size'=> 60,
)); echo $value ? $value : '&nbsp;' ?>  <?php echo input_hidden_tag('tscheemi[nomrep]',  $tscheemi->getNomrep()) ?>
    </div>
<br>
<div id="divnumche">
<?php echo label_for('tscheemi[numche]', __($labels['tscheemi{numche}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numche}')): ?>
    <?php echo form_error('tscheemi{numche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($tscheemi, 'getNumche', array (
  'size' => 23,
  'control_name' => 'tscheemi[numche]',
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>
<br/>
  <?php echo label_for('tscheemi[cedrif]', __($labels['tscheemi{cedrif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{cedrif}')): ?>
    <?php echo form_error('tscheemi{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo input_auto_complete_tag('tscheemi[cedrif]', $tscheemi->getCedrif(),
    'tesmovemiche/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 20, 'size' => 23, 'onBlur'=> remote_function(array(
         'update'   => 'divGrid',
         'url'      => 'tesmovemiche/ajax',
         'script'   => true,
          'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=2&cajtexmos=tscheemi_nomben&cajtexcom=tscheemi_cedrif&mostrardato=S&operacion='+document.getElementById('tscheemi_operacion').value+'&tipdoc='+document.getElementById('tscheemi_tipdoc').value+'&numcue='+document.getElementById('tscheemi_numcue').value+'&fecemi='+document.getElementById('tscheemi_fecemi').value+'&cedrif='+this.value"
     ))),
     array('use_style' => 'true')
  )
?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Tesmovemiche/clase/Opbenefi/frame/sf_admin_edit_form/obj1/tscheemi_cedrif/obj2/tscheemi_nomben/campo1/cedrif/campo2/nomben')?>

&nbsp;
  <?php $value = object_input_tag($tscheemi, 'getNomben', array (
  'disabled' => true,
  'control_name' => 'tscheemi[nomben]',
  'size' => 60,
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
  <?php echo label_for('tscheemi[nombensus]', __($labels['tscheemi{nombensus}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{nombensus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{nombensus}')): ?>
    <?php echo form_error('tscheemi{nombensus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNombensus', array (
  'size' => 80,
  'control_name' => 'tscheemi[nombensus]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('tscheemi[fecemi]', __($labels['tscheemi{fecemi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fecemi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fecemi}')): ?>
    <?php echo form_error('tscheemi{fecemi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
 <?php $value = object_input_date_tag($tscheemi, 'getFecemi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tscheemi[fecemi]',
  'date_format' => 'dd/MM/yyyy',
 'onkeyup' => "javascript: mascara(this,'/',patron,true)",
 'onBlur'=> remote_function(array(
         'update'   => 'divGrid',
         'url'      => 'tesmovemiche/ajax',
         'script'   => true,
          'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=2&cajtexmos=tscheemi_nomben&cajtexcom=tscheemi_cedrif&mostrardato=S&operacion='+document.getElementById('tscheemi_operacion').value+'&tipdoc='+document.getElementById('tscheemi_tipdoc').value+'&fecemi='+document.getElementById('tscheemi_fecemi').value+'&cedrif='+document.getElementById('tscheemi_cedrif').value"
     ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<? if ($comprobaut!='S') { ?>
  <?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comprobante',
         'url'      => 'tesmovemiche/comprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
    )) ?><?php }?>
    </div>
</div>
</fieldset>
</div>

<div id="divGrid">
  <?php include_partial('tesmovemiche/grid', array('tscheemi' => $tscheemi, 'gridOrdPag' => $gridOrdPag, 'gridCompro' => $gridCompro, 'gridPrecom' => $gridPrecom, 'gridPagdir' => $gridPagdir, 'mensajeBen' => $mensajeBen, 'bloqueaopc' => $bloqueaopc, 'valoropc' => $valoropc)) ?>
</div>

<div id="comprobante">
</div>
<?php include_partial('edit_actions', array('tscheemi' => $tscheemi)) ?>
</form>
<?
  $pdfparform="n";

  $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';

  $configyml = sfYaml::load($dirrepconfig);


  if(is_array($configyml)){
    if(array_key_exists('tesoreria',$configyml)) $pdfparform = $configyml["tesoreria"]["tsrvoucher"]["parameterform"];
  }

?>
<script type="text/javascript">
var deshab='<?php echo $bloqfec; ?>';
if (deshab=='S')
{
	$('trigger_tscheemi_fecemi').hide();
	$('tscheemi_fecemi').readOnly=true;
} 

var impche='<?php if($tscheemi->getEscheque()==true && $tscheemi->getId()!="") echo $impche; else echo 'N'?>';

var numcomegr='<?php echo $numcomegr; ?>';
if (numcomegr!="")
{
  alert_('El N&uacute;mero de Comprobante de Egresos es: '+numcomegr);
}

if (impche=='S')
{
    if(confirm("¿Desea imprimir el/los Cheques emitidos?"))
    {
      var  numches='<? print $numches;?>';
      var  numcues='<? print $numcues;?>';
      var  mosparform='<? print $pdfparform;?>';
      var anumche=numches.split(",");
      var anumcue=numcues.split(",");
      var nombrerep='<?php echo $tscheemi->getNomrep();?>';
	  for (r=0;r<anumche.length;r++)
	  {
	  	var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
             if (nombrerep!="")
             {
		if (mosparform=='S')
		{
			pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/"+nombrerep+".php?numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
		}else
		{
			pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r="+nombrerep+".php&numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
		}
             }else {
                if (mosparform=='S')
		{
			pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/tsrvoucher.php?numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
		}else
		{
			pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r=tsrvoucher.php&numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
		}
             }
		window.open(pagina,anumche[r],"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
		
	  }
    }
}



</script>
