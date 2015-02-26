<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
               <?php if($this->Session->read('Auth.User.image')!=null){
                        echo $this->Html->Image(str_replace('img/', "",$this->Session->read('Auth.User.image')),array('class'=>'img-circle','alt'=>'User Image'));
                    }else{
                        echo $this->Html->Image('avatar.jpg',array('class'=>'img-circle','alt'=>'User Image'));
                    }?>   </div>
            <div class="pull-left info">
            	<?php
            		 echo $this->Html->para(null, __('Hello ').$this->Session->read('Auth.User.name'));
            		?>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="active">
                <a href="/">
                    <i class="fa fa-dashboard"></i> <span><?php echo __('Dashboard') ?></span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> 
                    <span><?php echo __('Entries') ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Html->url(array("controller"=>"clients","action"=>"index"))?>"><i class="fa fa-users"></i><?php echo __('Clients') ?></a></li>
                    <li><a href="<?php echo $this->Html->url(array("controller"=>"animals","action"=>"index"))?>"><i class="fa fa-paw"></i><?php echo __('Animails') ?></a></li>
                    <li><a href="<?php echo $this->Html->url(array("controller"=>"Veterinarians","action"=>"index"))?>"><i class="fa fa-user-md"></i><?php echo __('Veterinarians') ?></a></li>
                    <li><a href="<?php echo $this->Html->url(array("controller"=>"Clinics","action"=>"index"))?>"><i class="fa fa-ambulance"></i><?php echo __('Clinics') ?></a></li>
              	    <li><a href="<?php echo $this->Html->url(array("controller"=>"Examinations","action"=>"index"))?>"><i class="fa fa-paste "></i><?php echo __('Examinations') ?></a></li>
                	<li><a href="<?php echo $this->Html->url(array("controller"=>"Breeds","action"=>"index"))?>"><i class="fa fa-qq "></i><?php echo __('Breeds') ?></a></li>
                	<li><a href="<?php echo $this->Html->url(array("controller"=>"Species","action"=>"index"))?>"><i class="fa fa-github-alt"></i><?php echo __('Species') ?></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase"></i> 
                    <span><?php echo __('Finance') ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Html->url(array("controller"=>"Expenses","action"=>"index"))?>"><i class="fa fa-usd"></i><?php echo __('Expenses') ?></a></li>
                    <li><a href="<?php echo $this->Html->url(array("controller"=>"CashFlows","action"=>"index"))?>"><i class="fa fa-usd"></i><?php echo __('Cash Flow') ?></a></li>
                 	<li><a href="<?php echo $this->Html->url(array("controller"=>"PaymentMethods","action"=>"index"))?>"><i class="fa fa-usd"></i><?php echo __('Payment Methods') ?></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span><?php echo __('Reports') ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                </ul>
            </li>
             <li>
                <a href="<?php echo $this->Html->url(array("controller"=>"Orders","action"=>"index"))?>">
                    <i class="fa fa-money"></i> <span><?php echo __('Order Services') ?></span>
                </a>
            </li>
              <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> 
                    <span><?php echo __('Configs') ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action' => 'index')); ?>"><i class="fa fa-user"></i> <?php echo __('Users') ?></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller'=>'Groups','action' => 'index')); ?>"><i class="fa fa-users"></i> <?php echo __('Groups') ?></a></li>
                    <li><a href="<?php echo $this->Html->url(array('plugin'=>'admin','controller'=>'permissions','action' => 'index')); ?>"><i class="fa fa-unlock-alt"></i> <?php echo __('Access Control') ?></a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>