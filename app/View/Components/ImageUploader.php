<?php

namespace App\View\Components;

use Closure;
use App\Models\TempUploader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

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
        public array|Collection $files = [],
        public string $maxFiles = 'null',
        public Model|null $model = null
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

    public function isEditPage(): string
    {
        return is_null($this->model) ? 'false' : 'true';
    }

    public function filesUrls()
    {
        if (count($this->files)) {
            $collection = $this->files;

            if (is_array($this->files)) {
                $collection = collect($this->files);
            }

            return $collection->map(function ($file) {
                return str_replace(url('/'), '', $file->getUrl());
            });
        }
        return collect([]);
    }

    public function uploadImage()
    {
        return TempUploader::uploadImage(name: $this->name);
    }
}
