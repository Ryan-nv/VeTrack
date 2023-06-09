@extends('layouts.main')
@section('title')
    Request List
@endsection

@section('main-content')
    {{-- filters --}}
    <div class="w-100 shadow rounded rounded-4 p-3 bg-white">
        <div class="d-flex mb-3">
            <h4 class="my-auto">Filters</h4>
            <button type="button" class="btn btn-transparent rounded-pill border-0 text-light opacity-50 ms-auto my-auto"
                style="width : 2.5rem !important; height : 2.5rem !important" data-bs-toggle="collapse"
                data-bs-target="#filters" aria-controls="filters" aria-expanded="false">
                <i class="fa fa-angle-down fs-2 text-dark"></i>
            </button>
        </div>
        <div id="filters" class="collapse show">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="mx-1">
                            <label for="supervisor" class="form-label">Supervisor</label>
                            <select class="select2" name="supervisor" id="officer1">
                                <option value="" {{ empty(request()->supervisor) ? 'selected' : '' }}>select</option>
                                @foreach ($supervisors as $user)
                                    <option value="{{ $user->id }}" {{ (request()->supervisor == $user->id) ? 'selected' : ''}}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="mx-1">
                            <label for="driver" class="form-label">Driver</label>
                            <select class="select2" name="driver" id="driver">
                                <option value="" {{ empty(request()->driver) ? 'selected' : '' }}>select</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ (request()->driver == $driver->id) ? 'selected' : ''}} >{{ $driver->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="mx-1">
                            <label for="vechile" class="form-label">Vechile</label>
                            <select class="select2" name="vechile" id="vechile">
                                <option value="" {{ empty(request()->vechile) ? 'selected' : '' }}>select</option>
                                @foreach ($vechiles as $vechile)
                                    <option value="{{ $vechile->id }}" {{ (request()->driver == $driver->id) ? 'selected' : ''}} >{{ $vechile->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="mx-1">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select form-select-sm" name="status" id="">
                                <option value=""  {{ empty(request()->status) ? 'selected' : '' }} >Status</option>
                                <option value="1" {{ (request()->status == 1) ? 'selected' : ''}} >Waiting</option>
                                <option value="2" {{ (request()->status == 2) ? 'selected' : ''}} >On Progress</option>
                                <option value="3" {{ (request()->status == 3) ? 'selected' : ''}} >Finished</option>
                                <option value="4" {{ (request()->status == 4) ? 'selected' : ''}} >Done</option>
                                <option value="5" {{ (request()->status == 5) ? 'selected' : ''}} >Declined</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-lg-3 mt-2">
                    <h6>Date Range</h6>
                    <div class="mb-3 col-md-6">
                        <div class="mx-1">
                            <input type="datetime" name="datestart" id="datestart" class="form-control dateinput">
                            <small id="helpId" class="form-text text-muted">Start</small>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="mx-1">
                            <input type="datetime" name="dateend" id="dateend" class="form-control dateinput">
                            <small id="helpId" class="form-text text-muted">End</small>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary rounded rounded-2">
                        <i class="fa fa-filter"></i>
                        <span class="ms-2">Apply Filters</span>
                    </button>
                    <a href="{{ route('order.index') }}" class="btn btn-danger ms-2 rounded rounded-2">
                        <i class="fa fa-times-circle"></i>
                        <span class="ms-2">Reset Filters</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="w-100 shadow rounded rounded-4 p-3 bg-white mt-3">
        <div class="d-flex mb-3">
            <div class="ms-auto">
                <a href="{{ route('exportOrder') }}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i>
                    <span class="ms-2">Export</span>
                </a>
            </div>
        </div>
        <div class="table-responsive d-flex flex-column">
            <table class="table table-stripped">
                <thead class="bg-white">
                    <th class="bg-white">Vechile</th>
                    <th class="bg-white">Driver</th>
                    <th class="bg-white">Supervisor</th>
                    <th class="bg-white" style="max-width: 120px">Date-start</th>
                    <th class="bg-white" style="max-width: 120px">Date-end</th>
                    <th class="bg-white" style="max-width: 50px">Fuel</th>
                    <th class="bg-white" style="max-width: 100px !important">Status</th>
                    <th class="bg-white" style="max-width: 50px" class="d-flex">

                    </th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="my-auto">{{ $item->vechile->name }}</td>
                            <td>{{ $item->driver->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->date_start }}</td>
                            <td>{{ $item->date_end }}</td>
                            <td>{{ $item->fuel_usage }} l</td>
                            <td>
                                @php
                                    $label = [
                                        'icon' => 'fa-question-circle',
                                        'bg' => 'bg-secondary',
                                        'text' => 'undefined',
                                    ];
                                    
                                    switch ($item->status) {
                                        case 1:
                                            # code...
                                            $label['text'] = 'Waiting';
                                            $label['bg'] = 'bg-secondary';
                                            $label['icon'] = 'fa-clock';
                                    
                                            break;
                                        case 2:
                                            # code...
                                            $label['text'] = 'On Progress';
                                            $label['bg'] = 'bg-warning';
                                            $label['icon'] = 'fa-cog';
                                    
                                            break;
                                        case 3:
                                            # code...
                                            $label['text'] = 'Finished';
                                            $label['bg'] = 'bg-primary';
                                            $label['icon'] = 'fa-check';
                                            break;
                                        case 4:
                                            # code...
                                            $label['text'] = 'Completed';
                                            $label['bg'] = 'bg-success';
                                            $label['icon'] = 'fa-check-circle';
                                            break;
                                        case 5:
                                            # code...
                                            $label['text'] = 'Declined';
                                            $label['bg'] = 'bg-danger';
                                            $label['icon'] = 'fa-times-circle';
                                            break;
                                    
                                        default:
                                            # code...
                                            break;
                                    }
                                @endphp
                                <div class="p-2 d-flex {{ $label['bg'] }} rounded rounded-3 text-white">
                                    <i class="fa  {{ $label['icon'] }}  my-auto"></i>
                                    <span class="my-auto ms-2"> {{ $label['text'] }} </span>
                                </div>
                            </td>
                            <td style="max-width: 50px">
                                <div class="dropdown-center">
                                    <button class="btn btn-transparent my-auto mx-auto" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu mt-2 p-2 flex-column rounded rounded-3">
                                        <a class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-left p-2" href="{{ route('order.edit', ['order' => $item])}}">
                                            <i class="ms-2 fa fa-edit my-auto"></i>
                                            <span class="ms-2 my-auto"> Edit</span>
                                        </a>
                                        <form method="POST" action="{{ route('order.destroy', ['order' => $item]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-danger w-100 mb-2 d-flex justify-content-left p-2">
                                                    <i class="ms-2 fa fa-trash my-auto"></i>
                                                    <span class="ms-2 my-auto"> Delete</span>
                                                </button>
                                            </div>
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mx-auto">
                {{ $data->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
    {{-- List --}}
@endsection
