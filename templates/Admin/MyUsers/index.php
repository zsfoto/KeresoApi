<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MyUser[]|\Cake\Collection\CollectionInterface $myUsers
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

	if(!isset($layoutMyUsersLastId)){
		$layoutMyUsersLastId = 0;
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
			  
				<?php //= __('MyUsers') ?>	
				<div class="card-body table-responsive p-0 myUsers">
<?php //debug($session->read()); ?>
					<table class="table table-hover table-striped table-bordered text-nowrap">
						<thead>
							<tr>
								<th class="row-id-anchor"></th>
<?php if(isset($config['index_show_id']) && $config['index_show_id']){ ?>
								<th class="id uuid"><?= $this->Paginator->sort('id') ?></th>
<?php } ?>
								<th class="username string"><?= $this->Paginator->sort('username') ?></th>
								<th class="email string"><?= $this->Paginator->sort('email') ?></th>
								<th class="first-name string"><?= $this->Paginator->sort('first_name') ?></th>
								<th class="last-name string"><?= $this->Paginator->sort('last_name') ?></th>
								<th class="activation-date datetime"><?= $this->Paginator->sort('activation_date') ?></th>
								<th class="secret string"><?= $this->Paginator->sort('secret') ?></th>
								<th class="secret-verified boolean"><?= $this->Paginator->sort('secret_verified') ?></th>
								<th class="tos-date datetime"><?= $this->Paginator->sort('tos_date') ?></th>
								<th class="active boolean"><?= $this->Paginator->sort('active') ?></th>
								<th class="is-superuser boolean"><?= $this->Paginator->sort('is_superuser') ?></th>
								<th class="role string"><?= $this->Paginator->sort('role') ?></th>
								<th class="warning integer"><?= $this->Paginator->sort('warning') ?></th>
								<th class="additional-data json"><?= $this->Paginator->sort('additional_data') ?></th>
								<th class="last-login datetime"><?= $this->Paginator->sort('last_login') ?></th>
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<th class="category-count integer"><?= $this->Paginator->sort('category_count') ?></th>
<?php } ?>
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<th class="person-count integer"><?= $this->Paginator->sort('person_count') ?></th>
<?php } ?>
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
					<?php foreach ($myUsers as $myUser): ?>
							<tr row-id="<?= $myUser->id ?>"<?php if($myUser->id == $layoutMyUsersLastId){ echo ' class="table-tr-last-id"'; } ?>  prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
								<td class="row-id-anchor" value="<?= $myUser->id ?>"><a class="anchor" name="<?= $myUser->id ?>"></a></td><!-- bake-0 --><?php if(isset($config['index_show_id']) && $config['index_show_id']){ ?>
								<td class="id uuid" name="id" value="<?= $myUser->id ?>"><?= h($myUser->id) ?></td><!-- bake-2 -->
<?php } ?>
								<td class="username string" name="username" value="<?= $myUser->username ?>"><?= h($myUser->username) ?></td><!-- bake-2 -->
								<td class="email string" name="email" value="<?= $myUser->email ?>"><?= h($myUser->email) ?></td><!-- bake-2 -->
								<td class="first-name string" name="first-name" value="<?= $myUser->first_name ?>"><?= h($myUser->first_name) ?></td><!-- bake-2 -->
								<td class="last-name string" name="last-name" value="<?= $myUser->last_name ?>"><?= h($myUser->last_name) ?></td><!-- bake-2 -->
								<td class="activation-date datetime" name="activation-date" value="<?= $myUser->activation_date ?>"><?= h($myUser->activation_date) ?></td><!-- bake-2 -->
								<td class="secret string" name="secret" value="<?= $myUser->secret ?>"><?= h($myUser->secret) ?></td><!-- bake-2 -->
								<td class="secret-verified boolean" name="secret-verified" value="<?= $myUser->secret_verified ?>"><?= h($myUser->secret_verified) ?></td><!-- bake-2 -->
								<td class="tos-date datetime" name="tos-date" value="<?= $myUser->tos_date ?>"><?= h($myUser->tos_date) ?></td><!-- bake-2 -->
								<td class="active boolean" name="active" value="<?= $myUser->active ?>"><?= h($myUser->active) ?></td><!-- bake-2 -->
								<td class="is-superuser boolean" name="is-superuser" value="<?= $myUser->is_superuser ?>"><?= h($myUser->is_superuser) ?></td><!-- bake-2 -->
								<td class="role string" name="role" value="<?= $myUser->role ?>"><?= h($myUser->role) ?></td><!-- bake-2 -->
								<td class="warning integer" name="warning" value="<?= $this->Number->format($myUser->warning) ?>"><?= $this->Number->format($myUser->warning) ?></td><!-- bake-3 -->
								<td class="additional-data json" name="additional-data" value="<?= $myUser->additional_data ?>"><?= h($myUser->additional_data) ?></td><!-- bake-2 -->
								<td class="last-login datetime" name="last-login" value="<?= $myUser->last_login ?>"><?= h($myUser->last_login) ?></td><!-- bake-2 -->
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<td class="category-count integer" name="category-count" value="<?= $this->Number->format($myUser->category_count) ?>"><?= $this->Number->format($myUser->category_count) ?></td><!-- bake-3 -->
<?php } ?>
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<td class="person-count integer" name="person-count" value="<?= $this->Number->format($myUser->person_count) ?>"><?= $this->Number->format($myUser->person_count) ?></td><!-- bake-3 -->
<?php } ?>
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<td class="phone-count integer" name="phone-count" value="<?= $this->Number->format($myUser->phone_count) ?>"><?= $this->Number->format($myUser->phone_count) ?></td><!-- bake-3 -->
<?php } ?>
<?php if(isset($config['index_show_counts']) && $config['index_show_counts']){ ?>
								<td class="opening-count integer" name="opening-count" value="<?= $this->Number->format($myUser->opening_count) ?>"><?= $this->Number->format($myUser->opening_count) ?></td><!-- bake-3 -->
<?php } ?>


