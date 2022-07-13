<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' : '; } ?><?php bloginfo( 'name' ); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo/spvgg_logo.svg" type="image/svg+xml" rel="icon" sizes="any">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo/favicon.png" type="image/png" rel="icon" sizes="32x32">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo/favicon.png" type="image/png" rel="icon" sizes="96x96">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo/apple-touch-icon.png" rel="apple-touch-icon-precomposed">
		<script src="https://kit.fontawesome.com/3a3b2b13c4.js" crossorigin="anonymous"></script>
        <script type='text/javascript' src="https://widget-prod.bfv.de/widget/widgetresource/widgetjs"></script>

		<?php if(is_singular( 'team' )) {?>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(  )?>/js/fupaWidget.js"></script>
		<?php
        }
		?>


		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8RHB48HY0D"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8RHB48HY0D');
</script>


		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>

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

