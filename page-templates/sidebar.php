<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box search-form-wrap">
        <form action="<?php echo home_url('/'); ?>" class="search-form">
            <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="search" class="form-control" name="s" placeholder="<?php echo esc_attr_x('Type keyword to search...', 'balitakanak') ?>" value="<?php echo get_search_query() ?>"/>
            </div>
        </form>
    </div>
<!-- END sidebar-box -->
    <div class="sidebar-box">
        <div class="bio text-center">
            <?php echo get_avatar(get_the_author_meta("ID")); ?>
            <div class="bio-body">
                <h2><?php the_author() ?></h2>
                <p><?php the_author_meta('description'); ?></p>
                <p><a href="<?php get_the_author_link(); ?>" class="btn btn-primary btn-sm"><?php esc_html_e('Read my bio', 'balitakanak'); ?></a></p>
                <?php if (is_active_sidebar('author-social-link')) : ?>
                    <?php dynamic_sidebar('author-social-link'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<!-- END sidebar-box -->  
    <div class="sidebar-box">
        <h3 class="heading"><?php esc_html_e('Popular Posts', 'balitakanak'); ?></h3>
        <div class="post-entry-sidebar">
            <ul>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'comment_count',
                );
                $q = new WP_Query($args);

                while ($q->have_posts()) :
                    $q->the_post();
                ?>
                <li>
                    <a href="">
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
<!-- END sidebar-box -->

    <div class="sidebar-box">
        <h3 class="heading"><?php esc_html_e('Categories', 'balitakanak'); ?></h3>
        <?php 
            $catagories = get_categories();
            foreach ($catagories as $catagory) {
                echo '<ul class="categories"><li><a href="' . esc_url(get_category_link($catagory)) . '">'
                .$catagory->cat_name. '<span>('.$catagory->count. ')</span></a></li>';
            }
        ?>
    </div>
<!-- END sidebar-box -->
    <div class="sidebar-box">
        <h3 class="heading"><?php esc_html_e('Tags', 'balitakanak'); ?></h3>
        <?php
            wp_tag_cloud();
        ?>
    </div>
</div>
<!-- END sidebar -->