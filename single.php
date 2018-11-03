<?php 
the_post();
get_header() 
?>
    <section class="site-section py-lg">
      <div class="container">       
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <h1 class="mb-4"><?php echo get_the_title();?></h1>
            <div class="post-meta" <?php post_class(); ?>>
              <span class="category">
                <?php 
                $catagories = get_the_category();
                foreach ($catagories as $catagory) {
                  echo $catagory->cat_name . " , ";
                }
                ?>
              </span>
              <span class="mr-2"><?php echo get_the_date('F j, Y'); ?></span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span><?php comments_number('0', '1', '%'); ?></span>
            </div>
            <div class="post-content-body">
              <?php echo get_the_content();?>
              <?php wp_link_pages(); ?>
            </div>           
            <div class="pt-5">
              <p><?php esc_html_e('Categories: ', 'balitakanak'); ?>  
                <?php 
                $catagories = get_the_category();
                foreach ($catagories as $catagory) {
                  echo '<a href="' . esc_url(get_category_link($catagory)) . '"> '. $catagory->cat_name . '</a>';
                }
                ?>
                <?php esc_html_e('Tags: ', 'balitakanak'); ?><?php echo get_the_tag_list(); ?></p>
            </div>
              <?php comments_template(); ?>
          </div>
          <!-- END main-content -->
          <?php get_template_part('page-templates/sidebar'); ?>
        </div>
      </div>
    </section>
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3 "><?php esc_html_e('Related Post', 'balitakanak'); ?></h2>
          </div>
        </div>
        <div class="row">
        <?php
        // Build our basic custom query arguments
        $custom_query_args = array(
          'posts_per_page' => 3, // Number of related posts to display
          'post__not_in' => array($post->ID), // Ensure that the current post is not displayed
          'orderby' => 'rand', // Randomize the results
          'category_in' => wp_get_post_categories( $post->ID ),
        );
        // Initiate the custom query
        $custom_query = new WP_Query($custom_query_args);
        // Run the loop and output data for the results
        if ($custom_query->have_posts()) : ?>
	      <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
          <div class="col-md-6 col-lg-4">
            <a href="<?php echo get_the_permalink(); ?>" class="a-block d-flex align-items-center height-md" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">
                    <?php 
                    $catagories = get_the_category();
                    foreach ($catagories as $catagory) {
                      echo $catagory->cat_name . " , ";
                    }
                    ?>
                  </span>
                  <span class="mr-2"><?php echo get_the_date('F j, Y'); ?></span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span><?php comments_number('0', '1', '%'); ?></span>
                </div>
                <h3><?php echo get_the_title(); ?></h3>
              </div>
            </a>
          </div>
          <?php endwhile; ?>
          <?php endif;
          // Reset postdata
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </section>
    <!-- END section -->
<?php get_footer(); ?>