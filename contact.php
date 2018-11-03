<?php 
/*
Template Name: Contact Page
 */
the_post();
get_header(); ?>
    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h1><?php the_title();?></h1>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">           
            <form action="#" method="post">
              <?php if (is_active_sidebar('contact-sidebar')) : ?>
                <?php dynamic_sidebar('contact-sidebar'); ?>
              <?php endif; ?>
            </form>
          </div>
          <!-- END main-content -->
          <?php get_template_part('page-templates/sidebar'); ?>
        </div>
      </div>
    </section>
<?php get_footer(); ?>