<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/26 17:34:14
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('pretipfin/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codfin"><?php echo __('Codigo del Financiamiento') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codfin]', isset($filters['codfin']) ? $filters['codfin'] : null, array (
  'size' => 4,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codfin').value=valor;",
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'pretipfin/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
