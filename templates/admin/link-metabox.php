<?php
    global $post;
    $link = get_post_meta($post->ID, 'rpadv_link', true);
?>
<input type="hidden" name="rpadv_link_noncename" id="rpadv_link_noncename" value="<?php echo wp_create_nonce( RPAdv()->getBaseDir() );?>" />
<label for="rpadv_link">URL:</label>
<input type="text" name="rpadv_link" value="<?php echo $link;?>" class="widefat" />