<section class="content-header">
    <h1>
        <?php echo __('Orders'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Orders'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Order'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $order['Order']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $order['Order']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $order['Order']['id'])
                                            );?>
        </section>
    </div>
    <div style="margin: 20px">
		<?php if($order['Order']['id']){?>
		<dt><?php echo __('OS'); ?></dt>
		<dd><?php echo h($order['Order']['id']); ?></dd>
		<?php }?>
		<?php if($order['Order']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($this->Time->nice($order['Order']['created'],null,'%d %B %Y')); ?></dd>
		<?php }?>
		<?php if($order['Order']['animal_id']){?>
		<dt><?php echo __('Animal'); ?></dt>
		<dd><?php echo $this->Html->link(h($order['Animal']['name']), array('controller' => 'animals', 'action' => 'view', $order['Animal']['id'])); ?></dd>
		<?php }?>
		<?php if($order['Order']['clinic_id']){?>
		<dt><?php echo __('Clinic'); ?></dt>
		<dd><?php echo $this->Html->link($order['Clinic']['name'], array('controller' => 'clinics', 'action' => 'view', $order['Clinic']['id'])); ?></dd>
		<?php }?>
		<?php if($order['Order']['veterinarian_id']){?>
		<dt><?php echo __('Veterinarian'); ?></dt>
		<dd><?php echo $this->Html->link($order['Veterinarian']['name'], array('controller' => 'veterinarians', 'action' => 'view', $order['Veterinarian']['id'])); ?></dd>
		<?php }?>
		<?php if($order['Order']['payment_method_id']){?>
		<dt><?php echo __('Payment Method'); ?></dt>
		<dd><?php echo $this->Html->link($order['PaymentMethod']['name'], array('controller' => 'payment_methods', 'action' => 'view', $order['PaymentMethod']['id'])); ?></dd>
		<?php }?>
		<?php if($order['Order']['discount']){?>
		<dt><?php echo __('Discount'); ?></dt>
		<dd><?php echo h($order['Order']['discount']); ?></dd>
		<?php }?>
		<?php if($order['Examination']){?>
		<dt><?php echo __('Total'); ?></dt>
		<dd><?php $total=0;
		foreach ($order['Examination'] as $examination){
			$total=$total+$examination['value'];
						}
		echo h($total-$order['Order']['discount']); ?></dd>
		<?php }?>
		<?php if($order['Order']['status']){?>
		<dt><?php echo __('Status'); ?></dt>
		<dd><?php if($order['Order']['status'] == 0){
              echo '<span  class="btn-sm bg-red">'.__('In analysis').'</span>';
           }else{
              echo '<span  class="btn-sm bg-green">'.__('Completed').'</span>';
           }?></dd>
		<?php }?>
		<?php if($order['Order']['file']){?>
		<dt><?php echo __('File'); ?></dt>
		<dd><?php echo $this->Html->link(__('Result'),'/'.$order['Order']['file']);?>
		</dd>
		<?php }?>
	

        <div class="related">
                        
            <?php if (!empty($order['Examination'])): ?>
               <h3><?php echo __('Related Examinations'); ?></h3>
               <div class="panel panel-default">
                    <div class="panel-heading" align="right">
                        <a href="<?php echo $this->Html->url(array('controller' => 'examinations', 'action' => 'add')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw"></i></button></a>                    </div>
                    <div style="margin: 20px">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline table-responsive" role="grid">                 
                            <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th><?php echo __('created'); ?></th>
                                        <th class="actions col-xs-1"><?php echo __('active'); ?></th>
                                        <th><?php echo __('name'); ?></th>
                                        <th><?php echo __('value'); ?></th>
                                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($order['Examination'] as $examination): ?>
									<tr>
										<td><?php echo $this->Time->nice($examination['created'],null,'%d %B %Y'); ?>&nbsp;</td>
										<td><?php if($examination['active'] == 'S'){
                                                          echo '<span  class="btn-sm bg-green pull-right">'.__('Active').'</span>';
                                                       }else{
                                                          echo '<span  class="btn-sm bg-red pull-right">'.__('Inactive').'</span>';
                                                       } ?></td>
										<td><?php echo $examination['name']; ?>&nbsp;</td>
										<td><?php echo $examination['value']; ?>&nbsp;</td>
										<td class="actions">
											<div class="pull-right">
												<div class="btn-group">
													<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
														<i class="fa fa-gear fa-fw"></i>
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo $this->Html->url(array('controller' => 'examinations','action' => 'view', $examination['id'])); ?>"><i class="fa fa-eye fa-fw"></i> View</a></li>
														<li><a href="<?php echo $this->Html->url(array('controller' => 'examinations','action' => 'edit', $examination['id'])); ?>"><i class="fa fa-edit fa-fw"></i> Edit</a></li>
														<li><?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')). " Delete", array('controller' => 'examinations','action' => 'delete', $examination['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $examination['id']),array('class' => 'btn btn-mini'));?> </li>
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