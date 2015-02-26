<section class="content-header">
    <h1>
        <?php echo __('Users'); ?>         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Users'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View User'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>">
        	<button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>        
        	<a href="<?php echo $this->Html->url(); ?>" >
        		<button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>        
        		<a href="<?php echo $this->Html->url(array('action' => 'edit', $user['User']['id'])); ?>">
        			<button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>                                     
        <?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $user['User']['id']),
                                                array('escape'=>false),
                                            __('Are you sure you want to delete # %s?',  $user['User']['id'])
                                        );?>    </div>
    <div style="margin: 20px">
		<?php if($user['User']['username']){?>
			<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<?php }?><?php if($user['User']['group_id']){?>
			<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<?php }?><?php if($user['User']['created']){?>		
			<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($this->Time->nice($user['User']['created'],null,'%d %B %Y')); ?>
			&nbsp;
		</dd>
		<?php }?><?php if($user['User']['status']){?>		
			<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php if($user['User']['status'] == '1'){
                     echo '<span  class="btn-sm bg-green">'.__('Active').'</span>';
                     }else{
                      echo '<span  class="btn-sm bg-red">'.__('Inactive').'</span>';
                     } ?>
		</dd>
		<?php }?><?php if($user['User']['name']){?>		
			<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<?php }?><?php if($user['User']['email']){?>		
			<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<?php }?><?php if($user['User']['image']){?>		
			<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->image(str_replace('img/', "",$user['User']['image']), array('height' => '20%', 'width' => '20%')); ?>
			&nbsp;
		</dd>
<?php }?>	

<div class="related">
     <script>
        $.extend( $.fn.dataTable.defaults, {
            "searching": false
        } );
        
        $('#dataTables-example').DataTable();
    </script>