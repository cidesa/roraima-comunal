[?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?]

<table cellspacing="0" class="sf_admin_list">
<thead>
<tr>
[?php include_partial('list_th_<?php echo $this->getParameterValue('list.layout', 'tabular') ?>') ?]
<?php if ($this->getParameterValue('list.object_actions')): ?>
  <th id="sf_admin_list_th_sf_actions">[?php echo __('Actions') ?]</th>
<?php endif; ?>
</tr>
</thead>
<tfoot>
<tr><th colspan="<?php echo $this->getParameterValue('list.object_actions') ? count($this->getColumns('list.display')) + 1 : count($this->getColumns('list.display')) ?>">
<div class="float-right">
[?php if ($pager->haveToPaginate()): ?]
  [?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/first.png', array('align' => 'absmiddle', 'alt' => __('First'), 'title' => __('First'))), '<?php echo $this->getModuleName() ?>/list?page=1') ?]
  [?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', array('align' => 'absmiddle', 'alt' => __('Previous'), 'title' => __('Previous'))), '<?php echo $this->getModuleName() ?>/list?page='.$pager->getPreviousPage()) ?]

  [?php foreach ($pager->getLinks() as $page): ?]
    [?php echo link_to_unless($page == $pager->getPage(), $page, '<?php echo $this->getModuleName() ?>/list?page='.$page) ?]
  [?php endforeach; ?]

  [?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', array('align' => 'absmiddle', 'alt' => __('Next'), 'title' => __('Next'))), '<?php echo $this->getModuleName() ?>/list?page='.$pager->getNextPage()) ?]
  [?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/last.png', array('align' => 'absmiddle', 'alt' => __('Last'), 'title' => __('Last'))), '<?php echo $this->getModuleName() ?>/list?page='.$pager->getLastPage()) ?]
[?php endif; ?]
</div>
[?php echo format_number_choice('[0] sin resultados|[1] 1 resultado|(1,+Inf] %1% resultados', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?]
</th></tr>
</tfoot>
<tbody>
[?php $i = 1; foreach ($pager->getResults() as $<?php echo $this->getSingularName() ?>): $odd = fmod(++$i, 2) ?]
<tr class="sf_admin_row_[?php echo $odd ?]">
[?php include_partial('list_td_<?php echo $this->getParameterValue('list.layout', 'tabular') ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
[?php include_partial('list_td_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
</tr>
[?php endforeach; ?]
</tbody>
</table>
