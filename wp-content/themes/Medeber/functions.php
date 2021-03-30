<?php

/**
 * -----------------------------------------
 *        REQUIRE
 * -----------------------------------------
 */

//option/infos sous menu
require_once('option/infos.php');
InfoMenuPage::register();


/**
 * -----------------------------------------
 *         WIDGET
 * -----------------------------------------
 */

function medeber_register_widget_gallery(){
    register_sidebar([
        'id'=> 'gallery',
        'name'=> __('Sidebar Gallery','medeber'),
        'before_widget' => '<div class="p-4 %2$s" id="%1$s">',
        'after_widget'=> '</div>',
        'before_title' => '<h4 class="font-italic">',
        'after_title' => '</h4>'
    ]);
}

add_action('widgets_init', 'medeber_register_widget_gallery');


/**
 * ----------------------------------------
 *            ACTIONS
 * ----------------------------------------
 */
//active theme
add_action('after_setup_theme','medeber_theme');
//active bootstrap
add_action('wp_enqueue_scripts', 'medeber_register_assets');
//separator title
add_filter('document_title_separator','medeber_title_separator');
//css menu
add_filter('nav_menu_css_class','medeber_menu_class');
//attributes
add_filter('nav_menu_link_attributes', 'medeber_menu_link_class');
//Links attributes pour sous-menu-1
function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( $args->theme_location == 'sous-menu-1' ) {
      // add the desired attributes:
      $atts['class'] = 'menu-link-class';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );
