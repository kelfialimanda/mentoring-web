@extends('mentor.layouts.app')
@section('title', 'Schedules')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header" id="top">
                    <h2 class="pageheader-title">Schedules </h2>
                    <p class="pageheader-text">List of schedules.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Schedules</a></li>
                                <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">List</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="page-section" id="overview">

        </div>
        <!-- ============================================================== -->
        <!-- basic form  -->
        <!-- ============================================================= -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Basic Form</h5>
                    <div class="card-body">
                        @if(session()->get('alert-success'))
                            <div class="alert alert-success">
                                {{ session()->get('alert-success') }}  
                            </div><br />
                        @endif
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Difficulty</th>
                                    <th scope="col">Major</th>
                                    <th scope="col">Target</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            @if (count($schedules) > 0)
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $schedule->title }}</td>
                                        <td>{{ $schedule->start_date }}</td>
                                        <td>{{ $schedule->end_date }}</td>
                                        <td>
                                            @if ($schedule->status == 0)
                                                <span>Haven't Approved</span>
                                            @elseif ($schedule->status == 1)
                                                <span>Approved</span>
                                            @else
                                                <span>Declined</span>
                                            @endif
                                        </td>
                                        <td><b style="color: {{ $schedule->difficulty->color }}"> {{ $schedule->difficulty->name }} </b></td>
                                        <td>{{ $schedule->major->name }}</td>
                                        <td>{{ $schedule->target->name }}</td>
                                        <td>
                                            @if ($schedule->status == 0)
                                                <span style="color: orange;"><b>On Process</b></span>
                                            @elseif ($schedule->status == 1)
                                                <span style="color: green;"><b>Approved</b></span>
                                            @else
                                                <span>Declined</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tbody>
                                    <tr>
                                        <td scope="row" colspan="7" style="text-align: center;">No data recorded</td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic form  -->
        <!-- ============================================================== -->
    </div>
</div>
@endsection