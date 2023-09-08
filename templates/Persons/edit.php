<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $cities
 */
?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><?= __('Home') ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= __('Edit our company') ?></li>
                                </ol>
                            </nav>

                            <h2 class="text-white"><?= __('Edit our company')

                                ?><?php /*
                                $this->Html->tag(
                                    'span',
                                    __d('cake_d_c/users', '{0} {1}', $user->first_name, $user->last_name),
                                    ['class' => 'full_name']
                                )
                            */ ?></h2>
                        </div>

                    </div>
                </div>
            </header>

            <section class="section-padding" style="border-bottom: 1px dashed gray;">

                <div class="container">
                    <?= $this->Form->create($person, ['class' => 'custom-form contact-form', 'role' => 'form']) ?>

                    <div class="wizard my-5">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Kategória megadása">
                                <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1" aria-selected="true">
                                <i class="bi-plus" style="font-size: 46px;"></i>
                                </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Település megadása">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2" aria-selected="false" title="Step 2">
                                    <i class="bi-geo" style="font-size: 46px;"></i>
                                </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Adatok megadása">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3" aria-selected="false" title="Step 3">
                                    <i class="bi-list-ul" style="font-size: 46px;"></i>
                                </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="További telefonszámok">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4" aria-selected="false" title="Step 4">
                                    <i class="bi-telephone-plus" style="font-size: 46px;"></i>
                                </a>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Nyitvatartási órák">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step5" id="step5-tab" data-bs-toggle="tab" role="tab" aria-controls="step5" aria-selected="false" title="Step 5">
                                    <i class="bi-watch" style="font-size: 46px;"></i>                                    
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">

<?php /*
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
*/ ?>

                            <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                                <div class="d-flex justify-content-between">
                                    <a href="/persons" class="btn btn-secondary"><i class="bi-arrow-left"></i> <?= __('Back') ?></a>
                                    <a id="save_category" class="btn btn-info next"><?= __('Next') ?> <i class="bi-arrow-right"></i></a>
                                </div>

                                <div class="col-lg-12 col-12 mb-3 text-center">
                                    <h3><span style="color: red; margin-right: 5px;">*</span>1. lépés - Kategória megadása</h3>
                                    <!--p>Csak kezdje el begépelni a kategória nevét</p-->
                                </div>

                                <!--div class="overflow-scroll mb-3 p-3 pt-4" style="overflow: scroll; height: 300px; border: 2px dashed lightgray; background-color: #efefef;"-->

                                    <div class="row d-flex justify-content-center">

                                        <div class="col-lg-6 col-md-6 col-12"> 
                                            <div class="form-floating">
                                                <?php //= $categories ?>
                                                <?php //= $this->Form->control('category_id', ['label' => false, 'placeholder' => __('Main category'), 'class' => 'form-control', 'required' => true, 'style' => 'position: relative;' ]) ?>
                                                <?= $this->Form->control('category_id', [
                                                    'options' => $categories,
                                                    'label' => false,
                                                    'class' => 'form-control', 
                                                    'placeholder' => __('Please select'),
                                                    'required' => true,
                                                    'data-ajax--url' => 'http://kereso.loc/api/finders/autoComplete/categories.json',
                                                    'data-ajax--cache' => 'false',
                                                 ]) ?>
                                                <!--label for="floatingInput"><?= __('Main category') ?></label-->

                                            </div>

                                        </div>

                                    </div>

                                <!--/div-->

                            </div>

<?php /*
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
*/ ?>

                            <div class="tab-pane fade" role="tabpanel" id="step2" aria-labelledby="step2-tab">
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-secondary previous save-city"><i class="bi-arrow-left"></i> <?= __('Back') ?></a>
                                    <a class="btn btn-info next"><?= __('Next') ?> <i class="bi-arrow-right"></i></a>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 col-12 mb-3 text-center">
                                        <h3><span style="color: red; margin-right: 5px;">*</span>2. lépés - Település megadása</h3>
                                        <!--small><p><i>Csak kezdje el begépelni a település nevét vagy az irányítószámát</i></p></small-->

                                    </div>

                                    <!--div class="overflow-scroll mb-3 p-3 pt-4" style="overflow: scroll; height: 300px; border: 2px dashed lightgray; background-color: #efefef;"-->

                                    <div class="row justify-content-center mb-3"> 

                                        <div class="col-lg-8 col-md-8 col-12"> 

                                            <div class="form-floating">
