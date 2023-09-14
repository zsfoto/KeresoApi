<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
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

	if(!isset($layoutPersonsLastId)){
		$layoutPersonsLastId = 0;
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
			  
				<?php //= __('Persons') ?>	
				<div class="card-body table-responsive p-0 persons">
<?php //debug($session->read()); ?>
					<table class="table table-hover table-striped table-bordered text-nowrap">
						<thead>
							<tr>
								<th class="row-id-anchor"></th>
<?php if(isset($config['index_show_id']) && $config['index_show_id']){ ?>
								<th class="id integer"><?= $this->Paginator->sort('id') ?></th>
<?php } ?>
								<th class="user-id string"><?= $this->Paginator->sort('user_id') ?></th>
								<th class="category-id integer"><?= $this->Paginator->sort('category_id') ?></th>
								<th class="city-id integer"><?= $this->Paginator->sort('city_id') ?></th>
								<th class="name string"><?= $this->Paginator->sort('name') ?></th>
								<th class="description string"><?= $this->Paginator->sort('description') ?></th>
								<th class="phone string"><?= $this->Paginator->sort('phone') ?></th>
								<th class="ext string"><?= $this->Paginator->sort('ext') ?></th>
								<th class="phone2 string"><?= $this->Paginator->sort('phone2') ?></th>
								<th class="ext2 string"><?= $this->Paginator->sort('ext2') ?></th>
								<th class="fax string"><?= $this->Paginator->sort('fax') ?></th>
								<th class="ext-fax string"><?= $this->Paginator->sort('ext_fax') ?></th>
								<th class="email string"><?= $this->Paginator->sort('email') ?></th>
								<th class="website string"><?= $this->Paginator->sort('website') ?></th>
								<th class="address string"><?= $this->Paginator->sort('address') ?></th>
								<th class="keywords string"><?= $this->Paginator->sort('keywords') ?></th>
								<th class="slug string"><?= $this->Paginator->sort('slug') ?></th>
								<th class="iconType string"><?= $this->Paginator->sort('iconType') ?></th>
								<th class="icon string"><?= $this->Paginator->sort('icon') ?></th>
								<th class="longitude string"><?= $this->Paginator->sort('longitude') ?></th>
								<th class="latitude string"><?= $this->Paginator->sort('latitude') ?></th>
								<th class="googlemap-url string"><?= $this->Paginator->sort('googlemap_url') ?></th>
<?php if(isset($config['index_show_pos']) && $config['index_show_pos']){ ?>

								<th class="pos integer"><?= $this->Paginator->sort('pos') ?></th>
<?php } ?>
<?php if(isset($config['index_show_visible']) && $config['index_show_visible']){ ?>

								<th class="visible boolean"><?= $this->Paginator->sort('visible') ?></th>
<?php } ?>
								<th class="action string"><?= $this->Paginator->sort('action') ?></th>
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<th class="phone-count integer"><?= $this->Paginator->sort('phone_count') ?></th>
<?php } ?>
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<th class="opening-count integer"><?= $this->Paginator->sort('opening_count') ?></th>
<?php } ?>
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
					<?php foreach ($persons as $person): ?>
							<tr row-id="<?= $person->id ?>"<?php if($person->id == $layoutPersonsLastId){ echo ' class="table-tr-last-id"'; } ?>  prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
								<td class="row-id-anchor" value="<?= $person->id ?>"><a class="anchor" name="<?= $person->id ?>"></a></td><!-- bake-0 -->
