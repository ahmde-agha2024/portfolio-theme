<?php
function portfolio_theme_setup() {
    // دعم الصور البارزة
    add_theme_support('post-thumbnails');

    // تسجيل قائمة التنقل
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'portfolio-theme'),
    ));
}
add_action('after_setup_theme', 'portfolio_theme_setup');

// تسجيل نوع المنشور المخصص للمعرض
function portfolio_custom_post_type() {
    $labels = array(
        'name'               => _x('Projects', 'post type general name', 'portfolio-theme'),
        'singular_name'      => _x('Project', 'post type singular name', 'portfolio-theme'),
        'menu_name'          => _x('Projects', 'admin menu', 'portfolio-theme'),
        'name_admin_bar'     => _x('Project', 'add new on admin bar', 'portfolio-theme'),
        'add_new'            => _x('Add New', 'project', 'portfolio-theme'),
        'add_new_item'       => __('Add New Project', 'portfolio-theme'),
        'new_item'           => __('New Project', 'portfolio-theme'),
        'edit_item'          => __('Edit Project', 'portfolio-theme'),
        'view_item'          => __('View Project', 'portfolio-theme'),
        'all_items'          => __('All Projects', 'portfolio-theme'),
        'search_items'       => __('Search Projects', 'portfolio-theme'),
        'not_found'          => __('No projects found.', 'portfolio-theme'),
        'not_found_in_trash' => __('No projects found in Trash.', 'portfolio-theme')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'project'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

    register_post_type('project', $args);
}
add_action('init', 'portfolio_custom_post_type');
?>
