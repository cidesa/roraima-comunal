<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/21 16:26:43
?>
<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'fordefpryaccmet/edit?id='.$fordefpryaccmet->getId().'&codpro='.$fordefpryaccmet->getCodpro().'&accion='.$fordefpryaccmet->getCodaccesp()) ?></li>
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'fordefpryaccmet/delete?id='.$fordefpryaccmet->getId().'&codpro='.$fordefpryaccmet->getCodpro().'&accion='.$fordefpryaccmet->getCodaccesp(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
)) ?></li>
</ul>
</td>