<?php
// The form structure
?>
<form class="recherche" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Search for:', 'textdomain'); ?></span>
        <input class="recherche__input" type="search" placeholder="<?php echo esc_attr_x('Search …', 'placeholder', 'textdomain'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button class="recherche__bouton" type="submit"><?php echo esc_attr_x('Search', 'submit button', 'textdomain'); ?>
    <span class="recherche__icone">&#x1F50D;</span>
    </button>
</form>