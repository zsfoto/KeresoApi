<?php // Baked at 2023.09.14. 09:46:45  ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
	use Cake\Core\Configure;

	$session 			= $this->getRequest()->getSession();
	$prefix 			= strtolower( $this->request->getParam('prefix') );	
	$controller 		= $this->request->getParam('controller');	// for DB click on <tr>
	$action 			= $this->request->getParam('action');		// for DB click on <tr>
	//$passedArgs 		= $this->request->getParam('pass');			// for DB click on <tr>
	
	$config = Configure::read('Theme.' . $prefix);	
	//-------> More config from \config\jeffadmin.php <------
	//$config['index_show_id'] 			= true;
	//
	//$url = $this->Url->build(['prefix' => $prefix, 'controller' => $controller , 'action' => $config['index_db_click_action']]);

	if(!isset($layoutCategoriesLastId)){
		$layoutCategoriesLastId = 0;
	}
	
?>
		<div class="view col-sm-10 categories">
			<div class="card card-lightblue">
				<div class="card-header">
					<h3 class="card-title"><?= $title ?>: <?= h($category->name) ?></h3>
				</div><!-- /.card-header -->
				<div class="card-body">
				
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"><?= __('id') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?= $category->id ?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('Name') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($category->name)){
										echo h($category->name);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="description" class="col-sm-2 col-form-label"><?= __('Description') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($category->description)){
										echo h($category->description);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="keywords" class="col-sm-2 col-form-label"><?= __('Keywords') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($category->keywords)){
										echo h($category->keywords);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="slug" class="col-sm-2 col-form-label"><?= __('Slug') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($category->slug)){
										echo h($category->slug);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="iconType" class="col-sm-2 col-form-label"><?= __('IconType') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($category->iconType)){
										echo h($category->iconType);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="icon" class="col-sm-2 col-form-label"><?= __('Icon') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($category->icon)){
										echo h($category->icon);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="action" class="col-sm-2 col-form-label"><?= __('Action') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($category->action)){
										echo h($category->action);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 4. -->
						<label for="pos" class="col-sm-2 col-form-label"><?= __('Pos') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field number">
								<?php
									if(!empty($category->pos)){
										echo $this->Number->format($category->pos);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 4. -->
						<label for="person-count" class="col-sm-2 col-form-label"><?= __('Person Count') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field number">
								<?php
									if(!empty($category->person_count)){
										echo $this->Number->format($category->person_count);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 5. -->
						<label for="created" class="col-sm-2 col-form-label"><?= __('Created') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field date">
								<?php
									if(!empty($category->created)){
										echo h($category->created);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 5. -->
						<label for="modified" class="col-sm-2 col-form-label"><?= __('Modified') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field date">
								<?php
									if(!empty($category->modified)){
										echo h($category->modified);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>
	
				</div><!-- /.card-body -->
				
				<div class="card-footer">
					<?= $this->Html->link('<span class="btn-label"><i class="fa fa-arrow-left"></i></span>' . __('Back to list'), ['action' => 'index', '#' => $id], ['class'=>'offset-sm-2 btn btn-info', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Back to list') ] ) ?>
				</div><!-- /.card-footer -->
				
			</div><!-- /. card -->
		</div><!-- /. col-sm-10 -->
		<!-- ################################################################################################################ -->

		<!-- ################################################################################################################ -->
		<div class="col-12">
			<div class="card card-primary card-outline card-outline-tabs">

				<div class="card-header p-0 border-bottom-0">
					<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
						<li class="pt-2 px-3">
							<h3 class="card-title" style="font-size: 22px;"><?= __('Related tables') ?></h3>
						</li>
<?php if (!empty($category->persons)): ?>
						<li class="nav-item view-tab">
							<a class="nav-link active" id="related-tab-persons" data-toggle="pill" href="#tab-persons" role="tab" aria-controls="aria-tab-persons" aria-selected="true"><?= __('Persons') ?></a>
						</li>
<?php endif; ?>
					</ul>
				</div>


				<div class="card-body p-0">
					<div class="tab-content" id="custom-tabs-four-tabContent">
<?php if (!empty($category->persons)) : ?>
						<div class="tab-pane fade active show" id="tab-persons" role="tabpanel" aria-labelledby="aria-tab-persons">
<?php //debug($category->persons) ?>						
<?php /* */ ?>



							<div class="col-12 table-responsive p-0">

								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th class="id"><?= __('Id') ?></th>
											<th class="name text-left">
												<?= __('Name') ?> / <?= __('Description') ?>
											</th>
											<th class="address"><?= __('Address') ?></th>
											<th class="phone"><?= __('Phone') ?></th>
<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
											<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
										</tr>
									</thead>
									<tbody>
<?php foreach ($category->persons as $persons): ?>
										<tr aria-expanded="true">
											<td class="string text-center">
												<?= $persons->id ?>
											</td>
											<td class="strin text-left">
												<?= $persons->name ?><br>
												<?= $persons->description ?>
											</td>
											<td class="string text-left">
												<?= $persons->address ?>
											</td>
											<td class="string text-left">
												<?= $persons->phone ?>
											</td>

<?php if($config['index_show_actions'] !== null && $config['index_show_actions']){ ?>
											<td class="actions text-center">
<?php 	if($config['index_enable_view'] !== null && $config['index_enable_view']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'Persons', 'action' => 'view', $persons->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this record')]) ?>
<?php 	} ?>
<?php 	if($config['index_enable_edit'] !== null && $config['index_enable_edit']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'Persons', 'action' => 'edit', $persons->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this record')]) ?>
<?php 	} ?>			
<?php 	if($config['index_enable_delete'] !== null && $config['index_enable_delete']){ ?>					  
												<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $category->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
												<?= $this->Form->postLink('', ['controller' => 'Persons', 'action' => 'delete', $persons->id], ['class'=>'crose-btn hide-postlink action-button-delete']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger delete postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($persons->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="icon-minus"></i></a>
<?php 	} ?>
											</td>					  
<?php } ?>	
										</tr>
<?php endforeach; ?>
									</tbody>
								</table>

								<div class="card-footer clearfix">
									&nbsp;
								</div>			  

							</div><!-- /.card -->

						</div>
<?php endif; ?>

					</div>
				</div><!-- /.card -->
			</div>
		</div>

<!-- ######################################################################################################################## -->
<!-- ######################################################################################################################## -->
<!-- ######################################################################################################################## -->
<?php //NINCS TEXT ?>
