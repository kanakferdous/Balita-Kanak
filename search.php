<?php 
the_post();
get_header(); ?>
    <section class="site-section">
      <div class="container">        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row">
                <?php get_search_form(); ?>
            </div>
          </div>
          <!-- END main-content -->
          <?php get_template_part('page-templates/sidebar'); ?>
        </div>
      </div>
    </section>
<?php get_footer(); ?>