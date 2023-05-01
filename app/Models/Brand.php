<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Brand extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $guarded = ['id'];
    public $translatable = ['name'];

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
        return $this->getFirstMediaUrl('main', $type) ? $this->getFirstMediaUrl('main', $type) : asset('dashboard/img/defaults/brand.svg');
    }
}
