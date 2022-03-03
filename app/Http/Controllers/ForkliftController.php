<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForkliftController extends Controller
{
    /**
     * Show the home page.
     */

    public function __invoke($id, Request $request)
    {
        return 'User profile...';
    }
    
    public function index($slug)
    {
        $query = array(
            'name'        => 'homepage',
            'post_type'   => 'page',
            'post_status' => 'publish',
            'numberposts' => 1
        );
        
        $data = getTemplate($query);
        return view('pages.homepage', $data);
    }
}