@extends('layouts.app')

@section('content')
@include('partials._section', ['action' => 'Dashboard'])
<div class="container">
    <div class="row"> <!-- .row-bg -->
        <div class="col-sm-6 col-md-3">
            <div class="statbox nitda-widget">
                <div class="nitda-widget-content">
                    <div class="visual btn-success">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="title">Academic Records</div>
                    <div class="value">1</div>
                    <a class="more pull-right" href="http://careers.ikejaelectric.com/ie/applicant/my-profile/academics">View <i class="pull-right icon-angle-right"></i></a>
                </div>
            </div>
            <!-- /.smallstat -->
        </div>
        <!-- /.col-md-3 -->

        <div class="col-sm-6 col-md-3">
            <div class="statbox nitda-widget">
                <div class="nitda-widget-content">
                    <div class="visual btn-danger">
                        <i class="fa fa-certificate"></i>
                    </div>
                    <div class="title">Certification</div>
                    <div class="value">0</div>
                    <a class="more pull-right" href="http://careers.ikejaelectric.com/ie/applicants/my-profile/certifications">View <i class="pull-right icon-angle-right"></i></a>
                </div>
            </div>
            <!-- /.smallstat -->
        </div>
        <!-- /.col-md-3 -->

        <div class="col-sm-6 col-md-3">
            <div class="statbox nitda-widget">
                <div class="nitda-widget-content">
                    <div class="visual btn-warning">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <div class="title">Competency</div>
                    <div class="value">7</div>
                    
                    <a class="more pull-right" href="http://careers.ikejaelectric.com/ie/applicants/my-profile/skills">View <i class="pull-right icon-angle-right"></i></a>
                </div>
            </div>
            <!-- /.smallstat -->
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="statbox nitda-widget">
                <div class="nitda-widget-content">
                    <div class="visual btn-primary">
                        <i class="fa fa-calendar-times-o"></i>
                    </div>
                    <div class="title">Job Experience</div>
                    <div class="value">3</div>
                    <a class="more pull-right" href="http://careers.ikejaelectric.com/ie/applicants/my-profile/work-experience">View <i class="pull-right icon-angle-right"></i></a>
                </div>
            </div>
            <!-- /.smallstat -->
        </div>
        <!-- /.col-md-3 -->
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Applicants Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
