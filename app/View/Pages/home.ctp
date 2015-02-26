
<section class="content-header">
    <h1>
        Painel de Controle
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
           <?php $animal = $this->requestAction('animals/new_animals/sort:created/direction:asc')?>
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?php echo h($animal[0][0]['quant']);?>
                    </h3>
                    <p>
                        <?php echo __('New Animals') ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-paw"></i>
                </div>
                <a href="<?php echo $this->Html->url(array("controller"=>"animals","action"=>"index"));?>" class="small-box-footer">
                    <?php echo __('More info');?> <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                      <?php $clinic = $this->requestAction('clinics/quant_clinics/sort:created/direction:asc');
                      echo $clinic;
                      ?>
                    </h3>
                    <p>
                      <?php echo __('Clinic Registered')?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-ambulance"></i>
                </div>
                <a href="<?php echo $this->Html->url(array("controller"=>"clinics","action"=>"index"));?>" class="small-box-footer">
                    <?php echo __('More info');?> <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                      <?php $vet = $this->requestAction('Veterinarians/quant_veterinarians/sort:created/direction:asc');
                      echo $vet;
                      ?>
                    </h3>
                    <p>
                      <?php echo __('Veterinary Registered')?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-md"></i>
                </div>
                <a href="<?php echo $this->Html->url(array("controller"=>"Veterinarians","action"=>"index"));?>" class="small-box-footer">
                    <?php echo __('More info');?> <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3> 
                      <?php $ex = $this->requestAction('Orders/quant_exames_analise/sort:created/direction:asc');
                      echo $ex;
                      ?>
                    </h3>
                    <p>
                      <?php echo __('Orders under review')?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-flask"></i>
                </div>
                <a href="<?php echo $this->Html->url(array("controller"=>"Orders","action"=>"index","status"=>"1"));?>" class="small-box-footer">
                    <?php echo __('More info');?> <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row --> 
</section>