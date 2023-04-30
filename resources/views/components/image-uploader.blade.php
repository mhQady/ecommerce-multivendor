<div>
    <input type="file" class="pond-input" name="{{$name}}" id="">
</div>
@push('style')
<link href="{{asset('dashboard/js/plugins/filepond/filepond.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/js/plugins/filepond/filepond-plugin-image-preview.min.css')}}" rel="stylesheet">
</link>
@endpush
@push('script')
<script src="{{asset('dashboard/js/plugins/filepond/filepond-plugin-image-preview.min.js')}}"></script>
<script src="{{asset('dashboard/js/plugins/filepond/filepond.min.js')}}"></script>
<script>
    const pondElement = document.querySelector('input.pond-input[type="file"]');

    let serverConfig ={
            load:'/',
            process: {
                url: '/ajax/upload-image',
                withCredentials: true,
                headers:{
                'X-CSRF-TOKEN':'{{ csrf_token() }}',
                },
            },
    }

    let pondConfig = {
        allowMultiple: true,
        allowReorder: true,
        credits: false,
        required: {{ $isRequired }},
        disabled: {{ $isDisabled }},
        storeAsFile: {{ $isStoredAsFile }},
        maxFiles: {{ $maxFiles }},
    };

    if( !{{ $isStoredAsFile }} ){
        pondConfig.server = serverConfig;
    }

    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.create(pondElement, pondConfig);
</script>
@endpush