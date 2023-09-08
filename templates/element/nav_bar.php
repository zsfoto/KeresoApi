            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <i class="bi-back"></i>
                        <span><?= __('The finder') ?></span>
                    </a>

                    <!--div class="d-lg-none ms-auto me-4">
                        <a href="/logout" class="navbar-icon bi-person smoothscroll"></a>
                    </div-->
    
<?php if($this->request->getAttribute('identity')) { ?>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="/logout" class="navbar-icon bi-arrow-right-circle smoothscroll" title="Kijelentkezés"></a>
                    </div>

<?php } else { ?>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="/login" class="navbar-icon bi-arrow-left-circle smoothscroll" title="Bejelentkezés"></a>
                    </div>

<?php } ?>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
								<a class="nav-link click-scroll" href="/#hero_section"><?= __('Home') ?></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="/#categories"><?= __('Some categories') ?></a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="/#how_it_works"><?= __('How it works') ?></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="/#faq"><?= __('FAQs') ?></a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="/#section_5"><?= __('Contact') ?></a>
                            </li>

<?php if($this->request->getAttribute('identity')) { ?>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="/persons"><?= __('List our companies') ?></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $this->request->getAttribute('identity')->first_name ?>&nbsp;<?= $this->request->getAttribute('identity')->last_name ?></a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/profile">Profile</a></li>

                                    <li><?= $this->Html->link(__d('cake_d_c/users', 'Change Password'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'changePassword'], ['class' => 'dropdown-item']); ?></li>

                                    <!--li><a class="dropdown-item" href="/users/change-password">changePassword</a></li-->

                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                            </li>
<?php } ?>

                        </ul>

<?php if($this->request->getAttribute('identity')) { ?>

                        <div class="d-none d-lg-block">
                            <a href="/logout" class="navbar-icon bi-arrow-right-circle smoothscroll" title="Kijelentkezés"></a>
                        </div>
						
<?php } else { ?>

                        <div class="d-none d-lg-block">
                            <a href="/login" class="navbar-icon bi-arrow-left-circle smoothscroll" title="Bejelentkezés"></a>
                        </div>
						
<?php } ?>

                    </div>
                </div>
            </nav>