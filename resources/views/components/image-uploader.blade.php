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

    FilePond.registerPlugin(FilePondPluginImagePreview);

    let serverConfig ={
            load:'/',
            process: {
                url: '/ajax/upload-image',
                withCredentials: true,
                headers:{ 'X-CSRF-TOKEN':'{{ csrf_token() }}'}
            },
            remove: (source, load, error) => {
                console.log(source, 'source');
                $.ajax({
                    method:'POST',
                    url: "{{ route('ajax.deleteImage') }}",
                    headers:{ 'X-CSRF-TOKEN':'{{ csrf_token() }}' },
                    data: {image: source},
                    success: function (response) {
                        toast.fire({
                        icon: 'success',
                        title: response.message
                        });
                        load();
                    },
                    error: function (error) {
                        toast.fire({
                        icon: 'error',
                        title: error.responseJSON.message
                        });
                    }
                });
            }
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

    if( {{ $isEditPage }} === true ){

        serverConfig.process.ondata = (formData) => {
                    formData.append('name', '{{$name}}')
                    formData.append('model_id', '{{$model?->id}}')
                    formData.append('model_type', '{{ is_object($model) ? class_basename(get_class($model)) : ""}}')
                    return formData
                }
    }

    if( !{{ $isStoredAsFile }} ){
        pondConfig.server = serverConfig;
    }


    const pond =  FilePond.create(pondElement, pondConfig);

    if( !'{{ empty($files) }}'  ){

        let files  = {!! $filesUrls !!};

        files =  files.map((file)=> {
            return { source: file, options: { type: 'local'}}
        });

        pond.addFiles(files);
    }

</script>
@endpush