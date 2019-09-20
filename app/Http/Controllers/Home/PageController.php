<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use DB;
use Spatie\Searchable\Search;
use App\User;
use App\Page;

class PageController extends Controller
{
    public function welcome()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->where('status', 'PUBLISHED')
            ->get(['title', 'slug', 'created_at', 'excerpt', 'category_id', 'image']);

        $popularPosts = Post::orderByUniqueViews()
            ->where('status', 'PUBLISHED')
            ->get(['title', 'slug', 'created_at', 'excerpt', 'category_id', 'image']);

        $featuredPosts = Post::orderBy('created_at', 'desc')
            ->where('status', 'PUBLISHED')
            ->where('featured', 1)
            ->get(['title', 'slug', 'created_at', 'excerpt', 'category_id', 'image']);
        
        return view('welcome', compact('posts', 'categories', 'featuredPosts', 'popularPosts'));
    }

    public function single($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'PUBLISHED')
            ->firstOrFail();

        $expiresAt = now()->addHours(3);

        views($post)
            ->delayInSession($expiresAt)
            ->record();

        $mycontent = $post->body;
        $word = str_word_count(strip_tags($mycontent));
        $m = floor($word / 200);
        $s = floor($word % 200 / (200 / 60));
        $est = $m . ' minute' . ($m == 1 ? '' : 's') . ', ' . $s . ' second' . ($s == 1 ? '' : 's');

        $moreArticles = Post::where('slug', '!=', $slug)
            ->where('category_id', $post->category_id)
            ->get();

        // Next
        // get next user id
        $next = Post::where('id', '>', $post->id)->where('status', 'PUBLISHED')->orderBy('id', 'asc')->first();

        $categories = Category::orderBy('created_at')
            ->get(['name', 'slug', 'id']);

        return view('single', compact('post', 'categories', 'est', 'moreArticles', 'next'));
    }

    public function getCategories() {
        $categories = Category::orderBy('created_at')
            ->get(['name', 'slug', 'id']);

        return response()
            ->json(['categories' => $categories]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->firstOrFail();
        
        $posts = Post::where('category_id', $category->id)
            ->where('status', 'PUBLISHED')
            ->get(['title', 'id', 'excerpt', 'slug', 'created_at', 'image']);

        return view('category', compact('category', 'posts'));
    }

    public function search(Request $request)
    {
        $search = $request->get('queue');

        $searchResults = (new Search())
            ->registerModel(Post::class, ['title', 'image', 'id', 'excerpt'])
            ->registerModel(Category::class, 'name')
            ->search($search);
        
        return view('search', compact('searchResults', 'search'));
    }

    public function about()
    {
        $page = Page::where('title', 'About Me')
            ->firstOrFail();

        return view('about', compact('page'));
    }

    public function contact()
    {
        return view('contact');
    }
}
