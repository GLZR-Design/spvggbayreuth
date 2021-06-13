<?php get_header(null, array(
    'hide' => true,
    'no-skew' => true,
    'close-header' => false
)) ?>


<!-- Vendor -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/vendor/webslide/vendor/jquery/jquery-3.2.1.min.js"></script>
<!-- Vendor -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/vendor/webslide/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/vendor/webslide/vendor/bootstrap/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/vendor/webslide/vendor/bootstrap/bootstrap.min.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<!-- Vendor -->

<!--Main Menu File-->
<link id="effect" rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() ?>/vendor/webslide/webslidemenu/dropdown-effects/fade-down.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() ?>/vendor/webslide/webslidemenu/webslidemenu.css" />

<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() ?>/vendor/webslide/webslidemenu/color-skins/white-red.css" />

<!-- Include Below JS After Your jQuery.min File -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/vendor/webslide/webslidemenu/webslidemenu.js"></script>
<!--Main Menu File-->


<!--For Demo Only (Remove below css and Javascript) -->
<!--    <link rel="stylesheet" href="--><?php //echo get_template_directory_uri() ?><!--/vendor/webslide/webslidemenu/demo.css" />-->
<script type='text/javascript'>
    $(document).ready(function () {
        $("a[data-theme]").click(function () {
            $("head link#theme").attr("href", $(this).data("theme"));
            $(this).toggleClass('active').siblings().removeClass('active');
        });
        $("a[data-effect]").click(function () {
            $("head link#effect").attr("href", $(this).data("effect"));
            $(this).toggleClass('active').siblings().removeClass('active');
        });
    });
</script>
<!--For Demo Only (Remove below css and Javascript) -->


</head>

<body>

<!-- Mobile Header -->
<div class="wsmobileheader clearfix ">
    <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
    <span class="smllogo"><img src="images/menu-logo.png" width="80" alt="" /></span>
    <a href="tel:123456789" class="callusbtn"><i class="fas fa-phone"></i></a>
</div>
<!-- Mobile Header -->

