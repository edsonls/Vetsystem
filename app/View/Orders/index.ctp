<section class="content-header">
    <h1>
        <?php echo __('Orders'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this -> Html -> link($this -> Html -> tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li class="active"><?php echo __('Orders'); ?></li>
    </ol>
</section>
<div class="orders index" style="margin: 20px" >
    <div class="panel panel-default">
        <div class="panel-heading" align="right">
            <section class="content-header">
                <?php echo $this -> Html -> link($this -> Html -> tag('button', $this -> Html -> tag('i', '', array('class' => 'fa fa-refresh fa-fw')), array('class' => 'btn btn-primary', 'escape' => false)), $this -> Html -> url(), array('escape' => false)); ?>
                <?php echo $this -> Html -> link($this -> Html -> tag('button', $this -> Html -> tag('i', '', array('class' => 'fa fa-plus fa-fw')), array('class' => 'btn btn-primary', 'escape' => false)), $this -> Html -> url(array('action' => 'add')), array('escape' => false)); ?>
            </section>
        </div>
        <div class="table-responsive">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid" style="margin: 20px">                 
                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                	<thead>
                	   <tr>
                    	<th><?php echo $this -> Paginator -> sort(__('created')); ?></th>
                            <th class="actions col-xs-1"><?php echo $this -> Paginator -> sort(__('active')); ?></th>
                            <th><?php echo $this -> Paginator -> sort(__('animal_id')); ?></th>
                            <th><?php echo $this -> Paginator -> sort(__('clinic_id')); ?></th>
                            <th><?php echo $this -> Paginator -> sort(__('veterinarian_id')); ?></th>
                            <th><?php echo $this -> Paginator -> sort(__('payment_method_id')); ?></th>
                            <th><?php echo $this -> Paginator -> sort(__('discount')); ?></th>
                            <th><?php echo $this -> Paginator -> sort(__('status')); ?></th>
                            <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Orders', 'action' => 'index'); ?>
                    	    <?php echo $this -> Form -> create("Filter", array('url' => $base_url, 'class' => 'filter')); ?>
                    	    <td></td>
                            <?php $options = array('S' => __('Active'), 'N' => __('Inactive')); ?>
                            <td class="actions col-xs-1"><?php echo $this -> Form -> input('active', array('label' => '', 'default' => '', 'style' => 'width:100%', 'empty' => __('Status'), 'class' => 'form-control input-sm selectpicker', 'data-style' => 'btn-primary', 'options' => $options)); ?></td>
                            <td><?php echo $this -> Form -> input('animal_id', array('label' => '', 'default' => '', 'style' => 'width:100%', 'empty' => __('All animal_id'), 'class' => 'form-control input-sm selectpicker', 'data-style' => 'btn-primary')); ?></td>
                            <td><?php echo $this -> Form -> input('clinic_id', array('label' => '', 'default' => '', 'style' => 'width:100%', 'empty' => __('All clinic_id'), 'class' => 'form-control input-sm selectpicker', 'data-style' => 'btn-primary')); ?></td>
                            <td><?php echo $this -> Form -> input('veterinarian_id', array('label' => '', 'default' => '', 'style' => 'width:100%', 'empty' => __('All veterinarian_id'), 'class' => 'form-control input-sm selectpicker', 'data-style' => 'btn-primary')); ?></td>
                            <td><?php echo $this -> Form -> input('payment_method_id', array('label' => '', 'default' => '', 'style' => 'width:100%', 'empty' => __('All payment_method_id'), 'class' => 'form-control input-sm selectpicker', 'data-style' => 'btn-primary')); ?></td>
                            <td><?php echo $this -> Form -> input('discount', array('label' => '', 'default' => '', 'style' => 'width:100%', 'empty' => __('All discount'))); ?></td>
                             <?php $options1 = array(1 => __('In analysis'), 2 => __('Completed')); ?>
                            <td class="actions col-xs-2"><?php echo $this -> Form -> input('status', array('label' => '', 'default' => '', 'style' => 'width:100%', 'empty' => __('Status'), 'class' => 'form-control input-sm selectpicker', 'data-style' => 'btn-primary', 'options' => $options1)); ?></td>
                            <td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary')) ?></td>
                            <?php echo $this -> Form -> end(); ?>
                        </tr>
                		<?php foreach ($orders as $order): ?>
						<tr>
						<td><?php echo h($this -> Time -> nice($order['Order']['created'], null, '%d/%m/%Y')); ?>&nbsp;</td>
							<td><?php
							if ($order['Order']['active'] == 'S') {
								echo '<span  class="badge bg-green pull-right">' . __('Active') . '</span>';
							} else {
								echo '<span  class="badge bg-red pull-right">' . __('Inactive') . '</span>';
							}
 ?></td>
							<td>
			<?php echo $this -> Html -> link($order['Animal']['name'], array('controller' => 'animals', 'action' => 'view', $order['Animal']['id'])); ?>
		</td>
							<td>
			<?php echo $this -> Html -> link($order['Clinic']['name'], array('controller' => 'clinics', 'action' => 'view', $order['Clinic']['id'])); ?>
		</td>
							<td>
			<?php echo $this -> Html -> link($order['Veterinarian']['name'], array('controller' => 'veterinarians', 'action' => 'view', $order['Veterinarian']['id'])); ?>
		</td>
							<td>
			<?php echo $this -> Html -> link($order['PaymentMethod']['name'], array('controller' => 'payment_methods', 'action' => 'view', $order['PaymentMethod']['id'])); ?>
		</td>
						<td><?php echo h($order['Order']['discount']); ?>&nbsp;</td>
														<td><?php
														if ($order['Order']['status'] == '1') {
															echo '<span  class="badge bg-red">' . __('In analysis') . '</span>';
														} else {
															echo '<span  class="badge bg-green">' . __('Completed') . '</span>';
														}
						?>&nbsp;</td>
															<td class="actions">
								<div class="pull-right">
									<div class="btn-group">
										<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
											<i class="fa fa-gear fa-fw"></i>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><?php echo $this -> Html -> link($this -> Html -> tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary', 'escape' => false)), $this -> Html -> url(array('action' => 'view', $order['Order']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this -> Html -> link($this -> Html -> tag('i', __(' Receipt'), array('class' => 'fa fa-barcode fa-fw'), array('class' => 'btn btn-primary', 'escape' => false)), $this -> Html -> url(array('action' => 'recibo', $order['Order']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this -> Html -> link($this -> Html -> tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary', 'escape' => false)), $this -> Html -> url(array('action' => 'edit', $order['Order']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this -> Form -> postLink($this -> Html -> tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $order['Order']['id']), array('escape' => false), __('Are you sure you want to delete the %s?', $order['Order']['id']), array('class' => 'btn btn-mini')); ?> </li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
                	</tbody>
    	       </table>
    	        <?php echo $this -> Paginator -> counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    <?php
					echo $this -> Paginator -> prev('<<', array('tag' => 'li', 'class' => 'prev', ), $this -> Paginator -> link('<<', array()), array('tag' => 'li', 'escape' => false, 'class' => 'prev disabled', ));
					echo $this -> Paginator -> numbers(array('tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a'));
					echo $this -> Paginator -> next('>>', array('tag' => 'li', 'class' => 'next', ), $this -> Paginator -> link('>>', array()), array('tag' => 'li', 'escape' => false, 'class' => 'next disabled', ));
					?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
