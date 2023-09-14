<?php // Baked at 2023.09.14. 10:35:03  ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Opening $opening
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

	if(!isset($layoutOpeningsLastId)){
		$layoutOpeningsLastId = 0;
	}
	
?>
		<div class="view col-sm-10 openings">
			<div class="card card-lightblue">
				<div class="card-header">
					<h3 class="card-title"><?= $title ?>: <?= h($opening->name) ?></h3>
				</div><!-- /.card-header -->
				<div class="card-body">
				
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"><?= __('id') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?= $opening->id ?>
							</div>
						</div>
					</div>
					<div class="form-group row"><!-- 1. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('My User') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field associated">
								<?= $opening->has('my_user') ? $this->Html->link($opening->my_user->email, ['controller' => 'MyUsers', 'action' => 'view', $opening->my_user->id], ['escape' => false, 'class' => 'btn btn-sm btn-default']) : '&nbsp;' ?>
							</div>
						</div>
					</div>
					<div class="form-group row"><!-- 1. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('Person') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field associated">
								<?= $opening->has('person') ? $this->Html->link($opening->person->name, ['controller' => 'Persons', 'action' => 'view', $opening->person->id], ['escape' => false, 'class' => 'btn btn-sm btn-default']) : '&nbsp;' ?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="name" class="col-sm-2 col-form-label"><?= __('Name') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($opening->name)){
										echo h($opening->name);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="hour-from" class="col-sm-2 col-form-label"><?= __('Hour From') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($opening->hour_from)){
										echo h($opening->hour_from);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="hour-to" class="col-sm-2 col-form-label"><?= __('Hour To') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($opening->hour_to)){
										echo h($opening->hour_to);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="comment" class="col-sm-2 col-form-label"><?= __('Comment') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($opening->comment)){
										echo h($opening->comment);
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
									if(!empty($opening->action)){
										echo h($opening->action);
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
									if(!empty($opening->pos)){
										echo $this->Number->format($opening->pos);
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
									if(!empty($opening->created)){
										echo h($opening->created);
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
									if(!empty($opening->modified)){
										echo h($opening->modified);
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
