<?php
/**2
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
        <small><?php echo "<?php echo __('All Registered'); ?>"; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo "<?php echo \$this->Html->link(\$this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?>"; ?></li>
        <li class="active"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></li>
    </ol>
</section>
<div class="<?php echo $pluralVar; ?> index" style="margin: 20px" >
    <div class="panel panel-default">
        <div class="panel-heading" align="right">
            <section class="content-header">
                <?php echo "<?php echo \$this->Html->link(\$this->Html->tag('button', \$this->Html->tag('i', '', array('class' => 'fa fa-refresh fa-fw')), array('class' => 'btn btn-primary','escape' => false)), \$this->Html->url(), array('escape' => false)); ?>\n"; ?>
                <?php echo "<?php echo \$this->Html->link(\$this->Html->tag('button', \$this->Html->tag('i', '', array('class' => 'fa fa-plus fa-fw')), array('class' => 'btn btn-primary','escape' => false)), \$this->Html->url(array('action' => 'add')), array('escape' => false)); ?>\n"; ?>
            </section>
        </div>
        <div class="table-responsive">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid" style="margin: 20px">                 
                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                	<thead>
                	   <tr>
                    	<?php foreach ($fields as $field): 
                    	    if($field == 'removed' || $field == 'id' || $field == 'date_cad'){
                    	        
                    	    }elseif($field == 'active'){?>
<th class="actions col-xs-1"><?php echo "<?php echo \$this->Paginator->sort(__('{$field}')); ?>"; ?></th>
                            <?php
                            }else{ ?>
<th><?php echo "<?php echo \$this->Paginator->sort(__('{$field}')); ?>"; ?></th>
                            <?php }
                    		
                    	 endforeach; ?>
<th class="actions col-xs-1"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php echo "<?php \$base_url = array('controller' => '{$pluralHumanName}', 'action' => 'index');?>\n"?>
                    	    <?php echo "<?php echo \$this->Form->create(\"Filter\",array('url' => \$base_url, 'class' => 'filter'));?>\n"?>
                    	    <?php foreach ($fields as $field): 
                            if($field == 'removed' || $field == 'id' || $field == 'date_cad'){
                                
                            }elseif($field == 'active'){?>
<?php echo "<?php \$options = array('S' => __('Active'),'N' => __('Inactive'));?>\n"?>
                            <td class="actions col-xs-1"><?php echo "<?php echo \$this->Form->input('{$field}', array('label' => '','default' => '','style'=>'width:100%','empty' => __('Status'),'class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','options' => \$options));?>"; ?></td>
                            <?php
                            }else{ ?>
<td><?php echo "<?php echo \$this->Form->input('{$field}', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All {$field}')));?>"; ?></td>
                            <?php }
                            
                         endforeach; ?>
<td><?php echo "<?php echo \$this->Form->submit(__('Search'),array('class' => 'btn btn-primary')) ?>"?></td>
                            <?php echo "<?php echo \$this->Form->end();?>\n"?>
                        </tr>
                	<?php
                	echo "\t<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                	echo "\t\t\t\t\t\t<tr>\n";
                		foreach ($fields as $field) {
                			$isKey = false;
                			if (!empty($associations['belongsTo'])) {
                				foreach ($associations['belongsTo'] as $alias => $details) {
                					if ($field === $details['foreignKey']) {
                						$isKey = true;
                						echo "\t\t\t\t\t\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                						break;
                					}
                				}
                			}
                            if($field == 'removed' || $field == 'id' || $field == 'date_cad'){
                            
                            }elseif($field == 'active'){
                                echo "\t\t\t\t\t\t\t<td><?php if(\${$singularVar}['{$modelClass}']['{$field}'] == 'S'){
                              echo '<span  class=\"btn-sm bg-green pull-right\">'.__('Active').'</span>';
                           }else{
                              echo '<span  class=\"btn-sm bg-red pull-right\">'.__('Inactive').'</span>';
                           } ?></td>\n";
                            }elseif ($isKey !== true) {
                				echo "\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                			}
                            
                		}
                
            		echo "\t\t\t\t\t\t\t<td class=\"actions\">\n";
                    echo "\t\t\t\t\t\t\t\t<div class=\"pull-right\">\n";
                    echo "\t\t\t\t\t\t\t\t\t<div class=\"btn-group\">\n";
                    echo "\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-primary btn-sm dropdown-toggle\" data-toggle=\"dropdown\" type=\"button\" aria-expanded=\"false\">\n";
                    echo "\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-gear fa-fw\"></i>\n";
                    echo "\t\t\t\t\t\t\t\t\t\t\t<span class=\"caret\"></span>\n";
                    echo "\t\t\t\t\t\t\t\t\t\t</button>\n";
                    echo "\t\t\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu pull-right\" role=\"menu\">\n";
                    echo "\t\t\t\t\t\t\t\t\t\t\t<li><?php echo \$this->Html->link(\$this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), \$this->Html->url(array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])), array('escape' => false)); ?></li>\n";
                    echo "\t\t\t\t\t\t\t\t\t\t\t<li><?php echo \$this->Html->link(\$this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), \$this->Html->url(array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])), array('escape' => false)); ?></li>\n";
                    echo "\t\t\t\t\t\t\t\t\t\t\t<li><?php echo \$this->Form->postLink(\$this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false),__('Are you sure you want to delete the %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class' => 'btn btn-mini'));?> </li>\n";
                    echo "\t\t\t\t\t\t\t\t\t\t</ul>\n";
                    echo "\t\t\t\t\t\t\t\t\t</div>\n";
                    echo "\t\t\t\t\t\t\t\t</div>\n";        
                    echo "\t\t\t\t\t\t\t</td>\n";
                	echo "\t\t\t\t\t\t</tr>\n";
                
                	echo "\t\t\t\t\t<?php endforeach; ?>\n";
                	?>
                	</tbody>
    	       </table>
    	        <?php echo "<?php
                    echo \$this->Paginator->counter(array(
                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                ?>\n"; ?>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    <?php
                        echo "<?php\n";
                        echo "\t\t\t\t\t\techo \$this->Paginator->prev('<<', array('tag' => 'li','class' => 'prev',), \$this->Paginator->link('<<', array()), array('tag' => 'li', 'escape' => false,'class' => 'prev disabled',));\n";
                        echo "\t\t\t\t\t\techo \$this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );\n";
                        echo "\t\t\t\t\t\techo \$this->Paginator->next('>>', array('tag' => 'li','class' => 'next',), \$this->Paginator->link('>>', array()), array('tag' => 'li', 'escape' => false,'class' => 'next disabled',));\n";
                        echo "\t\t\t\t\t?>\n";
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
