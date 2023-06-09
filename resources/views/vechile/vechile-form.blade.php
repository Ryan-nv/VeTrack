@extends('layouts.main')
@section('title')
    {{ !empty($edit) ? 'Edit Vechile' : 'Add Vechile' }}
@endsection
@section('color-class')
    bg-primary
@endsection

@section('main-content')
    @php
        $vec;
        if (isset($vechile)) {
            # code...
            $vec = $vechile;
        }
        
        $action = route('vechile.store');
        $method = method_field('POST');
        if (isset($vechile)) {
            $action = route('vechile.update', ['vechile' => $vechile]);
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
                        <div class="mb-3 col-md-4">
                            <div class="me-2">
                                <label for="name" class="form-label">Vechile Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="helpId" placeholder="name"
                                    value="{{ isset($vec) ? $vec->name : '' }}">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="me-2">
                                <label for="type" class="form-label">Vechile Type</label>
                                <select class="form-select" name="type" id="type">
                                    <option value='' {{ isset($vec) && !$vec->type ? 'selected' : '' }}>choose
                                    </option>
                                    <option value="1" {{ isset($vec) && $vec->type == 1 ? 'selected' : '' }}>Truck
                                    </option>
                                    <option value="2" {{ isset($vec) && $vec->type == 2 ? 'selected' : '' }}>
                                        Transport</option>
                                    <option value="3" {{ isset($vec) && $vec->type == 3 ? 'selected' : '' }}>Heavy
                                        Vechile</option>
                                    <option value="4" {{ isset($vec) && $vec->type == 4 ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="me-2">
                                <label for="license_number" class="form-label">License Number</label>
                                <input type="text" class="form-control" name="license_num" id="license-number"
                                    aria-describedby="helpId" placeholder="" value="{{ isset($vec) ? $vec->name : '' }}">
                                {{-- <small id="helpId" class="form-text text-muted">eg : N00321AG</small> --}}
                            </div>
                        </div>
                        {{-- <div class="mb-3 col-md-4">
                            <label for="datestart" class="form-label">Date-start</label>
                            <input type="datetime" name="datestart" id="datestart" class="form-control dateinput">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="ms-2">
                                <label for="dateend" class="form-label">Date-end</label>
                                <input type="datetime" name="dateend" disabled id="dateend"
                                    class="form-control dateinput">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 me-2">
                                <label for="service_date" class="form-label">Service Date</label>
                                <input type="datetime" name="service_date" id="servicedate" class="form-control dateinput"
                                    value="{{ isset($vec) ? $vec->service_date : '' }}">
                                {{-- <small id="helpId" class="form-text text-muted">Next Service date</small> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 me-2">
                                <label for="usage" class="form-label">Total Usage <small>(hours)</small> </label>
                                <input type="text" name="usage" id="datestart" class="form-control"
                                    value="{{ isset($vec) ? $vec->usage : '' }}">
                                {{-- <small id="helpId" class="form-text text-muted">Vechile</small> --}}
                            </div>
                        </div>

                    </div>
                    {{-- <div class="row">
                        <div class="mb-3 mt-3">
                            <label for="detail" class="form-label">Usage Detail</label>
                            <textarea class="form-control" name="detail" id="detail" rows="5"></textarea>
                        </div>
                    </div> --}}
                    <div class="d-flex">
                        <div class="mb-3">
                            <select class="form-select form-select" name="status" id="">
                                <option value="" {{ isset($vec) && !$vec->status ? 'selected' : '' }}>Vechile Status
                                </option>
                                <option value="1" {{ isset($vec) && $vec->status == 1 ? 'selected' : '' }}>Available
                                </option>
                                <option value="2" {{ isset($vec) && $vec->status == 2 ? 'selected' : '' }}>On Repair
                                </option>
                                <option value="3" {{ isset($vec) && $vec->status == 3 ? 'selected' : '' }}>In Use
                                </option>
                                <option value="4" {{ isset($vec) && $vec->status == 4 ? 'selected' : '' }}>Broken
                                </option>
                            </select>
                        </div>
                        <div class="mb-3 ms-auto">
                            <button class="btn btn-primary">
                                <span>{{ isset($vechile) ? 'Update' : 'Add' }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
