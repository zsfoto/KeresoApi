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

$action = $this->request->getParam('action');
?>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <i class="bi-back"></i>
                        <span><?= __('The finder') ?></span>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            
                            <li class="nav-item" style="display: none;">
								<a class="nav-link" href="/">.</a>
                            </li>
                            
                            <li class="nav-item">
								<a class="nav-link" href="/"><?= __('Home') ?></a>
                            </li>

<?php if($this->request->getAttribute('identity')) { ?>
    <?php   if ($action != 'profile') { ?>
                            <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
<?php   } ?>
<?php   if ($action != 'changePassword') { ?>
                            <li class="nav-item"><?= $this->Html->link(__d('cake_d_c/users', 'Change Password'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'changePassword'], ['class' => 'nav-link']); ?></li>
<?php   } ?>

                            <!--li class="nav-item"><a class="nav-link" href="/users/change-password">changePassword</a></li-->
                            <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
<?php } ?>


<?php if(!$this->request->getAttribute('identity')) { ?>
<?php   if ($action != 'login') { ?>
                            <li class="nav-item">
                                <?= $this->Html->link(__d('cake_d_c/users', 'Login'), ['action' => 'login'], ['class' => 'nav-link']) ?>

                            </li>
<?php   } ?>

<?php
    $registrationActive = Configure::read('Users.Registration.active');
    if ($registrationActive) {
        if ($action != 'register') {
        
?>
                            <li class="nav-item">
                                <?= $this->Html->link(__d('cake_d_c/users', 'Register'), ['action' => 'register'], ['class' => 'nav-link']) ?>

                            </li>
<?php
        }
    }
?>




<?php
if (Configure::read('Users.Email.required')) {
    if ($action != 'requestResetPassword') {
?>
                            <li class="nav-item">
                                <?= $this->Html->link(__d('cake_d_c/users', 'Reset Password'), ['action' => 'requestResetPassword'], ['class' => 'nav-link']) ?>

                            </li>
<?php
        }
    }
?>
<?php } // if(!$this->request->getAttribute('identity')) ?>

<?php /* if($this->request->getAttribute('identity')) { ?>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $this->request->getAttribute('identity')->first_name ?>&nbsp;<?= $this->request->getAttribute('identity')->last_name ?></a>

    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
        <li><a class="dropdown-item" href="/profile">Profile</a></li>

        <li><?= $this->Html->link(__d('cake_d_c/users', 'Change Password'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'changePassword'], ['class' => 'dropdown-item']); ?></li>

        <!--li><a class="dropdown-item" href="/users/change-password">changePassword</a></li-->

        <li><a class="dropdown-item" href="/logout">Logout</a></li>
    </ul>
</li>
<?php } */ ?>

                        </ul>
                    </div>
                </div>
            </nav>