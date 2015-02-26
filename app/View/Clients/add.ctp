<section class="content-header">
    <h1>
        <?php echo __('Clients'); ?>        <small><?php echo __('Add Client'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Clients'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('Add Client'); ?></li>
    </ol>
</section>
<div class="clients form" style="margin: 20px" >
<?php echo $this->Form->create('Client'); ?>
    <fieldset>
        <div class="panel panel-default">
            <div class="panel-heading" align="right">
                <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>                <a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>            </div>
            <div style="margin: 20px">
                	<?php
			echo $this->Html->div('row',$this->Form->input('removed',array('value'=>'N','type'=>'hidden','div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
				$options = array('S' => __('Active'),'N' => __('Inactive'));
			echo $this->Html->div('row',$this->Form->input('active',array('div'=>'col-xs-5','type'=>'select','class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','data-live-search'=>'true','options' => $options,'default'=>'S')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('name',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('cpf',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('rg',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('date_birth',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('phone',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('phone_2',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('email',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('cep',array('div'=>'col-xs-5','id'=>'cep','onblur'=>'consultacep(this.value)','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('address',array('div'=>'col-xs-5','id'=>'logradouro','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('neighborhood',array('div'=>'col-xs-5','id'=>'bairro','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('city',array('div'=>'col-xs-5','id'=>'localidade','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('uf',array('div'=>'col-xs-5','id'=>'uf','class'=>'form-control input-sm')),array('escape'=>false));
	
			echo $this->Html->tag('h2', __('Animal'), array('class' => 'page-header'));
			echo $this->Html->div('row',$this->Form->input('Animal.0.active',array('div'=>'col-xs-5','type'=>'select','class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','data-live-search'=>'true','options' => $options,'default'=>'S')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('Animal.0.name',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('Animal.0.specie_id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('Animal.0.breed_id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('Animal.0.sex',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('Animal.0.age',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
	
			echo $this->Html->tag('h2', __('Examinations'), array('class' => 'page-header'));
			echo $this->Html->div('row',$this->Form->input('Order.clinic_id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			//echo $this->Html->div('row',$this->Form->input('OrderService.0.animal_id',array('div'=>'col-xs-5','type'=>'hidden','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('Order.veterinarian_id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('Order.payment_method_id',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			echo $this->Html->div('row',$this->Form->input('Order.discount',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));
			
			echo $this->Html->div('row',$this->Form->input('Examination.Examination',array('div'=>'col-xs-5','multiple' => true,'multiple','class'=>'form-control input-sm selectpicker','data-live-search'=>'true','data-style'=>'btn-primary')),array('escape'=>false));
	?>
               
            </div>
        </div>
        <table>
            <tr >
                <td style="padding: 15px" >
                    <?php echo $this->Form->submit('Confirmar',array(
                                                                        'class' => 'btn btn-primary',
                                                                  ));?>                </td>
                <td>
                    <?php echo $this->Html->link(__('Cancelar'), array('action' => 'index'),array('class' => 'btn btn-primary')); ?>                </td>
            </tr>
        </table>
	</fieldset>
</div>