<?php /* Template Name: Post Filter */ ?>

<?php get_header() ?>

    <main class="main">

        <div class="post-filter container no-skew has-white-background-color">
        <form method="GET" action="">

            <select name="order" id="order">
                <option value="desc">Neueste zuerst</option>
                <option value="asc">Älteste Zuerst</option>
            </select>

            <?php

                $terms = get_terms(array(
                    'taxonomy' => 'category',
                    'hide_empty' => false
                ));

                foreach ($terms as $term) {

                    ?>

                    <label for="">

                        <option value="<?php $term->term_id ?>"><?php echo $term->name ?></option>

                    </label>

                    <?php


                }

            ?>

            <select name="posttype" id="posttype">
                <option value="" disabled selected>Kategorie</option>


            <?php

            $terms = get_terms(array(
                'taxonomy' => 'posttype',
                'hide_empty' => false
            ));

            foreach ($terms as $term) {

                ?>

                <label for="">

                    <option value="<?php $term->term_id ?>"><?php echo $term->name ?></option>

                </label>

                <?php


            }

            ?>

            </select>

            <button type="submit">Apply</button>
            
        </form>

        </div>

    </main>

<?php get_footer() ?>