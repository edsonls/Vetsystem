<section class="content-header">
    <h1>
        <?php echo __('Cash Flows'); ?>
         <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Cash Flows'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('View Cash Flow'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $cashFlow['CashFlow']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $cashFlow['CashFlow']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $cashFlow['CashFlow']['id'])
                                            );?>
        </section>
    </div>
    <div style="margin: 20px">
		<?php if($cashFlow['CashFlow']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($cashFlow['CashFlow']['created']); ?></dd>
		<?php }?>
		<?php if($cashFlow['CashFlow']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($cashFlow['CashFlow']['modified']); ?></dd>
		<?php }?>
		<?php if($cashFlow['CashFlow']['order_id']){?>
		<dt><?php echo __('Order'); ?></dt>
		<dd><?php echo $this->Html->link($cashFlow['Order']['id'], array('controller' => 'orders', 'action' => 'view', $cashFlow['Order']['id'])); ?></dd>
		<?php }?>
		<?php if($cashFlow['CashFlow']['total']){?>
		<dt><?php echo __('Total'); ?></dt>
		<dd><?php echo h($cashFlow['CashFlow']['total']); ?></dd>
		<?php }?>
	

        <div class="related">
            
<script>
    $.extend( $.fn.dataTable.defaults, {
        "searching": false
    } );
    
    $('#dataTables-example').DataTable();
</script>