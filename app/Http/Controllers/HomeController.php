<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WP_Post;
use WP_Query;

class HomeController extends Controller
{
    /**
     * Show the home page.
     */
    public function index(WP_Post $post)
    {
        $latest = getLatest();
        $popular = getPopular();
        $tags = getTag();
        $citraleka = getPostByCategory('citraleka');
        $actual = getPostByCategory('aktual', 4);
        $sigi = getPostByCategory('sigi', 4);
        $fakta = getPostByCategory('cek-fakta', 4);
        $kata = getPostByCategory('ruang-kata');

        $data = [
            'tags' => $tags,
            'latest' => $latest,
            'popular' => $popular,
            'citraleka' => $citraleka,
            'kata' => $kata,
            'fakta' => $fakta,
            'sigi' => $sigi,
            'actual' => $actual,
            'post' => $post,
        ];
        return view('pages.homepage', $data);
    }

    /**
     * Show the home page.
     */
    public function article()
    {
        $args = array(
            'post_type' => 'post',
            'orderby'    => 'ID',
            'post_status' => 'publish',
            'order'    => 'DESC',
            'posts_per_page' => 6 // this will retrive all the post that is published 
        );

        $category = get_categories();

        $query = new WP_Query($args);

        $query = array(
            'name'        => 'blog',
            'post_type'   => 'page',
            'post_status' => 'publish',
            'numberposts' => 1
        );

        return view('pages.article', [
            'data' => $query,
            'category' => $category
        ]);
    }
}
