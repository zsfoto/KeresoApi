<?php // Baked at 2023.09.14. 10:36:59  ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
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

	if(!isset($layoutCitiesLastId)){
		$layoutCitiesLastId = 0;
	}
	
?>
		<div class="view col-sm-10 cities">
			<div class="card card-lightblue">
				<div class="card-header">
					<h3 class="card-title"><?= $title ?>: <?= h($city->name) ?></h3>
				</div><!-- /.card-header -->
				<div class="card-body">
				
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"><?= __('id') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?= $city->id ?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('Name') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($city->name)){
										echo h($city->name);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="zip" class="col-sm-2 col-form-label"><?= __('Zip') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($city->zip)){
										echo h($city->zip);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="county-short" class="col-sm-2 col-form-label"><?= __('County Short') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($city->county_short)){
										echo h($city->county_short);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="longitude" class="col-sm-2 col-form-label"><?= __('Longitude') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($city->longitude)){
										echo h($city->longitude);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="latitude" class="col-sm-2 col-form-label"><?= __('Latitude') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($city->latitude)){
										echo h($city->latitude);
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
									if(!empty($city->person_count)){
										echo $this->Number->format($city->person_count);
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
									if(!empty($city->created)){
										echo h($city->created);
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
									if(!empty($city->modified)){
										echo h($city->modified);
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
<?php if (!empty($city->persons)): ?>
						<li class="nav-item view-tab">
							<a class="nav-link active" id="related-tab-persons" data-toggle="pill" href="#tab-persons" role="tab" aria-controls="aria-tab-persons" aria-selected="true"><?= __('Persons') ?></a>
						</li>
<?php endif; ?>
					</ul>
				</div>


				<div class="card-body p-0">
					<div class="tab-content" id="custom-tabs-four-tabContent">
<?php if (!empty($city->persons)) : ?>
						<div class="tab-pane fade active show" id="tab-persons" role="tabpanel" aria-labelledby="aria-tab-persons">
<?php /* */ ?>



							<div class="col-12 table-responsive p-0">

								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th class="id"><?= __('Id') ?></th>
											<th class="user-id"><?= __('User Id') ?></th>
											<th class="category-id"><?= __('Category Id') ?></th>
											<th class="city-id"><?= __('City Id') ?></th>
											<th class="name"><?= __('Name') ?></th>
											<th class="description"><?= __('Description') ?></th>
											<th class="phone"><?= __('Phone') ?></th>
											<th class="ext"><?= __('Ext') ?></th>
											<th class="phone2"><?= __('Phone2') ?></th>
											<th class="ext2"><?= __('Ext2') ?></th>
											<th class="fax"><?= __('Fax') ?></th>
											<th class="ext-fax"><?= __('Ext Fax') ?></th>
											<th class="email"><?= __('Email') ?></th>
											<th class="website"><?= __('Website') ?></th>
											<th class="address"><?= __('Address') ?></th>
											<th class="more"><?= __('More') ?></th>
											<th class="keywords"><?= __('Keywords') ?></th>
											<th class="slug"><?= __('Slug') ?></th>
											<th class="iconType"><?= __('IconType') ?></th>
											<th class="icon"><?= __('Icon') ?></th>
											<th class="longitude"><?= __('Longitude') ?></th>
											<th class="latitude"><?= __('Latitude') ?></th>
											<th class="googlemap-url"><?= __('Googlemap Url') ?></th>
											<th class="pos"><?= __('Pos') ?></th>
											<th class="visible"><?= __('Visible') ?></th>
											<th class="action"><?= __('Action') ?></th>
											<th class="phone-count"><?= __('Phone Count') ?></th>
											<th class="opening-count"><?= __('Opening Count') ?></th>
											<th class="created"><?= __('Created') ?></th>
											<th class="modified"><?= __('Modified') ?></th>
<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
											<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($city->persons as $persons): ?>
										<tr aria-expanded="true">
<?php if($config['index_show_actions'] !== null && $config['index_show_actions']){ ?>
											<td class="actions text-center">
<?php 	if($config['index_enable_view'] !== null && $config['index_enable_view']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'Persons', 'action' => 'view', $persons->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this record')]) ?>
<?php 	} ?>
<?php 	if($config['index_enable_edit'] !== null && $config['index_enable_edit']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'Persons', 'action' => 'edit', $persons->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this record')]) ?>
<?php 	} ?>			
<?php 	if($config['index_enable_delete'] !== null && $config['index_enable_delete']){ ?>					  
												<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $city->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $city->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
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
