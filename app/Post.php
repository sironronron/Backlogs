<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Resizable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends Model implements ViewableContract, Searchable
{
    use Viewable, Resizable;

    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('single', $this->slug);
 
        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
}
