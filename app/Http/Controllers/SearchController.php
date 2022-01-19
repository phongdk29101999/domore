<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Http\Controllers\Controller;
use Spatie\Searchable\ModelSearchAspect;
use App\Post;
use Illuminate\Support\Facades\DB;

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
        $comment_count = array();
        $like_count = array();
        if (!$searchResults->isEmpty()) {
            foreach ($searchResults->groupByType() as $type => $modelSearchResults) {
                foreach ($modelSearchResults as $searchResult) {
                    $comment_count[$type][$searchResult->searchable->post_id] = DB::table('comments')
                    ->join('posts', 'comments.post_id', '=', 'posts.post_id')
                    ->where('posts.post_id', '=', $searchResult->searchable->post_id)
                    ->count();
                    $like_count[$type][$searchResult->searchable->post_id] = DB::table('user_post_like')
                        ->where('post_id', $searchResult->searchable->post_id)
                        ->where('like_state', 1)
                        ->count();
                }
            }
        }
        return view('search.searchPost', compact('searchResults', 'searchterm', 'comment_count', 'like_count'));
    }
}
