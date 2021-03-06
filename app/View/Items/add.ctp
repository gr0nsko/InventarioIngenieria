<div class="items form">
<?php echo $this->Form->create('Item', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
	<?php
		echo $this->Form->input('item_description');
		echo $this->Form->input('item_unit_id', array('options' => $units));
		echo $this->Form->input('item_price');
		echo $this->Form->input('item_picture', array('type' => 'file'));
		echo $this->Form->input('item_category_id', array('options' => $categories));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
    <li><?php if($this->Session->check('Memento.counter')) echo $this->Form->postLink(__('Undo'), array('action' => 'setMemento'), array(), __('Are you sure you want to undo?')); ?> </li>
	</ul>
</div>
