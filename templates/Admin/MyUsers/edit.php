<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MyUser $myUser
 */
?>
<?php // Baked at 2023.09.14. 10:37:32  ?>
<?php use Cake\Core\Configure; ?>
<?php use Cake\I18n\FrozenTime; ?>
<?php use Cake\I18n\I18n; ?>
<?php 
	$prefix = strtolower( $this->request->getParam('prefix') );	
	$config = Configure::read('Theme.' . $prefix);	
	$config['form_show_counts'] = false;
?>
<?php $locale = I18n::getLocale(); ?>
<?php //$formats = Configure::read('Formats'); ?>
<?php //$format = $formats[$locale]; ?>
		<div class="edit col-sm-10">
			<div class="card card-lightblue">
				<div class="card-header">
					<h3 class="card-title"><?= __('Edit') ?>: <?= $title ?><i id="card-loader-icon" class="icon-spin4 animate-spin" style="font-size: 24px; opacity: 1; color: white; font-weight: bold;"></i></h3>
				</div><!-- /.card-header -->

				<!-- form start -->
				<?= $this->Form->create($myUser, ['id' => 'main-form', 'class'=>'form-horizontal']) ?>
			  
					<!-- card-body -->
					<div class="card-body" style="opacity: 0;">
						<!-- 6. string -->
						<div class="form-group row">
							<label for="username" class="col-sm-2 col-form-label"><?= __('Username') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('username', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label"><?= __('Email') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('email', ['placeholder' => __(''), 'type'=>'email', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="password" class="col-sm-2 col-form-label"><?= __('Password') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('password', ['placeholder' => __(''), 'type'=>'password', 'class'=>'form-control', 'label' => false, 'empty' => true, 'autofocus' => false, "required" => true]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="first-name" class="col-sm-2 col-form-label"><?= __('First Name') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('first_name', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="last-name" class="col-sm-2 col-form-label"><?= __('Last Name') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('last_name', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="token" class="col-sm-2 col-form-label"><?= __('Token') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('token', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<?php // https://tempusdominus.github.io/bootstrap-4/Usage/ ?>
						<!-- 3. datetime -->
						<div class="form-group row">
							<label for="token-expires" class="col-sm-2 col-form-label"><?= __('Token Expires') ?>:</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<div class="input-group datetime" id="token-expires" data-target-input="nearest">
									<?= $this->Form->control('token_expires', ['type'=>'text', 'label'=>false, 'placeholder' => __('Token Expires'), 'class'=>'form-control datetimepicker-input', 'data-target'=>'#token-expires', 'autocomplete'=>'off', 'data-validity-message'=>__('This field cannot be left empty'), "required" => false]); ?>
									<div class="input-group-append" data-target="#token-expires" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="icon-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="api-token" class="col-sm-2 col-form-label"><?= __('Api Token') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('api_token', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<?php // https://tempusdominus.github.io/bootstrap-4/Usage/ ?>
						<!-- 3. datetime -->
						<div class="form-group row">
							<label for="activation-date" class="col-sm-2 col-form-label"><?= __('Activation Date') ?>:</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<div class="input-group datetime" id="activation-date" data-target-input="nearest">
									<?= $this->Form->control('activation_date', ['type'=>'text', 'label'=>false, 'placeholder' => __('Activation Date'), 'class'=>'form-control datetimepicker-input', 'data-target'=>'#activation-date', 'autocomplete'=>'off', 'data-validity-message'=>__('This field cannot be left empty'), "required" => false]); ?>
									<div class="input-group-append" data-target="#activation-date" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="icon-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="secret" class="col-sm-2 col-form-label"><?= __('Secret') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('secret', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 5. boolean -->
						<div class="form-group row">
							<div class="offset-sm-2 col-sm-10">
								<?= $this->Form->control('secret_verified', ['id'=>'secret-verified', 'div'=>false, 'type'=>'checkbox', 'class'=>'flat', 'label'=>false, 'templates'=>[ 'inputContainer' => '{{content}}', 'inputContainerError' => '{{content}}{{error}}' ], "required" => false ]); ?>
								<label class="checkbox" for="secret-verified"><?= __('Secret Verified') ?></label>
							</div>
						</div>

						<?php // https://tempusdominus.github.io/bootstrap-4/Usage/ ?>
						<!-- 3. datetime -->
						<div class="form-group row">
							<label for="tos-date" class="col-sm-2 col-form-label"><?= __('Tos Date') ?>:</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<div class="input-group datetime" id="tos-date" data-target-input="nearest">
									<?= $this->Form->control('tos_date', ['type'=>'text', 'label'=>false, 'placeholder' => __('Tos Date'), 'class'=>'form-control datetimepicker-input', 'data-target'=>'#tos-date', 'autocomplete'=>'off', 'data-validity-message'=>__('This field cannot be left empty'), "required" => false]); ?>
									<div class="input-group-append" data-target="#tos-date" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="icon-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>

						<!-- 5. boolean -->
						<div class="form-group row">
							<div class="offset-sm-2 col-sm-10">
								<?= $this->Form->control('active', ['id'=>'active', 'div'=>false, 'type'=>'checkbox', 'class'=>'flat', 'label'=>false, 'empty' => true, 'templates'=>[ 'inputContainer' => '{{content}}', 'inputContainerError' => '{{content}}{{error}}' ], "required" => true ]); ?>
								<label class="checkbox" for="active"><?= __('Active') ?></label>
							</div>
						</div>

						<!-- 5. boolean -->
						<div class="form-group row">
							<div class="offset-sm-2 col-sm-10">
								<?= $this->Form->control('is_superuser', ['id'=>'is-superuser', 'div'=>false, 'type'=>'checkbox', 'class'=>'flat', 'label'=>false, 'empty' => true, 'templates'=>[ 'inputContainer' => '{{content}}', 'inputContainerError' => '{{content}}{{error}}' ], "required" => true ]); ?>
								<label class="checkbox" for="is-superuser"><?= __('Is Superuser') ?></label>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="role" class="col-sm-2 col-form-label"><?= __('Role') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('role', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 4.a. integer -->
						<div class="form-group row">
							<label for="warning" class="col-sm-2 col-form-label"><?= __('Warning') ?>:</label>
							<div class="input-group col-xs-12 col-sm-10 col-md-8 col-lg-4 col-xl-3">
								<?= $this->Form->control('warning', ['type' => 'number', 'class' => 'form-control number', 'label' => false, 'templates'=>[ 'inputContainer' => '{{content}}', 'inputContainerError' => '{{content}}{{error}}'], "required" => false]) ?>
							</div>
						</div>

						<!-- 7. text -->
						<div class="form-group row">
							<label for="warning-comment" class="col-sm-2 col-form-label"><?= __('Warning Comment') ?>:</label>
							<div class="col-sm-10">
								<?= $this->Form->textarea('warning_comment', ['type'=>'textarea', 'class'=>'summernote', 'label' => false, 'placeholder'=>__('Place some text here'), 'style'=>'width: 100%; height: 249px;', "required" => false ]) ?>
							</div>
						</div>

						<?php // https://tempusdominus.github.io/bootstrap-4/Usage/ ?>
						<!-- 3. datetime -->
						<div class="form-group row">
							<label for="last-login" class="col-sm-2 col-form-label"><?= __('Last Login') ?>:</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<div class="input-group datetime" id="last-login" data-target-input="nearest">
									<?= $this->Form->control('last_login', ['type'=>'text', 'label'=>false, 'placeholder' => __('Last Login'), 'class'=>'form-control datetimepicker-input', 'data-target'=>'#last-login', 'autocomplete'=>'off', 'data-validity-message'=>__('This field cannot be left empty'), "required" => false]); ?>
									<div class="input-group-append" data-target="#last-login" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="icon-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>

<?php if(isset($config['form_show_counts']) && $config['form_show_counts']){ ?>
						<!-- 4.b. integer -->
						<div class="form-group row">
							<label for="category-count" class="col-sm-2 col-form-label"><?= __('Category Count') ?>:</label>
							<div class="input-group col-xs-12 col-sm-10 col-md-8 col-lg-4 col-xl-4">
								<div class="count"><?= $myUser->category_count ?></div>
							</div>
						</div>
<?php } ?>

<?php if(isset($config['form_show_counts']) && $config['form_show_counts']){ ?>
						<!-- 4.b. integer -->
						<div class="form-group row">
							<label for="person-count" class="col-sm-2 col-form-label"><?= __('Person Count') ?>:</label>
							<div class="input-group col-xs-12 col-sm-10 col-md-8 col-lg-4 col-xl-4">
								<div class="count"><?= $myUser->person_count ?></div>
							</div>
						</div>
<?php } ?>

<?php if(isset($config['form_show_counts']) && $config['form_show_counts']){ ?>
						<!-- 4.b. integer -->
						<div class="form-group row">
							<label for="phone-count" class="col-sm-2 col-form-label"><?= __('Phone Count') ?>:</label>
							<div class="input-group col-xs-12 col-sm-10 col-md-8 col-lg-4 col-xl-4">
								<div class="count"><?= $myUser->phone_count ?></div>
							</div>
						</div>
<?php } ?>

<?php if(isset($config['form_show_counts']) && $config['form_show_counts']){ ?>
						<!-- 4.b. integer -->
						<div class="form-group row">
							<label for="opening-count" class="col-sm-2 col-form-label"><?= __('Opening Count') ?>:</label>
							<div class="input-group col-xs-12 col-sm-10 col-md-8 col-lg-4 col-xl-4">
								<div class="count"><?= $myUser->opening_count ?></div>
							</div>
						</div>
<?php } ?>


					</div><!-- /.card-body -->
				
					<div class="card-footer">
						<button type="submit" class="offset-sm-2 btn btn-info" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __('Save and back to list') ?>" ><span class="btn-label"><i class="fa fa-save"></i></span> <?= __('Save') ?></button>
						<?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class'=>'btn btn-default', 'role'=>'button', 'escape'=>false, 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Back to list without save') ] ) ?>
					</div><!-- /.card-footer -->

				<?= $this->Form->end() ?>

            </div>
        </div>