<?php /*
                                                <?= $this->Form->control('cityname', ['label' => false, 'placeholder' => __('City name'), 'class' => 'form-control', 'required' => true ]) ?>
                                                <label for="floatingInput"><?= __('City name') ?></label>
*/ ?>

                                                <?= $this->Form->control('city_id', [
                                                    'options' => $cities,
                                                    //'value' => $person->city_id,
                                                    'label' => false, 
                                                    'class' => 'form-control', 
                                                    'placeholder' => __('Please select your city'),
                                                    'required' => true,
                                                    'data-ajax--url' => 'http://kereso.loc/api/finders/autoComplete/cities.json',
                                                    'data-ajax--cache' => 'false',
                                                ]) ?>

                                            </div>

                                        </div>

                                    </div>

                                    <!--p>
                                        Ha nem ismeri a GPS koordinátákat, akkor kérem hagyja üresen!<br>
                                        <small><i>(Üresen hagyás esetén a település központi koordinátái kerülnek mentésre.)</i></small>
                                    </p-->

                                    <div class="row justify-content-center text-center"> 
                                        <div class="col-lg-4 col-md-4 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('longitude', ['label' => false, 'placeholder' => __('Longitude'), 'class' => 'form-control', 'required' => true ]) ?>
                                                <label for="floatingInput"><?= __('Longitude') ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('latitude', ['label' => false, 'placeholder' => __('Latitude'), 'class' => 'form-control', 'required' => true ]) ?>
                                                <label for="floatingInput"><?= __('Latitude') ?></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

<?php /*
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
*/ ?>

                            <div class="tab-pane fade" role="tabpanel" id="step3" aria-labelledby="step3-tab">

                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-secondary previous"><i class="bi-arrow-left"></i> <?= __('Back') ?></a>
                                    <a class="btn btn-info next"><?= __('Next') ?> <i class="bi-arrow-right"></i></a>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 col-12 mb-3 text-center">
                                        <h3>3. lépés - Adatok megadása</h3>
                                    </div>

                                    <!--div class="overflow-scroll mb-3 p-3" style="overflow: scroll; height: 450px; border: 2px dashed lightgray; background-color: #efefef;"-->

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('name', ['label' => false, 'placeholder' => __('Name'), 'class' => 'form-control', 'required' => true ]) ?>
                                                    <label for="floatingInput"><span style="color: red; margin-right: 5px;">*</span><?= __('Name') ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('description', ['label' => false, 'placeholder' => __('Description'), 'class' => 'form-control', 'required' => true ]) ?>
                                                    <label for="floatingInput"><span style="color: red; margin-right: 5px;">*</span><?= __('Description') ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('phone', ['type' => 'tel', 'label' => false, 'placeholder' => __('Phone'), 'class' => 'form-control', 'required' => true ]) ?>
                                                    <label for="floatingInput"><span style="color: red; margin-right: 5px;">*</span><?= __('Phone') ?></label>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('phone2', ['type' => 'tel', 'label' => false, 'placeholder' => __('2. Phone'), 'class' => 'form-control', 'required' => false ]) ?>
                                                    <label for="floatingInput"><?= __('2. Phone') ?></label>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('fax', ['type' => 'tel', 'label' => false, 'placeholder' => __('FAX'), 'class' => 'form-control', 'required' => false ]) ?>
                                                    <label for="floatingInput"><?= __('FAX') ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('email', ['type' => 'email', 'label' => false, 'placeholder' => __('E-mail'), 'class' => 'form-control', 'required' => false ]) ?>
                                                    <label for="floatingInput"><?= __('E-mail') ?></label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('website', ['label' => false, 'placeholder' => __('Website'), 'class' => 'form-control', 'required' => false ]) ?>
                                                    <label for="floatingInput"><?= __('Website') ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('address', ['label' => false, 'placeholder' => __('Address'), 'class' => 'form-control', 'required' => false ]) ?>
                                                    <label for="floatingInput"><?= __('Address') ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('googlemap_url', ['label' => false, 'placeholder' => __('Google map url'), 'class' => 'form-control', 'required' => false ]) ?>
                                                    <label for="floatingInput"><?= __('Google map url') ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12"> 
                                                <div class="form-floating">
                                                    <?= $this->Form->control('keywords', ['label' => false, 'placeholder' => __('Keywords'), 'class' => 'form-control', 'required' => false ]) ?>
                                                    <label for="floatingInput"><?= __('Keywords') ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <!--div class="col-lg-6 col-md-6 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('more', ['label' => false, 'placeholder' => __('City name'), 'class' => 'form-control', 'required' => true ]) ?>
                                                <label for="floatingInput"><?= __('City name') ?></label>
                                            </div>
                                        </div-->

                                    <!--/div-->

                                </div>

                            </div>

