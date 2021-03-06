<div class="categories view">
<h2><?php echo __('Category - Editor'); ?></h2>
	<dl>
		<dt><?php echo __('Category ID'); ?></dt>
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
    <dt><?php echo __('Parent Category ID'); ?></dt>
		<dd>
			<?php echo h($category['Category']['category_parent_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php if ($category['Category']['category_id'] != -1 && $category['Category']['category_id'] != 0) echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['category_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index', "editor")); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index', "editor")); ?> </li>
  </ul>
  <h3><?php echo __('Profiles'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Basic View'), array('controller' => 'categories', 'action' => 'view', $category['Category']['category_id'], "basic")); ?> </li>
    <li><?php echo $this->Html->link(__('Advanced View'), array('controller' => 'categories', 'action' => 'view', $category['Category']['category_id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Items'); ?></h3>
	<?php if (!empty($category['CategoryItems'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Item Description'); ?></th>
		<th><?php echo __('Item Unit Id'); ?></th>
		<th><?php echo __('Item Price'); ?></th>
		<th><?php echo __('Item Picture'); ?></th>
		<th><?php echo __('Item Category Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['CategoryItems'] as $categoryItems): ?>
		<tr>
			<td><?php echo $categoryItems['item_id']; ?></td>
			<td><?php echo $categoryItems['item_description']; ?></td>
			<td><?php echo $categoryItems['item_unit_id']; ?></td>
			<td><?php echo $categoryItems['item_price']; ?></td>
			<td><?php echo $categoryItems['item_picture']; ?></td>
			<td><?php echo $categoryItems['item_category_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $categoryItems['item_id'], "editor")); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'items', 'action' => 'edit', $categoryItems['item_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
