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
                    <p class="pageheader-text">Add new target.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Targets</a></li>
                                <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Add</a></li>
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
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        @if ($target->id)
                            {{ Form::model($target, array('route' => array('target.update', $target->id))) }}
                        @else
                            <form method="POST" action="{{ route('target.store') }}" autocomplete="off">
                        @endif
                            @csrf
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input id="name" type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ isset($target->name) ? $target->name : '' }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @if ($target->id)
                                <input type="hidden" name="id" value="{{ $target->id }}">
                            @endif

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        {{ Form::close() }}
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