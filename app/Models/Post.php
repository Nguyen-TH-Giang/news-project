<?php

namespace App\Models;

use App\Constants\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
            );
            $query->orWhereHas('category', fn ($query) =>
                $query->where('name', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', fn ($query) =>
            $query->where('slug', $category));
        });

        $query->when($filters['tag'] ?? false, function ($query, $tag) {
            $query->whereRaw("FIND_IN_SET('$tag', tag_ids) > 0");
        });
    }

    public function scopePopular($query)
    {
        $query->where('status', Constants::PUBLISHED)
                ->where('featured', Constants::NOT_FEATURED)
                ->where('published_at', '<=', now())
                ->orderBy('view_count', 'desc');
    }

    public function scopeLatest($query)
    {
        $query->where('status', Constants::PUBLISHED)
                ->where('featured', Constants::NOT_FEATURED)
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'desc');
    }

    public function scopeFeatured($query)
    {
        $query->where('status', Constants::PUBLISHED)
                ->where('featured', Constants::FEATURED)
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'desc');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
