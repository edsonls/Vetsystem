<section class="content-header">
    <h1>
        <?php echo __('Species'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Species'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Species'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $species['Species']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $species['Species']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $species['Species']['id'])
                                            );?>
         </section>
    </div>
    <div style="margin: 20px">
		<?php if($species['Species']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($this->Time->nice($species['Species']['created'],null,'%d/%m/%Y')); ?></dd>
		<?php }?><!-- 
		<?php if($species['Species']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($species['Species']['modified']); ?></dd>
		<?php }?> -->
		<?php if($species['Species']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($species['Species']['name']); ?></dd>
		<?php }?>
		<?php if($species['Species']['description']){?>
		<dt><?php echo __('Description'); ?></dt>
		<dd><?php echo h($species['Species']['description']); ?></dd>
		<?php }?>
        <div class="related">
<script>
    $.extend( $.fn.dataTable.defaults, {
        "searching": false
    } );
    
    $('#dataTables-example').DataTable();
</script>