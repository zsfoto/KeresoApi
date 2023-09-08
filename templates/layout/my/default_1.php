<?php
	// https://themewagon.com/themes/topiclisting/
?>
<!doctype html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
		
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>A kereső | <?= $this->fetch('title') ?></title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">                        
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-icons.css" rel="stylesheet">
        <link href="/css/templatemo-topic-listing.css" rel="stylesheet">
		<!--
		TemplateMo 590 topic listing
		https://templatemo.com/tm-590-topic-listing
		-->
    </head>
    
    <body id="top">

        <main>

			<?= $this->element('nav_bar') ?>

			<?= $this->element('hero_section') ?>
			
			<?= $this->element('featured_section') ?>

            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>

        </main>


		<?= $this->element('footer') ?>


        <!-- JAVASCRIPT FILES -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/jquery.sticky.js"></script>
        <script src="/js/click-scroll.js"></script>
        <script src="/js/custom.js"></script>

    </body>
</html>
