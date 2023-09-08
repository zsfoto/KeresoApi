<?php //= $this->Flash->render('auth') ?>
			
			<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><?= __('Home') ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= __('Change password') ?></li>
                                </ol>
                            </nav>

                            <h2 class="text-white"><?= __('Change password') ?></h2>
                        </div>

                    </div>
                </div>
            </header>

            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">
						
						<!--div class="col-lg-12 col-12">
							<h3 class="mb-4 pb-2"><?= __d('cake_d_c/users', 'Please enter the new password') ?></h3>
						</div-->

						<div class="col-lg-12 col-12">
						
							<?= $this->Form->create($user, ['class' => 'custom-form contact-form', 'role' => 'form']) ?>

								<div class="row">
<?php if ($validatePassword) : ?>
    
									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('current_password', ['type' => 'password', 'label' => false, 'placeholder' => __d('cake_d_c/users', 'Current password'), 'class' => 'form-control', 'required' => true ]) ?>

											<label for="floatingInput"><?= __d('cake_d_c/users', 'Current password') ?></label>
										</div>
									</div>
<?php endif; ?>

									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('password', ['type' => 'password', 'label' => false, 'placeholder' => __d('cake_d_c/users', 'New password'), 'class' => 'form-control', 'required' => true ]) ?>

											<label for="floatingInput"><?= __d('cake_d_c/users', 'New password') ?></label>
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-12"> 
										<div class="form-floating">
											<?= $this->Form->control('password_confirm', ['type' => 'password', 'label' => false, 'placeholder' => __d('cake_d_c/users', 'Confirm password'), 'class' => 'form-control', 'required' => true ]) ?>

											<label for="floatingInput"><?= __d('cake_d_c/users', 'Confirm password') ?></label>
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
        <legend><?= __d('cake_d_c/users', 'Please enter the new password') ?></legend>
        <?php if ($validatePassword) : ?>
            <?= $this->Form->control('current_password', [
                'type' => 'password',
                'required' => true,
                'label' => __d('cake_d_c/users', 'Current password')]);
            ?>
        <?php endif; ?>
        <?= $this->Form->control('password', [
            'type' => 'password',
            'required' => true,
            'label' => __d('cake_d_c/users', 'New password')]);
        ?>
        <?= $this->Form->control('password_confirm', [
            'type' => 'password',
            'required' => true,
            'label' => __d('cake_d_c/users', 'Confirm password')]);
        ?>

    </fieldset>
    <?= $this->Form->button(__d('cake_d_c/users', 'Submit')); ?>
    <?= $this->Form->end() ?>
</div>
*/ ?>
