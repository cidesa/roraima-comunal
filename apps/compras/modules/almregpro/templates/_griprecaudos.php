<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<div class="divrecaudos">
<?php
	echo grid_tag_v2($caprovee->getObjrecaudos());
?>
</div>
