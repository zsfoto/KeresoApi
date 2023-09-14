<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phone[]|\Cake\Collection\CollectionInterface $phones
 */
?>
<?php 
	use Cake\Core\Configure;
	
	//$session 			= $this->getRequest()->getSession();
	//$prefix 			= strtolower( $this->request->getParam('prefix') );	
	//$controller 		= $this->request->getParam('controller');	// for DB click on <tr>
	//$action 			= $this->request->getParam('action');		// for DB click on <tr>
	//$passedArgs 		= $this->request->getParam('pass');			// for DB click on <tr>
	
	$config = Configure::read('Theme.' . $prefix);	
	//-------> More config from \config\jeffadmin.php <------
	//$config['index_show_id'] 			= true;
	//$config['index_show_visible'] 	= true;
	//$config['index_show_pos'] 		= true;
	//$config['index_show_created'] 	= true;
	//$config['index_show_modified'] 	= true;
	//$config['index_show_counts'] 		= true;
	//$config['index_show_actions'] 	= true;	
	//$config['index_enable_view'] 		= true;
	//$config['index_enable_edit'] 		= true;
	//$config['index_enable_delete'] 	= true;
	//$config['index_enable_db_click'] 	= true;
	//$config['index_db_click_action'] 	= 'edit';	// edit, view
	//
	//$url = $this->Url->build(['prefix' => $prefix, 'controller' => $controller , 'action' => $config['index_db_click_action']]);

	if(!isset($layoutPhonesLastId)){
		$layoutPhonesLastId = 0;
	}

?>
		<div class="index col-12">
            <div class="card card-lightblue">
				<div class="card-header">
					<h4 class="card-title"><?= __('Index') ?>: <?= $title ?><?php
					if(isset($search) && $search != ''){
						echo " &rarr; " . __('filter') . ": <b>" . $search . "</b>";
					}
				?></h4>
					<div class="card-tools">
						<?= $this->element('JeffAdmin.paginateTop') ?>
					</div>				
				</div><!-- ./card-header -->
			  
				<?php //= __('Phones') ?>	
				<div class="card-body table-responsive p-0 phones">
<?php //debug($session->read()); ?>
					<table class="table table-hover table-striped table-bordered text-nowrap">
						<thead>
							<tr>
								<th class="row-id-anchor"></th>
<?php if(isset($config['index_show_id']) && $config['index_show_id']){ ?>
								<th class="id integer"><?= $this->Paginator->sort('id') ?></th>
<?php } ?>
								<th class="user-id string"><?= $this->Paginator->sort('user_id') ?></th>
								<th class="person-id integer"><?= $this->Paginator->sort('person_id') ?></th>
								<th class="name string"><?= $this->Paginator->sort('name') ?></th>
								<th class="description string"><?= $this->Paginator->sort('description') ?></th>
								<th class="phone string"><?= $this->Paginator->sort('phone') ?></th>
								<th class="ext string"><?= $this->Paginator->sort('ext') ?></th>
								<th class="email string"><?= $this->Paginator->sort('email') ?></th>
								<th class="slug string"><?= $this->Paginator->sort('slug') ?></th>
								<th class="iconType string"><?= $this->Paginator->sort('iconType') ?></th>
								<th class="icon string"><?= $this->Paginator->sort('icon') ?></th>
<?php if(isset($config['index_show_pos']) && $config['index_show_pos']){ ?>

								<th class="pos integer"><?= $this->Paginator->sort('pos') ?></th>
<?php } ?>
<?php if(isset($config['index_show_visible']) && $config['index_show_visible']){ ?>

								<th class="visible boolean"><?= $this->Paginator->sort('visible') ?></th>
<?php } ?>
								<th class="action string"><?= $this->Paginator->sort('action') ?></th>
