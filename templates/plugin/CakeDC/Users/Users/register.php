<?php
/**
 * Copyright 2010 - 2019, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2018, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Cake\Core\Configure;

$tos = 'Helloka ez<br>a SZÖVEG HELYE...';

?>
			<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><?= __('Home') ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= __('Registration') ?></li>
                                </ol>
                            </nav>

                            <h2 class="text-white"><?= __('Registration') ?></h2>
                        </div>

                    </div>
                </div>
            </header>

            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">
						
						<!--div class="col-lg-12 col-12">
							<h3 class="mb-4 pb-2"><?= __d('cake_d_c/users', 'Add User') ?></h3>                            
						</div-->

						<div class="col-lg-12 col-12">
						
							<?= $this->Form->create($user, ['class' => 'custom-form contact-form', 'role' => 'form']) ?>
<?php
    $error = false;
    $styleInputFirstName = '';
    $styleInputLastName = '';
    $styleInputEmail = '';
    $styleInputPassword = '';
    $styleInputTos = '';

    if ($this->Form->isFieldError('first_name')) {
        $error = true;
        $styleInputFirstName = 'border: 2px solid red;';
    }
    if ($this->Form->isFieldError('last_name')) {
        $error = true;
        $styleInputLastName = 'border: 2px solid red;';
    }
    if ($this->Form->isFieldError('email')) {
        $error = true;
        $styleInputEmail = 'border: 2px solid red;';
    }
    if ($this->Form->isFieldError('password')) {
        $error = true;
        $styleInputPassword = 'border: 2px solid red;';
    }
    if ($this->Form->isFieldError('password_confirm')) {
        $error = true;
        $styleInputPassword = 'border: 2px solid red;';
    }
    if ($this->Form->isFieldError('tos')) {
        $error = true;
        $styleInputTos = 'border: 2px solid red;';
    }
?>

								<div class="row">

<?php if ($error) { ?>

                                    <div class="col-lg-12 col-md-12 col-12" style="background-color: red; margin-top: -60px; margin-bottom: 28px;">
										<ul style="margin-bottom: 0px;">
<?php
                                        if ($this->Form->isFieldError('first_name')) {
                                            $error = true;
                                            echo "<li style='color: white;'>" . $this->Form->error('first_name') . "</li>";
                                        }
                                        if ($this->Form->isFieldError('last_name')) {
                                            $error = true;
                                            echo "<li style='color: white;'>" . $this->Form->error('last_name') . "</li>";
                                        }
                                        if ($this->Form->isFieldError('email')) {
                                            $error = true;
                                            echo "<li style='color: white;'>" . $this->Form->error('email') . "</li>";
                                        }
                                        if ($this->Form->isFieldError('password')) {
                                            $error = true;
                                            echo "<li style='color: white;'>" . $this->Form->error('password') . "</li>";
                                        }
                                        if ($this->Form->isFieldError('password_confirm')) {
                                            $error = true;
                                            echo "<li>" . $this->Form->error('password_confirm') . "</li>";
                                        }
                                        if ($this->Form->isFieldError('tos')) {
                                            $error = true;
                                            echo "<li>" . $this->Form->error('tos') . "</li>";
                                        }
?>
                                        </ul>
									</div>
<?php } ?>

                                </div>

                                <div class="row">

									<div class="col-lg-6 col-md-6 col-12"> 
										<div class="form-floating">
											<?php //= $this->Form->control('username', ['type' => 'hidden', 'value' => '-' ]) ?>
											<?= $this->Form->control('first_name', ['label' => false, 'placeholder' => 'First name', 'class' => 'form-control', 'required' => true, 'error' => false, 'style' => $styleInputFirstName ]) ?>

											<label for="floatingInput"><?= __('First name') ?></label>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('last_name', ['label' => false, 'placeholder' => 'Last name', 'class' => 'form-control', 'required' => true, 'style' => $styleInputLastName ]) ?>

											<label for="floatingInput"><?= __('Last name') ?></label>
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('email', ['type' => 'email', 'label' => false, 'placeholder' => 'Email address', 'pattern' => '[^ @]*@[^ @]*', 'class' => 'form-control', 'required' => true, 'style' => $styleInputEmail ]) ?>

											<label for="floatingInput"><?= __('Email address') ?></label>
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('password', ['label' => false, 'placeholder' => 'Password', 'class' => 'form-control', 'required' => true, 'style' => $styleInputPassword ]) ?>

											<label for="floatingInput"><?= __('Password') ?></label>
										</div>
                                        <div>
                                        </div>
									</div>

									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('password_confirm', ['type' => 'password', 'label' => false, 'placeholder' => 'Password confirm', 'class' => 'form-control', 'required' => true, 'style' => $styleInputPassword ]) ?>

											<label for="floatingInput"><?= __('Password confirm') ?></label>
										</div>
									</div>

<?php /*
									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="">
                                            <?php if (Configure::read('Users.Tos.required')) {
                                                echo $this->Form->control('tos', ['type' => 'checkbox', 'label' => __d('cake_d_c/users', 'Accept TOS conditions?'), 'required' => true, 'style' => $styleInputTos]);
                                            } ?>
										</div>
									</div>
*/ ?>

									<div class="col-lg-12 col-md-12 col-12"> 
                                        <div class="form-check ps-5" style='<?= $styleInputTos ?>'>
                                            <?php if (Configure::read('Users.Tos.required')) {
                                                echo $this->Form->control('tos', [
                                                    'type' => 'checkbox', 
                                                    'class' => 'form-check-input',
                                                    'label' => false, 
                                                    'required' => true
                                                ]);
                                            } ?>

                                            <label class="form-check-label" for="tos">
                                                <?= __d('cake_d_c/users', 'Accept TOS conditions?') ?>
                                            </label>
                                            •
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><?= __('Read Terms And Conditions') ?>...</a>

                                        </div>
									</div>

									<div class="col-lg-4 col-12 ms-auto">
                                        <?= $this->Form->button(__d('cake_d_c/users', 'Submit'), ['class' => 'form-control']); ?>

									</div>

								</div>

							<?= $this->Form->end() ?>

						</div>

						
                    </div>
                </div>
            </section>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= __('Terms And Conditions') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= $tos ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= __('Close') ?></button>
            </div>
        </div>
    </div>
