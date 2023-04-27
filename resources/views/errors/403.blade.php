@extends('admin.layout.app-headless')
@section('content')
<section class="my-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-auto">
                <h1 class="display-1 text-bolder text-gradient text-danger">Error 403</h1>
                <p class="lead">{{$exception->getMessage()}}</p>
            </div>
            <div class="col-lg-6 my-auto position-relative">
                <img class="w-100 position-relative" src="{{asset('dashboard/img/illustrations/error-404.png')}}"
                    alt="403-error">
            </div>
        </div>
    </div>
</section>

@endsection