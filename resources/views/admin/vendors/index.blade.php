@extends('admin.layout.app')
@section('title',__('main.vendors'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Card header -->
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">@lang('main.vendors')</h5>
                    </div>
                    <div>
                        <a href="./new-product.html" class="btn bg-gradient-primary btn-sm mb-0" target="_blank">+&nbsp;
                            New Product</a>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal"
                            data-bs-target="#import">
                            Import
                        </button>
                        <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog mt-lg-10">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                        <i class="fas fa-upload ms-3"></i>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>You can browse your computer for a file.</p>
                                        <input type="text" placeholder="Browse file..." class="form-control mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="importCheck"
                                                checked="">
                                            <label class="custom-control-label" for="importCheck">I accept the terms
                                                and conditions</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary btn-sm"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                            type="button" name="button">Export</button>
                    </div>
                    {{-- <div class="ms-auto my-auto mt-lg-0 mt-4">
                    </div> --}}
                </div>
            </div>
            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class="table table-flush" id="vendors-list">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('main.name')</th>
                                <th>@lang('main.email')</th>
                                <th>@lang('main.phone')</th>
                                <th>@lang('main.is_approved')</th>
                                <th>@lang('main.is_active')</th>
                                <th>@lang('main.created_at')</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vendors as $vendor)
                            <tr>
                                <td>
                                    <h6>{{$vendor->name}}</h6>
                                </td>
                                <td class="text-sm">{{$vendor->email}}</td>
                                <td class="text-sm">{{$vendor->phone}}</td>
                                <td class="text-sm">
                                    {!! \App\Enums\Vendor\VendorApproved::badge($vendor->is_approved)!!}
                                </td>
                                <td class="text-sm">
                                    {!! \App\Enums\Vendor\VendorActive::badge($vendor->is_active)!!}
                                </td>
                                <td class="text-sm">
                                    {{$vendor->created_at->format('Y-m-d')}}
                                </td>
                                <td class="text-sm">
                                    <a href="javascript:;" data-bs-toggle="tooltip"
                                        data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-secondary"></i>
                                    </a>
                                    <a href="javascript:;" class="mx-3" data-bs-toggle="tooltip"
                                        data-bs-original-title="Edit product">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a href="javascript:;" data-bs-toggle="tooltip"
                                        onclick="deleteRecord('{{ route('admin.vendors.destroy', $vendor->id) }}')"
                                        data-bs-original-title="@lang('main.delete.vendor')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{$vendors->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('dashboard/js/plugins/datatables.js')}}"></script>
<script>
    new simpleDatatables.DataTable("#vendors-list", {
       searchable: false,
        "paging": false
        })
</script>
@endpush