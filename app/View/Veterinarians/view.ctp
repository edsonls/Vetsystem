<section class="content-header">
    <h1>
        <?php echo __('Veterinarians'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Veterinarians'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Veterinarian'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $veterinarian['Veterinarian']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $veterinarian['Veterinarian']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $veterinarian['Veterinarian']['id'])
                                            );?>
        </section>
    </div>
    <div style="margin: 20px">
		<?php if($veterinarian['Veterinarian']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($this->Time->nice($veterinarian['Veterinarian']['created'],null,'%d/%m/%Y')); ?></dd>
		<?php }?><!-- 
		<?php if($veterinarian['Veterinarian']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['modified']); ?></dd>
		<?php }?> -->
		<?php if($veterinarian['Veterinarian']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['name']); ?></dd>
		<?php }?>
		<?php if($veterinarian['Veterinarian']['crmv']){?>
		<dt><?php echo __('Crmv'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['crmv']); ?></dd>
		<?php }?>
		<?php if($veterinarian['Veterinarian']['phone']){?>
		<dt><?php echo __('Phone'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['phone']); ?></dd>
		<?php }?>
		<?php if($veterinarian['Veterinarian']['phone_2']){?>
		<dt><?php echo __('Phone 2'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['phone_2']); ?></dd>
		<?php }?>
		<?php if($veterinarian['Veterinarian']['email']){?>
		<dt><?php echo __('Email'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['email']); ?></dd>
		<?php }?>
		<?php if($veterinarian['Veterinarian']['cep']){?>
		<dt><?php echo __('Cep'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['cep']); ?></dd>
		<?php }?>
		<?php if($veterinarian['Veterinarian']['address']){?>
		<dt><?php echo __('Address'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['address']); ?></dd>
		<?php }?>
		<?php if($veterinarian['Veterinarian']['neighborhood']){?>
		<dt><?php echo __('Neighborhood'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['neighborhood']); ?></dd>
		<?php }?>
		<?php if($veterinarian['Veterinarian']['city']){?>
		<dt><?php echo __('City'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['city']); ?></dd>
		<?php }?>
		<?php if($veterinarian['Veterinarian']['uf']){?>
		<dt><?php echo __('Uf'); ?></dt>
		<dd><?php echo h($veterinarian['Veterinarian']['uf']); ?></dd>
		<?php }?>
	

        <div class="related">
                        
            <?php if (!empty($veterinarian['Order'])): ?>
               <h3><?php echo __('Related Order Services'); ?></h3>
               <div class="panel panel-default">
                    <div class="panel-heading" align="right">
                        <a href="<?php echo $this->Html->url(array('controller' => 'order_services', 'action' => 'add')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw"></i></button></a>                    </div>
                    <div style="margin: 20px">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline table-responsive" role="grid">                 
                            <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                   
                                    <th><?php echo __('N° Order Service'); ?></th>
                                        <th><?php echo __('created'); ?></th><!-- 
                                        <th class="actions col-xs-1"><?php echo __('active'); ?></th>
                                        <th><?php echo __('animal_id'); ?></th>
                                        <th><?php echo __('clinic_id'); ?></th>
                                        <th><?php echo __('veterinarian_id'); ?></th>
                                        <th><?php echo __('payment_method_id'); ?></th>
                                        <th><?php echo __('discount'); ?></th>
                                        <th><?php echo __('status'); ?></th>
                                        <th><?php echo __('file'); ?></th> -->
                                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($veterinarian['Order'] as $orderService): ?>
									<tr>
										<td><?php echo $orderService['id']; ?>&nbsp;</td>
										<td><?php echo $this->Time->nice($orderService['created'],null,'%d/%m/%Y'); ?>&nbsp;</td><!-- 
										<td><?php if($orderService['active'] == 'S'){
                                                          echo '<span  class="btn-sm bg-green pull-right">'.__('Active').'</span>';
                                                       }else{
                                                          echo '<span  class="btn-sm bg-red pull-right">'.__('Inactive').'</span>';
                                                       } ?></td>
										<td><?php echo $orderService['animal_id']; ?>&nbsp;</td>
										<td><?php echo $orderService['clinic_id']; ?>&nbsp;</td>
										<td><?php echo $orderService['veterinarian_id']; ?>&nbsp;</td>
										<td><?php echo $orderService['payment_method_id']; ?>&nbsp;</td>
										<td><?php echo $orderService['discount']; ?>&nbsp;</td>
										<td><?php echo $orderService['status']; ?>&nbsp;</td>
										<td><?php echo $orderService['file']; ?>&nbsp;</td> -->
										<td class="actions">
											<div class="pull-right">
												<div class="btn-group">
													<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
														<i class="fa fa-gear fa-fw"></i>
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo $this->Html->url(array('controller' => 'orders','action' => 'view', $orderService['id'])); ?>"><i class="fa fa-eye fa-fw"></i> View</a></li>
														<li><a href="<?php echo $this->Html->url(array('controller' => 'orders','action' => 'edit', $orderService['id'])); ?>"><i class="fa fa-edit fa-fw"></i> Edit</a></li>
														<li><?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')). " Delete", array('controller' => 'orders','action' => 'delete', $orderService['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $orderService['id']),array('class' => 'btn btn-mini'));?> </li>
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
<?php endif; ?>
<script>
    $.extend( $.fn.dataTable.defaults, {
        "searching": false
    } );
    
    $('#dataTables-example').DataTable();
</script>