<?php if(isset($config['index_show_id']) && $config['index_show_id']){ ?>
								<td class="id integer" name="id" value="<?= $this->Number->format($person->id) ?>"><?= $this->Number->format($person->id) ?></td><!-- bake-3 -->
<?php } ?>
								<td class="user-id string link text-left" value="<?= $person->user_id ?>"><?= $person->has('my_user') ? $this->Html->link($person->my_user->email, ['controller' => 'MyUsers', 'action' => 'view', $person->my_user->id]) : '' ?></td><!-- bake-1 -->
								<td class="category-id integer link text-left" value="<?= $person->category_id ?>"><?= $person->has('category') ? $this->Html->link($person->category->name, ['controller' => 'Categories', 'action' => 'view', $person->category->id]) : '' ?></td><!-- bake-1 -->
								<td class="city-id integer link text-left" value="<?= $person->city_id ?>"><?= $person->has('city') ? $this->Html->link($person->city->name, ['controller' => 'Cities', 'action' => 'view', $person->city->id]) : '' ?></td><!-- bake-1 -->
								<td class="name string" name="name" value="<?= $person->name ?>"><?= h($person->name) ?></td><!-- bake-2 -->
								<td class="description string" name="description" value="<?= $person->description ?>"><?= h($person->description) ?></td><!-- bake-2 -->
								<td class="phone string" name="phone" value="<?= $person->phone ?>"><?= h($person->phone) ?></td><!-- bake-2 -->
								<td class="ext string" name="ext" value="<?= $person->ext ?>"><?= h($person->ext) ?></td><!-- bake-2 -->
								<td class="phone2 string" name="phone2" value="<?= $person->phone2 ?>"><?= h($person->phone2) ?></td><!-- bake-2 -->
								<td class="ext2 string" name="ext2" value="<?= $person->ext2 ?>"><?= h($person->ext2) ?></td><!-- bake-2 -->
								<td class="fax string" name="fax" value="<?= $person->fax ?>"><?= h($person->fax) ?></td><!-- bake-2 -->
								<td class="ext-fax string" name="ext-fax" value="<?= $person->ext_fax ?>"><?= h($person->ext_fax) ?></td><!-- bake-2 -->
								<td class="email string" name="email" value="<?= $person->email ?>"><?= h($person->email) ?></td><!-- bake-2 -->
								<td class="website string" name="website" value="<?= $person->website ?>"><?= h($person->website) ?></td><!-- bake-2 -->
								<td class="address string" name="address" value="<?= $person->address ?>"><?= h($person->address) ?></td><!-- bake-2 -->
								<td class="keywords string" name="keywords" value="<?= $person->keywords ?>"><?= h($person->keywords) ?></td><!-- bake-2 -->
								<td class="slug string" name="slug" value="<?= $person->slug ?>"><?= h($person->slug) ?></td><!-- bake-2 -->
								<td class="iconType string" name="iconType" value="<?= $person->iconType ?>"><?= h($person->iconType) ?></td><!-- bake-2 -->
								<td class="icon string" name="icon" value="<?= $person->icon ?>"><?= h($person->icon) ?></td><!-- bake-2 -->
								<td class="longitude string" name="longitude" value="<?= $person->longitude ?>"><?= h($person->longitude) ?></td><!-- bake-2 -->
								<td class="latitude string" name="latitude" value="<?= $person->latitude ?>"><?= h($person->latitude) ?></td><!-- bake-2 -->
								<td class="googlemap-url string" name="googlemap-url" value="<?= $person->googlemap_url ?>"><?= h($person->googlemap_url) ?></td><!-- bake-2 --><?php if(isset($config['index_show_pos']) && $config['index_show_pos']){ ?>
								<td class="pos integer" name="pos" value="<?= $this->Number->format($person->pos) ?>"><?= $this->Number->format($person->pos) ?></td><!-- bake-3 -->
<?php } ?>
<?php if(isset($config['index_show_visible']) && $config['index_show_visible']){ ?>
								<td class="visible boolean" name="visible" value="<?= $person->visible ?>"><?= h($person->visible) ?></td><!-- bake-2 -->
<?php } ?>
								<td class="action string" name="action" value="<?= $person->action ?>"><?= h($person->action) ?></td><!-- bake-2 -->
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<td class="phone-count integer" name="phone-count" value="<?= $this->Number->format($person->phone_count) ?>"><?= $this->Number->format($person->phone_count) ?></td><!-- bake-3 -->
<?php } ?>
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<td class="opening-count integer" name="opening-count" value="<?= $this->Number->format($person->opening_count) ?>"><?= $this->Number->format($person->opening_count) ?></td><!-- bake-3 -->
<?php } ?>


<?php if(isset($config['index_show_created']) && $config['index_show_created'] || isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
								<td class="datetime created-modified">
<?php 	if(isset($config['index_show_created']) && $config['index_show_created']){ ?>
									<?= h($person->created) ?>
<?php 	} ?>
<?php 	if(isset($config['index_show_created']) && $config['index_show_created'] && isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
									<br>
<?php 	} ?>
<?php 	if(isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
									<?= h($person->modified) ?>
<?php 	} ?>
								</td>
<?php } ?>


<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
								<td class="actions text-center">
<?php 	if(isset($config['index_enable_view']) && $config['index_enable_view']){ ?>					  
									<?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $person->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this record')]) ?>
<?php 	} ?>
<?php 	if(isset($config['index_enable_edit']) && $config['index_enable_edit']){ ?>					  
									<?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $person->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this record')]) ?>
<?php 	} ?>			
<?php 	if(isset($config['index_enable_delete']) && $config['index_enable_delete']){ ?>					  
									<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $person->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
									<?= $this->Form->postLink('', ['action' => 'delete', $person->id], ['class'=>'crose-btn hide-postlink action-button-delete']) ?>
									<a href="javascript:;" class="btn btn-sm btn-danger delete postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($person->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="icon-minus"></i></a>
									
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
<?php $url = $this->Url->build(['controller' => 'Persons', 'action' => $config['index_db_click_action']]); ?>
		$('tr').dblclick( function(){
<?php /* window.location.href = '/<?= $prefix ?>/persons/<?= $config['index_db_click_action'] ?>/'+$(this).attr('row-id'); */ ?>
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
		$(".pagination a[href^='<?= $base ?>/<?= $prefix ?>/persons?sort=']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>/persons?sort=", "<?= $base ?>/<?= $prefix ?>/persons?page=1&sort=");
		});
		$(".pagination a[href='<?= $base ?>/<?= $prefix ?>/persons']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>/persons", "<?= $base ?>/<?= $prefix ?>/persons?page=1");
		});
<?php } ?>

	});
	<?php $this->Html->scriptEnd(); ?>
