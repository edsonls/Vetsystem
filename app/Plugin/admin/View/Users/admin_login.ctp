
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="well bg-white">
			<center>
		<?php echo $this->Html->image('logoR.png',array('alt'=>'AM & Cred','title'=>'AM & Cred','id'=>'imgClient'))?>
		</center>
			<?php echo $this->Form->create('User', array('role' => 'form', 'class' => 'form-signin')); ?>
			  
			<?php
				echo $this->Form->input('username', array(
						'label' =>  __d('admin', 'username') . $this->Html->tag('span', ' *', array('class' => 'asterisk')),
						'div' => 'form-group',
						'class' => 'form-control',
						'placeholder' => __d('admin', 'Username')
					));
					echo $this->Form->input('password', array(
							'label' => __d('admin','password') . $this->Html->tag('span', ' *', array('class' => 'asterisk')),
							'div' => 'form-group',
							'class' => 'form-control',
							'placeholder' => __d('admin', 'Password'),
							'type' => 'password'
						));
			   ?>
			<?php echo $this->Form->end(array('label' => __d('admin', 'Login'), 'class' => 'btn btn-lg btn-primary btn-block')); 
				  echo $this->Html->tag('small', __('Informe seu login e senha para ter acesso ao painel administrativo.'));
				?>	
			</div>
			

	</div>
</div>		
	<?php echo $this->Html->image('copyright.png',array('alt'=>'Fabtech','title'=>'Fabtech','id'=>'imglogin'))?>
