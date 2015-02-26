<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<section class="content-header">
    <h1>
        <?php echo "<?php echo __('{$pluralHumanName}'); ?>\n"; ?>
        <small><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo "<?php echo \$this->Html->link(\$this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?>"; ?></li>
        <li><?php echo "<?php echo \$this->Html->link(__('{$pluralHumanName}'), array('action' => 'index'),array()); ?>"; ?></li>
        <li class="active"><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></li>
    </ol>
</section>
<div class="<?php echo $pluralVar; ?> form" style="margin: 20px" >
<?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
    <fieldset>
        <div class="panel panel-default">
            <div class="panel-heading" align="right">
                <?php echo "<a href=\"<?php echo \$this->Html->url(array('action' => 'index')); ?>\"><button class=\"btn btn-primary\" type=\"button\"><i class=\"fa fa-reply fa-fw\"></i></button></a>\n"?>
                <?php echo "<a href=\"<?php echo \$this->Html->url(); ?>\" ><button class=\"btn btn-primary\" type=\"button\"><i class=\"fa fa-refresh fa-fw\"></i></button></a>\n"?>
            </div>
            <div style="margin: 20px">
                <?php
            		echo "<?php\n";
            		foreach ($fields as $field) {
            			if (strpos($action, 'add') !== false && $field === $primaryKey) {
            				continue;
            			}elseif($field === 'active'){
            			    echo "\t\t\t\t\t\$options = array('S' => __('Active'),'N' => __('Inactive'));\n";
                            echo "\t\t\t\t\techo \$this->Html->div('row',\$this->Form->input('{$field}',array('div'=>'col-xs-5','type'=>'select','class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','data-live-search'=>'true','options' => \$options,'default'=>'S')),array('escape'=>false));\n";
                            
                        }elseif($field === 'removed'){
            			    echo "\t\t\t\t\techo \$this->Html->div('row',\$this->Form->input('{$field}',array('value'=>'N','type'=>'hidden','div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));\n";
                            
            			}elseif($field === 'date_cad'){
                            echo "\t\t\techo \$this->Html->div('row',\$this->Form->input('{$field}',array('type'=>'hidden','div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));\n";
                            
                        }elseif (!in_array($field, array('created', 'modified', 'updated'))) {
            				echo "\t\t\t\t\techo \$this->Html->div('row',\$this->Form->input('{$field}',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));\n";
                     
            			}
            		}
            		if (!empty($associations['hasAndBelongsToMany'])) {
            			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
            			    echo "\t\t\t\t\techo \$this->Html->div('row',\$this->Form->input('{$assocName}',array('div'=>'col-xs-5','class'=>'form-control input-sm')),array('escape'=>false));\n";
                     
            			}
            		}
            		echo "\t\t\t\t?>\n";
                ?>
               
            </div>
        </div>
        <table>
            <tr>
                <td style="padding: 15px" ><?php echo "<?php echo \$this->Form->submit('Confirmar',array('class' => 'btn btn-primary'));?>"?></td>
                <td><?php echo "<?php echo \$this->Html->link(__('Cancelar'), array('action' => 'index'),array('class' => 'btn btn-primary'));?>"?></td>
            </tr>
        </table>
	</fieldset>
</div>