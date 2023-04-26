<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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

}