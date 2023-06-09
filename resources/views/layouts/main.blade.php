@extends('layouts.app')

@section('content')
    <div class="rounded rounded-3 shadow p-3 d-flex bg-white">
        <h5 class="my-auto">
            @yield('title')
        </h5>
    </div>
    <div class="rounded rounded-3 shadow p-3 d-flex flex-column mt-3 @yield('color-class')">
        @yield('main-content')
    </div>
@endsection