//Links attributes pour sous-menu-2
function add_specific_menu_location_atts_2( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( $args->theme_location == 'sous-menu-2' ) {
      // add the desired attributes:
      $atts['class'] = 'menu-link-class-menu2';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts_2', 10, 3 );





/**---------------------------------------------------------
 *         title //theme suppport //menu // css-bootstrap
 ----------------------------------------------------------*/
 

function medeber_theme(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5');
    register_nav_menu('header',"entête du menu");
    register_nav_menu('sous-menu-1',"body");
    register_nav_menu('sous-menu-2',"body-bis");
    register_nav_menu('footer',"pieds de menu");


    add_image_size('card-header', 350, 215, true);
}

function medeber_title_separator(){
    return '|';
}


function medeber_document_title_parts($title){
    unset ($title['tagline']);
    return $title;
}
add_filter('document_title_parts', 'medeber_document_title_parts');


/**
 * add bootstrap - attention à l'ordre
 */

function medeber_register_assets(){
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_register_script('bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['popper','jquery'], false, true);
    wp_register_script('popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', [], null, true);
    if (!is_customize_preview()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery','https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);
    }
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}


/**
 * add CSS
 */

add_action('wp_enqueue_scripts', 'gkp_insert_css_in_head');
function gkp_insert_css_in_head() {
    // On ajoute le css general du theme
    wp_register_style('style', get_bloginfo( 'stylesheet_url' ),'',false,'screen');
    wp_enqueue_style( 'style' );
}


/**
 * theme menu_nav
 */

function medeber_menu_class($classes){
    $classes[] = 'nav-item';
    return $classes;

}

function medeber_menu_link_class($attrs){
    $attrs['class'] = 'nav-link';
    return $attrs;

}


/**
 * SOUS-MENU-1 SUR PAGE WORSHOP
 */

function body_class_custom_medeber($classe){
    if('post' === get_post_type()){
        $classe[] = 'custom_class';
    }
    return $classe;
}

add_filter('body_class', 'body_class_custom_medeber');


/**
 * =================================================================
 *                 CUSTOM POST-TYPE
 * =================================================================
 */

//archive pour sous menu dans page worshop

//BRUXELLES
add_action('init','medeber_init_bruxelles');
 

//Bruxelles
function medeber_init_bruxelles(){
   register_taxonomy('bruxelles', 'post', [
       "labels" => [
           'name' => 'Bruxelles'
       ],
       'show_in_rest' => true,
       'hierarchical' =>true,
       'show_admin_column' => true
   ]);
  
   register_post_type('bruxelles', [
       'label'=>'Bruxelles',
       'public'=> true,
       'menu_position'=>2,
       'menu_icon'=>'dashicons-location',
       'supports' => ['title', 'editor', 'thumbnail'],
       'show_in_rest'=> true,
       'has_archive'=> true,
   ]);
  
}


/**
* Gestion des miniatures avec les functions init
*/

add_filter('manage_bruxelles_posts_columns', function($columns){
   return [
       'cb' => $columns['cb'],
       'thumbnail' => 'Miniature',
       'title' => $columns['title'],
       'date' => $columns['date']
   ];
});

add_filter('manage_bruxelles_posts_custom_column', function($columns, $postId){
   if($columns === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }
},10, 2);


//ROMA
add_action('init','medeber_init_roma');
 

//Rome
function medeber_init_roma(){
   register_taxonomy('roma', 'post', [
       "labels" => [
           'name' => 'Roma'
       ],
       'show_in_rest' => true,
       'hierarchical' =>true,
       'show_admin_column' => true
   ]);
  
   register_post_type('roma', [
       'label'=>'Roma',
       'public'=> true,
       'menu_position'=>2,
       'menu_icon'=>'dashicons-location',
       'supports' => ['title', 'editor', 'thumbnail'],
       'show_in_rest'=> true,
       'has_archive'=> true,
   ]);
  
}


/**
* Gestion des miniatures avec les functions init
*/

add_filter('manage_roma_posts_columns', function($columns){
   return [
       'cb' => $columns['cb'],
       'thumbnail' => 'Miniature',
       'title' => $columns['title'],
       'date' => $columns['date']
   ];
});

add_filter('manage_roma_posts_custom_column', function($columns, $postId){
   if($columns === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }
},10, 2);



/**
 * -----------------------------------------
 *    Archive pour page works sous-menu-2
 * -----------------------------------------
 */

//EXCELLENT
add_action('init','medeber_init_excellent');
 


function medeber_init_excellent(){
   register_taxonomy('excellent', 'post', [
       "labels" => [
           'name' => 'Excellent'
       ],
       'show_in_rest' => true,
       'hierarchical' =>true,
       'show_admin_column' => true
   ]);
  
   register_post_type('excellent', [
       'label'=>'Excellent',
       'public'=> true,
       'menu_position'=>2,
       'menu_icon'=>'dashicons-controls-forward',
       'supports' => ['title', 'editor', 'thumbnail'],
       'show_in_rest'=> true,
       'has_archive'=> true,
   ]);
  
}


/**
* Gestion des miniatures avec les functions init
*/

add_filter('manage_excellent_posts_columns', function($columns){
   return [
       'cb' => $columns['cb'],
       'thumbnail' => 'Miniature',
       'title' => $columns['title'],
       'date' => $columns['date']
   ];
});

add_filter('manage_excellent_posts_custom_column', function($columns, $postId){
   if($columns === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }
},10, 2);


//BOUCHE A OREILLE
add_action('init','medeber_init_bouche');
 


function medeber_init_bouche(){
   register_taxonomy('bouche', 'post', [
       "labels" => [
           'name' => 'Bouche à oreille'
       ],
       'show_in_rest' => true,
       'hierarchical' =>true,
       'show_admin_column' => true
   ]);
  
   register_post_type('bouche', [
       'label'=>'Bouche à oreille',
       'public'=> true,
       'menu_position'=>2,
       'menu_icon'=>'dashicons-controls-forward',
       'supports' => ['title', 'editor', 'thumbnail'],
       'show_in_rest'=> true,
       'has_archive'=> true,
   ]);
  
}


/**
* Gestion des miniatures avec les functions init
*/

add_filter('manage_bouche_posts_columns', function($columns){
   return [
       'cb' => $columns['cb'],
       'thumbnail' => 'Miniature',
       'title' => $columns['title'],
       'date' => $columns['date']
   ];
});

add_filter('manage_bouche_posts_custom_column', function($columns, $postId){
   if($columns === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }
},10, 2);


//WORKING CANONS
add_action('init','medeber_init_working');
 


function medeber_init_working(){
   register_taxonomy('working', 'post', [
       "labels" => [
           'name' => 'Working canons'
       ],
       'show_in_rest' => true,
       'hierarchical' =>true,
       'show_admin_column' => true
   ]);
  
   register_post_type('working', [
       'label'=>'Working canons',
       'public'=> true,
       'menu_position'=>2,
       'menu_icon'=>'dashicons-controls-forward',
       'supports' => ['title', 'editor', 'thumbnail'],
       'show_in_rest'=> true,
       'has_archive'=> true,
   ]);
  
}


/**
* Gestion des miniatures avec les functions init
*/

add_filter('manage_working_posts_columns', function($columns){
   return [
       'cb' => $columns['cb'],
       'thumbnail' => 'Miniature',
       'title' => $columns['title'],
       'date' => $columns['date']
   ];
});

add_filter('manage_working_posts_custom_column', function($columns, $postId){
   if($columns === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }
},10, 2);



//PRATICAL VOCATION
add_action('init','medeber_init_pratical');
 


function medeber_init_pratical(){
   register_taxonomy('pratical', 'post', [
       "labels" => [
           'name' => 'Pratical vocation'
       ],
       'show_in_rest' => true,
       'hierarchical' =>true,
       'show_admin_column' => true
   ]);
  
   register_post_type('pratical', [
       'label'=>'Pratical Vocation',
       'public'=> true,
       'menu_position'=>2,
       'menu_icon'=>'dashicons-controls-forward',
       'supports' => ['title', 'editor', 'thumbnail'],
       'show_in_rest'=> true,
       'has_archive'=> true,
   ]);
  
}


/**
* Gestion des miniatures avec les functions init
*/

add_filter('manage_pratical_posts_columns', function($columns){
   return [
       'cb' => $columns['cb'],
       'thumbnail' => 'Miniature',
       'title' => $columns['title'],
       'date' => $columns['date']
   ];
});

add_filter('manage_pratical_posts_custom_column', function($columns, $postId){
   if($columns === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }
},10, 2);



//FROM HERE TO HERE
add_action('init','medeber_init_from');
 


function medeber_init_from(){
   register_taxonomy('from', 'post', [
       "labels" => [
           'name' => 'From here to here'
       ],
       'show_in_rest' => true,
       'hierarchical' =>true,
       'show_admin_column' => true
   ]);
  
   register_post_type('from', [
       'label'=>'From here to here',
       'public'=> true,
       'menu_position'=>2,
       'menu_icon'=>'dashicons-controls-forward',
       'supports' => ['title', 'editor', 'thumbnail'],
       'show_in_rest'=> true,
       'has_archive'=> true,
   ]);
  
}


/**
* Gestion des miniatures avec les functions init
*/

add_filter('manage_from_posts_columns', function($columns){
   return [
       'cb' => $columns['cb'],
       'thumbnail' => 'Miniature',
       'title' => $columns['title'],
       'date' => $columns['date']
   ];
});

add_filter('manage_from_posts_custom_column', function($columns, $postId){
   if($columns === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }
},10, 2);



