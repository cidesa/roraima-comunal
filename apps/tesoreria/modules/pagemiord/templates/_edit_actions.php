<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/30 09:13:13
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'pagemiord/list?id='.$opordpag->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?php if ($opordpag->getStatus()!='A') {?>
    <li><?php /*echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
))*/?>

<input type="button" onclick="salvar2();" class="sf_admin_action_save" value="Guardar" name="save"/>

<script type="text/javascript">
  function salvar2(){
    if (!validarGridRetenciones()){
      //if (!validarGeneraComprobante()){
        if(!validarGridImputaciones()){
          f = document.sf_admin_edit_form;
          f.action = "/tesoreria_dev.php/pagemiord/save";
          f.submit();
        }
        else {
          alert('No puede Grabar sin llenar el Detalle de la Orden de Pago.');
        }
      //}else {
        //alert('No puede salvar sin generar el comprobante contable. Por favor haga click en el botón Generar Comprobante.');
      //}
    }else{
      alert('No puede grabar si no ha agregado y salvado las Retenciones. Agregue las Retenciones y luego presione el botón Salir.');
    }
  }

  function validarGridRetenciones(){
    var id = $('id').value;
    if (id==''){
      var optipcau = $('opordpag_tipcau').value;
      var ordpagnom = $('opnomina').value;
      var ordpagapo = $('opaporte').value;
      var ordpagliq = $('opliquidacion').value;
      var ordpagfid = $('opfideicomiso').value;

      if (optipcau != ordpagnom && optipcau != ordpagapo && optipcau != ordpagliq && optipcau != ordpagfid){
        var presiono = $('opordpag_presiono').value;
        if (presiono != 'S' && gridLleno('ex',1,20)){
          return true;
        }
        else {
          return false;
        }
      }
      else {
        return false;
      }
    }
    else {
      return false;
    }
  }

  function gridLleno(nombre, col, fil){
    var y = totalregistros(nombre,col,fil);
    if (y > 0){
      return true;
    }
    else {
      return false;
    }
  }

  function validarGeneraComprobante(){
    var id = $('id').value;
    if (id==''){
      var concom = $('opordpag_totalcomprobantes').value;
      var grabo = '';
      if (concom != 1){
        grabo = '<?php echo $sf_user->getAttribute('grabo',null,'sf_admin/pagemiord/confincomgen1')?>';
      }
      else {
        grabo = '<?php echo $sf_user->getAttribute('grabo',null,'sf_admin/pagemiord/confincomgen0')?>';
      }

      if(grabo == ''){
        return true;
      }
      else {
        return false;
      }
    }
    else {
      return false;
    }
  }

  function validarGridImputaciones(){
    var id = $('id').value;
    if (id==''){
      var afectapre = $('opordpag_afectapre').value;
      if(afectapre == 1){
        if(gridLleno('ax',2,50)){
          return false;
        }
        else{
          return true;
        }
      }
      else {
        return false;
      }
    }
    else {
      return false;
    }
  }
</script></li>
<?php }?>
    <li><?php echo button_to(__('create'), 'pagemiord/create', array (
  'class' => 'sf_admin_action_create',
  'confirm' => '¿Desea crear un nuevo registro?. Perderá cualquier cambio en la ventana actual',
)) ?></li>
  </ul>

