<?php // Baked at 2023.09.14. 10:37:32  ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MyUser $myUser
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

	if(!isset($layoutMyUsersLastId)){
		$layoutMyUsersLastId = 0;
	}
	
?>
		<div class="view col-sm-10 myUsers">
			<div class="card card-lightblue">
				<div class="card-header">
					<h3 class="card-title"><?= $title ?>: <?= h($myUser->email) ?></h3>
				</div><!-- /.card-header -->
				<div class="card-body">
				
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label"><?= __('id') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?= $myUser->id ?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="id" class="col-sm-2 col-form-label"><?= __('Id') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($myUser->id)){
										echo h($myUser->id);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="username" class="col-sm-2 col-form-label"><?= __('Username') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($myUser->username)){
										echo h($myUser->username);
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
									if(!empty($myUser->email)){
										echo h($myUser->email);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="first-name" class="col-sm-2 col-form-label"><?= __('First Name') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($myUser->first_name)){
										echo h($myUser->first_name);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="last-name" class="col-sm-2 col-form-label"><?= __('Last Name') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($myUser->last_name)){
										echo h($myUser->last_name);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="secret" class="col-sm-2 col-form-label"><?= __('Secret') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($myUser->secret)){
										echo h($myUser->secret);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="role" class="col-sm-2 col-form-label"><?= __('Role') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($myUser->role)){
										echo h($myUser->role);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 2. -->
						<label for="additional-data" class="col-sm-2 col-form-label"><?= __('Additional Data') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field non-associated">
								<?php 
									if(!empty($myUser->additional_data)){
										echo h($myUser->additional_data);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 4. -->
						<label for="warning" class="col-sm-2 col-form-label"><?= __('Warning') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field number">
								<?php
									if(!empty($myUser->warning)){
										echo $this->Number->format($myUser->warning);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 4. -->
						<label for="category-count" class="col-sm-2 col-form-label"><?= __('Category Count') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field number">
								<?php
									if(!empty($myUser->category_count)){
										echo $this->Number->format($myUser->category_count);
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
									if(!empty($myUser->person_count)){
										echo $this->Number->format($myUser->person_count);
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
									if(!empty($myUser->phone_count)){
										echo $this->Number->format($myUser->phone_count);
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
									if(!empty($myUser->opening_count)){
										echo $this->Number->format($myUser->opening_count);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 5. -->
						<label for="activation-date" class="col-sm-2 col-form-label"><?= __('Activation Date') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field date">
								<?php
									if(!empty($myUser->activation_date)){
										echo h($myUser->activation_date);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 5. -->
						<label for="tos-date" class="col-sm-2 col-form-label"><?= __('Tos Date') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field date">
								<?php
									if(!empty($myUser->tos_date)){
										echo h($myUser->tos_date);
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
									if(!empty($myUser->created)){
										echo h($myUser->created);
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
									if(!empty($myUser->modified)){
										echo h($myUser->modified);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 5. -->
						<label for="last-login" class="col-sm-2 col-form-label"><?= __('Last Login') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field date">
								<?php
									if(!empty($myUser->last_login)){
										echo h($myUser->last_login);
									}else{
										echo "&nbsp;";
									}
								?>
							</div>
						</div>
					</div>

					<div class="form-group row"><!-- 7. -->
						<label for="warning-comment" class="col-sm-2 col-form-label"><?= __('Warning Comment') ?>:</label>
						<div class="col-sm-9">
							<div class="view-field text show-more">
								<?php // $this->Text->autoParagraph(h($myUser->warning_comment)); ?>
								<?php
									if(!empty($myUser->warning_comment)){
										//echo $this->Text->autoParagraph($myUser->warning_comment) . "<br>";
										echo $myUser->warning_comment . "<br>";
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
<?php if (!empty($myUser->social_accounts)): ?>
						<li class="nav-item view-tab">
							<a class="nav-link active" id="related-tab-social-accounts" data-toggle="pill" href="#tab-social-accounts" role="tab" aria-controls="aria-tab-social-accounts" aria-selected="true"><?= __('Social Accounts') ?></a>
						</li>
<?php endif; ?>
<?php if (!empty($myUser->persons)): ?>
						<li class="nav-item view-tab">
							<a class="nav-link" id="related-tab-persons" data-toggle="pill" href="#tab-persons" role="tab" aria-controls="aria-tab-persons" aria-selected="false"><?= __('Persons') ?></a>
						</li>
<?php endif; ?>
<?php if (!empty($myUser->phones)): ?>
						<li class="nav-item view-tab">
							<a class="nav-link" id="related-tab-phones" data-toggle="pill" href="#tab-phones" role="tab" aria-controls="aria-tab-phones" aria-selected="false"><?= __('Phones') ?></a>
						</li>
<?php endif; ?>
<?php if (!empty($myUser->openings)): ?>
						<li class="nav-item view-tab">
							<a class="nav-link" id="related-tab-openings" data-toggle="pill" href="#tab-openings" role="tab" aria-controls="aria-tab-openings" aria-selected="false"><?= __('Openings') ?></a>
						</li>
<?php endif; ?>
<?php if (!empty($myUser->categories)): ?>
						<li class="nav-item view-tab">
							<a class="nav-link" id="related-tab-categories" data-toggle="pill" href="#tab-categories" role="tab" aria-controls="aria-tab-categories" aria-selected="false"><?= __('Categories') ?></a>
						</li>
<?php endif; ?>
					</ul>
				</div>


				<div class="card-body p-0">
					<div class="tab-content" id="custom-tabs-four-tabContent">
<?php if (!empty($myUser->social_accounts)) : ?>
						<div class="tab-pane fade active show" id="tab-social-accounts" role="tabpanel" aria-labelledby="aria-tab-social-accounts">
<?php /* */ ?>



							<div class="col-12 table-responsive p-0">

								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th class="id"><?= __('Id') ?></th>
											<th class="user-id"><?= __('User Id') ?></th>
											<th class="provider"><?= __('Provider') ?></th>
											<th class="username"><?= __('Username') ?></th>
											<th class="reference"><?= __('Reference') ?></th>
											<th class="avatar"><?= __('Avatar') ?></th>
											<th class="description"><?= __('Description') ?></th>
											<th class="link"><?= __('Link') ?></th>
											<th class="token"><?= __('Token') ?></th>
											<th class="token-secret"><?= __('Token Secret') ?></th>
											<th class="token-expires"><?= __('Token Expires') ?></th>
											<th class="active"><?= __('Active') ?></th>
											<th class="data"><?= __('Data') ?></th>
											<th class="created"><?= __('Created') ?></th>
											<th class="modified"><?= __('Modified') ?></th>
<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
											<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($myUser->social_accounts as $socialAccounts): ?>
										<tr aria-expanded="true">
<?php if($config['index_show_actions'] !== null && $config['index_show_actions']){ ?>
											<td class="actions text-center">
<?php 	if($config['index_enable_view'] !== null && $config['index_enable_view']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'SocialAccounts', 'action' => 'view', $socialAccounts->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this record')]) ?>
<?php 	} ?>
<?php 	if($config['index_enable_edit'] !== null && $config['index_enable_edit']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'SocialAccounts', 'action' => 'edit', $socialAccounts->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this record')]) ?>
<?php 	} ?>			
<?php 	if($config['index_enable_delete'] !== null && $config['index_enable_delete']){ ?>					  
												<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $myUser->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $myUser->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
												<?= $this->Form->postLink('', ['controller' => 'SocialAccounts', 'action' => 'delete', $socialAccounts->id], ['class'=>'crose-btn hide-postlink action-button-delete']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger delete postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($socialAccounts->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="icon-minus"></i></a>
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
<?php if (!empty($myUser->persons)) : ?>
						<div class="tab-pane fade" id="tab-persons" role="tabpanel" aria-labelledby="aria-tab-persons">
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
										<?php foreach ($myUser->persons as $persons): ?>
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
												<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $myUser->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $myUser->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
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
<?php if (!empty($myUser->phones)) : ?>
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
										<?php foreach ($myUser->phones as $phones): ?>
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
												<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $myUser->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $myUser->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
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
<?php if (!empty($myUser->openings)) : ?>
						<div class="tab-pane fade" id="tab-openings" role="tabpanel" aria-labelledby="aria-tab-openings">
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
										<?php foreach ($myUser->openings as $openings): ?>
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
												<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $myUser->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $myUser->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
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
<?php if (!empty($myUser->categories)) : ?>
						<div class="tab-pane fade" id="tab-categories" role="tabpanel" aria-labelledby="aria-tab-categories">
<?php /* */ ?>



							<div class="col-12 table-responsive p-0">

								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th class="id"><?= __('Id') ?></th>
											<th class="user-id"><?= __('User Id') ?></th>
											<th class="name"><?= __('Name') ?></th>
											<th class="description"><?= __('Description') ?></th>
											<th class="keywords"><?= __('Keywords') ?></th>
											<th class="slug"><?= __('Slug') ?></th>
											<th class="iconType"><?= __('IconType') ?></th>
											<th class="icon"><?= __('Icon') ?></th>
											<th class="pos"><?= __('Pos') ?></th>
											<th class="visible"><?= __('Visible') ?></th>
											<th class="action"><?= __('Action') ?></th>
											<th class="person-count"><?= __('Person Count') ?></th>
											<th class="created"><?= __('Created') ?></th>
											<th class="modified"><?= __('Modified') ?></th>
<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
											<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($myUser->categories as $categories): ?>
										<tr aria-expanded="true">
<?php if($config['index_show_actions'] !== null && $config['index_show_actions']){ ?>
											<td class="actions text-center">
<?php 	if($config['index_enable_view'] !== null && $config['index_enable_view']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'Categories', 'action' => 'view', $categories->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this record')]) ?>
<?php 	} ?>
<?php 	if($config['index_enable_edit'] !== null && $config['index_enable_edit']){ ?>					  
												<?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'Categories', 'action' => 'edit', $categories->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this record')]) ?>
<?php 	} ?>			
<?php 	if($config['index_enable_delete'] !== null && $config['index_enable_delete']){ ?>					  
												<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $myUser->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $myUser->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
												<?= $this->Form->postLink('', ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['class'=>'crose-btn hide-postlink action-button-delete']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger delete postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($categories->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="icon-minus"></i></a>
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

