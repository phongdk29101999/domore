<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Http\Controllers\Controller;
use Spatie\Searchable\ModelSearchAspect;
use App\Post;



class SearchController extends Controller
{
    /**
     * Display list of products
     *
     * @return view
     */
    public function index()
    {
        return view('search.searchPost');
    }

    /**
     * search records in database and display  results
     * @param  Request $request
     * @return view
     */
    public function search(Request $request)
    {

        $searchterm = $request->input('query');

        $searchResults = (new Search())
            ->registerModel(\App\Post::class, ['title', 'content']) //apply search on field name and description
            //Config partial match or exactly match
            ->registerModel(\App\Post::class, function (ModelSearchAspect $modelSearchAspect) {
                $modelSearchAspect
                    ->addSearchableAttribute('title') // only return results that exactly match
                    ->addSearchableAttribute('content'); // return results for partial matches
            })
            ->perform($searchterm);
            // dd($searchResults);

        return view('search.searchPost', compact('searchResults', 'searchterm'));
    }
}