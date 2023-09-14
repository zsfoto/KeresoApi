<?php // Baked at 2023.09.14. 10:34:42  ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
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

	if(!isset($layoutPersonsLastId)){
		$layoutPersonsLastId = 0;
	}
	
?>
		<div class="view col-sm-10 persons">
			<div class="card card-lightblue">
				<div class="card-header">
					<h3 class="card-title"><?= $title ?>: <?= h($person->name) ?></h3>
				</div><!-- /.card-header -->
				<div class="card-body">
				
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"><?= __('id') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?= $person->id ?>
							</div>
						</div>
					</div>
					<div class="form-group row"><!-- 1. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('My User') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field associated">
								<?= $person->has('my_user') ? $this->Html->link($person->my_user->email, ['controller' => 'MyUsers', 'action' => 'view', $person->my_user->id], ['escape' => false, 'class' => 'btn btn-sm btn-default']) : '&nbsp;' ?>
							</div>
						</div>
					</div>
					<div class="form-group row"><!-- 1. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('Category') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field associated">
								<?= $person->has('category') ? $this->Html->link($person->category->name, ['controller' => 'Categories', 'action' => 'view', $person->category->id], ['escape' => false, 'class' => 'btn btn-sm btn-default']) : '&nbsp;' ?>
							</div>
						</div>
					</div>
					<div class="form-group row"><!-- 1. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('City') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field associated">
								<?= $person->has('city') ? $this->Html->link($person->city->name, ['controller' => 'Cities', 'action' => 'view', $person->city->id], ['escape' => false, 'class' => 'btn btn-sm btn-default']) : '&nbsp;' ?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('Name') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->name)){
										echo h($person->name);
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
									if(!empty($person->description)){
										echo h($person->description);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="phone" class="col-sm-2 col-form-label"><?= __('Phone') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->phone)){
										echo h($person->phone);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="ext" class="col-sm-2 col-form-label"><?= __('Ext') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->ext)){
										echo h($person->ext);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="phone2" class="col-sm-2 col-form-label"><?= __('Phone2') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->phone2)){
										echo h($person->phone2);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="ext2" class="col-sm-2 col-form-label"><?= __('Ext2') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->ext2)){
										echo h($person->ext2);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="fax" class="col-sm-2 col-form-label"><?= __('Fax') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->fax)){
										echo h($person->fax);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="ext-fax" class="col-sm-2 col-form-label"><?= __('Ext Fax') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->ext_fax)){
										echo h($person->ext_fax);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="email" class="col-sm-2 col-form-label"><?= __('Email') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->email)){
										echo h($person->email);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="website" class="col-sm-2 col-form-label"><?= __('Website') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->website)){
										echo h($person->website);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="address" class="col-sm-2 col-form-label"><?= __('Address') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->address)){
										echo h($person->address);
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
									if(!empty($person->keywords)){
										echo h($person->keywords);
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
									if(!empty($person->slug)){
										echo h($person->slug);
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
									if(!empty($person->iconType)){
										echo h($person->iconType);
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
									if(!empty($person->icon)){
										echo h($person->icon);
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
									if(!empty($person->longitude)){
										echo h($person->longitude);
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
									if(!empty($person->latitude)){
										echo h($person->latitude);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="googlemap-url" class="col-sm-2 col-form-label"><?= __('Googlemap Url') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($person->googlemap_url)){
										echo h($person->googlemap_url);
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
									if(!empty($person->action)){
										echo h($person->action);
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
									if(!empty($person->pos)){
										echo $this->Number->format($person->pos);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 4. -->
						<label for="phone-count" class="col-sm-2 col-form-label"><?= __('Phone Count') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field number">
								<?php
									if(!empty($person->phone_count)){
										echo $this->Number->format($person->phone_count);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 4. -->
						<label for="opening-count" class="col-sm-2 col-form-label"><?= __('Opening Count') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field number">
								<?php
									if(!empty($person->opening_count)){
										echo $this->Number->format($person->opening_count);
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
									if(!empty($person->created)){
										echo h($person->created);
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
									if(!empty($person->modified)){
										echo h($person->modified);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 7. -->
						<label for="more" class="col-sm-2 col-form-label"><?= __('More') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field text show-more">
								<?php // $this->Text->autoParagraph(h($person->more)); ?>
								<?php
									if(!empty($person->more)){
										//echo $this->Text->autoParagraph($person->more) . "<br>";
										echo $person->more . "<br>";
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
<?php if (!empty($person->openings)): ?>
						<li class="nav-item view-tab">
							<a class="nav-link active" id="related-tab-openings" data-toggle="pill" href="#tab-openings" role="tab" aria-controls="aria-tab-openings" aria-selected="true"><?= __('Openings') ?></a>
						</li>
<?php endif; ?>
<?php if (!empty($person->phones)): ?>
						<li class="nav-item view-tab">
							<a class="nav-link" id="related-tab-phones" data-toggle="pill" href="#tab-phones" role="tab" aria-controls="aria-tab-phones" aria-selected="false"><?= __('Phones') ?></a>
						</li>
<?php endif; ?>
					</ul>
				</div>


				<div class="card-body p-0">
					<div class="tab-content" id="custom-tabs-four-tabContent">
<?php if (!empty($person->openings)) : ?>
						<div class="tab-pane fade active show" id="tab-openings" role="tabpanel" aria-labelledby="aria-tab-openings">
<?php /* */ ?>



							<div class="col-12 table-responsive p-0">

								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th class="id"><?= __('Id') ?></th>
											<th class="user-id"><?= __('User Id') ?></th>
											<th class="person-id"><?= __('Person Id') ?></th>
											<th class="name"><?= __('Name') ?></th>
											<th class="hour-from"><?= __('Hour From') ?></th>
											<th class="hour-to"><?= __('Hour To') ?></th>
											<th class="comment"><?= __('Comment') ?></th>
											<th class="pos"><?= __('Pos') ?></th>
											<th class="visible"><?= __('Visible') ?></th>
											<th class="action"><?= __('Action') ?></th>
											<th class="created"><?= __('Created') ?></th>
											<th class="modified"><?= __('Modified') ?></th>
<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
											<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($person->openings as $openings): ?>
										<tr aria-expanded="true">
<?php if($config['index_show_actions'] !== null && $config['index_show_actions']){ ?>
											<td class="actions text-center">
<?php 	if($config['index_enable_view'] !== null && $config['index_enable_view']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'Openings', 'action' => 'view', $openings->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this record')]) ?>
<?php 	} ?>
<?php 	if($config['index_enable_edit'] !== null && $config['index_enable_edit']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'Openings', 'action' => 'edit', $openings->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this record')]) ?>
<?php 	} ?>			
<?php 	if($config['index_enable_delete'] !== null && $config['index_enable_delete']){ ?>					  
												<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $person->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
												<?= $this->Form->postLink('', ['controller' => 'Openings', 'action' => 'delete', $openings->id], ['class'=>'crose-btn hide-postlink action-button-delete']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger delete postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($openings->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="icon-minus"></i></a>
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
<?php if (!empty($person->phones)) : ?>
						<div class="tab-pane fade" id="tab-phones" role="tabpanel" aria-labelledby="aria-tab-phones">
<?php /* */ ?>



							<div class="col-12 table-responsive p-0">

								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th class="id"><?= __('Id') ?></th>
											<th class="user-id"><?= __('User Id') ?></th>
											<th class="person-id"><?= __('Person Id') ?></th>
											<th class="name"><?= __('Name') ?></th>
											<th class="description"><?= __('Description') ?></th>
											<th class="phone"><?= __('Phone') ?></th>
											<th class="ext"><?= __('Ext') ?></th>
											<th class="email"><?= __('Email') ?></th>
											<th class="slug"><?= __('Slug') ?></th>
											<th class="iconType"><?= __('IconType') ?></th>
											<th class="icon"><?= __('Icon') ?></th>
											<th class="pos"><?= __('Pos') ?></th>
											<th class="visible"><?= __('Visible') ?></th>
											<th class="action"><?= __('Action') ?></th>
											<th class="created"><?= __('Created') ?></th>
											<th class="modified"><?= __('Modified') ?></th>
<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
											<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($person->phones as $phones): ?>
										<tr aria-expanded="true">
<?php if($config['index_show_actions'] !== null && $config['index_show_actions']){ ?>
											<td class="actions text-center">
<?php 	if($config['index_enable_view'] !== null && $config['index_enable_view']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'Phones', 'action' => 'view', $phones->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this record')]) ?>
<?php 	} ?>
<?php 	if($config['index_enable_edit'] !== null && $config['index_enable_edit']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'Phones', 'action' => 'edit', $phones->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this record')]) ?>
<?php 	} ?>			
<?php 	if($config['index_enable_delete'] !== null && $config['index_enable_delete']){ ?>					  
												<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $person->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
												<?= $this->Form->postLink('', ['controller' => 'Phones', 'action' => 'delete', $phones->id], ['class'=>'crose-btn hide-postlink action-button-delete']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger delete postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($phones->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="icon-minus"></i></a>
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

<?php
	$this->Html->css(
		[
			'JeffAdmin./plugins/multiline-truncation-ellipsis-toggle/src/index',
			'JeffAdmin./plugins/Collapse-Long-Content-View-More-jQuery/showmore-default',
		],
		['block' => true]
	);

	$this->Html->script(
		[
			'JeffAdmin./plugins/multiline-truncation-ellipsis-toggle/src/jquery.multiTextToggleCollapse',
			'JeffAdmin./plugins/Collapse-Long-Content-View-More-jQuery/jquery.show-more',			
			'JeffAdmin./dist/js/sweetalert_delete',
		],
		['block' => 'scriptBottom']
	);
?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

	$(document).ready( function(){
		//$(".view .text").multiTextToggleCollapse({
		//	line:4
		//});
		
		$('.show-more').showMore({
			minheight: 100,
			buttontxtmore: '<?= __('&darr;&nbsp;more content&nbsp;&darr;') ?>',
			buttontxtless: '<?= __('&uarr;&nbsp;less content&nbsp;&uarr;') ?>',
			//buttoncss: 'my-button-css',
			animationspeed: 250
		});
		
	});

<?php $this->Html->scriptEnd(); ?>

