<section class="content-header">
    <h1>
        <?php echo __('Breeds'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Breeds'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Breed'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $breed['Breed']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $breed['Breed']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $breed['Breed']['id'])
                                            );?>
        </section>
    </div>
    <div style="margin: 20px">
		<?php if($breed['Breed']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($this->Time->nice($breed['Breed']['created'],null,'%d/%m/%Y')); ?></dd>
		<?php }?><!-- 
		<?php if($breed['Breed']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($breed['Breed']['modified']); ?></dd>
		<?php }?> -->
		<?php if($breed['Breed']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($breed['Breed']['name']); ?></dd>
		<?php }?>
		<?php if($breed['Breed']['description']){?>
		<dt><?php echo __('Description'); ?></dt>
		<dd><?php echo h($breed['Breed']['description']); ?></dd>
		<?php }?>
	

        <div class="related">
                        
            <?php if (!empty($breed['Animal'])): ?>
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
                                        <th><?php echo __('name'); ?></th>
                                        <th><?php echo __('sex'); ?></th>
                                        <th><?php echo __('age'); ?></th>
                                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($breed['Animal'] as $animal): ?>
									<tr>
										<td><?php if($animal['active'] == 'S'){
                                                          echo '<span  class="btn-sm bg-green pull-right">'.__('Active').'</span>';
                                                       }else{
                                                          echo '<span  class="btn-sm bg-red pull-right">'.__('Inactive').'</span>';
                                                       } ?></td>
										<td><?php echo $this->Time->nice($animal['created'],null,'%d/%m/%Y'); ?>&nbsp;</td>
										<td><?php echo $animal['name']; ?>&nbsp;</td>
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