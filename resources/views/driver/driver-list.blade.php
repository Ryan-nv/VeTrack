@extends('layouts.main')
@section('title')
    Driver List
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
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mx-1">
                            <label for="search" class="form-label">Name / License</label>
                            <input type="text" class="form-control" name="search" id="search"
                                aria-describedby="helpId" placeholder="" value="{{ request()->search ? request()->search : '' }}">
                            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mx-1">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select form-select" name="status" id="">
                                <option value="" {{ !request()->status ? 'selected' : '' }} >Choose</option>
                                <option value="1" {{ request()->status ==  1 ? 'selected' : '' }}>Available</option>
                                <option value="2" {{ request()->status ==  2 ? 'selected' : '' }}>Unavailable</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary rounded rounded-2">
                        <i class="fa fa-filter"></i>
                        <span class="ms-2">Apply Filters</span>
                    </button>
                    <a href="{{ route('driver.index') }}" class="btn btn-danger ms-2 rounded rounded-2">
                        <i class="fa fa-times-circle"></i>
                        <span class="ms-2">Reset Filters</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="w-100 shadow rounded rounded-4 p-3 bg-white mt-3">
        <div class="table-responsive d-flex flex-column">
            <table class="table table-striped">
                <thead class="bg-white">
                    <th class="bg-white w-50">Name</th>
                    <th class="bg-white w-50">Lc. Number</th>
                    <th class="bg-white" style="max-width: 100px !important">Status</th>
                    <th class="bg-white" style="max-width: 50px" class="d-flex">
                    </th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="mb-1">
                            <td class="my-auto"> {{ $item->name }} </td>
                            <td> {{ $item->driver_lc}} </td>
                            <td style="max-width: 150px !important;">
                                @php
                                    $icon = ($item->status == 1) ? 'fa-check-circle' : 'fa-times-circle';
                                    $color = ($item->status == 1) ? 'bg-success' : 'bg-danger';
                                    $text = ($item->status == 1) ? 'Availabe' : 'Unavailable';
                                @endphp
                                <div class="p-2 d-flex {{ $color }} rounded rounded-3 text-white">
                                    <i class="fa {{ $icon }} my-auto"></i>
                                    <span class="my-auto ms-2">{{ $text }}</span>
                                </div>
                            </td>
                            <td style="max-width: 50px">
                                <div class="dropdown-center">
                                    <button class="btn btn-transparent my-auto mx-auto" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu mt-2 p-2 flex-column rounded rounded-3">
                                        <a class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-left p-2" href="{{ route('driver.edit', ['driver' => $item])}}">
                                            <i class="ms-2 fa fa-edit my-auto"></i>
                                            <span class="ms-2 my-auto"> Edit</span>
                                        </a>
                                        <form method="POST" action="{{ route('driver.destroy', ['driver' => $item]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-danger w-100 mb-2 d-flex justify-content-left p-2">
                                                    <i class="ms-2 fa fa-trash my-auto"></i>
                                                    <span class="ms-2 my-auto"> Edit</span>
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
