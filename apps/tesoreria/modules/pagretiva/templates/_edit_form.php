<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 20:33:35
?>
<?php echo form_tag('pagretiva/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tsretiva, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo grid_tag($obj);?>

<?php echo input_hidden_tag('exisrecar', '') ?>
<?php echo input_hidden_tag('exisret', '') ?>
<?php echo input_hidden_tag('filas', $fila) ?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('tsretiva' => $tsretiva)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($tsretiva->getId()): ?>
<?php echo button_to(__('delete'), 'pagretiva/delete?id='.$tsretiva->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
 function ajax2(e,id)
 {
   if ($(id).value!="")
   {
    valor=$(id).value;
 	valor=valor.pad(4,"0",0);
 	$(id).value=valor;
   }

    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var coltip=col+2;
    var colpar=col+4;
    var colmonto=col+3;
    var descripcion=name+"_"+fil+"_"+coldes;
    var tipo=name+"_"+fil+"_"+coltip;
    var monto=name+"_"+fil+"_"+colmonto;
    var partida=name+"_"+fil+"_"+colpar;
    var cod=$(id).value;

     if (e.keyCode==13 || e.keyCode==9)
    {
    if ($(id).value!='')
    {
    new Ajax.Request('/tesoreria_dev.php/pagretiva/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id)}, parameters:'ajax=2&cajtexmos='+descripcion+'&cajtexcom='+id+'&tipo='+tipo+'&monto='+monto+'&partida='+partida+'&codigo='+cod})
    }
    }
 }

  function validargrid(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var colpart=col+4;
   var descripcion=name+"_"+fila+"_"+coldes;
   var partida=name+"_"+fila+"_"+colpart;

  if ($('exisrecar').value=='N' && $(id).value!="")
  {
   alert('El Recargo no Existe');
  	$(id).value="";
	$(descripcion).value="";
	$(partida).value="";

  }
  else
  {
  	if (retencion_repetido(id))
   {
	alert('El Recargo ya esta asociado a esa Retención');
	$(id).value="";
	$(descripcion).value="";
	$(partida).value="";
   }
  }

 }
  function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
  }


  function retencion_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var colret=col-2;
   var ret=name+"_"+fila+"_"+colret;
   var retencion_recargo=$(ret).value+$(id).value;

   var retencionrepetido=false;
   var fil=parseInt($('filas').value);
   var cal=fil+10;
   var am=totalregistros('ax',1,cal);

   var i=0;
   while (i<(am))
   {
    var retencion="ax"+"_"+i+"_1"
    var recargo="ax"+"_"+i+"_3";

    var retencion_recargo2=$(retencion).value+$(recargo).value;

    if (i!=fila)
    {
      if (retencion_recargo==retencion_recargo2)
      {
        retencionrepetido=true;
        break;
      }
    }
   i++;
   }
   return retencionrepetido;
 }


 function ajax(e,id)
 {
   if ($(id).value!="")
   {
    valor=$(id).value;
 	valor=valor.pad(3,"0",0);
 	$(id).value=valor;
   }

    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descripcion=name+"_"+fil+"_"+coldes;
    var cod=$(id).value;

     if (e.keyCode==13 || e.keyCode==9)
    {
     if ($(id).value!='')
    {
     new Ajax.Request('/tesoreria_dev.php/pagretiva/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validar(id);}, parameters:'ajax=1&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
    }
    }
 }

 function validar(id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descripcion=name+"_"+fil+"_"+coldes;

 	if ($('exisret').value=='N')
 	{
 		alert('La Retención no Existe');
 		$(id).value="";
 		$(descripcion).value="";
 	}
 }
</script>
