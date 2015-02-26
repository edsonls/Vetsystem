<section class="content-header">
    <h1>
        <?php echo __('Clients'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li class="active"><?php echo __('Clients'); ?></li>
    </ol>
</section>
<div class="clients index" style="margin: 20px" >
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
                            <th class="actions col-xs-1"><?php echo $this->Paginator->sort(__('active')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('name')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('cpf')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('rg')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('date_birth')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('phone')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('phone_2')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('email')); ?></th>
                           <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Clients', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                    	    <td><?php //echo $this->Form->input('created', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All created')));?></td>
                            <?php $options = array('S' => __('Active'),'N' => __('Inactive'));?>
                            <td class="actions col-xs-1"><?php echo $this->Form->input('active', array('label' => '','default' => '','style'=>'width:100%','empty' => __('Status'),'class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','options' => $options));?></td>
                            <td><?php echo $this->Form->input('name', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All name')));?></td>
                            <td><?php echo $this->Form->input('cpf', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All cpf')));?></td>
                            <td><?php echo $this->Form->input('rg', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All rg')));?></td>
                            <td><?php //echo $this->Form->input('date_birth', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All date_birth')));?></td>
                            <td><?php echo $this->Form->input('phone', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All phone')));?></td>
                            <td><?php echo $this->Form->input('phone_2', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All phone_2')));?></td>
                            <td><?php echo $this->Form->input('email', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All email')));?></td>
                            <td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary')) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                		<?php foreach ($clients as $client): ?>
						<tr>
						<td><?php echo h($this->Time->nice($client['Client']['created'],null,'%d/%m/%Y')); ?>&nbsp;</td>
							<td><?php if($client['Client']['active'] == 'S'){
                              echo '<span  class="btn-sm bg-green pull-right">'.__('Active').'</span>';
                           }else{
                              echo '<span  class="btn-sm bg-red pull-right">'.__('Inactive').'</span>';
                           } ?></td>
						<td><?php echo h($client['Client']['name']); ?>&nbsp;</td>
						<td><?php echo h($client['Client']['cpf']); ?>&nbsp;</td>
						<td><?php echo h($client['Client']['rg']); ?>&nbsp;</td>
						<td><?php echo h($this->Time->nice($client['Client']['date_birth'],null,'%d/%m/%Y')); ?>&nbsp;</td>
						<td><?php echo h($client['Client']['phone']); ?>&nbsp;</td>
						<td><?php echo h($client['Client']['phone_2']); ?>&nbsp;</td>
						<td><?php echo h($client['Client']['email']); ?>&nbsp;</td>
							<td class="actions">
								<div class="pull-right">
									<div class="btn-group">
										<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
											<i class="fa fa-gear fa-fw"></i>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $client['Client']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $client['Client']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $client['Client']['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $client['Client']['id']),array('class' => 'btn btn-mini'));?> </li>
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
