<?php

namespace App\Models;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TempUploader extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = ['id'];

    public $timestamps = false;


    public static function uploadImage(Request $request, string $name = 'image')
    {
        $uploader = self::create(['session_id' => session()->getId()]);

        $media = $uploader->addMedia($request->file($name))->toMediaCollection('temp');

        return $media->id;
    }
}
