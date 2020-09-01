<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package telur
 */

?>
<ul class="DiscussionList-discussions">
    <li>
        <article id="<?php the_ID(); ?>">
            <div class="DiscussionListItem"><a class="Slidable-underneath Slidable-underneath--left Slidable-underneath--elastic disabled"><i class="icon fas fa-check "></i></a>
                <div class="DiscussionListItem-content Slidable-content">
                    <a href="<?php the_permalink(); ?>" class="DiscussionListItem-main">
                        <h3 class="DiscussionListItem-title">
                            <?php the_title(); ?>
                        </h3>
                        <ul class="DiscussionListItem-info">
                            <li class="item-terminalPost">
                                <span><i class="icon fas fa-calendar "></i>
                                    <time>
                                        <?php the_date('F j, Y, g:i a'); ?>
                                    </time>
                                </span>
                                <span><i class="icon fas fa-comment "></i>
                                    <span>
                                        <?php comments_number(); ?>
                                    </span>
                                </span>
                            </li>
                            <li class="item-excerpt">
                                <?php echo get_the_excerpt(); ?>
                                
                            </li>
                        </ul>
                    </a>
                </div>
            </div>
        </article>
    </li>
</ul>
<!-- <div class="DiscussionList-loadMore"><button class="Button" type="button" title="Load More"><span class="Button-label">Load More</span></button></div> -->