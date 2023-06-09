@extends('layouts.main')

@section('title')
    {{ !empty($edit) ? 'Edit Order' : 'New Order' }}
@endsection
@section('color-class')
    bg-primary
@endsection

@section('main-content')
    @php
        
        $action = route('order.store');
        $method = method_field('POST');
        if (isset($order)) {
            $action = route('order.update', ['order' => $order]);
            $method = method_field('PATCH');
        }
    @endphp
    <form action="{{ $action }}" method="post" id="orderForm">
        @csrf
        {{ $method }}
        <div class="container-fluid">
            <div class="card border-0 rounded rounded-3 shadow">
                <div class="card-body border-0">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <div class="mx-1">
                                <label for="date_start" class="form-label">Date start</label>
                                <input type="datetime" name="date_start" id="datestart" class="form-control dateinput"
                                    value="{{ isset($order) ? $order->date_start : '' }}">
                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="mx-1">
                                <label for="date_end" class="form-label">Date end</label>
                                <input type="datetime" name="date_end" {{ isset($order) ? '' : 'disabled' }} id="dateend"
                                    class="form-control dateinput" value="{{ isset($order) ? $order->date_end : '' }}">
                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mx-1">
                                <label for="supervisor" class="form-label">Supervisor</label>
                                <select class="select2" name="id_supervisor" id="officer1">
                                    <option value="" {{ empty($order->supervisor) ? 'selected' : '' }}>select</option>
                                    @foreach ($supervisors as $user)
                                        <option value="{{ $user->id }}"
                                            {{ (isset($order) ? $order->user->id : '' == $user->id) ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mx-1">
                                <label for="driver" class="form-label">Driver</label>
                                <select class="select2" name="id_driver" id="driver">
                                    <option value="" {{ empty($order->driver) ? 'selected' : '' }}>select</option>
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}"
                                            {{ (isset($order) ? $order->driver->id : '' == $driver->id) ? 'selected' : '' }}>
                                            {{ $driver->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <label for="note" class="form-label">Usage Note</label>
                            <textarea class="form-control" name="note" id="note" rows="5">{{ isset($order) ? $order->note : '' }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mx-1">
                                <label for="vechile" class="form-label">Vechile</label>
                                <select class="select2" name="id_vechile" id="vechile">
                                    <option value="" {{ empty($order->vechile) ? 'selected' : '' }}>select</option>
                                    @foreach ($vechiles as $vechile)
                                        <option value="{{ $vechile->id }}"
                                            {{ (isset($order) ? $order->vechile->id : '' == $vechile->id) ? 'selected' : '' }}>
                                            {{ $vechile->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 me-2">
                                <label for="officer1" class="form-label">Fuel Usage <small>(litre)</small></label>
                                <input type="text" class="form-control form-control-sm"
                                    {{ isset($order) ? '' : 'disabled' }} name="code" id="code" placeholder=""
                                    value="{{ isset($order) ? $order->fuel_usage : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 mt-4">
                        <h5 class="text-center">Current Phase <br>
                        <small class="text-center" style="font-size: 12px">1 (waiting) ; 2 (in progress) ; 3 (done) ; 4 (completed)</small>

                        </h5>
                        <div class="position-relative m-4">
                            @php
                                $color = 'secondary';
                                $width = '0';
                                $level = 1;
                                if (isset($order)) {
                                    switch ($order->status) {
                                        case 1:
                                            $color = 'secondary';
                                            $width = '0';
                                            $level = 1;
                                            break;
                                        case 2:
                                            $color = 'warning';
                                            $width = '31.25%';
                                            $level = 2;
                                            break;
                                        case 3:
                                            $color = 'primary';
                                            $width = '62.5%';
                                            $level = 3;
                                            break;
                                        case 4:
                                            $color = 'success';
                                            $width = '100%';
                                            $level = 4;
                                            break;
                                        default:
                                            $color = 'danger';
                                            $width = '100%';
                                            $level = 5;
                                            break;
                                    }
                                }
                            @endphp
                            <div class="progress bg-secondary" role="progressbar" aria-label="Progress" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                                <div class="progress-bar  bg-{{ $color }}" style="width: {{ $width }}">
                                </div>
                            </div>
                            <button type="button"
                                class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $level >= 1 ? $color : 'secondary' }} rounded-pill"
                                style="width: 2rem; height:2rem; left: 0;">
                                <i class="fa fa-clock"></i>
                            </button>
                            <button type="button"
                                class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $level >= 2 ? $color : 'secondary' }} rounded-pill"
                                style="width: 2rem; height:2rem; left: 31.25%;">
                                <i class="fa fa-cog"></i>
                            </button>
                            <button type="button"
                                class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $level >= 3 ? $color : 'secondary' }} rounded-pill"
                                style="width: 2rem; height:2rem; left: 62.5%">
                                <i class="fa fa-check"></i>
                            </button>
                            <button type="button"
                                class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $level >= 4 ? $color : 'secondary' }} rounded-pill"
                                style="width: 2rem; height:2rem; left: 100%">
                                <i class="fa fa-check-circle"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="d-flex">
                            {{-- <div class="mx-1 mb-3">
                                <select class="form-select form-select-sm" name="status" id="">
                                    @if (isset($order))
                                        <option value="" {{ empty($order->status) ? 'selected' : '' }}>Status
                                        </option>
                                        <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Waiting
                                        </option>
                                        <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>On Progress
                                        </option>
                                        <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Finished
                                        </option>
                                        <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Done</option>
                                        <option value="5" {{ $order->status == 5 ? 'selected' : '' }}>Declined
                                        </option>
                                    @else
                                        <option value="" selected>Status
                                        </option>
                                        <option value="1">Waiting
                                        </option>
                                        <option value="2">On Progress
                                        </option>
                                        <option value="3">Finished
                                        </option>
                                        <option value="4">Done</option>
                                        <option value="5">Declined
                                        </option>
                                    @endif

                                </select>
                            </div> --}}
                            <div class="mb-3 ms-auto">
                                @isAdmin()
                                    <button type="submit" class="btn btn-primary">
                                        <span>{{ isset($order) ? 'Finish' : 'Add' }}</span>
                                    </button>
                                @endisAdmin

                                @isSupervisor()

                                @if (isset($order) && $order->status == 1)
                                    <input type="hidden" name="confirm" value="0" id="act">
                                    <button type="button" class="btn btn-primary mx-1" onclick="
                                    $('#act').val(1);
                                    $('#orderForm').submit()">
                                        confirm
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        Decline
                                    </button>
                                @endif
                                @if (isset($order) && $order->status == 3)
                                    <input type="hidden" name="finish" value="4">
                                    <button type="submit" class="btn btn-success mx-1">
                                        finish
                                    </button>
                                @endif

                                @endisSupervisor()
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
