@extends('layouts.main')
@section('title')
    Vechile List
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
                    <div class="col-md-6">
                        <div class="mx-1">
                            <label for="type" class="form-label">Vechile Type</label>
                            <select class="form-select" name="type" id="type">
                                <option value="" {{ empty(request()->type) ? 'selected' : '' }}>choose</option>
                                <option {{ request()->type == 1 ? 'selected' : '' }} value="1">Truck</option>
                                <option {{ request()->type == 2 ? 'selected' : '' }} value="2">Transport</option>
                                <option {{ request()->type == 3 ? 'selected' : '' }} value="3">Heavy Vechile
                                </option>
                                <option {{ request()->type == 4 ? 'selected' : '' }} value="4">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mx-1">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select form-select" name="status" id="status">
                                <option value="" {{ empty(request()->status) ? 'selected' : '' }}>choose</option>
                                <option {{ request()->status == 1 ? 'selected' : '' }} value="1">Available</option>
                                <option {{ request()->status == 2 ? 'selected' : '' }} value="2">On Repair</option>
                                <option {{ request()->status == 3 ? 'selected' : '' }} value="3">In Use</option>
                                <option {{ request()->status == 4 ? 'selected' : '' }} value="4">Broken</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-lg-3 mt-2">
                    <h6>Service Date</h6>
                    <div class="mb-3 col-md-6">
                        <div class="mx-1">
                            <input type="datetime" name="datestart" id="datestart" class="form-control dateinput"
                                value="{{ isset(request()->datestart) ? request()->datestart : '' }}">
                            <small id="helpId" class="form-text text-muted">Start</small>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="mx-1">
                            <input type="datetime" name="dateend" id="dateend" class="form-control dateinput"
                                value="{{ isset(request()->dateend) ? request()->dateend : '' }}">
                            <small id="helpId" class="form-text text-muted">End</small>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="mx-1">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" class="form-control" name="search" id="license-number"
                                aria-describedby="helpId" placeholder="name / license"
                                value="{{ isset(request()->search) ? request()->search : '' }}">
                        </div>
                    </div>
                </div>
                <div class="d-flex"><button type="button" class="btn btn-secondary rounded-pill border-0 text-light opacity-50 ms-auto my-auto"
                    style="width : 2.5rem !important; height : 2.5rem !important" data-bs-toggle="collapse"
                    data-bs-target="#filters" aria-controls="filters" aria-expanded="false">
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                        <span class="ms-2">Reset Filters</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="w-100 shadow rounded rounded-4 p-3 bg-white mt-3">
        <div class="table-responsive d-flex flex-column">
            <table class="table table-stripped">
                <thead class="bg-white">
                    <th class="bg-white w-25">Name</th>
                    <th class="bg-white w-25">Type</th>
                    <th class="bg-white" style="max-width: 120px">Sv. Date</th>
                    <th class="bg-white" style="max-width: 120px">Lc. Number</th>
                    <th class="bg-white" style="max-width: 50px">Usage <small>(days)</small></th>
                    <th class="bg-white" style="max-width: 100px !important">Status</th>
                    <th class="bg-white" style="max-width: 50px" class="d-flex">

                    </th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="my-auto">{{ $item->name }}</td>
                            <td>
                                @switch($item->type)
                                    @case(1)
                                        Truck
                                        @break
                                    @case(2)
                                        Transport
                                        @break
                                    @case(3)
                                        Heavy Vechile
                                        @break
                                    @case(4)
                                        Other
                                        @break

                                        
                                @endswitch
                            </td>
                            <td>{{ $item->service_date }}</td>
                            <td>{{ $item->license_num }}</td>
                            <td>{{ $item->usage }}</td>
                            <td>
                                @php
                                    $label = [
                                        'icon' => 'fa-question-circle',
                                        'bg' => 'bg-secondary',
                                        'text' => 'undefined',
                                    ];
                                    
                                    switch ($item->status) {
                                        case '1':
                                            # code...
                                            $label['text'] = 'Available';
                                            $label['bg'] = 'bg-success';
                                            $label['icon'] = 'fa-check-circle';
                                    
                                            break;
                                        case '2':
                                            # code...
                                            $label['text'] = 'On Repair';
                                            $label['bg'] = 'bg-warning';
                                            $label['icon'] = 'fa-cog';
                                            
                                            break;
                                        case '3':
                                            # code...
                                            $label['text'] = 'In Use';
                                            $label['bg'] = 'bg-primary';
                                            $label['icon'] = 'fa-clock';
                                            break;
                                        case '4':
                                            # code...
                                            $label['text'] = 'Broken';
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
                                        <a class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-left p-2" href="{{ route('vechile.edit', ['vechile' => $item])}}">
                                            <i class="ms-2 fa fa-edit my-auto"></i>
                                            <span class="ms-2 my-auto"> Edit</span>
                                        </a>
                                        <form method="POST" action="{{ route('vechile.destroy', ['vechile' => $item]) }}">
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
