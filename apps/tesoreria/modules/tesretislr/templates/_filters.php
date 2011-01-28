<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/03 17:18:30
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('tesretislr/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="numord"><?php echo __('Cheque Nro.') ?></label>
    <div class="content">
    <?php echo input_tag('filters[numord]', isset($filters['numord']) ? $filters['numord'] : null, array (
  'size' => 8,
  'maxlength' => 8,
)) ?>
    </div>

<br>

    <label for="numdep"><?php echo __('Deposito Nro.') ?></label>
    <div class="content">
    <?php echo input_tag('filters[numdep]', isset($filters['numdep']) ? $filters['numdep'] : null, array (
  'size' => 15,
  'maxlength' => 20,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'tesretislr/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