<?php if(isset($config['index_show_created']) && $config['index_show_created'] || isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
								<th class="datetime created-modified">
<?php 	if(isset($config['index_show_created']) && $config['index_show_created']){ ?>
									<?= $this->Paginator->sort('created') ?>
<?php 	} ?>
<?php 	if(isset($config['index_show_created']) && $config['index_show_created'] && isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
									<br>
<?php 	} ?>
<?php 	if(isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
									<?= $this->Paginator->sort('modified') ?>
<?php 	} ?>
								</th>
<?php } ?>



<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
								<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
							</tr>
						</thead>
						<tbody>
					<?php foreach ($phones as $phone): ?>
							<tr row-id="<?= $phone->id ?>"<?php if($phone->id == $layoutPhonesLastId){ echo ' class="table-tr-last-id"'; } ?>  prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
								<td class="row-id-anchor" value="<?= $phone->id ?>"><a class="anchor" name="<?= $phone->id ?>"></a></td><!-- bake-0 -->
<?php if(isset($config['index_show_id']) && $config['index_show_id']){ ?>
								<td class="id integer" name="id" value="<?= $this->Number->format($phone->id) ?>"><?= $this->Number->format($phone->id) ?></td><!-- bake-3 -->
<?php } ?>
								<td class="user-id string link text-left" value="<?= $phone->user_id ?>"><?= $phone->has('my_user') ? $this->Html->link($phone->my_user->email, ['controller' => 'MyUsers', 'action' => 'view', $phone->my_user->id]) : '' ?></td><!-- bake-1 -->
								<td class="person-id integer link text-left" value="<?= $phone->person_id ?>"><?= $phone->has('person') ? $this->Html->link($phone->person->name, ['controller' => 'Persons', 'action' => 'view', $phone->person->id]) : '' ?></td><!-- bake-1 -->
								<td class="name string" name="name" value="<?= $phone->name ?>"><?= h($phone->name) ?></td><!-- bake-2 -->
								<td class="description string" name="description" value="<?= $phone->description ?>"><?= h($phone->description) ?></td><!-- bake-2 -->
								<td class="phone string" name="phone" value="<?= $phone->phone ?>"><?= h($phone->phone) ?></td><!-- bake-2 -->
								<td class="ext string" name="ext" value="<?= $phone->ext ?>"><?= h($phone->ext) ?></td><!-- bake-2 -->
								<td class="email string" name="email" value="<?= $phone->email ?>"><?= h($phone->email) ?></td><!-- bake-2 -->
								<td class="slug string" name="slug" value="<?= $phone->slug ?>"><?= h($phone->slug) ?></td><!-- bake-2 -->
								<td class="iconType string" name="iconType" value="<?= $phone->iconType ?>"><?= h($phone->iconType) ?></td><!-- bake-2 -->
								<td class="icon string" name="icon" value="<?= $phone->icon ?>"><?= h($phone->icon) ?></td><!-- bake-2 --><?php if(isset($config['index_show_pos']) && $config['index_show_pos']){ ?>
								<td class="pos integer" name="pos" value="<?= $this->Number->format($phone->pos) ?>"><?= $this->Number->format($phone->pos) ?></td><!-- bake-3 -->
<?php } ?>
<?php if(isset($config['index_show_visible']) && $config['index_show_visible']){ ?>
								<td class="visible boolean" name="visible" value="<?= $phone->visible ?>"><?= h($phone->visible) ?></td><!-- bake-2 -->
<?php } ?>
								<td class="action string" name="action" value="<?= $phone->action ?>"><?= h($phone->action) ?></td><!-- bake-2 -->


<?php if(isset($config['index_show_created']) && $config['index_show_created'] || isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
								<td class="datetime created-modified">
<?php 	if(isset($config['index_show_created']) && $config['index_show_created']){ ?>
									<?= h($phone->created) ?>
<?php 	} ?>
<?php 	if(isset($config['index_show_created']) && $config['index_show_created'] && isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
									<br>
<?php 	} ?>
<?php 	if(isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
									<?= h($phone->modified) ?>
<?php 	} ?>
								</td>
<?php } ?>


