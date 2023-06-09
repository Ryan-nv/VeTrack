@extends('layouts.main')
@section('title')
    Dashboard
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4 ">
            <div class="m-2 bg-primary rounded-4 text-light p-4 d-flex">
                <i class="fa fa-shopping-cart fs-1 my-auto"></i>
                <div class="d-flex flex-column ms-4">
                    <h2 class="fw-bolder">{{ isset($ordercount) ? $ordercount : '' }}</h3>
                        <span class="mt-2 text-light">Total Request</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="m-2 bg-secondary rounded-4 text-light p-4 d-flex">
                <i class="fa fa-clock fs-1 my-auto"></i>
                <div class="d-flex flex-column ms-4">
                    <h2 class="fw-bolder">{{ isset($unprocessed) ? $unprocessed : '' }}</h3>
                        <span class="mt-2 text-light">Unprocessed Request</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="m-2 bg-primary rounded-4 text-light p-4 d-flex">
                <i class="fa fa-car-side fs-1 my-auto"></i>
                <div class="d-flex flex-column ms-4">
                    <h2 class="fw-bolder">{{ isset($avg) ? Str::substr($avg, 0, 6) . ' l' : '' }}</h3>
                        <span class="mt-2 text-light">Average Fuel Usage</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="m-2 bg-success rounded-4 text-light p-4 d-flex">
                <i class="fa fa-car fs-1 my-auto"></i>
                <div class="d-flex flex-column ms-4">
                    <h2 class="fw-bolder">{{ isset($car) ? $car : '' }}</h3>
                        <span class="mt-2 text-light">Total Vechile</span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="m-2 bg-primary rounded-4 text-light p-4 d-flex">
                <i class="fa fa-user-cog fs-1 my-auto"></i>
                <div class="d-flex flex-column ms-4">
                    <h2 class="fw-bolder">{{ isset($driver) ? $driver : '' }}</h3>
                        <span class="mt-2 text-light">Drivers</span>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 bg-secondary  rounded-4 text-light">

        </div> --}}
    </div>
@endsection
