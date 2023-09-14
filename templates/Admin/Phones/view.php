<?php // Baked at 2023.09.14. 10:34:56  ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phone $phone
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

	if(!isset($layoutPhonesLastId)){
		$layoutPhonesLastId = 0;
	}
	
?>
		<div class="view col-sm-10 phones">
			<div class="card card-lightblue">
				<div class="card-header">
					<h3 class="card-title"><?= $title ?>: <?= h($phone->name) ?></h3>
				</div><!-- /.card-header -->
				<div class="card-body">
				
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"><?= __('id') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?= $phone->id ?>
							</div>
						</div>
					</div>
					<div class="form-group row"><!-- 1. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('My User') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field associated">
								<?= $phone->has('my_user') ? $this->Html->link($phone->my_user->email, ['controller' => 'MyUsers', 'action' => 'view', $phone->my_user->id], ['escape' => false, 'class' => 'btn btn-sm btn-default']) : '&nbsp;' ?>
							</div>
						</div>
					</div>
					<div class="form-group row"><!-- 1. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('Person') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field associated">
								<?= $phone->has('person') ? $this->Html->link($phone->person->name, ['controller' => 'Persons', 'action' => 'view', $phone->person->id], ['escape' => false, 'class' => 'btn btn-sm btn-default']) : '&nbsp;' ?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('Name') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($phone->name)){
										echo h($phone->name);
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
									if(!empty($phone->description)){
										echo h($phone->description);
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
									if(!empty($phone->phone)){
										echo h($phone->phone);
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
									if(!empty($phone->ext)){
										echo h($phone->ext);
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
									if(!empty($phone->email)){
										echo h($phone->email);
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
									if(!empty($phone->slug)){
										echo h($phone->slug);
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
									if(!empty($phone->iconType)){
										echo h($phone->iconType);
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
									if(!empty($phone->icon)){
										echo h($phone->icon);
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
									if(!empty($phone->action)){
										echo h($phone->action);
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
									if(!empty($phone->pos)){
										echo $this->Number->format($phone->pos);
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
									if(!empty($phone->created)){
										echo h($phone->created);
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
									if(!empty($phone->modified)){
										echo h($phone->modified);
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
					</ul>
				</div>


				<div class="card-body p-0">
					<div class="tab-content" id="custom-tabs-four-tabContent">

					</div>
				</div><!-- /.card -->
			</div>
		</div>

<!-- ######################################################################################################################## -->
<!-- ######################################################################################################################## -->
<!-- ######################################################################################################################## -->
<?php //NINCS TEXT ?>