<?php if(isset($config['index_show_created']) && $config['index_show_created'] || isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
								<td class="datetime created-modified">
<?php 	if(isset($config['index_show_created']) && $config['index_show_created']){ ?>
									<?= h($myUser->created) ?>
<?php 	} ?>
<?php 	if(isset($config['index_show_created']) && $config['index_show_created'] && isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
									<br>
<?php 	} ?>
<?php 	if(isset($config['index_show_modified']) && $config['index_show_modified']){ ?>
									<?= h($myUser->modified) ?>
<?php 	} ?>
								</td>
<?php } ?>


<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
								<td class="actions text-center">
<?php 	if(isset($config['index_enable_view']) && $config['index_enable_view']){ ?>					  
									<?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $myUser->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this record')]) ?>
<?php 	} ?>
<?php 	if(isset($config['index_enable_edit']) && $config['index_enable_edit']){ ?>					  
									<?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $myUser->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this record')]) ?>
<?php 	} ?>			
<?php 	if(isset($config['index_enable_delete']) && $config['index_enable_delete']){ ?>					  
									<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $myUser->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $myUser->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
									<?= $this->Form->postLink('', ['action' => 'delete', $myUser->id], ['class'=>'crose-btn hide-postlink action-button-delete']) ?>
									<a href="javascript:;" class="btn btn-sm btn-danger delete postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($myUser->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="icon-minus"></i></a>
									
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
<?php $url = $this->Url->build(['controller' => 'MyUsers', 'action' => $config['index_db_click_action']]); ?>
		$('tr').dblclick( function(){
<?php /* window.location.href = '/<?= $prefix ?>/myUsers/<?= $config['index_db_click_action'] ?>/'+$(this).attr('row-id'); */ ?>
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
		$(".pagination a[href^='<?= $base ?>/<?= $prefix ?>/myUsers?sort=']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>/myUsers?sort=", "<?= $base ?>/<?= $prefix ?>/myUsers?page=1&sort=");
		});
		$(".pagination a[href='<?= $base ?>/<?= $prefix ?>/myUsers']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>/myUsers", "<?= $base ?>/<?= $prefix ?>/myUsers?page=1");
		});
<?php } ?>

	});
	<?php $this->Html->scriptEnd(); ?>
