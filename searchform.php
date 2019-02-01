<form role="search" method="get" class="searchform group" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
        <input type="search" class="form-control" placeholder="Suchbegriff eingeben" aria-label="Website durchsuchen"
               placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
               value="<?php echo get_search_query() ?>" name="s"
               title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fa fa-search"> </i></button>
        </div>
    </div>
</form>