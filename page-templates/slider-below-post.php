<?php
$slider_below_post = array(
    'post-type' => 'post',
    'posts_per_page' => 3
);
$query = new WP_Query($slider_below_post);
?>
<?php while ($query->have_posts()) : $query->the_post(); ?>
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
<?php wp_reset_postdata(); ?>