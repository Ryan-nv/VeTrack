@extends('layouts.main')
@section('title')
    {{ !empty($edit) ? 'Edit Driver' : 'Add Driver' }}
@endsection
@section('color-class')
    bg-primary
@endsection

@section('main-content')
    @php
        $action = route('driver.store');
        $method = method_field('POST');
        if (!empty($edit)) {
            $action = route('driver.update', ['driver' => $driver]);
            $method = method_field('PATCH');
        }
    @endphp
    <form action="{{ $action }}" method="post">
        @csrf
        {{ $method }}
        <div class="container-fluid">
            <div class="card border-0 rounded rounded-3 shadow">
                <div class="card-body border-0">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <div class="me-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="helpId" placeholder="" value="{{ !isset($driver) ? '' : $driver->name }}">
                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="me-2">
                                <label for="driver_license" class="form-label">No.Driver License</label>
                                <input type="text" class="form-control" name="driver_lc" id="driver-license"
                                    aria-describedby="helpId" placeholder="" value="{{ !isset($driver) ? '' : $driver->driver_lc }}">
                                {{-- <small id="helpId" class="form-text text-muted">eg : N00321AG</small> --}}
                            </div>
                        </div>
                    <div class="d-flex">
                        <div class="mb-3">
                            <select class="form-select form-select" name="status" id="">
                                <option value="" {{ !isset($driver) ? '' : 'selected'}}>Driver Status</option>
                                <option value="1" {{ ( $driver->status ?? 0) == 1 ? '' : 'selected'}}>Available</option>
                                <option value="2" {{ ( $driver->status ?? 0) == 2 ? '' : 'selected'}}>Unavailable</option>
                            </select>
                        </div>
                        <div class="mb-3 ms-auto">
                            <button class="btn btn-primary">
                                <span>{{ isset($edit) ? 'Update' : 'Add' }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
