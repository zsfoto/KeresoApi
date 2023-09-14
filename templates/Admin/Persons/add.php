<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<?php // Baked at 2023.09.14. 10:34:42  ?>
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
		<div class="add col-sm-10">
			<div class="card card-lightblue">
				<div class="card-header">
					<h3 class="card-title"><?= __('Add') ?>: <?= $title ?><i id="card-loader-icon" class="icon-spin4 animate-spin" style="font-size: 24px; opacity: 1; color: white; font-weight: bold;"></i></h3>
				</div><!-- /.card-header -->

				<!-- form start -->
				<?= $this->Form->create($person, ['id' => 'main-form', 'class'=>'form-horizontal']) ?>
			  
					<!-- card-body -->
					<div class="card-body" style="opacity: 0;">

						<!-- 2. integer -->
						<div class="form-group row">
							<label for="category_id" class="col-sm-2 col-form-label text-right"><?= __('Category Id') ?>:</label>
							<div class="col-sm-3">
								<?php echo $this->Form->control('category_id', ['options' => $categories, 'class' => 'selectpicker form-control integer', 'title' => 'Kérem válasszon...', 'data-live-search' => 'true', 'data-actions-box' => 'true', 'label' => false]); ?>
							</div>										
							<label for="city_id" class="col-sm-1 col-form-label text-right"><?= __('City Id') ?>:</label>
							<div class="col-sm-3">
								<?php echo $this->Form->control('city_id', ['options' => $cities, 'class' => 'selectpicker form-control integer', 'title' => 'Kérem válasszon...', 'data-live-search' => 'true', 'data-actions-box' => 'true', 'label' => false]); ?>
							</div>										
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="name" class="col-sm-2 col-form-label text-right"><?= __('Name') ?>:</label>
							<div class="col-sm-4">
								<?= $this->Form->control('name', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'empty' => true, 'autofocus' => true, "required" => true]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="description" class="col-sm-2 col-form-label text-right"><?= __('Description') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('description', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="address" class="col-sm-2 col-form-label text-right"><?= __('Address') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('address', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="phone" class="col-sm-2 col-form-label text-right"><?= __('Phone') ?>:</label>
							<div class="col-sm-3">
								<?= $this->Form->control('phone', ['placeholder' => __('+36201234567 formátumban'), 'type'=>'tel', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
							<div class="col-sm-3">
								<?= $this->Form->control('phone2', ['placeholder' => __('2. phone'), 'type'=>'tel', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
							<div class="col-sm-3">
								<?= $this->Form->control('fax', ['placeholder' => __('fax'), 'type'=>'tel', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>

						</div>

<?php /*
						<!-- 6. string -->
						<div class="form-group row">
							<label for="ext" class="col-sm-2 col-form-label text-right"><?= __('Ext') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('ext', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>
*/ ?>

<?php /*
						<!-- 6. string -->
						<div class="form-group row">
							<label for="phone2" class="col-sm-2 col-form-label text-right"><?= __('2. Phone') ?>:</label>
							<div class="col-sm-3">
								<?= $this->Form->control('phone2', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>
						<!-- 6. string -->
						<div class="form-group row">
							<label for="ext2" class="col-sm-2 col-form-label text-right"><?= __('Ext2') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('ext2', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="fax" class="col-sm-2 col-form-label text-right"><?= __('Fax') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('fax', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>
*/ ?>

<?php /*
						<!-- 6. string -->
						<div class="form-group row">
							<label for="ext-fax" class="col-sm-2 col-form-label text-right"><?= __('Ext Fax') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('ext_fax', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>
*/ ?>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label text-right"><?= __('Email') ?>:</label>
							<div class="col-sm-3">
								<?= $this->Form->control('email', ['placeholder' => __('E-mail'), 'type'=>'email', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
							<div class="col-sm-3">
								<?= $this->Form->control('website', ['placeholder' => __('Website'), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>
						
<?php /*
						<!-- 7. text -->
						<div class="form-group row">
							<label for="more" class="col-sm-2 col-form-label text-right"><?= __('More') ?>:</label>
							<div class="col-sm-10">
								<?= $this->Form->textarea('more', ['type'=>'textarea', 'class'=>'no-summernote', 'label' => false, 'placeholder'=>__('Place some text here'), 'style'=>'width: 100%; height: 249px;', "required" => false ]) ?>
							</div>
						</div>
*/ ?>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="keywords" class="col-sm-2 col-form-label text-right"><?= __('Keywords') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('keywords', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'empty' => true, 'autofocus' => false, "required" => true]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="iconType" class="col-sm-2 col-form-label text-right"><?= __('IconType') ?>:</label>
							<div class="col-sm-3">
								<?= $this->Form->control('iconType', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
							<div class="col-sm-3">
								<?= $this->Form->control('icon', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<hr>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="googlemap-url" class="col-sm-2 col-form-label text-right"><?= __('Googlemap Url') ?>:</label>
							<div class="col-sm-9">
								<?= $this->Form->control('googlemap_url', ['placeholder' => __(''), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<!-- 6. string -->
						<div class="form-group row">
							<label for="longitude" class="col-sm-2 col-form-label text-right"><?= __('GPS') ?>:</label>
							<div class="col-sm-3">
								<?= $this->Form->control('longitude', ['placeholder' => __('Longitude'), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
							<div class="col-sm-3">
								<?= $this->Form->control('latitude', ['placeholder' => __('Latitude'), 'type'=>'text', 'class'=>'form-control', 'label' => false, 'autofocus' => false, "required" => false]) ?>
							</div>
						</div>

						<hr>

						<!-- 4.a. integer -->
						<div class="form-group row">
							<label for="pos" class="col-sm-2 col-form-label text-right"><?= __('Pos') ?>:</label>
							<div class="input-group col-xs-12 col-sm-10 col-md-8 col-lg-4 col-xl-3">
								<?= $this->Form->control('pos', ['type' => 'number', 'class' => 'form-control number spinner', 'label' => false, 'templates'=>[ 'inputContainer' => '{{content}}', 'inputContainerError' => '{{content}}{{error}}'], 'empty' => true, 'value' => 500, 'step' => '10', "required" => true]) ?>
							</div>
						</div>

						<!-- 5. boolean -->
						<div class="form-group row">
							<div class="offset-sm-2 col-sm-10">
								<?= $this->Form->control('visible', ['id'=>'visible', 'div'=>false, 'type'=>'checkbox', 'class'=>'flat', 'label'=>false, 'empty' => true, 'checked' => true, 'templates'=>[ 'inputContainer' => '{{content}}', 'inputContainerError' => '{{content}}{{error}}' ], "required" => true ]); ?>
								<label class="checkbox" for="visible"><?= __('Visible') ?></label>
							</div>
						</div>

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
			"JeffAdmin./plugins/bootstrap-select-1.13.14/dist/css/bootstrap-select.min",
			"JeffAdmin./plugins/summernote/summernote-bs4.min",
		],
		['block' => true]);


	$this->Html->script(
		[
			"JeffAdmin./plugins/icheck-1.x/icheck.min",
			"JeffAdmin./plugins/bootstrap-select-1.13.14/dist/js/bootstrap-select.min",
			"JeffAdmin./plugins/bootstrap-input-spinner-master/src/bootstrap-input-spinner",
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
			});
			$('.summernote').summernote({
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

