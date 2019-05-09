@extends('admin.layouts.app')
@section('title', 'Difficulties')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header" id="top">
                    <h2 class="pageheader-title">Difficulties </h2>
                    <p class="pageheader-text">Add new difficulty.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Difficulties</a></li>
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
                        @if ($difficulty->id)
                            {{ Form::model($difficulty, array('route' => array('difficulty.update', $difficulty->id))) }}
                        @else
                            <form method="POST" action="{{ route('difficulty.store') }}" autocomplete="off">
                        @endif
                            @csrf
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input id="name" type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ isset($difficulty->name) ? $difficulty->name : '' }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="color" class="col-form-label">Color</label>
                                    <input id="color" type="text" name="color" class="form-control {{ $errors->has('color') ? ' is-invalid' : '' }}" value="{{ isset($difficulty->color) ? $difficulty->color : '' }}" required autofocus>
                                    @if ($errors->has('color'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('color') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            @if ($difficulty->id)
                                <input type="hidden" name="id" value="{{ $difficulty->id }}">
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