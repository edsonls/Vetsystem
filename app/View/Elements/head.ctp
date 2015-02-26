<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        
        //CSS
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('ionicons.min');
        
    	echo $this->Html->css('multiple-select-master/multiple-select');
        echo $this->Html->css('bootstrap-select');
        
        echo $this->Html->css('morris/morris');
        echo $this->Html->css('jvectormap/jquery-jvectormap-1.2.2');
        echo $this->Html->css('datepicker/datepicker3');
        echo $this->Html->css('daterangepicker/daterangepicker-bs3');
        echo $this->Html->css('bootstrap3-wysihtml5.min');
        
        echo $this->Html->css('bootstrap-slider/slider');
        echo $this->Html->css('colorpicker/bootstrap-colorpicker.min');
        echo $this->Html->css('datatables/dataTables.bootstrap');
        echo $this->Html->css('iCheck/all');
        echo $this->Html->css('ionslider/ion.rangeSlider');
        echo $this->Html->css('timepicker/bootstrap-timepicker.min');
        echo $this->Html->css('AdminLTE'); 
        
        
        
        echo $this->fetch('script');
	?>
</head>