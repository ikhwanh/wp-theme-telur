<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <?php wp_head(); ?>
</head>

<body <?php body_class('no-touch'); ?> x-data="{ isDrawerOpen: false, isMenuOpen: false }">
	<?php wp_body_open(); ?>
    <div id="app" class="App App--index" style="min-height: 696px;" :class="{ 'drawerOpen' : isDrawerOpen === true }">
        <div id="app-navigation" class="App-navigation">
            <div class="Navigation ButtonGroup App-backControl"><button @click="isDrawerOpen = true" class="Button Button--icon Navigation-drawer hasIcon" type="button"><i class="icon fas fa-bars Button-icon"></i></button></div>
        </div>
        <div id="drawer" class="App-drawer">
            <header id="header" class="App-header">
                <div id="header-navigation" class="Header-navigation">
                    <div class="Navigation ButtonGroup "></div>
                </div>
                <div class="container">
                    <h1 class="Header-title">
                    	<?php telur_get_custom_logo_or_blog_name(); ?>
                    </h1>
                    <?php telur_get_menu(); ?>
                            
                    <div id="header-secondary" class="Header-secondary">
                        <ul class="Header-controls">
                            <li class="item-logIn">
                                <a href="<?php echo get_site_url().'/wp-admin/'; ?>" class="Button Button--link" title="Log In">
                                    <span class="Button-label">Log In</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
        </div>