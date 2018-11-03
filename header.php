<!doctype html>
<html <?php language_attributes(); ?> lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
  </head>
  <body>
    <header role="banner">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-9 social">
              <?php
                wp_nav_menu(array(
                    'theme_location' => 'secondary',
                ))
              ?>
            </div>
            <div class="col-3 search-top">
              <!-- <a href="#"><span class="fa fa-search"></span></a> -->
              <form action="<?php echo esc_url(home_url('/')); ?>" class="search-top-form">
                <span class="icon fa fa-search"></span>
                <input type="text" id="s" placeholder="<?php esc_attr_e('Type keyword to search...', 'balitakanak'); ?>">
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container logo-wrap">
        <div class="row pt-5">
          <div class="col-12 text-center">
            <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
            <h1 class="site-logo"><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></h1>
          </div>
        </div>
      </div>
      
      <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">     
          <div class="collapse navbar-collapse" id="navbarMenu">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'items_wrap' => '<ul class="navbar-nav mx-auto">%3$s</ul>',
              ))
            ?>
          </div>
        </div
      </nav>
    </header>
    <!-- END header -->