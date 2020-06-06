<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
class Post extends Model
{
    public $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public  function getRouteKeyName()
    {
        return 'slug';
    }

}
