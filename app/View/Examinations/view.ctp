<section class="content-header">
    <h1>
        <?php echo __('Examinations'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Examinations'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Examination'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $examination['Examination']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $examination['Examination']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $examination['Examination']['id'])
                                            );?>
        </section>
    </div>
    <div style="margin: 20px">
		<?php if($examination['Examination']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($this->Time->nice($examination['Examination']['created'],null,'%d/%m/%Y')); ?></dd>
		<?php }?><!-- 
		<?php if($examination['Examination']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($examination['Examination']['modified']); ?></dd>
		<?php }?> -->
		<?php if($examination['Examination']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($examination['Examination']['name']); ?></dd>
		<?php }?>
		<?php if($examination['Examination']['value']){?>
		<dt><?php echo __('Value'); ?></dt>
		<dd><?php echo h($examination['Examination']['value']); ?></dd>
		<?php }?>
	
<!-- 
        <div class="related">
                        
            <?php if (!empty($examination['Order'])): ?>
               <h3><?php echo __('Related Orders'); ?></h3>
               <div class="panel panel-default">
                    <div class="panel-heading" align="right">
                        <a href="<?php echo $this->Html->url(array('controller' => 'orders', 'action' => 'add')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw"></i></button></a>                    </div>
                    <div style="margin: 20px">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline table-responsive" role="grid">                 
                            <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                   
                                    <th><?php echo __('created'); ?></th>
                                        <th><?php echo __('modified'); ?></th>
                                        <th class="actions col-xs-1"><?php echo __('active'); ?></th>
                                        <th><?php echo __('animal_id'); ?></th>
                                        <th><?php echo __('clinic_id'); ?></th>
                                        <th><?php echo __('veterinarian_id'); ?></th>
                                        <th><?php echo __('payment_method_id'); ?></th>
                                        <th><?php echo __('discount'); ?></th>
                                        <th><?php echo __('status'); ?></th>
                                        <th><?php echo __('file'); ?></th>
                                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($examination['Order'] as $order): ?>
									<tr>
										<td><?php echo $order['created']; ?>&nbsp;</td>
										<td><?php echo $order['modified']; ?>&nbsp;</td>
										<td><?php if($order['active'] == 'S'){
                                                          echo '<span  class="btn-sm bg-green pull-right">'.__('Active').'</span>';
                                                       }else{
                                                          echo '<span  class="btn-sm bg-red pull-right">'.__('Inactive').'</span>';
                                                       } ?></td>
										<td><?php echo $order['animal_id']; ?>&nbsp;</td>
										<td><?php echo $order['clinic_id']; ?>&nbsp;</td>
										<td><?php echo $order['veterinarian_id']; ?>&nbsp;</td>
										<td><?php echo $order['payment_method_id']; ?>&nbsp;</td>
										<td><?php echo $order['discount']; ?>&nbsp;</td>
										<td><?php echo $order['status']; ?>&nbsp;</td>
										<td><?php echo $order['file']; ?>&nbsp;</td>
										<td class="actions">
											<div class="pull-right">
												<div class="btn-group">
													<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
														<i class="fa fa-gear fa-fw"></i>
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo $this->Html->url(array('controller' => 'orders','action' => 'view', $order['id'])); ?>"><i class="fa fa-eye fa-fw"></i> View</a></li>
														<li><a href="<?php echo $this->Html->url(array('controller' => 'orders','action' => 'edit', $order['id'])); ?>"><i class="fa fa-edit fa-fw"></i> Edit</a></li>
														<li><?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')). " Delete", array('controller' => 'orders','action' => 'delete', $order['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $order['id']),array('class' => 'btn btn-mini'));?> </li>
													</ul>
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
                                </tbody>
                            </table><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>|
<?php endif; ?> -->
<script>
    $.extend( $.fn.dataTable.defaults, {
        "searching": false
    } );
    
    $('#dataTables-example').DataTable();
</script>