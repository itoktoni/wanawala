<?php

/**
 * Application routes.
 */

use Illuminate\Support\Facades\Route;
use Themosis\Support\Facades\PostType;

Route::get('/', 'HomeController@index')->name('home');

// If is_page(), loads htdocs/content/themes/my-theme/views/pages/default.blade.php.
Route::any('page', function ($post, $query) {

    $template = get_field('template', $post->ID);
    $data['post'] = $post;
    $data['template'] = json_decode(json_encode($template), FALSE);

    return view('pages.default', $data);
});

// If is_singular(), loads htdocs/content/themes/my-theme/views/blog/single.blade.php.
Route::any('singular', function ($post, $query) {

    $gallery = get_field('gallery', $post->ID);
    $data = json_decode(json_encode($gallery), FALSE);
    $latest = getLatest(3);
    
    return view('blog.single', [
        'post' => $post,
        'latest' => $latest,
        'gallery' => $data,
    ]);
});

Route::any('author', function ($post) {

    return view('pages.search', [
        'post' => $post, // not required
    ]);
});

Route::any('search', function ($post, $query) {

    $data = collect($query->posts)->toArray();
    return view('pages.search', [
        'post' => $post, // not required
        'data' => $data, // not required
    ]);
});

Route::any('tag', function ($post, $query) {

    $data = collect($query->posts)->toArray();
    return view('pages.search', [
        'post' => $post, // not required
        'data' => $data, // not required
    ]);
});

Route::any('category', ['citraleka', function ($post, $query) {

    $latest = getPostByCategory('citraleka', 2, [$post->ID]);
    $id = collect($latest)->pluck('ID')->merge([$post->ID])->toArray();

    $data = collect($query->posts)->whereNotIn('ID', $id)->chunk(get_option('citraleka_block') ?? 4)->toArray();
    return view('pages.citraleka', [
        'post' => $post, 
        'citraleka' => true, 
        'latest' => $latest,
        'data' => $data,
    ]);
}]);

Route::any('category', function ($post, $query) {

    $latest = getLatest(2);
    $popular = getPopular(2);
    $tags = getTag(5);
    $kata = getPostByKata();
    $data = collect($query->posts)->where('ID', '!=', $post->ID)->chunk(get_option('theme_block') ?? 3)->toArray();

    $data = [
        'tags' => $tags,
        'latest' => $latest,
        'kata' => $kata,
        'popular' => $popular,
        'post' => $post,
        'data' => $data,
    ];
    return view('pages.category', $data);
});