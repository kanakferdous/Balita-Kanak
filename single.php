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
        // Default arguments
        $args = array(
          'posts_per_page' => 3, // How many items to display
          'post__not_in' => array(get_the_ID()), // Exclude current post
          'no_found_rows' => true, // We don't ned pagination so this speeds up the query
        );

        // Check for current post category and add tax_query to the query arguments
        $cats = wp_get_post_terms(get_the_ID(), 'category');
        $cats_ids = array();
        foreach ($cats as $wpex_related_cat) {
          $cats_ids[] = $wpex_related_cat->term_id;
        }
        if (!empty($cats_ids)) {
          $args['category__in'] = $cats_ids;
        }
        // Query posts
        $wpex_query = new wp_query($args);
        // Loop through posts
        foreach ($wpex_query->posts as $post) : setup_postdata($post); ?>
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
          <?php
          // End loop
          endforeach;
          // Reset post data
          wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
    <!-- END section -->
<?php get_footer(); ?>