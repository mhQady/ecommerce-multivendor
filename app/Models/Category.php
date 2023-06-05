<?php

namespace App\Models;

use App\Models\Product;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $guarded = ['id'];

    public $translatable = ['name', 'slug', 'description', 'meta'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function grandChildren()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('children:id,parent_id,name');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(500);
            });
    }

    public function image($type = ''): string
    {
        return $this->getFirstMediaUrl('main', $type) ? $this->getFirstMediaUrl('main', $type) : asset('dashboard/img/defaults/category.svg');
    }


    public function scopeSimpleSearch($query, $search)
    {
        $query->where('name->en', 'LIKE', '%' . $search . '%')
            ->orWhere('name->ar', 'LIKE', '%' . $search . '%');
    }
    public function scopeFilter($query)
    {
        $query->when(request('search'), fn($q) => $q->simpleSearch(request('search')));
    }
}