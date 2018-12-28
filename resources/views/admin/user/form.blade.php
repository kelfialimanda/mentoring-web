@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header" id="top">
                    <h2 class="pageheader-title">Users </h2>
                    <p class="pageheader-text">Add new user.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Users</a></li>
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
                        @if ($user->id)
                            {{ Form::model($user, array('route' => array('user.update', $user->id))) }}
                        @else
                            <form method="POST" action="{{ route('user.store') }}" autocomplete="off">
                        @endif
                            @csrf
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="role" class="col-form-label">Role</label>
                                    <select class="form-control" name="role_id" id="role">
                                        @if (count($roles) > 0)
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                            @endforeach
                                        @else
                                            <option value="" selected>You must fill roles first</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('role_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group npm-input" style="display: none;">
                                <div class="col-md-6">
                                    <label for="npm" class="col-form-label">NPM</label>
                                    <input id="npm" type="text" name="npm" class="form-control {{ $errors->has('npm') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('npm'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('npm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input id="name" type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input id="password" type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required autofocus autocomplete="off">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
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

@section('script')
<script type="text/javascript">
    $(function() {
        $("#role").on('change', function() {
            var selectedRole = $(this).children("option:selected").val();
            if (selectedRole == 3)
            {
                $('.npm-input').show("slow");
            } else {
                if ($('.npm-input').is(":visible"))
                {
                    $('.npm-input').hide("slow");
                }
            }
        });
    });
</script>
@endsection