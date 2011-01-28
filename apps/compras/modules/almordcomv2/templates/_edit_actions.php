<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_actions.php 37062 2010-03-12 15:10:58Z dmartinez $
 */
// date: 2007/12/13 09:59:14
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'almordcomv2/list?id='.$caordcom->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?php if ($caordcom->getStaord()!='N') { ?>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
<?php  } ?>
      <li><?php echo button_to(__('create'), 'almordcomv2/create', array (
  'class' => 'sf_admin_action_create',
  'confirm' => '¿Desea crear un nuevo registro?. Perderá cualquier cambio en la ventana actual',
)) ?></li>
</ul>

<script language="JavaScript" type="text/javascript">
  var tiecom='<?php echo $caordcom->getCompro(); ?>';
  var oculsave='<?php echo $caordcom->getOculsave(); ?>';
  if (tiecom=='S' && oculsave=='S') $('save').hide();
</script>
