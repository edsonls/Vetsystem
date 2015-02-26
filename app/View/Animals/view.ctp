<section class="content-header">
    <h1>
        <?php echo __('Animals'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Animals'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Animal'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>">
        		<button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" >
        		<button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $animal['Animal']['id'])); ?>">
        		<button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $animal['Animal']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $animal['Animal']['id'])
                                            );?>
        </section>
    </div>
    <div style="margin: 20px">
		<?php if($this->Time->nice($animal['Animal']['created'],null,'%d/%m/%Y')){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($animal['Animal']['created']); ?></dd>
		<?php }?><!-- 
		<?php if($animal['Animal']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($animal['Animal']['modified']); ?></dd>
		<?php }?> -->
		<?php if($animal['Animal']['client_id']){?>
		<dt><?php echo __('Client'); ?></dt>
		<dd><?php echo $this->Html->link($animal['Client']['name'], array('controller' => 'clients', 'action' => 'view', $animal['Client']['id'])); ?></dd>
		<?php }?>
		<?php if($animal['Animal']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($animal['Animal']['name']); ?></dd>
		<?php }?>
		<?php if($animal['Animal']['specie_id']){?>
		<dt><?php echo __('Specie'); ?></dt>
		<dd><?php echo $this->Html->link($animal['Specie']['name'], array('controller' => 'species', 'action' => 'view', $animal['Specie']['id'])); ?></dd>
		<?php }?>
		<?php if($animal['Animal']['breed_id']){?>
		<dt><?php echo __('Breed'); ?></dt>
		<dd><?php echo $this->Html->link($animal['Breed']['name'], array('controller' => 'breeds', 'action' => 'view', $animal['Breed']['id'])); ?></dd>
		<?php }?>
		<?php if($animal['Animal']['sex']){?>
		<dt><?php echo __('Sex'); ?></dt>
		<dd><?php echo h($animal['Animal']['sex']); ?></dd>
		<?php }?>
		<?php if($animal['Animal']['age']){?>
		<dt><?php echo __('Age'); ?></dt>
		<dd><?php echo h($animal['Animal']['age']); ?></dd>
		<?php }?>
	

        <div class="related">
                        
            <?php if (!empty($animal['Order'])): ?>
               <h3><?php echo __('Related Orders'); ?></h3>
               <div class="panel panel-default">
                    <div class="panel-heading" align="right">
                        <a href="<?php echo $this->Html->url(array('controller' => 'orders', 'action' => 'add')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw"></i></button></a>                    </div>
                    <div style="margin: 20px">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline table-responsive" role="grid">                 
                            <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                   
                                    <th><?php echo __('Order Service'); ?></th>
                                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($animal['Order'] as $order): ?>
									<tr>
										<td><?php echo $order['id']; ?>&nbsp;</td>
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