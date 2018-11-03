<?php get_header()?>
    <section class="site-section pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php get_template_part('page-templates/slider-post'); ?>           
          </div>
        </div>
        <div class="row">
            <?php get_template_part('page-templates/slider-below-post'); ?>
        </div>
      </div>
    </section>
    <!-- END section -->
    <section class="site-section py-sm">
      <?php get_template_part('page-templates/home-page-post'); ?>
    </section>
<?php get_footer();?>