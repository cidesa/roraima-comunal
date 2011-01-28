<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/28 15:45:55
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('pagretcon/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codnom"><?php echo __('Cód. Nómina:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codnom]', isset($filters['codnom']) ? $filters['codnom'] : null, array (
  'size' => 3,
  'maxlength' => 3,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="codcon"><?php echo __('Cód. Concepto:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codcon]', isset($filters['codcon']) ? $filters['codcon'] : null, array (
  'size' => 3,
  'maxlength' => 3,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="codtip"><?php echo __('Cód. Retención:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codtip]', isset($filters['codtip']) ? $filters['codtip'] : null, array (
  'size' => 3,
  'maxlength' => 3,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'pagretcon/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
