<form action="<?php echo home_url('/'); ?>" id="searchform" method="get" role="search">
    <input type="text" class="search-field" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('Rechercher dans le site', 'dufilauweb'); ?>" title="<?php _e('Rechercher', 'dufilauweb') ?>" />
    <button type="submit" class="submit icon-search">
        <span><?php _e('Rechercher', 'dufilauweb'); ?></span>
    </button>
</form>
