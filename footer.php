<footer class="site-footer">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-4">
        <?php if (is_active_sidebar('footerp-sidebar')) : ?>
          <?php dynamic_sidebar('footerp-sidebar'); ?>
        <?php endif; ?>
      </div>
      <div class="col-md-6 ml-auto">
        <div class="row">
          <div class="col-md-7">
            <h3>Latest Post</h3>
            <div class="post-entry-sidebar">
              <ul>
                <?php
                $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                );
                $q = new WP_Query($args);
                while ($q->have_posts()) :
                  $q->the_post();
                ?>
                <li>
                  <a href="<?php echo get_the_permalink();?>">
                    <?php the_post_thumbnail('ppost-thumb'); ?>
                    <div class="text">
                      <h4><?php the_title(); ?></h4>
                      <div class="post-meta">
                        <span class="mr-2"><?php echo get_the_date('F j, Y'); ?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span><?php comments_number('0', '1', '%'); ?></span>
                      </div>
                    </div>
                  </a>
                </li>
                <?php 
                endwhile;
                wp_reset_postdata();
                ?>
              </ul>
            </div>
          </div>
          <div class="col-md-1"></div>          
          <div class="col-md-4">
            <div class="mb-5 page-links">
              <?php if (is_active_sidebar('pagelinks-sidebar')) : ?>
                <?php dynamic_sidebar('pagelinks-sidebar'); ?>
              <?php endif; ?>
            </div>
            
            <div class="mb-5">
              <?php if (is_active_sidebar('sociallinks-sidebar')) : ?>
                <?php dynamic_sidebar('sociallinks-sidebar'); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php if (is_active_sidebar('copyright-sidebar')) : ?>
          <?php dynamic_sidebar('copyright-sidebar'); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
<!-- END footer -->
<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
<?php wp_footer();?>
</body>
</html>