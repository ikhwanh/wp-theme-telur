<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package telur
 */
?>

</div><!-- #page -->
<div class="drawer-backdrop fade in" x-show="isDrawerOpen || isMenuOpen" @click="isDrawerOpen=false;isMenuOpen=false;"></div>

<?php wp_footer(); ?>


</body>
</html>