</div>


<?php
/*
	$this->Html->css(
		[
			//"/plugins/Toast-Popup-Plugin-jQuery-Toaster/toast.style.min",
		],
		['block' => true]);


	$this->Html->script(
		[
			//"/plugins/Toast-Popup-Plugin-jQuery-Toaster/toast.script",
		],
		['block' => 'scriptBottom']
	);
*/
?>

<?php //$this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

<?php //$this->Html->scriptEnd(); ?>



<?php /*
// 9f7a4260de1548a78cf0f81388b03fc4
*/?>

<?php /*
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Add User') ?></legend>
        <?php
        echo $this->Form->control('username', ['label' => __d('cake_d_c/users', 'Username')]);
        echo $this->Form->control('email', ['label' => __d('cake_d_c/users', 'Email')]);
        echo $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Password')]);
        echo $this->Form->control('password_confirm', [
            'required' => true,
            'type' => 'password',
            'label' => __d('cake_d_c/users', 'Confirm password')
        ]);
        echo $this->Form->control('first_name', ['label' => __d('cake_d_c/users', 'First name')]);
        echo $this->Form->control('last_name', ['label' => __d('cake_d_c/users', 'Last name')]);
        if (Configure::read('Users.Tos.required')) {
            echo $this->Form->control('tos', ['type' => 'checkbox', 'label' => __d('cake_d_c/users', 'Accept TOS conditions?'), 'required' => true]);
        }
        if (Configure::read('Users.reCaptcha.registration')) {
            echo $this->User->addReCaptcha();
        }
        ?>
    </fieldset>
    <?= $this->Form->button(__d('cake_d_c/users', 'Submit')) ?>
    <?= $this->Form->end() ?>
</div>
*/ ?>
