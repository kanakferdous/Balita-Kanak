<form role="search" method="get" class="search-top-form" action="<?php echo home_url('/'); ?>">
        <span class="icon fa fa-search"></span>
        <input type="search" placeholder="<?php echo esc_attr_x('Type keyword to search...', 'balitakanak') ?>" value="<?php echo get_search_query() ?>" name="s"/>
</form>