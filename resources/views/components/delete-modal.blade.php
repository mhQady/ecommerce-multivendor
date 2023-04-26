<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="text-gradient text-primary mt-4">
                        @lang('main.are_you_sure')
                    </h4>
                </div>
            </div>
            <div class="modal-footer">
                <form id="delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">@lang('main.delete.0')</button>
                    <button type="button" class="btn btn-link ml-auto"
                        data-bs-dismiss="modal">@lang('main.close')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    let deleteModalEle = document.getElementById('delete-modal');
    let deleteForm = document.querySelector('#delete-form');

    function deleteRecord(url){

        deleteForm.action = url;

        new bootstrap.Modal(deleteModalEle).show();
    }

    deleteModalEle.addEventListener('hidden.bs.modal', function (event) {
        deleteForm.action = '';
    })
</script>
@endpush