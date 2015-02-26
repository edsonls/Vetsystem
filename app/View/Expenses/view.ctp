<section class="content-header">
    <h1>
        <?php echo __('Expenses'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Expenses'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Expense'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $expense['Expense']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $expense['Expense']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $expense['Expense']['id'])
                                            );?>
        </section>
    </div>
    <div style="margin: 20px">
		<?php if($expense['Expense']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($expense['Expense']['created']); ?></dd>
		<?php }?>
		<?php if($expense['Expense']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($expense['Expense']['modified']); ?></dd>
		<?php }?>
		<?php if($expense['Expense']['type']){?>
		<dt><?php echo __('Type'); ?></dt>
		<dd><?php echo h($expense['Expense']['type']); ?></dd>
		<?php }?>
		<?php if($expense['Expense']['status']){?>
		<dt><?php echo __('Status'); ?></dt>
		<dd><?php echo h($expense['Expense']['status']); ?></dd>
		<?php }?>
		<?php if($expense['Expense']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($expense['Expense']['name']); ?></dd>
		<?php }?>
		<?php if($expense['Expense']['value']){?>
		<dt><?php echo __('Value'); ?></dt>
		<dd><?php echo h($expense['Expense']['value']); ?></dd>
		<?php }?>
		<?php if($expense['Expense']['date_payment']){?>
		<dt><?php echo __('Date Payment'); ?></dt>
		<dd><?php echo h($expense['Expense']['date_payment']); ?></dd>
		<?php }?>
	

        <div class="related">
            
<script>
    $.extend( $.fn.dataTable.defaults, {
        "searching": false
    } );
    
    $('#dataTables-example').DataTable();
</script>