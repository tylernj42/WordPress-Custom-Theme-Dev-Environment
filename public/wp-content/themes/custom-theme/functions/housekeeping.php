<?php

function clean_header(){
    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_generator'); // remove wordpress version
    remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
    remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
    remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

    // Remove api.w.org relation link
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);

    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    
    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
function disable_emojicons_tinymce($plugins){
    if(is_array($plugins)){
        return array_diff($plugins, array('wpemoji'));
    }else{
        return array();
    }
}
add_action('init', 'clean_header');


/* Remove Related Videos from Youtube OEmbed */
function hide_youtube_related_videos($data, $url, $args = array()){
    $autoplay = strpos($url, "autoplay=1") !== false ? "&autoplay=1" : "";
    $str_to_add = apply_filters("hyrv_extra_querystring_parameters", "wmode=transparent&amp;") . 'rel=0';
    if (strpos($data, "feature=oembed") !== false){
        $data = str_replace('feature=oembed', $str_to_add . $autoplay . '&amp;feature=oembed', $data);
    }elseif(strpos($data, "list=") !== false){
        $data = str_replace('list=', $str_to_add . $autoplay . '&amp;list=', $data);
    }
    return $data;
}
add_filter('oembed_result', 'hide_youtube_related_videos', 10, 3);