<?php get_header() ?>
    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h2 class="mb-4"><?php the_archive_title(); ?></h2>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row mb-5 mt-5">

              <div class="col-md-12">
                <?php
                  while(have_posts()):
                    the_post();
                ?>
                <div class="post-entry-horzontal">
                  <a href="<?php echo get_the_permalink();?>">
                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');"></div>
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
                <?php endwhile; ?>
                <!-- END post -->
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <nav aria-label="Page navigation" class="text-center">
                  <?php 
                    $pagination = paginate_links(array(
                      'type' => 'list',
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