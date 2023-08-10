<?php

namespace App\Models;

use App\Constants\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($category) {
            static::where('parent_id', $category->id)->update(['parent_id' => null]);
        });

        static::updating(function ($category) {
            if ($category->isDirty('status') && $category->status == Constants::INACTIVE) {
                static::where('parent_id', $category->id)->update(['parent_id' => null]);
            }
        });
    }
}
