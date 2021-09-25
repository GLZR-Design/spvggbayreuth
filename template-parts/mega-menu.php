<nav class="header__menu mega-menu">

<?php $menuObject = glzr_rest_to_object('menu', 'header'); ?>

    <ul id="menu-primary" class="mega-menu__list mega-menu__list--primary" data-menu-level='0'>

    <?php foreach ($menuObject as $key => $menuItem) {

        $id = "item-" . $menuItem->item_id;

        $children_attribute = ($menuItem->has_children)?"data-has-children=true":"";

        echo "<li id='$id' $children_attribute class='mega-menu__item'>";

        if ($menuItem->has_children) {

            echo "<span href='$menuItem->url' class='is-hoverbox-black'>$menuItem->title</span>";

            echo "<ul data-aos='fade-up' data-menu-parent='$id' data-menu-level='1' class='mega-menu__list mega-menu__list--secondary has-white-background-color'>";

                foreach ($menuItem->children as $menuSecondaryItem) {

                    $id = "item-" . $menuSecondaryItem->item_id;
                    $children_attribute = ($menuSecondaryItem->has_children)?"data-has-children=true":"";

                    echo "<li id='$id' data-aos='fade-up' $children_attribute data-post-type='$menuSecondaryItem->post_type' class='mega-menu__item'>";

                        if ($menuSecondaryItem->has_children) {

                            $tag = ($menuSecondaryItem->post_type == "category") ? "a" : "span";

                            echo "<{$tag} href='$menuSecondaryItem->url' class='has-primary-hoverline'>$menuSecondaryItem->title</{$tag}>";
                            $posttype = $menuSecondaryItem->post_type;
                            echo "<ul data-menu-level='2' data-menu-parent='$id' data-menu-type='{$posttype}' class='mega-menu__list mega-menu__list--tertiary mega-menu__list--{$posttype} has-light-grey-background-color'>";

                                foreach ($menuSecondaryItem->children as $menuTertiaryItem) {

                                    echo "<li data-aos='fade-up' class='mega-menu__item mega-menu__item--tertiary'>";

                                        switch ($menuTertiaryItem->post_type) {

                                            case "post" :
                                                $post = get_post($menuTertiaryItem->ID);
                                                setup_postdata($post);
                                                get_template_part( 'template-parts/teaser-card', get_post_format(), array('small' => true, 'box-shadow' => false ));
                                                break;

                                            default :
                                                echo "<a href='$menuTertiaryItem->url'>$menuTertiaryItem->title</a>";
                                                break;

                                        }

                                    echo "</li>";

//                                          "<a href='$menuTertiaryItem->url'>$menuTertiaryItem->title</a></li>";
                                }

                            echo "</ul>";

                        }

                        else {

                            echo "<a href='$menuSecondaryItem->url' class='has-primary-hoverline'>$menuSecondaryItem->title</a>";
                        }

                    echo "</li>";


                }

            echo "</ul>";

        }

        else {
            echo "<a href='$menuItem->url' class='is-hoverbox-black' target='$menuItem->target'>$menuItem->title</a>";
        }

        echo "</li>";

    }  ?>

    </ul>

    <button id="menu-back" class="mega-menu__back">Zurück</button>

</nav>

<button id="menu-toggle" class="mega-menu__toggle"><span class="mega-menu__icon"></span></button>

<?php wp_reset_query() ?>