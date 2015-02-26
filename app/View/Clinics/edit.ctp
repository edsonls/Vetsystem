<section class="content-header">
    <h1>
        <?php echo __('Clinics'); ?>
        <small><?php echo __('Edit Clinic'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Clinics'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('Edit Clinic'); ?></li>
    </ol>
</section>
<div class="clinics form" style="margin: 20px" >
<?php echo $this->Form->create('Clinic'); ?>
    <fieldset>
        <div class="panel panel-default">
            <div class="panel-heading" align="right">
                <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
                <a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
            </div>
            <div style="margin: 20px">
                <?php
					echo $this->Html->div('row',$this->Form->input('id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					$options = array('S' => __('Active'),'N' => __('Inactive'));
					echo $this->Html->div('row',$this->Form->input('active',array('div'=>'col-xs-5','type'=>'select','class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','data-live-search'=>'true','options' => $options,'default'=>'S')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('removed',array('value'=>'N','type'=>'hidden','div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('name',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('phone',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('phone_2',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('email',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('cep',array('div'=>'col-xs-5','id'=>'cep','onblur'=>'consultacep(this.value)','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('address',array('div'=>'col-xs-5','id'=>'logradouro','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('neighborhood',array('div'=>'col-xs-5','id'=>'bairro','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('city',array('div'=>'col-xs-5','id'=>'localidade','class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('uf',array('div'=>'col-xs-5','id'=>'uf','class'=>'form-control input-sm')),array('escape'=>false));
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