<section class="content-header">
    <h1>
        <?php echo __('Clients'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Clients'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Client'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $client['Client']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $client['Client']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $client['Client']['id'])
                                            );?>
        </section>
    </div>
    <div style="margin: 20px">
		<?php if($client['Client']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($this->Time->nice($client['Client']['created'],null,'%d/%m/%Y')); ?></dd>
		<?php }?>
		<!-- <?php if($client['Client']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($client['Client']['modified']); ?></dd>
		<?php }?> -->
		<?php if($client['Client']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($client['Client']['name']); ?></dd>
		<?php }?>
		<?php if($client['Client']['cpf']){?>
		<dt><?php echo __('Cpf'); ?></dt>
		<dd><?php echo h($client['Client']['cpf']); ?></dd>
		<?php }?>
		<?php if($client['Client']['rg']){?>
		<dt><?php echo __('Rg'); ?></dt>
		<dd><?php echo h($client['Client']['rg']); ?></dd>
		<?php }?>
		<?php if($client['Client']['date_birth']){?>
		<dt><?php echo __('Date Birth'); ?></dt>
		<dd><?php echo h($client['Client']['date_birth']); ?></dd>
		<?php }?>
		<?php if($client['Client']['phone']){?>
		<dt><?php echo __('Phone'); ?></dt>
		<dd><?php echo h($client['Client']['phone']); ?></dd>
		<?php }?>
		<?php if($client['Client']['phone_2']){?>
		<dt><?php echo __('Phone 2'); ?></dt>
		<dd><?php echo h($client['Client']['phone_2']); ?></dd>
		<?php }?>
		<?php if($client['Client']['email']){?>
		<dt><?php echo __('Email'); ?></dt>
		<dd><?php echo h($client['Client']['email']); ?></dd>
		<?php }?>
		<?php if($client['Client']['cep']){?>
		<dt><?php echo __('Cep'); ?></dt>
		<dd><?php echo h($client['Client']['cep']); ?></dd>
		<?php }?>
		<?php if($client['Client']['address']){?>
		<dt><?php echo __('Address'); ?></dt>
		<dd><?php echo h($client['Client']['address']); ?></dd>
		<?php }?>
		<?php if($client['Client']['neighborhood']){?>
		<dt><?php echo __('Neighborhood'); ?></dt>
		<dd><?php echo h($client['Client']['neighborhood']); ?></dd>
		<?php }?>
		<?php if($client['Client']['city']){?>
		<dt><?php echo __('City'); ?></dt>
		<dd><?php echo h($client['Client']['city']); ?></dd>
		<?php }?>
		<?php if($client['Client']['uf']){?>
		<dt><?php echo __('Uf'); ?></dt>
		<dd><?php echo h($client['Client']['uf']); ?></dd>
		<?php }?>
	

        <div class="related">
                        
            <?php if (!empty($client['Animal'])): ?>
               <h3><?php echo __('Related Animals'); ?></h3>
               <div class="panel panel-default">
                    <div class="panel-heading" align="right">
                        <a href="<?php echo $this->Html->url(array('controller' => 'animals', 'action' => 'add')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw"></i></button></a>                    </div>
                    <div style="margin: 20px">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline table-responsive" role="grid">                 
                            <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                   
                                   
                                        <th class="actions col-xs-1"><?php echo __('active'); ?></th>
                                         <th><?php echo __('created'); ?></th>
                                        <th><?php echo __('name'); ?></th><!-- 
                                        <th><?php echo __('specie_id'); ?></th>
                                        <th><?php echo __('breed_id'); ?></th> -->
                                        <th><?php echo __('sex'); ?></th>
                                        <th><?php echo __('age'); ?></th>
                                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($client['Animal'] as $animal): ?>
									<tr>
										<td><?php if($animal['active'] == 'S'){
                                                          echo '<span  class="btn-sm bg-green pull-right">'.__('Active').'</span>';
                                                       }else{
                                                          echo '<span  class="btn-sm bg-red pull-right">'.__('Inactive').'</span>';
                                                       } ?></td>
                                        <td><?php echo $this->Time->nice($animal['created'],null,'%d/%m/%Y'); ?>&nbsp;</td>
										<td><?php echo $animal['name']; ?>&nbsp;</td><!-- 
										<td><?php echo $animal['specie_id']; ?>&nbsp;</td>
										<td><?php echo $animal['breed_id']; ?>&nbsp;</td> -->
										<td><?php echo $animal['sex']; ?>&nbsp;</td>
										<td><?php echo $animal['age']; ?>&nbsp;</td>
										<td class="actions">
											<div class="pull-right">
												<div class="btn-group">
													<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
														<i class="fa fa-gear fa-fw"></i>
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo $this->Html->url(array('controller' => 'animals','action' => 'view', $animal['id'])); ?>"><i class="fa fa-eye fa-fw"></i> View</a></li>
														<li><a href="<?php echo $this->Html->url(array('controller' => 'animals','action' => 'edit', $animal['id'])); ?>"><i class="fa fa-edit fa-fw"></i> Edit</a></li>
														<li><?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')). " Delete", array('controller' => 'animals','action' => 'delete', $animal['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $animal['id']),array('class' => 'btn btn-mini'));?> </li>
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