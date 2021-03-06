@extends('admin.layouts.app')
@section('title', 'Targets')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header" id="top">
                    <h2 class="pageheader-title">Targets </h2>
                    <p class="pageheader-text">List of targets.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Targets</a></li>
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
                                    <th scope="col">Name</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            @if (count($targets) > 0)
                                @foreach ($targets as $target)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $target->name }}</td>
                                        <td>
                                        <a href="/admin/targets/form/{{$target->id}}">Edit</a> | <a href="">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tbody>
                                    <tr>
                                        <td scope="row" colspan="4" style="text-align: center;">No data recorded</td>
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