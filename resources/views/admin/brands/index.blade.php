@extends('admin.layout.app')
@section('title',__('main.brands'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">@lang('main.brands')</h5>
                    <a href="{{route('admin.brands.create')}}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;
                        @lang('main.create.brand')
                    </a>
                </div>
            </div>

            <x-search :placeholder="__('main.search.brand')" />

            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class="table table-flush" id="brands-list">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('main.name')</th>
                                <th>@lang('main.created_at')</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($brands as $brand)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img class="avatar" src="{{$brand->image('thumb')}}" alt="{{$brand->name}}">
                                        <h6 class="mb-0">{{$brand->name}}</h6>
                                    </div>
                                </td>
                                <td class="text-sm">
                                    {{$brand->created_at}}
                                </td>
                                <td class="text-sm">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.brands.edit', $brand->id) }}">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="javascript:;"
                                            onclick="deleteRecord('{{ route('admin.brands.destroy', $brand->id) }}')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{$brands->appends(['search'=> request('search')])->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('dashboard/js/plugins/datatables/datatables.js')}}"></script>
<script>
    new simpleDatatables.DataTable("#brands-list", {
            searchable: false,
            "paging": false,
            select: true
        })
</script>
@endpush