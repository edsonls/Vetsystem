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
         <small><?php echo "<?php echo __('View'); ?>"; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo "<?php echo \$this->Html->link(\$this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?>"; ?></li>
        <li><?php echo "<?php echo \$this->Html->link(__('{$pluralHumanName}'), array('action' => 'index'),array()); ?>"; ?></li>
        <li class="active"><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></li>
    </ol>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <?php echo "\t<a href=\"<?php echo \$this->Html->url(array('action' => 'index')); ?>\"><button class=\"btn btn-primary\" type=\"button\"><i class=\"fa fa-reply fa-fw\"></i></button></a>\n"?>
        <?php echo "\t<a href=\"<?php echo \$this->Html->url(); ?>\" ><button class=\"btn btn-primary\" type=\"button\"><i class=\"fa fa-refresh fa-fw\"></i></button></a>\n"?>
        <?php echo "\t<a href=\"<?php echo \$this->Html->url(array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\"><button class=\"btn btn-primary\" type=\"button\"><i class=\"fa fa-edit fa-fw\"></i></button></a>\n"?>
        <?php echo "\t<?php echo \$this->Form->postLink('<button class=\"btn btn-primary\"><i class=\"fa fa-trash-o fa-fw\"></i></button>',
                                                array('action' => 'delete',  \${$singularVar}['{$modelClass}']['{$primaryKey}']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  \${$singularVar}['{$modelClass}']['{$primaryKey}'])
                                            );?>\n"?>
        </section>
    </div>
    <div style="margin: 20px">
<?php
foreach ($fields as $field) {
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
                echo "\t\t<?php if(\${$singularVar}['{$modelClass}']['{$field}']){?>\n";
				echo "\t\t<dt><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></dt>\n";
				echo "\t\t<dd><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></dd>\n";
				echo "\t\t<?php }?>\n";
				break;
			}
		}
	}
	if ($isKey !== true && $field!='active' && $field!='removed' && $field!='date_cad' && $field!='id') {
	    echo "\t\t<?php if(\${$singularVar}['{$modelClass}']['{$field}']){?>\n";
		echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
		echo "\t\t<dd><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></dd>\n";
        echo "\t\t<?php }?>\n";
	}
}
?>
	

        <div class="related">
            <?php
            if (empty($associations['hasMany'])) {
            $associations['hasMany'] = array();
        }
        if (empty($associations['hasAndBelongsToMany'])) {
            $associations['hasAndBelongsToMany'] = array();
        }
        $relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
        foreach ($relations as $alias => $details):
            $otherSingularVar = Inflector::variable($alias);
            $otherPluralHumanName = Inflector::humanize($details['controller']);
            ?>
            
            <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
               <h3><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></h3>
               <div class="panel panel-default">
                    <div class="panel-heading" align="right">
                        <?php echo "<a href=\"<?php echo \$this->Html->url(array('controller' => '{$details['controller']}', 'action' => 'add')); ?>\"><button class=\"btn btn-primary\" type=\"button\"><i class=\"fa fa-plus fa-fw\"></i></button></a>"?>
                    </div>
                    <div style="margin: 20px">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline table-responsive" role="grid">                 
                            <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                   
                                    <?php foreach ($details['fields'] as $field): 
                                        if($field == 'removed' || $field == 'id' || $field == 'date_cad'){
                                            
                                        }elseif($field == 'active'){?>
<th class="actions col-xs-1"><?php echo "<?php echo __('{$field}'); ?>"; ?></th>
                                        <?php
                                        }else{ ?>
<th><?php echo "<?php echo __('{$field}'); ?>"; ?></th>
                                        <?php }
                                        
                                     endforeach; ?>
<th class="actions col-xs-1"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                echo "\t<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
                                        echo "\t\t\t\t\t\t\t\t\t<tr>\n";
                                            foreach ($details['fields'] as $field) {
                                                
                                                if($field == 'removed' || $field == 'id' || $field == 'date_cad'){
                                            
                                                }elseif($field == 'active'){
                                                    echo "\t\t\t\t\t\t\t\t\t\t<td><?php if(\${$otherSingularVar}['{$field}'] == 'S'){
                                                          echo '<span  class=\"btn-sm bg-green pull-right\">'.__('Active').'</span>';
                                                       }else{
                                                          echo '<span  class=\"btn-sm bg-red pull-right\">'.__('Inactive').'</span>';
                                                       } ?></td>\n";
                                                }elseif ($isKey !== true) {
                                                    echo "\t\t\t\t\t\t\t\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?>&nbsp;</td>\n";
                                                }else{
                                                    echo "\t\t\t\t\t\t\t\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?>&nbsp;</td>\n";
                                                }
                                            }
                                            
                                           
                                            echo "\t\t\t\t\t\t\t\t\t\t<td class=\"actions\">\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"pull-right\">\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\">\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-primary btn-sm dropdown-toggle\" data-toggle=\"dropdown\" type=\"button\" aria-expanded=\"false\">\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-gear fa-fw\"></i>\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"caret\"></span>\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</button>\n";
                                            
                                           
                                            
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu pull-right\" role=\"menu\">\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"<?php echo \$this->Html->url(array('controller' => '{$details['controller']}','action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\"><i class=\"fa fa-eye fa-fw\"></i> View</a></li>\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"<?php echo \$this->Html->url(array('controller' => '{$details['controller']}','action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\"><i class=\"fa fa-edit fa-fw\"></i> Edit</a></li>\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><?php echo \$this->Form->postLink(\$this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')). \" Delete\", array('controller' => '{$details['controller']}','action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']),array('escape'=>false),__('Are you sure you want to delete the %s?', \${$otherSingularVar}['{$details['primaryKey']}']),array('class' => 'btn btn-mini'));?> </li>\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>\n";
                                            echo "\t\t\t\t\t\t\t\t\t\t\t</div>\n";        
                                            echo "\t\t\t\t\t\t\t\t\t\t</td>\n";
                                            echo "\t\t\t\t\t\t\t\t\t</tr>\n";
                                            echo "\t\t\t\t\t\t\t\t<?php endforeach; ?>\n";
                                ?>
                                </tbody>
                            </table><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>|
<?php echo "<?php endif; ?>\n\n"; ?>
<?php endforeach; echo "
<script>
    $.extend( $.fn.dataTable.defaults, {
        \"searching\": false
    } );
    
    $('#dataTables-example').DataTable();
</script>";