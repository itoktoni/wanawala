<?php

function getThemeInfo()
{
    return wp_get_theme();
}

function getThemeName()
{
    return getThemeInfo()->template;
}

function getLogo()
{
    return wp_get_attachment_image_src(get_theme_mod('custom_logo'), true)[0];
}

function getThemeAsset($name = null)
{
    if ($name) {

        return get_theme_root_uri() . '/' . getThemeName() . '/' . $name;
    }
    return get_theme_root_uri() . '/' . getThemeName();
}

function getTemplate($whereWp)
{
    $wp_query = new WP_Query($whereWp);
    $content = false;
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $content['template'] = json_decode(json_encode(get_field('template')), FALSE);
            $content['content'] = get_post(get_the_ID());
        }
    }
    return $content;
}

function getProduct($type, $slug)
{
    $product = array(
        'post_type'   => $type,
        'post_status' => 'publish',
        'numberposts' => -1
    );

    $wp_query = new WP_Query($product);
    $data = false;
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $filter = get_field('category');
            if (!empty($filter) && $filter->post_name == $slug) {
                $data[] = get_post(get_the_ID());
            }
        }
    }

    return $data;
}

function getPostByCategory($slug, $number = 3, $except = false)
{
    $product = array(
        'post__not_in' => $except,
        'category_name' => $slug,
        'post_status' => 'publish',
        'post_type' => 'post',
        'posts_per_page' => $number,
        'order'    => 'DESC',
    );

    $wp_query = new WP_Query($product);
    $data = false;
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $data[] = get_post(get_the_ID());
        }
    }

    return $data;
}

function getLatest($number = 3, $except = false)
{
    $args = array(
        'post__not_in' => $except,
        'post_type' => 'post',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => $number // this will retrive all the post that is published 
    );

    return get_posts($args);
}

function getTag()
{
    $tags = get_tags(array(
        'hide_empty' => false,
        'smallest'                  => 10,
        'largest'                   => 22,
        'orderby'                   => 'count',
        'order'                     => 'DESC',
        'show_count'                => 1,
    ));

    return $tags;
}

function getPopular($number = 3)
{
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'limit' => $number,
        'posts_per_page' => -1 // this will retrive all the post that is published 
    );

    $wp_query = new Top_Ten_Query($args);
    $data = false;
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $data[] = get_post(get_the_ID());
        }
    }

    return $data;
}

function getParagraph($id)
{
    $paragraf = get_field('headline', $id);
    return !empty($paragraf) ? substr($paragraf, 0, 120) . '[...]' : get_the_excerpt($id).'[...]';
}

function formatDate($date)
{
    return date('d/m/Y', strtotime($date));
}

function getMetaCategory($id, $name = 'name')
{
    $cat = get_the_category($id)[0] ?? false;
    return $cat ? $cat->{$name} : '';
}

function getListMenuLocation()
{
    return get_nav_menu_locations();
}

function getMenuLocation($name)
{
    if (get_nav_menu_locations()) {

        return get_term(get_nav_menu_locations()[$name], 'nav_menu');
    }

    return false;
}

function getMenuObject($name)
{
    return wp_get_nav_menu_object($name) ?? false;
}

function getThumnail($id, $size = 'medium')
{
    return get_the_post_thumbnail_url($id, $size);
}

function getImage($id)
{
    return wp_get_attachment_url(get_post_thumbnail_id($id));
}

function getCaptionImage($id)
{
    return the_post_thumbnail_caption($id);
}

function getAuthor($id, $param = 'first_name')
{
    return get_the_author_meta($param, $id);
}

function getMenu($name)
{
    $parent = [];
    $menu_id = getMenuLocation($name)->term_id ?? false;
    if ($menu_id) {

        $menuitems = wp_get_nav_menu_items($menu_id, array('order' => 'DESC'));
        $parent = [];
        foreach ($menuitems as $item) {
            if ($item->menu_item_parent == 0) {
                $parent[$item->ID] = (array) $item;
            } else {
                $parent[$item->menu_item_parent]['check'][] = $item->object_id;
                $parent[$item->menu_item_parent]['child'][] = (array) $item;
            }
        }
    }

    return $parent;
}
