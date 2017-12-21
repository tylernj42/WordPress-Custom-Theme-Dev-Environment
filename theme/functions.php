<?php


include('functions/housekeeping.php');
include('functions/setup.php');

include('functions/flexible-content.php');

/* Pagination */
function pagination($pages = '', $range = 2){  
	$showitems = ($range * 2)+1;
	global $paged;
	if(empty($paged)){ $paged = 1; }
	if($pages == ''){
		global $wp_query;
		$pages = ceil(($wp_query->found_posts) / get_option('posts_per_page'));
		if(!$pages){ $pages = 1; }
	}
	if($pages != 1){
		echo '<div class="pagination"><span>Page '.$paged.' of '.$pages.'</span>';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages){
			echo '<a href="'.get_pagenum_link(1).'"><i class="fa fa-angle-double-left"></i> First</a>';
		}
		if($paged > 1 && $showitems < $pages){
			echo '<a href="'.get_pagenum_link($paged - 1).'"><i class="fa fa-angle-left"></i> Previous</a>';
		}
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? '<span class="current">'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a>';
			}
		}
		if ($paged < $pages && $showitems < $pages){
			echo '<a href="'.get_pagenum_link($paged + 1).'">Next <i class="fa fa-angle-right"></i></a>';
		}
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
			echo '<a href="'.get_pagenum_link($pages).'">Last <i class="fa fa-angle-double-right"></i></a>';
		}
		echo '</div>';
	}
}
