<?php

/* Render flexible content */
function get_the_flexible_content(){
    $output = '';
    if(have_rows('main_content')){
        while(have_rows('main_content')){
            the_row();
            switch(get_row_layout()){
                case 'case_1':
                    $output .= '';
                break;
                case 'case_2':
                    $output .= '';
                break;
                case 'case_3':
                    $output .= '';
                break;
                default:
                    $output .= 'No Row Layout Found';
                break;
            }
        }
    }
    return $output;
}

/* Output flexible content */
function the_flexible_content(){
    echo get_the_flexible_content();
}

/* Set dynamic content to the_content */
function set_flexible_content($post_id){
    $postArr = get_post($post_id, ARRAY_A);
    if($postArr['post_type'] == 'page'){
        $postArr['post_content'] = get_the_flexible_content();
        remove_action('acf/save_post', 'set_flexible_content', 11);
        wp_insert_post($postArr);
        add_action('acf/save_post', 'set_flexible_content', 11);
    }
}
//add_filter('acf/save_post', 'set_flexible_content', 11);