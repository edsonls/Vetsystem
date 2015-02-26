<section class="content-header">
    <h1>
        <?php echo __('Payment Methods'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Payment Methods'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Payment Method'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $paymentMethod['PaymentMethod']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $paymentMethod['PaymentMethod']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $paymentMethod['PaymentMethod']['id'])
                                            );?>
        </section>
    </div>
    <div style="margin: 20px">
		<?php if($paymentMethod['PaymentMethod']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($this->Time->nice($paymentMethod['PaymentMethod']['created'],null,'%d/%m/%Y')); ?></dd>
		<?php }?><!-- 
		<?php if($paymentMethod['PaymentMethod']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($paymentMethod['PaymentMethod']['modified']); ?></dd>
		<?php }?> -->
		<?php if($paymentMethod['PaymentMethod']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($paymentMethod['PaymentMethod']['name']); ?></dd>
		<?php }?>
	

        <div class="related">
                        
            <?php if (!empty($paymentMethod['Order'])): ?>
               <h3><?php echo __('Related Order Services'); ?></h3>
               <div class="panel panel-default">
                    <div class="panel-heading" align="right">
                        <a href="<?php echo $this->Html->url(array('controller' => 'orders', 'action' => 'add')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw"></i></button></a>                    </div>
                    <div style="margin: 20px">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline table-responsive" role="grid">                 
                            <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                   
                                        <th><?php echo __('N° Order Services'); ?></th>
                                    	<th><?php echo __('created'); ?></th>
                                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($paymentMethod['Order'] as $order): ?>
									<tr>
										<td><?php echo $order['id']; ?>&nbsp;</td>
										<td><?php echo $this->Time->nice($order['created'],null,'%d/%m/%Y'); ?>&nbsp;</td>
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
<?php endif; ?>


<script>
    $.extend( $.fn.dataTable.defaults, {
        "searching": false
    } );
    
    $('#dataTables-example').DataTable();
</script>