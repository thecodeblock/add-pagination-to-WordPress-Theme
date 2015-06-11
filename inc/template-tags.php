<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package yourthemename
 */

/**
 * Pagination called using tcb_pagination();
 * Display pagination on query page when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */

if ( ! function_exists( 'tcb_pagination' ) ) :
function tcb_pagination($pages = '', $range = 2){  
     $showitems = ($range * 2)+1;  
        if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
     if($pages == ''){
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages){
             $pages = 1;
         }
     }   
     if(1 != $pages){
         echo "<div class='pagination'><ul class='btn-num'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
         for ($i=1; $i<= $pages; $i++){
             if (1 != $pages && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                 echo ($paged == $i)? "<li class='current'><a>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
         echo "</ul></div>\n";
     }
} /*pagination function ends*/
endif;

/**
 * Pagination version 2 called using tcbx_pagination(); 
 * Display pagination on query page when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
if ( ! function_exists( 'tcbx_pagination' ) ) :
function tcbx_pagination($pages = '', $range = 2){  
     $showitems = ($range * 2)+1;  
        if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
     if($pages == ''){
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages){
             $pages = 1;
         }
     }   
     if(1 != $pages){
         echo "<div class='pagination'><ul class='btn-num'>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>1</a></li><li>&nbsp;&nbsp;&nbsp;&nbsp;</li>";
         for ($i=1; $i<= $pages; $i++){
             if (1 != $pages && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                 echo ($paged == $i)? "<li class='current'><a>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }
         if ($paged < $pages-1 &&  $paged+$range < $pages && $showitems < $pages) echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;</li><li><a href='".get_pagenum_link($pages)."'>".$pages."</a></li>";
         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";  
         echo "</ul></div>\n";
     }
} /*pagination function ends*/
endif;