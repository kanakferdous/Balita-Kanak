<div id="comments" class="row">
    <div class="pt-5">
        <h3 class="mb-5">
            <?php 
            $comment_cn = get_comments_number();
            if ($comment_cn <= 1) {
                echo $comment_cn . __(' Comment', 'balitakanak');
            } else {
                echo $comment_cn . __(' Comments', 'balitakanak');
            }
            ?>
        </h3>       
        <!-- START commentlist -->
        <ul class="commentlist">
            <?php
            wp_list_comments();
            ?>
        </ul>
        <?php paginate_comments_links(); ?>
        <!-- END commentlist -->           
    </div> <!-- end col-full -->
</div> <!-- end comments -->
<div class="row comment-respond">
    <!-- START respond -->
    <div id="respond" class="col-full">
        <?php comment_form(); ?>
    </div>
    <!-- END respond-->
</div> <!-- end comment-respond -->