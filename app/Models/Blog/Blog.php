<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected static function booted()
    {
        static::created(function ($data) {
            $random_no = random_int(100, 999) . $data->id . random_int(100, 999);
            $slug = $data->title . " " . $random_no;
            $data->slug = Str::slug($slug); //use Illuminate\Support\Str;
            if (strlen($data->slug) > 150) {
                $data->slug = substr($data->slug, strlen($data->slug) - 150, strlen($data->slug));
            }

            $data->save();
        });
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }


    public function blog_categories()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function blog_comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function blog_tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
