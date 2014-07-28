<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Category Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['category_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category Description'); ?></dt>
		<dd>
			<?php echo h($category['Category']['category_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category Level'); ?></dt>
		<dd>
			<?php echo h($category['Category']['category_level']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['category_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['category_id']), array(), __('Are you sure you want to delete # %s?', $category['Category']['category_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Category'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Items'); ?></h3>
	<?php if (!empty($category['ItemCategory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Item Description'); ?></th>
		<th><?php echo __('Item Unit Type'); ?></th>
		<th><?php echo __('Item Price'); ?></th>
		<th><?php echo __('Item Picture'); ?></th>
		<th><?php echo __('Item Category Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['ItemCategory'] as $itemCategory): ?>
		<tr>
			<td><?php echo $itemCategory['item_id']; ?></td>
			<td><?php echo $itemCategory['item_description']; ?></td>
			<td><?php echo $itemCategory['item_unit_type']; ?></td>
			<td><?php echo $itemCategory['item_price']; ?></td>
			<td><?php echo $itemCategory['item_picture']; ?></td>
			<td><?php echo $itemCategory['item_category_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $itemCategory['item_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'items', 'action' => 'edit', $itemCategory['item_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'items', 'action' => 'delete', $itemCategory['item_id']), array(), __('Are you sure you want to delete # %s?', $itemCategory['item_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item Category'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>