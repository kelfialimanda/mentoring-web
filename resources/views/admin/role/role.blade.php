@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header" id="top">
                    <h2 class="pageheader-title">Roles </h2>
                    <p class="pageheader-text">List of roles.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Roles</a></li>
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
            <!-- ============================================================== -->
            <!-- overview  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h2>Overview</h2>
                    <p class="lead">Nam pulvinar interdum turpis a mattis. Etiam augue leo, mollis a massa sagittis, egestas pretium risus. Aliquam auctor nibh mauris, at fringilla elit lobortis sodales. Praesent volutpat felis et placerat elementum. </p>
                    <ul class="list-unstyled arrow">
                        <li> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Mauris bibendum massa ut porttitor congue.</li>
                        <li>Morbi condimentum magna eget facilisis accumsan.</li>
                        <li>Proin euismod eros nec libero efficitur, a dapibus mauris condimentum. </li>
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end overview  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- basic form  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section-block" id="basicform">
                    <h3 class="section-title">Basic Form Elements</h3>
                    <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>
                </div>
                <div class="card">
                    <h5 class="card-header">Basic Form</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Input Text</label>
                                <input id="inputText3" type="text" class="form-control">
                            </div>
                        </form>
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