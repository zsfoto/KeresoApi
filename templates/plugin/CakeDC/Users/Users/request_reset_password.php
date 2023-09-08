<?php
/**
 * Copyright 2010 - 2020, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2020, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * @var \CakeDC\Users\Model\Entity\User $user
 */

use Cake\Core\Configure;
?>
			<?php //= $this->Flash->render('auth') ?>
			
			<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><?= __('Home') ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= __('Request to reset password') ?></li>
                                </ol>
                            </nav>

                            <h2 class="text-white"><?= __('Request to reset password') ?></h2>
                        </div>

                    </div>
                </div>
            </header>

            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">
						
						<!--div class="col-lg-12 col-12">
							<h3 class="mb-4 pb-2"><?= __d('cake_d_c/users', 'Please enter your email or username to reset your password') ?></h3>
						</div-->

						<div class="col-lg-12 col-12">
						
							<?= $this->Form->create($user, ['class' => 'custom-form contact-form', 'role' => 'form']) ?>

								<div class="row">

									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('reference', ['label' => false, 'placeholder' => __d('cake_d_c/users', 'Email or username'), 'pattern' => '[^ @]*@[^ @]*', 'class' => 'form-control', 'required' => true ]) ?>

											<label for="floatingInput"><?= __d('cake_d_c/users', 'Email or username') ?></label>
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



<?php /*
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Please enter your email or username to reset your password') ?></legend>
        <?= $this->Form->control('reference') ?>
    </fieldset>
    <?= $this->Form->button(__d('cake_d_c/users', 'Submit')); ?>
    <?= $this->Form->end() ?>
</div>
*/ ?>