<?php
	$this->Html->css(
		[
			"JeffAdmin./plugins/fontello/css/animation",
			"JeffAdmin./plugins/icheck-bootstrap/icheck-bootstrap.min",
			"JeffAdmin./plugins/icheck-1.x/skins/flat/blue",
			"JeffAdmin./plugins/summernote/summernote-bs4.min",
		],
		['block' => true]);


	$this->Html->script(
		[
			"JeffAdmin./plugins/icheck-1.x/icheck.min",
			"JeffAdmin./plugins/moment/moment.min",
			"JeffAdmin./plugins/moment/locale/hu",
			"JeffAdmin./plugins/bootstrap4-datetime-picker-rails-master/vendor/assets/javascripts/tempusdominus-bootstrap-4.min",
			"JeffAdmin./plugins/summernote/summernote-bs4.min",
			"JeffAdmin./plugins/summernote/lang/summernote-hu-HU.min",
		],
		['block' => 'scriptBottom']
	);
?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>
		
		$(document).ready( function(){

			$('input[type="checkbox"]').iCheck({
				handle: 'checkbox',
				checkboxClass: 'icheckbox_flat-blue'
			});			$('.summernote').summernote({
				height: 180,
				lang: 'hu-HU'
			});



<?php 		/* //$("input[type='number']").inputSpinner({ */ ?>
			$(".spinner").inputSpinner({
				decrementButton: "<strong>-</strong>",
				incrementButton: "<strong>+</strong>",
				groupClass: "", 						// css class of the resulting input-group
				buttonsClass: "btn-outline-secondary",
				buttonsWidth: "2.5rem",
				textAlign: "center",
				autoDelay: 500, 						// ms holding before auto value change
				autoInterval: 100, 						// speed of auto value change
				boostThreshold: 10, 					// boost after these steps
				boostMultiplier: "auto" 				// you can also set a constant number as multiplier
			});			
<?php /* https://tempusdominus.github.io/bootstrap-4/Usage/ */ ?>
			
			tooltips = {
				today: 			'<?= __('Go to today') ?>',
				clear: 			'<?= __('Clear selection') ?>',
				close: 			'<?= __('Close the picker') ?>',
				selectMonth: 	'<?= __('Select Month') ?>',
				prevMonth: 		'<?= __('Previous Month') ?>',
				nextMonth: 		'<?= __('Next Month') ?>',
				selectYear: 	'<?= __('Select Year') ?>',
				prevYear: 		'<?= __('Previous Year') ?>',
				nextYear: 		'<?= __('Next Year') ?>',
				selectDecade: 	'<?= __('Select Decade') ?>',
				prevDecade: 	'<?= __('Previous Decade') ?>',
				nextDecade: 	'<?= __('Next Decade') ?>',
				prevCentury: 	'<?= __('Previous Century') ?>',
				nextCentury: 	'<?= __('Next Century') ?>',
				incrementHour: 	'<?= __('Increment Hour') ?>',
				pickHour: 		'<?= __('Pick Hour') ?>',
				decrementHour:	'<?= __('Decrement Hour') ?>',
				incrementMinute:'<?= __('Increment Minute') ?>',
				pickMinute: 	'<?= __('Pick Minute') ?>',
				decrementMinute:'<?= __('Decrement Minute') ?>',
				incrementSecond:'<?= __('Increment Second') ?>',
				pickSecond: 	'<?= __('Pick Second') ?>',
				decrementSecond:'<?= __('Decrement Second') ?>'
			}
			
			$('#token-expires').datetimepicker({
				locale: moment.locale("hu"),	
				format: 'L LTS',
<?php //if(isset($myUser->token_expires) && $myUser->token_expires != '00:00:00' && $myUser->token_expires != '0:' ){ ?>
<?php if(!empty($myUser->token_expires)){ ?>
				defaultDate: moment("<?= FrozenTime::parse($myUser->token_expires)->i18nFormat('yyyy-MM-dd H:ii:ss') ?>", "YYYY-MM-DD H:mm:ss"),
<?php } ?>
				//locale: moment.locale(),
				buttons: {
					showToday: true,
					showClear: true,
					showClose: true
				},				
				//viewDate: true,
				icons: {
					time: "icon-clock",
					date: "icon-calendar",
					up: "icon-up-big",
					down: "icon-down-big",
	                previous: 'icon-left-big',
	                next: 'icon-right-big',
	                today: 'icon-calendar',
	                clear: 'icon-trash-empty',
	                close: 'icon-window-close-o'
				},
				tooltips: tooltips
			});

			$('#activation-date').datetimepicker({
				locale: moment.locale("hu"),	
				format: 'L LTS',
<?php //if(isset($myUser->activation_date) && $myUser->activation_date != '00:00:00' && $myUser->activation_date != '0:' ){ ?>
<?php if(!empty($myUser->activation_date)){ ?>
				defaultDate: moment("<?= FrozenTime::parse($myUser->activation_date)->i18nFormat('yyyy-MM-dd H:ii:ss') ?>", "YYYY-MM-DD H:mm:ss"),
<?php } ?>
				//locale: moment.locale(),
				buttons: {
					showToday: true,
					showClear: true,
					showClose: true
				},				
				//viewDate: true,
				icons: {
					time: "icon-clock",
					date: "icon-calendar",
					up: "icon-up-big",
					down: "icon-down-big",
	                previous: 'icon-left-big',
	                next: 'icon-right-big',
	                today: 'icon-calendar',
	                clear: 'icon-trash-empty',
	                close: 'icon-window-close-o'
				},
				tooltips: tooltips
			});

			$('#tos-date').datetimepicker({
				locale: moment.locale("hu"),	
				format: 'L LTS',
<?php //if(isset($myUser->tos_date) && $myUser->tos_date != '00:00:00' && $myUser->tos_date != '0:' ){ ?>
<?php if(!empty($myUser->tos_date)){ ?>
				defaultDate: moment("<?= FrozenTime::parse($myUser->tos_date)->i18nFormat('yyyy-MM-dd H:ii:ss') ?>", "YYYY-MM-DD H:mm:ss"),
<?php } ?>
				//locale: moment.locale(),
				buttons: {
					showToday: true,
					showClear: true,
					showClose: true
				},				
				//viewDate: true,
				icons: {
					time: "icon-clock",
					date: "icon-calendar",
					up: "icon-up-big",
					down: "icon-down-big",
	                previous: 'icon-left-big',
	                next: 'icon-right-big',
	                today: 'icon-calendar',
	                clear: 'icon-trash-empty',
	                close: 'icon-window-close-o'
				},
				tooltips: tooltips
			});

			$('#last-login').datetimepicker({
				locale: moment.locale("hu"),	
				format: 'L LTS',
<?php //if(isset($myUser->last_login) && $myUser->last_login != '00:00:00' && $myUser->last_login != '0:' ){ ?>
<?php if(!empty($myUser->last_login)){ ?>
				defaultDate: moment("<?= FrozenTime::parse($myUser->last_login)->i18nFormat('yyyy-MM-dd H:ii:ss') ?>", "YYYY-MM-DD H:mm:ss"),
<?php } ?>
				//locale: moment.locale(),
				buttons: {
					showToday: true,
					showClear: true,
					showClose: true
				},				
				//viewDate: true,
				icons: {
					time: "icon-clock",
					date: "icon-calendar",
					up: "icon-up-big",
					down: "icon-down-big",
	                previous: 'icon-left-big',
	                next: 'icon-right-big',
	                today: 'icon-calendar',
	                clear: 'icon-trash-empty',
	                close: 'icon-window-close-o'
				},
				tooltips: tooltips
			});


<?php /*	// ----------- talán ----------
			$("input[data-bootstrap-switch]").each(function(){
				$(this).bootstrapSwitch('state', $(this).prop('checked'));
			});
*/ ?>

			$('#button-submit').click( function(){
				$('#main-form').submit();
			});			

			// --- to bottom ---
			$('.card-body').animate({opacity: '1'}, 500, 'linear');
			$('#card-loader-icon').animate({opacity: '0'}, 1000, 'linear');
			
		});
		
<?php $this->Html->scriptEnd(); ?>

