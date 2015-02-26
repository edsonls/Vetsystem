<section class="content-header">
    <h1>
        <?php echo __('Orders'); ?>
        <small><?php echo __('Edit Order'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Orders'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('Edit Order'); ?></li>
    </ol>
</section>
<div class="orders form" style="margin: 20px" >
<?php echo $this->Form->create('Order', array('type' => 'file')); ?>
    <fieldset>
        <div class="panel panel-default">
            <div class="panel-heading" align="right">
                <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
                <a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
            </div>
            <div style="margin: 20px">
                <?php
					echo $this->Html->div('row',$this->Form->input('id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('removed',array('value'=>'N','type'=>'hidden','div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					$options = array('S' => __('Active'),'N' => __('Inactive'));
					echo $this->Html->div('row',$this->Form->input('active',array('div'=>'col-xs-5','type'=>'select','class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','data-live-search'=>'true','options' => $options,'default'=>'S')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('animal_id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('clinic_id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('veterinarian_id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('payment_method_id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('discount',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					$stat = array('1' => __('In analysis'),'2' => __('Completed'));
					echo $this->Html->div('row',$this->Form->input('status',array('div'=>'col-xs-5','type'=>'select','class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','data-live-search'=>'true','options' => $stat,'default'=>'S')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('file',array('type' => 'file','div'=>'col-xs-5','class'=>'form-control input-sm')));
					echo $this->Html->div('row',$this->Form->input('Examination',array('div'=>'col-xs-5','id'=>'examination','multiple','class'=>'form-control input-sm selectpicker','data-live-search'=>'true','data-style'=>'btn-primary')),array('escape'=>false));
	?>
               
            </div>
        </div>
        <table>
            <tr>
                <td style="padding: 15px" ><?php echo $this->Form->submit('Confirmar',array('class' => 'btn btn-primary'));?></td>
                <td><?php echo $this->Html->link(__('Cancelar'), array('action' => 'index'),array('class' => 'btn btn-primary'));?></td>
            </tr>
        </table>
	</fieldset>
</div>