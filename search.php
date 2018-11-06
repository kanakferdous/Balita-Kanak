<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="search-heading">
            <h2 class="mb-4">
                <?php
                  printf(esc_html__('Search Results for: %s', 'balita'), '<span>' . get_search_query() . '</span>');
                ?>
            </h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php 
        if (have_posts()) :
            while (have_posts()) :
            the_post();
        ?>
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
        <?php 
        endwhile;
        else :
        ?>
        <h2><?php _e('No Search Result Found', 'balita'); ?></h2>
        <?php endif; ?>
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
<?php get_footer(); ?>