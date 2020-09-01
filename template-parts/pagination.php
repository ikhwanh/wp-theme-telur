<?php
/**
 * A template partial to output pagination for the Twenty Twenty default theme.
 *
 *
 * @package telur
 */

echo '<div class="DiscussionList-loadMore">';


$pagination = get_the_posts_pagination(
	array(
		'mid-size' => 5,
		'screen_reader_text' => ' '
	)
);

if ($pagination) {
	// custom css
	$pagination = str_replace('class="prev', 'style="visibility:hidden;" class="prev', $pagination);
	$pagination = str_replace('class="page-numbers', 'class="Button', $pagination);
	$pagination = str_replace('class="next', 'style="visibility:hidden;" class="prev', $pagination);

	echo $pagination;
}

echo '</div>';
