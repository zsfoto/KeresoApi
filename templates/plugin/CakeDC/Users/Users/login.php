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
?>
			<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><?= __('Home') ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= __('Login') ?></li>
                                </ol>
                            </nav>

                            <h2 class="text-white"><?= __('Login') ?></h2>
                        </div>

                    </div>
                </div>
            </header>

            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">
						
						<!--div class="col-lg-12 col-12">
							<h3 class="mb-4 pb-2"><?= __d('cake_d_c/users', 'Please enter your username and password') ?></h3>
						</div-->

						<div class="col-lg-12 col-12">
						
							<?= $this->Form->create(null, ['class' => 'custom-form contact-form', 'role' => 'form']) ?>

								<div class="row">

									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('email', ['label' => false, 'placeholder' => 'Email address', 'pattern' => '[^ @]*@[^ @]*', 'class' => 'form-control', 'required' => true ]) ?>

											<label for="floatingInput"><?= __('Email address') ?></label>
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('password', ['label' => false, 'placeholder' => 'Password', 'class' => 'form-control', 'required' => true ]) ?>

											<label for="floatingInput"><?= __('Password') ?></label>
										</div>
									</div>

									<div class="col-lg-4 col-12 ms-auto">
                                        <?= $this->Form->button(__d('cake_d_c/users', 'Login'), ['class' => 'form-control']); ?>

									</div>

								</div>

							<?= $this->Form->end() ?>

						</div>

						
                    </div>
                </div>
            </section>


<?php /*

// 9f7a4260de1548a78cf0f81388b03fc4

<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Please enter your username and password') ?></legend>
        <?= $this->Form->control('username', ['label' => __d('cake_d_c/users', 'Username'), 'required' => true]) ?>
        <?= $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Password'), 'required' => true]) ?>
        <?php
        if (Configure::read('Users.reCaptcha.login')) {
            echo $this->User->addReCaptcha();
        }
        if (Configure::read('Users.RememberMe.active')) {
            echo $this->Form->control(Configure::read('Users.Key.Data.rememberMe'), [
                'type' => 'checkbox',
                'label' => __d('cake_d_c/users', 'Remember me'),
                'checked' => Configure::read('Users.RememberMe.checked')
            ]);
        }
        ?>
        <?php
        $registrationActive = Configure::read('Users.Registration.active');
        if ($registrationActive) {
            echo $this->Html->link(__d('cake_d_c/users', 'Register'), ['action' => 'register']);
        }
        if (Configure::read('Users.Email.required')) {
            if ($registrationActive) {
                echo ' | ';
            }
            echo $this->Html->link(__d('cake_d_c/users', 'Reset Password'), ['action' => 'requestResetPassword']);
        }
        ?>
    </fieldset>
    <?= implode(' ', $this->User->socialLoginList()); ?>
    <?= $this->Form->button(__d('cake_d_c/users', 'Login')); ?>
    <?= $this->Form->end() ?>
</div>
*/ ?>