<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
								<td class="actions text-center">
<?php 	if(isset($config['index_enable_view']) && $config['index_enable_view']){ ?>					  
									<?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $phone->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this record')]) ?>
<?php 	} ?>
<?php 	if(isset($config['index_enable_edit']) && $config['index_enable_edit']){ ?>					  
									<?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $phone->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this record')]) ?>
<?php 	} ?>			
<?php 	if(isset($config['index_enable_delete']) && $config['index_enable_delete']){ ?>					  
									<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $phone->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $phone->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
									<?= $this->Form->postLink('', ['action' => 'delete', $phone->id], ['class'=>'crose-btn hide-postlink action-button-delete']) ?>
									<a href="javascript:;" class="btn btn-sm btn-danger delete postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($phone->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="icon-minus"></i></a>
									
<?php 	} ?>
								</td>					  
<?php } ?>
							</tr>
						<?php endforeach; ?>
						</tbody>
                </table>
              </div>
              <!-- /.card-body -->
			  
			  <div class="card-footer clearfix">
				<?= $this->element('JeffAdmin.paginateBottom') ?>
				<?php //= $this->Paginator->counter(__('Page  of , showing  record(s) out of  total')) ?>
              </div>			  
			  
            </div>
            <!-- /.card -->
        </div>

	<?php
	if(isset($config['index_show_actions']) && $config['index_show_actions'] && isset($config['index_enable_delete']) && $config['index_enable_delete']){ 
		$this->Html->script(
			[
				'JeffAdmin./dist/js/sweetalert_delete',
			],
			['block' => 'scriptBottom']
		);
	}	
	?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

	$(document).ready( function(){
		
<?php //if(isset($config['index_enable_db_click']) && $config['index_enable_db_click'] && isset($config['index_enable_edit']) && $config['index_enable_edit'] && $config['index_db_click_action'] && isset($config['index_db_click_action']) ){ ?>
<?php 	if(isset($prefix) && isset($config['index_db_click_action']) && $config['index_db_click_action'] !== ''){ ?>
<?php $url = $this->Url->build(['controller' => 'Phones', 'action' => $config['index_db_click_action']]); ?>
		$('tr').dblclick( function(){
<?php /* window.location.href = '/<?= $prefix ?>/phones/<?= $config['index_db_click_action'] ?>/'+$(this).attr('row-id'); */ ?>
			window.location.href = '<?= $url . '/' ?>' + $(this).attr('row-id');
		});
<?php 	} ?>
<?php //} ?>

<?php /*
	https://stackoverflow.com/questions/179713/how-to-change-the-href-attribute-for-a-hyperlink-using-jquery  -->
	A pagináció, ha a routerben szerepel az oldal főoldalként, akkor kell mert sessionben tárolódik néhány dolog és...
*/ ?>
<?php 
	$base = '';
	if($this->request->getAttribute('base') != '/'){
		$base = $this->request->getAttribute('base');
	}
?>
		$(".pagination a[href^='<?= $base ?>/<?= $prefix ?>?sort=']").each(function(){
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>", "<?= $base ?>/<?= $prefix ?>?page=1&sort=");
		});
		$(".pagination a[href='<?= $base ?>/<?= $prefix ?>']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>", "<?= $base ?>/<?= $prefix ?>?page=1");
		});
<?php if(isset($controller)){ ?>
		$(".pagination a[href^='<?= $base ?>/<?= $prefix ?>/phones?sort=']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>/phones?sort=", "<?= $base ?>/<?= $prefix ?>/phones?page=1&sort=");
		});
		$(".pagination a[href='<?= $base ?>/<?= $prefix ?>/phones']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>/phones", "<?= $base ?>/<?= $prefix ?>/phones?page=1");
		});
<?php } ?>

	});
	<?php $this->Html->scriptEnd(); ?>
