<?php

namespace App\View\Components;

use App\Models\TempUploader;
use Closure;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageUploader extends Component
{
    public string $required;
    public string $disabled;
    public string $storeAsFile;

    public function __construct(
        public string $name = 'image',
        string $required = 'false',
        string $disabled = 'false',
        string $storeAsFile = 'false',
        public string $maxFiles = 'null',
    ) {
        $this->required = $required;
        $this->disabled = $disabled;
        $this->storeAsFile = $storeAsFile;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image-uploader');
    }

    public function isRequired(): string
    {
        return $this->required === 'false' ? 'false' : 'true';
    }

    public function isDisabled(): string
    {
        return $this->disabled === 'false' ? 'false' : 'true';
    }
    public function isStoredAsFile(): string
    {
        return $this->storeAsFile === 'false' ? 'false' : 'true';
    }

    public function uploadImage(Request $request)
    {
        return TempUploader::uploadImage($request, $this->name);
    }
}