<?php

namespace App\Models;

use Illuminate\Support\Str;
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


    public static function uploadImage(string $name = 'image', string $collectionName = 'main')
    {
        if (request()->has('model_type') && request()->has('model_id')) {
            $class = '\App\Models\\' . request()->model_type;
            $id = request()->model_id;

            $model = $class::find($id);
        } else {
            $model = self::create(['session_id' => session()->getId()]);
        }

        $file = request()->file($name);

        $media = $model->addMedia($file)->usingFileName($file->hashName())->toMediaCollection($collectionName);

        return $media->id;
    }

    // used only when pre upload image before creating model
    public static function reAssignMedia(Model $model, string $mediaId = null, string $collectionName = 'main')
    {
        if (is_null($mediaId))
            return;

        $media = Media::find($mediaId);

        $model->addMedia($media->getPath())->toMediaCollection($collectionName);

        $media->delete();
    }

    public static function deleteImage()
    {
        $media = Media::where('file_name', Str::afterLast(request()->image, '/'))->first()->delete();

        if ($media)
            return response()->json(['message' => __('main.deleted.image'), 'media' => $media], 200);

        return response()->json(['message' => __('main.error_happened'), 'media' => $media], 500);
    }

}