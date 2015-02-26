      
    <header class="header">
        <a href="/" class="logo">
           <?php echo $this->Html->Image('logo.png',array()) ?>
        </a>         
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span><?php echo $this->Session->read('Auth.User.name');?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <?php if($this->Session->read('Auth.User.image')!=null){
						                        echo $this->Html->Image(str_replace('img/', "",$this->Session->read('Auth.User.image')),array('class'=>'img-circle','alt'=>'User Image'));
						                    }else{
						                        echo $this->Html->Image('avatar.jpg',array('class'=>'img-circle','alt'=>'User Image'));
						                    }?> <p>
                                  <?php echo $this->Session->read('Auth.User.name');?>
										 - 
								  <?php echo $this->Session->read('Auth.User.Group.name');?>
                                    <small><?php echo __('Member since').$this->Time->nice($this->Session->read('Auth.User.created'),null,' %B, %Y')?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
            		
                                    <a href="<?php echo $this->Html->url(array(
    											"controller" => "users",
   											 	"action" => "edit",
												$this->Session->read('Auth.User.id'))) ?>" class="btn btn-default btn-flat"><?php echo __('Profile');?></a>
                                </div>
                                <div class="pull-right">
                                	<a href="<?php echo $this->Html->url(array(
														"controller"=> "users",
														"action"=>"logout"
														)) ?>" class="btn btn-default btn-flat"><?php echo __('Sign out');?></a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>