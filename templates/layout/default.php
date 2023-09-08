<?php
	// https://themewagon.com/themes/topiclisting/
    // https://github.com/devbridge/jQuery-Autocomplete
    //  - https://stackoverflow.com/questions/9656523/jquery-autocomplete-with-callback-ajax-json    
    // https://sweetalert2.github.io/
    //  - https://github.com/t4t5/sweetalert
?>
<!doctype html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
		
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>A kereső | <?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')) ?>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">                        
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-icons.css" rel="stylesheet">
        <link href="/css/templatemo-topic-listing.css" rel="stylesheet">
        <?= $this->fetch('css') ?>
        
        <link href="/css/style.css" rel="stylesheet">

		<!--
		TemplateMo 590 topic listing
		https://templatemo.com/tm-590-topic-listing
		-->
    </head>
    
    <body id="top">

        <main>
			<?php //debug($this->requests) ?>
			<?= $this->element('nav_bar') ?>
			
            <?php //= $this->Flash->render() ?>
			
            <?= $this->fetch('content') ?>
			
        </main>

		<?= $this->element('footer') ?>

        <!-- JAVASCRIPT FILES -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/jquery.sticky.js"></script>
        <script src="/js/click-scroll.js"></script>
        <script src="/plugins/Toast-Popup-Plugin-jQuery-Toaster/toast.script.js"></script>
        <script src="/js/custom.js"></script>

<script>
            $(document).ready( function(){
<?php //if($hasFlashMessage) { ?>

                function ToastMessage(title, text, type){
                    // type: success, error, warning, notice, info
                    $.Toast(title, text, type, {
                        has_icon: true,
                        has_close_btn: true,
                        position_class: "toast-top-right",
                        //position_class: "toast-bottom-left",
                        stack: true,
                        //fullscreen: true,
                        timeout: 8000,
                        sticky: false,
                        has_progress: true,
                        rtl: false,
                    });
                };
<?php //} ?>
     
<?php //= $this->Flash->render('auth') ?>
<?= $this->Flash->render() ?>

            });    

</script>

       	<!-- BEGIN Custom JS -->
        <?= $this->fetch('scriptBottom'); ?>

        <!-- END Custom JS -->

        <!-- BEGIN Custom script -->
        <?= $this->fetch('javaScriptBottom'); ?>
        
        <!-- END Custom script -->


    </body>
</html>
