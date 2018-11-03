<div class="container">
<div class="row">
    <div class="col-md-6">
    <h2 class="mb-4"><?php _e('Lifestyle Category', 'balitakanak'); ?></h2>
    </div>
</div>
<div class="row blog-entries">
    <div class="col-md-12 col-lg-8 main-content">
    <div class="row">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $home_blog_post = array(
            'post-type' => 'post',
            'category_name' => 'Lifestyle',
            'posts_per_page' => 8,
            'paged' => $paged,
        );
        $query = new WP_Query($home_blog_post);
        ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="col-md-6">
        <a href="<?php echo get_the_permalink(); ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
            <?php the_post_thumbnail('homepage-thumb'); ?>
            <div class="blog-content-body">
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
            </div>
        </a>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
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
    <div class="row mb-5 mt-5">
        <div class="col-md-12">
        <h2 class="mb-4"><?php esc_html_e('More Blog Posts', 'balitakanak'); ?></h2>
        </div>     
        <div class="col-md-12">
        <?php 
        $popularpost = new WP_Query(array(
            'category_name' => 'Lifestyle',
            'posts_per_page' => 3,
            'order' => 'DESC'
        ));
        if ($popularpost->have_posts()) {
            while ($popularpost->have_posts()) {
                $popularpost->the_post(); ?>
        <div class="post-entry-horzontal">
            <a href="<?php echo get_the_permalink(); ?>">
            <div class="image element-animate"  data-animate-effect="fadeIn" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');"></div>
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
        <?php 
            }
            wp_reset_postdata();
        }
        ?>
        <!-- END post -->
        </div>
    </div>
    </div>
    <!-- END main-content -->
    <?php get_template_part('page-templates/sidebar'); ?>
</div>
</div>