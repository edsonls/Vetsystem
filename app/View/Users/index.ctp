<section class="content-header">
    <h1>
        <?php echo __('Users'); ?>        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li class="active"><?php echo __('Users'); ?></li>
    </ol>
</section>
<div class="users index" style="margin: 20px" >
    <div class="panel panel-default">
        <div class="panel-heading" align="right">
            <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', '', array('class' => 'fa fa-refresh fa-fw')), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(), array('escape' => false)); ?>            <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', '', array('class' => 'fa fa-plus fa-fw')), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'add')), array('escape' => false)); ?>        </div>
        <div class="table-responsive">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid" style="margin: 20px">                 
                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                	<thead>
                	<tr>
                	<th class="actions col-xs-1"><?php echo $this->Paginator->sort(__('active')); ?></th>
                        <th><?php echo $this->Paginator->sort(__('username')); ?></th>
                        <th><?php echo $this->Paginator->sort(__('group_id')); ?></th>
                        <th><?php echo $this->Paginator->sort(__('created')); ?></th>
                        <th><?php echo $this->Paginator->sort(__('name')); ?></th>
                        <th><?php echo $this->Paginator->sort(__('email')); ?></th>
                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	</tr>
                	</thead>
                	<tbody>
                	<?php foreach ($users as $user): ?>
					<tr>
						<td><?php if($user['User']['active'] == 'S'){
                              echo '<span  class="btn-sm bg-green">'.__('Active').'</span>';
                           }else{
                              echo '<span  class="btn-sm bg-red">'.__('Inactive').'</span>';
                           } ?></td>
						<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
						<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
						<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
						<td class="actions">
							<div class="pull-right">
								<div class="btn-group">
									<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
										<i class="fa fa-gear fa-fw"></i>
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu pull-right" role="menu">
										<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $user['User']['id'])), array('escape' => false)); ?></li>										<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $user['User']['id'])), array('escape' => false)); ?></li>										<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $user['User']['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $user['User']['id']),array('class' => 'btn btn-mini'));?> </li>
									</ul>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
                	</tbody>
    	       </table>
    	        <?php
                echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                ));
                ?>                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    <?php
		echo $this->Paginator->prev('<<', array('tag' => 'li','class' => 'prev',), $this->Paginator->link('<<', array()), array('tag' => 'li', 'escape' => false,'class' => 'prev disabled',));		echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );		echo $this->Paginator->next('>>', array('tag' => 'li','class' => 'next',), $this->Paginator->link('>>', array()), array('tag' => 'li', 'escape' => false,'class' => 'next disabled',));	?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