<?php /*
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
*/ ?>

                            <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">

                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-secondary previous"><i class="bi-arrow-left"></i> <?= __('Back') ?></a>
                                    <a class="btn btn-info next"><?= __('Next') ?> <i class="bi-arrow-right"></i></a>
                                </div>
                                
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 col-12 mb-3 text-center">
                                        <h3>4. lépés - További telefonszámok</h3>
                                        <p>
                                            Itt megadhatja, hogy milyen további telefonszámok vannak még.<br>
                                            <small><i>Az alábbi területben néhány telefonszám jelenik meg. Kérem görgessen a további mezőkhöz.</i></small>
                                        </p>
                                    </div>
                                </div>



<?php /* */ ?>
                                <div class="overflow-scroll mb-3 p-3" style="overflow: scroll; height: 700px; border: 2px dashed lightgray; background-color: #efefef;">

<?php
$phones = $person->phones;
$t = 0;
for($i=0; $i <= 99; $i++) { 
    $t = $i + 1;
?>

                                    <?= $this->Form->control('phone_id' . $i, ['type' => 'hidden', 'value' => (!empty($phones[$i]) ? $phones[$i]['id'] : '')] ) ?>

                                    <div class="row d-flex justify-content-between">
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-floating">
                                                <?= $this->Form->control('phone_name' . $i, ['label' => false, 'placeholder' => $t . '. ' . __('Name'), 'class' => 'form-control', 'value' => (!empty($phones[$i]) ? $phones[$i]['name'] : '') ]) ?>
                                                <label for="floatingInput"><?= $t . '. ' . __('Name') ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('phone_description' . $i, ['label' => false, 'placeholder' => $t . '. ' . __('Title'), 'class' => 'form-control', 'value' => (!empty($phones[$i]) ? $phones[$i]['description'] : '') ]) ?>
                                                <label for="floatingInput"><?= $t . '. ' . __('Title') ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('phone_phone' . $i, ['label' => false, 'placeholder' => $t . '. ' . __('Phone'), 'class' => 'form-control', 'value' => (!empty($phones[$i]) ? $phones[$i]['phone'] : '') ]) ?>
                                                <label for="floatingInput"><?= $t . '. ' . __('Phone') ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-1 col-md-1 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('phone_ext' . $i, ['label' => false, 'placeholder' => $t . '. ' . __('Ext'), 'class' => 'form-control', 'value' => (!empty($phones[$i]) ? $phones[$i]['ext'] : '') ]) ?>
                                                <label for="floatingInput"><?= $t . '. ' . __('Ext') ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('phone_email' . $i, ['label' => false, 'placeholder' => $t . '. ' . __('Email'), 'class' => 'form-control', 'value' => (!empty($phones[$i]) ? $phones[$i]['email'] : '') ]) ?>
                                                <label for="floatingInput"><?= $t . '. ' . __('Email') ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-1 col-md-1 col-12"> 
                                            <div class="form-floating pt-2">
                                                <!--button class="btn btn-md btn-outline-secondary">...</button-->
                                                <?php if(!empty($phones[$i])){ ?>
                                                    <?= $this->Form->button('Töröl', ['role'=>'button', 'class'=>'btn btn-danger delete', 'id' => 'delete_phone_' . $i]) ?>
                                                <?php } ?>                                                
                                            </div>
                                        </div>

                                    </div>

<?php } ?>

                                </div>

                            </div>
 
<?php /*
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
############################################################################################################################################
*/ ?>

                            <div class="tab-pane fade" role="tabpanel" id="step5" aria-labelledby="step5-tab">

                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-secondary previous"><i class="bi-arrow-left"></i> <?= __('Back') ?></a>
                                    <button type="submit" class="btn btn-info next"><?= __('Save') ?> <i class="bi-save"></i></button>
                                </div>


                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 col-12 mb-3 text-center">
                                        <h3>5. lépés - Nyitvatartási idők</h3>
                                        <p>
                                            Ha van nyitvatartási idő, kérem adja meg.<br>
                                            <small style="color: red;"><i>Ha mentés gombbal nem sikerül az űrlapot elmentenie, akkor nézze át a megadott adatokat.</i></small>
                                        </p>
                                    </div>
                                </div>

                                <div class="overflow-scroll mb-3 p-3" style="overflow: scroll; height: 610px; border: 2px dashed lightgray; background-color: #efefef;">

