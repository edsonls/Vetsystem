<section class="content-header">
    <h1>
        <?php echo __('Groups'); ?>         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Groups'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Group'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>        <a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>        <a href="<?php echo $this->Html->url(array('action' => 'edit', $group['Group']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>                                     
        <?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $group['Group']['id']),
                                                array('escape'=>false),
                                            __('Are you sure you want to delete # %s?',  $group['Group']['id'])
                                        );?>    </div>
    <div style="margin: 20px">
<?php if($group['Group']['name']){?>		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
<?php }?><?php if($group['Group']['alias']){?>		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($group['Group']['alias']); ?>
			&nbsp;
		</dd>
<?php }?><?php if($group['Group']['created']){?>		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</dd>
<?php }?><?php if($group['Group']['modified']){?>		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</dd>
<?php }?>	

<div class="related">
        
    <?php if (!empty($group['User'])): ?>
       <h3><?php echo __('Related Users'); ?></h3>
       <div class="panel panel-default">
            <div class="panel-heading" align="right">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw"></i></button></a>            </div>
            <div style="margin: 20px">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">                 
                    <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                           
                                    <th><?php echo __('username'); ?></th>
                                        <th><?php echo __('password'); ?></th>
                                        <th><?php echo __('group_id'); ?></th>
                                        <th><?php echo __('created'); ?></th>
                                        <th><?php echo __('modified'); ?></th>
                                        <th><?php echo __('status'); ?></th>
                                        <th><?php echo __('name'); ?></th>
                                        <th><?php echo __('email'); ?></th>
                                        <th><?php echo __('image'); ?></th>
                                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        </tr>
                        	<?php foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['username']; ?>&nbsp;</td>
			<td><?php echo $user['password']; ?>&nbsp;</td>
			<td><?php echo $user['group_id']; ?>&nbsp;</td>
			<td><?php echo $user['created']; ?>&nbsp;</td>
			<td><?php echo $user['modified']; ?>&nbsp;</td>
			<td><?php echo $user['status']; ?>&nbsp;</td>
			<td><?php echo $user['name']; ?>&nbsp;</td>
			<td><?php echo $user['email']; ?>&nbsp;</td>
			<td><?php echo $user['image']; ?>&nbsp;</td>
			<td class="actions">
				<div class="pull-right">
					<div class="btn-group">
						<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
							<i class="fa fa-gear fa-fw"></i>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li><a href="<?php echo $this->Html->url(array('controller' => 'users','action' => 'view', $user['id'])); ?>"><i class="fa fa-eye fa-fw"></i> View</a></li>
							<li><a href="<?php echo $this->Html->url(array('controller' => 'users','action' => 'edit', $user['id'])); ?>"><i class="fa fa-edit fa-fw"></i> Edit</a></li>
							<li><?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')). " Delete", array('controller' => 'users','action' => 'delete', $user['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $user['id']),array('class' => 'btn btn-mini'));?> </li>
						</ul>
					</div>
				</div>
			</td>
		</tr>
	<?php endforeach; ?>
                        </tbody>
                   </table>
                  
                    <br>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

 <script>
        $.extend( $.fn.dataTable.defaults, {
            "searching": false
        } );
        
        $('#dataTables-example').DataTable();
    </script>