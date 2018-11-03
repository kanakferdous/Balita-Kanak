<?php 
/*
Template Name: About Page
 */
the_post();
get_header(); ?>
    <section class="site-section">
      <div class="container">       
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="row">
              <div class="col-md-12">
                <h2 class="mb-4"><?php echo esc_html(get_post_meta(get_the_ID(), 'Title-One', true)); ?></h2>
                <p class="mb-5"><?php the_post_thumbnail('large');?></p>
                <?php the_content();?>
              </div>
            </div>
            <div class="row mb-5 mt-5">
              <div class="col-md-12 mb-5">
                <h2>My Latest Posts</h2>
              </div>
              <div class="col-md-12">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $home_blog_post = array(
                  'post-type' => 'post',
                  'author_name' => 'admin',
                  'posts_per_page' => 9,
                  'paged' => $paged,
                );
                $query = new WP_Query($home_blog_post);
                ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="post-entry-horzontal">
                  <a href="blog-single.html">
                    <div class="image" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');"></div>
                    <span class="text">
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
                      <h2><?php echo get_the_title(); ?></h2>
                    </span>
                  </a>
                </div>
                <!-- END post -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <nav aria-label="Page navigation" class="text-center">
                  <?php 
                  $pagination = paginate_links(array(
                    'type' => 'list',
                    'current' => $paged,
                    'total' => $query->max_num_pages,
                    'prev_text' => __('Prev', 'balitakanak'),
                    'next_text' => __('Next', 'balitakanak'),
                  ));
                  /* $pagination = str_replace("page-numbers", "pgn__num", $pagination); */
                  $pagination = str_replace("<ul class='page-numbers'>", "<ul class='pagination'>", $pagination);
                  $pagination = str_replace("<li>", "<li class='page-item'>", $pagination);
                  $pagination = str_replace("prev page-numbers", "page-link", $pagination);
                  /* $pagination = str_replace("next pgn__num", "pgn__next", $pagination); */
                  echo $pagination;
                  ?>
                </nav>
              </div>
            </div>
          </div>
          <!-- END main-content -->
          <?php get_template_part('page-templates/sidebar'); ?>
        </div>
      </div>
    </section>
<?php get_footer(); ?>