<div class="wsmainfull clearfix">
    <div class="wsmainwp clearfix">


        <!--            <div class="desktoplogo"><a href="#"><img src="images/sml-logo02.png" alt=""></a></div>-->
        <!--Main Menu HTML Code-->

        <nav class="wsmenu clearfix">

            <ul class="wsmenu-list">

                <li aria-haspopup="true"><a href="#" class="active menuhomeicon has-primary-background-color"><i class="fas fa-home"></i><span class="hometext">&nbsp;&nbsp;Home</span></a></li>

                <?php $menuObject = glzr_rest_to_object('menu', 'header'); ?>

                <?php foreach ($menuObject as $key => $menuItem) {

                    $id = "item-" . $menuItem->item_id;

                    $children_attribute = ($menuItem->has_children)?"data-has-children=true":"";

                    echo "<li aria-haspopup='true' ><a class='menu__item is-hoverbox-black' href=\"#\">$menuItem->title</a>";

                    echo "<ul class='sub-menu clearfix wsmegamenu'>";

                    foreach ($menuItem->children as $menuSecondaryItem) {

                        $id = "item-" . $menuSecondaryItem->item_id;
                        $children_attribute = ($menuSecondaryItem->has_children)?"data-has-children=true":"";

                        echo "<li aria-haspopup='true' class='mega-menu__item has-primary-hoverline'><a href='$menuSecondaryItem->url'>$menuSecondaryItem->title</a>";
//
                        if ($menuSecondaryItem->has_children) {
//
//                                        $tag = ($menuSecondaryItem->post_type == "category") ? "a" : "span";
//
//                                        echo "<{$tag} href='$menuSecondaryItem->url' class='has-primary-hoverline'>$menuSecondaryItem->title</{$tag}>";
//
                            echo "<ul class='sub-menu clearfix wsmegamenu' data-level='3'>";
//
                            foreach ($menuSecondaryItem->children as $menuTertiaryItem) {
//
                                echo "<li aria-haspopup='true' class='mega-menu__item'>";
//
                                switch ($menuTertiaryItem->post_type) {

                                    case "post" :
                                        $post = get_post($menuTertiaryItem->ID);
                                        setup_postdata($post);
                                        get_template_part( 'template-parts/teaser-card', get_post_format(), array('small' => true, 'class' => 'mega-menu__teaser') );
                                        break;

                                    default :
                                        echo "<a href='$menuTertiaryItem->url'>$menuTertiaryItem->title</a>";
                                        break;

                                }
//
                                echo "</li>";
//
////                                          "<a href='$menuTertiaryItem->url'>$menuTertiaryItem->title</a></li>";
                            }
//
                            echo "</ul>";
//
//                                    }
//
//                                    else {
//                                        echo "<a href='$menuSecondaryItem->url' class='has-primary-hoverline'>$menuSecondaryItem->title</a>";
                        }

                        echo "</li>";


                    }

                    echo "</ul>";

                    echo "</li>";

                }  ?>

                <!--                    <li aria-haspopup="true"><a href="#"><i class="fas fa-align-justify"></i>Dropdowns <span class="wsarrow"></span></a>-->
                <!--                        <ul class="sub-menu">-->
                <!--                            <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Website Design </a></li>-->
                <!--                            <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Ecommerce Solutions</a></li>-->
                <!--                            <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Application Development</a></li>-->
                <!--                            <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Website Development</a></li>-->
                <!--                            <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Open Source Development</a>-->
                <!--                                <ul class="sub-menu">-->
                <!--                                    <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Submenu item 1</a></li>-->
                <!--                                    <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Submenu item 2</a></li>-->
                <!--                                    <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Submenu item 3</a></li>-->
                <!--                                    <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Submenu item 4</a>-->
                <!--                                        <ul class="sub-menu">-->
                <!--                                            <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Submenu item 1 Sub</a></li>-->
                <!--                                            <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Submenu item 2 Sub</a></li>-->
                <!--                                            <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Submenu item 3 Sub</a></li>-->
                <!--                                            <li aria-haspopup="true"><a href="#"><i class="fas fa-angle-right"></i>Submenu item 4 Sub</a></li>-->
                <!--                                        </ul>-->
                <!--                                    </li>-->
                <!--                                </ul>-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!--                    </li>-->
                <!--                    <li aria-haspopup="true"><a href="#"><i class="fas fa-list-alt"></i>Half menu <span class="wsarrow"></span></a>-->
                <!--                        <div class="wsmegamenu clearfix halfmenu">-->
                <!--                            <div class="container-fluid">-->
                <!--                                <div class="row">-->
                <!---->
                <!--                                    <ul class="col-lg-6 col-md-12 col-xs-12 link-list">-->
                <!--                                        <li class="title">Product Header</li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                    </ul>-->
                <!--                                    <ul class="col-lg-6 col-md-12 col-xs-12 link-list">-->
                <!--                                        <li class="title">Product Header</li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!--                                    </ul>-->
                <!--                                </div>-->
                <!---->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </li>-->
                <!--                    <li aria-haspopup="true"><a href="#"><i class="fas fa-list"></i>Mega menu <span class="wsarrow"></span></a>-->
                <!--                        <div class="wsmegamenu clearfix">-->
                <!--                            <div class="container-fluid">-->
                <!--                                <div class="row">-->
                <!---->
                <!--                                    <div class="col-lg-5 col-md-12 col-xs-12 link-list">-->
                <!--                                        <div class="title">More Text Header</div>-->
                <!--                                        <p class="wsmwnutxt">Lorem Ipsum is simply dummy text of the printing and typesetting industry.-->
                <!--                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown-->
                <!--                                            printer took a galley of type and-->
                <!--                                            scrambled it to make a type-->
                <!--                                            specimen book. It has survived not only five centuries, but also the leap into electronic-->
                <!--                                            typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of-->
                <!--                                            Letraset sheets containing Lorem Ipsum-->
                <!--                                            passages,-->
                <!--                                            and more recently with desktop publishing software like Aldus PageMaker including versions of-->
                <!--                                            Lorem Ipsum.</p>-->
                <!--                                        <p class="wsmwnutxt">Lorem Ipsum is simplntly with desktop publishing software like Aldus PageMaker-->
                <!--                                            but also the leap into electronic typesetting including versions of Lorem Ipsum.</p>-->
                <!--                                    </div>-->
                <!---->
                <!---->
                <!--                                    <ul class="col-lg-3 col-md-12 col-xs-12 link-list">-->
                <!--                                        <li class="title">Product Header</li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Open Source link goes here</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Long link area with no scroll</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Dummy more link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Smart Shop link here</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>CMS Submenu link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>New link area with no scroll</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>HTML5 link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Wordpress link style</a></li>-->
                <!--                                        <li><a href="#"><i class="fas fa-arrow-circle-right"></i>Submenu link style</a></li>-->
                <!---->
                <!--                                    </ul>-->
                <!---->
                <!---->
                <!---->
                <!--                                    <div class="col-lg-4 col-md-12 col-xs-12">-->
                <!--                                        <h3 class="title">New Arrival Slider </h3>-->
                <!--                                        <div id="demo" class="carousel slide" data-ride="carousel">-->
                <!--                                            <!-- The slideshow -->-->
                <!--                                            <div class="carousel-inner">-->
                <!--                                                <div class="carousel-item active"><img src="images/image01.jpg" alt="" />-->
                <!--                                                    <div class="carousel-caption">-->
                <!--                                                        <h3>Slider Caption Option 01</h3>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                                <div class="carousel-item"><img src="images/image02.jpg" alt="" />-->
                <!--                                                    <div class="carousel-caption">-->
                <!--                                                        <h3>Slider Caption Option 02</h3>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                                <div class="carousel-item"><img src="images/image03.jpg" alt="" />-->
                <!--                                                    <div class="carousel-caption">-->
                <!--                                                        <h3>Slider Caption Option 03</h3>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                                <div class="carousel-item"><img src="images/image04.jpg" alt="" />-->
                <!--                                                    <div class="carousel-caption">-->
                <!--                                                        <h3>Slider Caption Option 04</h3>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                                <div class="carousel-item"><img src="images/image05.jpg" alt="" />-->
                <!--                                                    <div class="carousel-caption">-->
                <!--                                                        <h3>Slider Caption Option 05</h3>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                                <div class="carousel-item"><img src="images/image06.jpg" alt="" />-->
                <!--                                                    <div class="carousel-caption">-->
                <!--                                                        <h3>Slider Caption Option 06</h3>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!---->
                <!--                                            <!-- Left and right controls -->-->
                <!--                                            <a class="carousel-control-prev" href="#demo" data-slide="prev"> <span class="carousel-control-prev-icon"></span>-->
                <!--                                            </a>-->
                <!--                                            <a class="carousel-control-next" href="#demo" data-slide="next"> <span class="carousel-control-next-icon"></span>-->
                <!--                                            </a>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!---->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </li>-->
                <!--                    <li aria-haspopup="true"><a href="#"><i class="fas fa-paper-plane"></i>Contact Us <span class="wsarrow"></span></a>-->
                <!--                        <div class="wsmegamenu halfdiv">-->
                <!--                            <div class="container-fluid">-->
                <!--                                <div class="row">-->
                <!--                                    <div class="col-lg-12">-->
                <!--                                        <h3 class="title">Contact Form</h3>-->
                <!--                                        <form name="contact_name" class="menu_form">-->
                <!--                                            <input type="text" placeholder="Name">-->
                <!--                                            <input type="text" placeholder="Email">-->
                <!--                                            <textarea placeholder="Your message..."></textarea>-->
                <!--                                            <input type="button" value="Reset">-->
                <!--                                            <input type="submit" value="Send"></form>-->
                <!--                                        <div class="cl"></div>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </li>-->
            </ul>
        </nav>
        <!--Menu HTML Code-->
    </div>
</div>


<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />