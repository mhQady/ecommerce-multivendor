@extends('admin.layout.app')
@section('title',__('main.categories'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">@lang('main.categories')</h5>
                    <a href="{{route('admin.categories.create')}}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;
                        @lang('main.create.category')
                    </a>
                </div>
            </div>

            <x-search :placeholder="__('main.search.category')" />

            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class="table table-flush" id="categories-list">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('main.name')</th>
                                <th>@lang('main.parent')</th>
                                <th>@lang('main.created_at')</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img class="avatar" src="{{$category->image('thumb')}}"
                                            alt="{{$category->name}}">
                                        <h6 class="mb-0">{{$category->name}}</h6>
                                    </div>
                                </td>
                                <td>{{$category->parent?->name}}</td>
                                <td class="text-sm">
                                    {{$category->created_at}}
                                </td>
                                <td class="text-sm">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="javascript:;"
                                            onclick="deleteRecord('{{ route('admin.categories.destroy', $category->id) }}')">
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
                {{$categories->appends(['search'=> request('search')])->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('dashboard/js/plugins/datatables/datatables.js')}}"></script>
<script>
    new simpleDatatables.DataTable("#categories-list", {
            searchable: false,
            "paging": false,
            select: true
        })
</script>
@endpush