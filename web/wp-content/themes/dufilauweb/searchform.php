<form action="<?php echo home_url('/'); ?>" id="searchform" method="get" role="search">
    <input type="search" class="search-field" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('Rechercher dans le site', 'dufilauweb'); ?>" title="<?php _e('Rechercher', 'dufilauweb') ?>" />
    <input type="submit" class="submit" value="<?php _e('Rechercher', 'dufilauweb') ?>" />
</form>