<footer>
	<?php echo $this->Html->image('footer.png',array('alt'=>'Fabtech','title'=>'Fabtech','id'=>'imglogin'))?>
<?php
        //scripts    
   
   // echo $this->Html->script('multiple-select-master/jquery.multiple.select'); 
    echo $this->Html->script('jquery.min.js');
    echo $this->Html->script('bootstrap.min.js');
    echo $this->Html->script('jquery-ui.min');
    echo $this->Html->script('raphael-min');
    
    echo $this->Html->script('bootstrap-select');
    
    echo $this->Html->script('plugins/morris/morris.min');
    echo $this->Html->script('plugins/sparkline/jquery.sparkline.min');
    echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-1.2.2.min');
    echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-world-mill-en');
    echo $this->Html->script('plugins/jqueryKnob/jquery.knob');
    echo $this->Html->script('plugins/daterangepicker/daterangepicker');
    echo $this->Html->script('plugins/datepicker/bootstrap-datepicker');
    echo $this->Html->script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min');
    echo $this->Html->script(array('plugins/iCheck/icheck.min'));
        
    echo $this->Html->script('AdminLTE/app');
    echo $this->Html->script('AdminLTE/dashboard');
    echo $this->Html->script('AdminLTE/demo'); 
    
    echo $this->fetch('script');
    
?>


<script>
    function consultacep(cep){
      cep = cep.replace(/\D/g,"")
      url="http://cep.correiocontrol.com.br/"+cep+".js"
      s=document.createElement('script')
      s.setAttribute('charset','utf-8')
      s.src=url
      document.querySelector('head').appendChild(s)
    }

    function correiocontrolcep(valor){
      if (valor.erro) {
        alert('Cep não encontrado');        
        return;
      };
      document.getElementById('logradouro').value=valor.logradouro
      document.getElementById('bairro').value=valor.bairro
      document.getElementById('localidade').value=valor.localidade
      document.getElementById('uf').value=valor.uf
    }
    </script>
    
</footer>