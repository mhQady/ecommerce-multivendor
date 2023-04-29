<div>
    <input type="file" class="pond-input" name="{{$name}}" id="">
</div>
@push('style')
<link href="{{asset('dashboard/js/plugins/filepond/filepond.min.css')}}" rel="stylesheet">
</link>
@endpush
@push('script')
<script src="{{asset('dashboard/js/plugins/filepond/filepond.min.js')}}"></script>
<script>
    const pondElement = document.querySelector('input.pond-input[type="file"]');

    let processConfig = {
        process: {
            url: '{{ route("ajax.uploadImage") }}',
            withCredentials: true,
            headers:{
            'X-CSRF-TOKEN':'{{ csrf_token() }}',
            },
        }
    }

    const pond = FilePond.create(pondElement, {
        allowMultiple: true,
        allowReorder: true,
        credits: false,
        required: {{ $isRequired }},
        disabled: {{ $isDisabled }},
        storeAsFile: {{ $isStoredAsFile }},
        server: {
            url:'/',
            process: processConfig
        },
    });

    window.pond = pond;

    console.log(pond.status)
</script>
@endpush