[?php

/**
 *
 * @package    Roraima
 * @subpackage <?php echo $this->getGeneratedModuleName() ?>
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_actions.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?]

<ul class="sf_admin_actions">
<?php $editActions = $this->getParameterValue('edit.actions') ?>
<?php if (null !== $editActions): ?>
<?php foreach ((array) $editActions as $actionName => $params): ?>
  <?php if ($actionName == '_delete') continue ?>
  <?php echo $this->addCredentialCondition($this->getButtonToAction($actionName, $params, true), $params) ?>
<?php endforeach; ?>
<?php else: ?>
  <?php echo $this->getButtonToAction('_list', array(), true) ?>
  <?php echo $this->getButtonToAction('_save', array(), true) ?>
  <?php echo $this->getButtonToAction('_save_and_add', array(), true) ?>
<?php endif; ?>
</ul>
