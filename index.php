<?php get_header(); ?>

        <main class="App-content">
            <div id="content">
                <div class="IndexPage">
                    <div></div>
                    <div class="container">
                        <div class="sideNavContainer">
                            <?php get_sidebar(); ?>
                            <div class="IndexPage-results sideNavOffset">
                                
                                <div class="DiscussionList">

                                        <?php

                                        if (array_key_exists('cat', $_GET)) {
                                            $term = get_term_by('term_taxonomy_id', $_GET['cat'], 'category');
                                            echo '<h2>Show all post in category: '.$term->name.'</h2>';
                                        } else if (array_key_exists('tag', $_GET)) {
                                            $term = get_term_by('slug', $_GET['tag'], 'post_tag');
                                            echo '<h2>Show all post in tag: '.$term->name.'</h2>';
                                        }

                                        if (have_posts()) {
                                            while(have_posts()) {
                                                the_post();
                                                get_template_part('template-parts/content');
                                            }
                                        }

                                        get_template_part('template-parts/pagination');
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </main>
    <?php get_footer(); ?>