<?php
$openings = $person->openings;
$t = 0;
for($i=0; $i <= 6; $i++) {
    $t = $i + 1;
?>
                                    <div class="d-flex justify-content-between">
    
                                        <?= $this->Form->control('open_id' . $i, ['type' => 'hidden', 'value' => (!empty($openings[$i]) ? $openings[$i]['id'] : '')] ) ?>
    
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-floating">
                                                <?= $this->Form->control('open_name' . $i, ['label' => false, 'placeholder' => $i . '. ' . __('Day'), 'class' => 'form-control', 'value' => (!empty($openings[$i]) ? $openings[$i]['name'] : '') ]) ?>
                                                <label for="floatingInput"><?= $i . '. ' . __('Day') ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('open_from' . $i, ['label' => false, 'placeholder' => $i . '. ' . __('Hour from'), 'class' => 'form-control', 'value' => (!empty($openings[$i]) ? $openings[$i]['hour_from'] : '') ]) ?>
                                                <label for="floatingInput"><?= $i . '. ' . __('Hour from') ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('open_to' . $i, ['label' => false, 'placeholder' => $i . '. ' . __('Hour to'), 'class' => 'form-control', 'value' => (!empty($openings[$i]) ? $openings[$i]['hour_to'] : '') ]) ?>
                                                <label for="floatingInput"><?= $i . '. ' . __('Hour to') ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-12"> 
                                            <div class="form-floating">
                                                <?= $this->Form->control('open_comment' . $i, ['label' => false, 'placeholder' => $i . '. ' . __('Comment'), 'class' => 'form-control', 'value' => (!empty($openings[$i]) ? $openings[$i]['comment'] : '') ]) ?>
                                                <label for="floatingInput"><?= $i . '. ' . __('Comment') ?></label>
                                            </div>
                                        </div>


                                    </div>

<?php } ?>

                                </div>




                            </div>
                        </div>
                        <?= $this->Form->end() ?>

                    </div>

                </section>


<?php

	$this->Html->css(
		[
			"/css/wizard",
            "/plugins/select2-master/dist/css/select2.min",
            //"/plugins/select2-Flat_Theme-master/dist/select2-flat-theme.min",
            //"/plugins/select2-bootstrap4-theme-master/dist/select2-bootstrap4.min",
            "/css/select2-my",
		],
		['block' => true]);


	$this->Html->script(
		[
            "/plugins/select2-master/dist/js/select2.full.min",
            //"/plugins/select2-master/dist/js/i18n/hu",
            "/js/select2-hu",
		],
		['block' => 'scriptBottom']
	);

?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

    'use strict';

    let csrfToken = $('meta[name="csrfToken"]').attr('content');

    $(document).ready(function () {

        // TAB • Enable Tooltips
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // TAB • Advance Tabs
        $(".next").click(function () {
            const nextTabLinkEl = $(".nav-tabs .active")
                .closest("li")
                .next("li")
                .find("a")[0];
            const nextTab = new bootstrap.Tab(nextTabLinkEl);
            nextTab.show();
        });

        $(".previous").click(function () {
            const prevTabLinkEl = $(".nav-tabs .active")
                .closest("li")
                .prev("li")
                .find("a")[0];
            const prevTab = new bootstrap.Tab(prevTabLinkEl);
            prevTab.show();
        });

        // Category
        $('#category-id').select2({
            theme: "my",
            placeholder: '<?= __('Select the category') ?>',
            language: "hu",
            selectOnClose: true,
            width: '100%'
        });

        // City
        $('#city-id').select2({
            theme: "my",
            placeholder: '<?= __('Select your city') ?>',
            language: "hu",
            selectOnClose: true,
            width: '100%'
        });

        // Update longitude and latitude input fields
        $('select').on('select2:select', function (e) {
            var data = e.params.data;
            console.log(e);
            if($(this).attr('id') == 'city-id'){
                if(data.selected){
                    $.ajax({
                        url: 'http://kereso.loc/api/finders/autoComplete/city.json',
                        type: 'GET',
                        dataType: "json",                        
                        data: { id: data.id }, 
                        success: function (result) { 
                            $('#longitude').val(result.results.longitude);
                            $('#latitude').val(result.results.latitude);
                        }
                    });
                }
            }
        });

<?php /*
        $('#save_category').click( function(){
            $.ajax({
                url: 'http://kereso.loc/persons/ajaxSaveCategory',
                type: 'POST',
                headers:{ 'X-CSRF-Token': csrfToken },                
                dataType: "JSON",
                data: { 
                    id: <?= $person->id ?>,
                    category_id: $('#category-id').val()
                },
                success: function (result) { 
                    // hidden modal
                }
            });            
        });

        $('.save-city').click( function(){
            $.ajax({
                url: 'http://kereso.loc/persons/ajaxSaveCity',
                type: 'POST',
                headers:{ 'X-CSRF-Token': csrfToken },                
                dataType: "JSON",
                data: { 
                    id: <?= $person->id ?>,
                    city_id: $('#city-id').val()
                },
                success: function (result) { 
                    // hidden modal
                }
            });            
        });
*/ ?>
<?php /*
        $("#add_new_phone_row").click( function(){

        });
*/ ?>

    });

<?php $this->Html->scriptEnd(); ?>

