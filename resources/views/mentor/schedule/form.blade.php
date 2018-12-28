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
                    <p class="pageheader-text">Request new schedule.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Schedules</a></li>
                                <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Request</a></li>
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
                        @if ($schedule->id)
                            {{ Form::model($schedule, array('route' => array('schedule.update', $schedule->id))) }}
                        @else
                            <form method="POST" action="{{ route('mentor.schedule.store') }}" autocomplete="off">
                        @endif
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title" class="col-form-label">Title</label>
                                        <input id="title" type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" required autofocus>
                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="start_date" class="col-form-label">Start Date</label>
                                        <input id="start_date" type="date" name="start_date" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }}" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="subtitle" class="col-form-label">Sub-title</label>
                                        <input id="subtitle" type="text" name="subtitle" class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : '' }}" required autofocus>
                                        @if ($errors->has('subtitle'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('subtitle') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_date" class="col-form-label">End Date</label>
                                        <input id="end_date" type="date" name="end_date" class="form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }}" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="major_id" class="col-form-label">Major</label>
                                        <select class="form-control" name="major_id" id="major_id">
                                            @if (count($majors) > 0)
                                                @foreach ($majors as $major)
                                                    <option value="{{ $major->id }}">{{ ucfirst($major->name) }}</option>
                                                @endforeach
                                            @else
                                                <option value="" selected>You must fill major first</option>
                                            @endif
                                        </select>
                                        @if ($errors->has('major_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('major_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="difficulty_id" class="col-form-label">Difficulty</label>
                                        <select class="form-control" name="difficulty_id" id="difficulty_id">
                                            @if (count($difficulties) > 0)
                                                @foreach ($difficulties as $difficulty)
                                                    <option value="{{ $difficulty->id }}">{{ ucfirst($difficulty->name) }}</option>
                                                @endforeach
                                            @else
                                                <option value="" selected>You must fill difficulty first</option>
                                            @endif
                                        </select>
                                        @if ($errors->has('difficulty_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('difficulty_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="target_id" class="col-form-label">Target</label>
                                        <select class="form-control" name="target_id" id="target_id">
                                            @if (count($targets) > 0)
                                                @foreach ($targets as $target)
                                                    <option value="{{ $target->id }}">{{ ucfirst($target->name) }}</option>
                                                @endforeach
                                            @else
                                                <option value="" selected>You must fill target first</option>
                                            @endif
                                        </select>
                                        @if ($errors->has('target_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('target_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="description" class="col-form-label">Description</label>
                                        <textarea rows="10" id="description" type="text" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" required autofocus></textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
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