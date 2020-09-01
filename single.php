<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package telur
 */
get_header(); ?>
<main class="App-content">
    <div id="content">
        <div class="DiscussionPage">
            
            <div class="DiscussionPage-discussion">
                <header class="Hero DiscussionHero DiscussionHero--colored">
                    <div class="container">
                        <ul class="DiscussionHero-items">
                            <li class="item-title">
                                <h2 class="DiscussionHero-title"><?php the_title(); ?></h2>
                            </li>
                        </ul>
                    </div>
                </header>
                <div class="container">
                    <div class="DiscussionPage-stream">
                        <div class="PostStream">
                            <div class="PostStream-item" style="">
                                <article class=" CommentPost Post--edited Post Post--by-start-user">
                                    <div>
                                        <div class="Post-body">
                                            <?php the_content(); ?>
                                        </div>
                                        <aside class="Post-actions">
                                            <ul>
                                                <li class="item-reply"><button class="Button Button--link" type="button" title="Reply"><span class="Button-label">Reply</span></button></li>
                                            </ul>
                                        </aside>
                                        
                                    </div>
                                </article>
                                <div class="Post-quoteButtonContainer"></div>
                            </div>
                            
                            <div class="PostStream-item">
                                <article class="Post ReplyPlaceholder">
                                    <?php if ( comments_open() || get_comments_number() )  {
                                        comments_template();
                                    }
                                    ?>
                                </article>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer();