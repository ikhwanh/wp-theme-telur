<?php
/**
 * The sidebar containing the main widget area
 *
 *
 * @package telur
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>
<nav class="IndexPage-nav sideNav">
    <ul>
        <li class="item-nav">
            <div class="ButtonGroup Dropdown dropdown App-titleControl Dropdown--select Dropdown--select" :class="{'open' : isMenuOpen === true}"><button @click="isMenuOpen = !isMenuOpen" class="Dropdown-toggle Button" data-toggle="dropdown"><span class="Button-label">Menu</span><i class="icon fas fa-sort Button-caret"></i></button>
                <ul class="Dropdown-menu dropdown-menu">
                <?php dynamic_sidebar(); ?>
                </ul>
            </div>
        </li>
    </ul>
</nav>