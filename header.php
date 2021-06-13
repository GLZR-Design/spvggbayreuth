<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' : '; } ?><?php bloginfo( 'name' ); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<script src="https://kit.fontawesome.com/3a3b2b13c4.js" crossorigin="anonymous"></script>
        <script type='text/javascript' src="https://widget-prod.bfv.de/widget/widgetresource/widgetjs"></script>

		<?php if(is_singular( 'team' )) {?>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(  )?>/js/fupaWidget.js"></script>
		<?php
		}

//            $result = setlocale(LC_ALL, 'en_US.utf-8');
//
//            if($result === false){
//                die('Got error changing locale, check if locale is installed on the system');
//            }

		?>


		


		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>
		<script>
		// conditionizr.com
		// configure environment tests
		conditionizr.config({
			assets: '<?php echo esc_url( get_template_directory_uri() ); ?>',
			tests: {}
		});
		</script>

    <?php if(!$args['hide']) { ?>

    </head>

	<body class="body <?php echo ($args['template'])?'body--' . $args['template'] : '' ?><?php echo (is_front_page())?'frontpage' : '' ?>" data-spy="scroll" data-target="#scrollspy" data-offset="0">


	<div id="header-wrapper" class="header__wrapper">
				<!-- header -->
			<header class="header" role="banner">
					
					<a class="header__logo-wrapper" href="<?php echo get_home_url()?>">
						<object class="logo" type="image/svg+xml" data="<?php echo get_template_directory_uri() ?>/assets/img/logo/spvgg_logo.svg">
							<img class="logo" src="<?php echo get_template_directory_uri() ?>/assets/img/logo/spvgg_logo_512px.png" alt="SpVgg Oberfranken Bayreuth">
						</object>
					</a>

                <?php get_template_part('template-parts/mega-menu') ?>

        <?php get_template_part( "template-parts/page-title"); ?>


			</header>
	</div>


	<div id="body-wrapper" data-spy="scroll" data-target="#scrollspy" class="wrapper">

    <?php } ?>

