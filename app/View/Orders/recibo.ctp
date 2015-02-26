<section class="content-header">
    <h1>
        <?php echo __('Orders'); ?>
         <small><?php echo __('Receipt'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('Orders'), array('action' => 'index'),array()); ?></li>
        <li class="active"><?php echo __('Receipt Order'); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a href="<?php echo $this->Html->url(array('action' => 'edit', $order['Order']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<a href="javascript:window.print();"><button class="btn btn-primary" type="button"><i class="fa fa-print fa-fw"></i></button></a>
        	
        </section>
    </div>
    <div class="table-responsive">
  <table class="table">
		<thead>
			<tr>
				<th><?php echo $this->Html->Image('logoR.png',array('class'=>"img-responsive"))?></th>
				<th><h3>Centro de Diagnóstico e Pesquisa Animal</h3></th>
				<th><h4>Ordem de Serviço n° <?php echo h($order['Order']['id']); ?></h4></th>
			</tr>
			<tr>
				<td><?php if($order['Order']['created']){?>
				<dt><?php echo __('Created'); ?></dt>
				<dd><?php echo h($this->Time->nice($order['Order']['created'],null,'%d %B %Y')); ?></dd>
				<?php }?>
				</td>
				<td>
				<?php if($order['Order']['animal_id']){?>
				<dt><?php echo __('Animal'); ?></dt>
				<dd><?php echo h($order['Animal']['name']); ?></dd>
				<?php }?>
				</td>
				<td>
					<?php if($order['Animal']['age']){?>
					<dt><?php echo __('Age'); ?></dt>
					<dd><?php echo h($order['Animal']['age']); ?></dd>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td><?php if($order['Client']['name']){?>
				<dt><?php echo __('Name Client'); ?></dt>
				<dd><?php echo h($order['Client']['name']); ?></dd>
				<?php }?>
				</td>
				<td>
				<?php if($order['Client']['phone']){?>
				<dt><?php echo __('Client Phone'); ?></dt>
				<dd><?php echo h($order['Client']['phone']); ?></dd>
				<?php }?>
				</td>
				<td>
					<?php if($order['Client']['email']){?>
					<dt><?php echo __('Client E-mail'); ?></dt>
					<dd><?php echo h($order['Client']['email']); ?></dd>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td><?php if($order['Clinic']['name']){?>
				<dt><?php echo __('Name Clinic'); ?></dt>
				<dd><?php echo h($order['Clinic']['name']); ?></dd>
				<?php }?>
				</td>
				<td>
				<?php if($order['Clinic']['phone']){?>
				<dt><?php echo __('Clinic Phone'); ?></dt>
				<dd><?php echo h($order['Clinic']['phone']); ?></dd>
				<?php }?>
				</td>
				<td>
					<?php if($order['Clinic']['email']){?>
					<dt><?php echo __('Clinic E-mail'); ?></dt>
					<dd><?php echo h($order['Clinic']['email']); ?></dd>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td><?php if($order['Veterinarian']['name']){?>
				<dt><?php echo __('Name Veterinarian'); ?></dt>
				<dd><?php echo h($order['Veterinarian']['name']); ?></dd>
				<?php }?>
				</td>
				<td>
				<?php if($order['Veterinarian']['phone']){?>
				<dt><?php echo __('Veterinarian Phone'); ?></dt>
				<dd><?php echo h($order['Veterinarian']['phone']); ?></dd>
				<?php }?>
				</td>
				<td>
					<?php if($order['Veterinarian']['email']){?>
					<dt><?php echo __('Veterinarian E-mail'); ?></dt>
					<dd><?php echo h($order['Veterinarian']['email']); ?></dd>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td><?php if($order['Order']['payment_method_id']){?>
				<dt><?php echo __('Payment Method'); ?></dt>
				<dd><?php echo h($order['PaymentMethod']['name']); ?></dd>
				<?php }?>
				</td>
				<td>
				<?php if($order['Order']['discount']){?>
				<dt><?php echo __('Discount'); ?></dt>
				<dd><?php echo h($order['Order']['discount']); ?></dd>
				<?php }?>
				</td>
				<td>
					<?php if($order['Examination']){?>
					<dt><?php echo __('Total'); ?></dt>
					<dd><?php $total=0;
					foreach ($order['Examination'] as $examination){
						$total=$total+$examination['value'];
									}
					echo h($total-$order['Order']['discount']); ?></dd>
					<?php }?>
			</td>
			</tr>
		</thead>
  </table>
</div>
   <div class="related">
                        
            <?php if (!empty($order['Examination'])): ?>
               <h3><?php echo __('Related Examinations'); ?></h3>
               <div class="panel panel-default">
                     <div style="margin: 20px">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline table-responsive" role="grid">                 
                            <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><?php echo __('name'); ?></th>
                                        <th><?php echo __('value'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($order['Examination'] as $examination): ?>
									<tr>
										<td><?php echo $examination['name']; ?>&nbsp;</td>
										<td><?php echo $examination['value']; ?>&nbsp;</td>
										
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