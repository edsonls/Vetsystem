<section class="content-header">
    <h1>
        <?php echo __('Expenses'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li class="active"><?php echo __('Expenses'); ?></li>
    </ol>
</section>
<div class="expenses index" style="margin: 20px" >
    <div class="panel panel-default">
        <div class="panel-heading" align="right">
            <section class="content-header">
                <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', '', array('class' => 'fa fa-refresh fa-fw')), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(), array('escape' => false)); ?>
                <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', '', array('class' => 'fa fa-plus fa-fw')), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'add')), array('escape' => false)); ?>
            </section>
        </div>
        <div class="table-responsive">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid" style="margin: 20px">                 
                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                	<thead>
                	   <tr>
                    	<th><?php echo $this->Paginator->sort(__('created')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('modified')); ?></th>
                            <th class="actions col-xs-1"><?php echo $this->Paginator->sort(__('active')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('type')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('status')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('name')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('value')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('date_payment')); ?></th>
                            <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Expenses', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                    	    <td><?php echo $this->Form->input('created', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All created')));?></td>
                            <td><?php echo $this->Form->input('modified', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All modified')));?></td>
                            <?php $options = array('S' => __('Active'),'N' => __('Inactive'));?>
                            <td class="actions col-xs-1"><?php echo $this->Form->input('active', array('label' => '','default' => '','style'=>'width:100%','empty' => __('Status'),'class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','options' => $options));?></td>
                            <td><?php echo $this->Form->input('type', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All type')));?></td>
                            <td><?php echo $this->Form->input('status', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All status')));?></td>
                            <td><?php echo $this->Form->input('name', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All name')));?></td>
                            <td><?php echo $this->Form->input('value', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All value')));?></td>
                            <td><?php echo $this->Form->input('date_payment', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All date_payment')));?></td>
                            <td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary')) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                		<?php foreach ($expenses as $expense): ?>
						<tr>
						<td><?php echo h($expense['Expense']['created']); ?>&nbsp;</td>
						<td><?php echo h($expense['Expense']['modified']); ?>&nbsp;</td>
							<td><?php if($expense['Expense']['active'] == 'S'){
                              echo '<span  class="btn-sm bg-green pull-right">'.__('Active').'</span>';
                           }else{
                              echo '<span  class="btn-sm bg-red pull-right">'.__('Inactive').'</span>';
                           } ?></td>
						<td><?php echo h($expense['Expense']['type']); ?>&nbsp;</td>
						<td><?php echo h($expense['Expense']['status']); ?>&nbsp;</td>
						<td><?php echo h($expense['Expense']['name']); ?>&nbsp;</td>
						<td><?php echo h($expense['Expense']['value']); ?>&nbsp;</td>
						<td><?php echo h($expense['Expense']['date_payment']); ?>&nbsp;</td>
							<td class="actions">
								<div class="pull-right">
									<div class="btn-group">
										<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
											<i class="fa fa-gear fa-fw"></i>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $expense['Expense']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $expense['Expense']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $expense['Expense']['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $expense['Expense']['id']),array('class' => 'btn btn-mini'));?> </li>
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
                ?>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    <?php
						echo $this->Paginator->prev('<<', array('tag' => 'li','class' => 'prev',), $this->Paginator->link('<<', array()), array('tag' => 'li', 'escape' => false,'class' => 'prev disabled',));
						echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );
						echo $this->Paginator->next('>>', array('tag' => 'li','class' => 'next',), $this->Paginator->link('>>', array()), array('tag' => 'li', 'escape' => false,'class' => 'next disabled',));
					?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
