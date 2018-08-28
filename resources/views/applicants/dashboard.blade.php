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
                    <div class="title">Work Experience</div>
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
    <div class="row">
        <div class="col-md-6">
            <div class="widget">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i>Basic Data</h4>
                    @include('partials._alert')
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs btn-success">
                                <a href="{{route('applicant.profile.edit')}}" id="edit-profile" class='text-white'>
                                    <i class="fa fa-pencil-square-o"></i> Edit Data</a></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content no-padding">
                    <table class="table table-hover table-striped table-bordered table-highlight-head text-primary">

                        <tbody>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Other Names</th>
                        </tr>
                        <tr>
                            <td class='text-muted'>{{$applicant->lastname}}</td>
                            <td class='text-muted'>{{$applicant->firstname}}</td>
                            <td class='text-muted'>IBUKUN</td>
                        </tr>
                        <tr>
                            <td><strong>Sex</strong></td>
                            <td><strong>Date Of Birth</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-muted">{{$applicant->sex}}</td>
                            <td class="text-muted">{{$applicant->dob}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Phone No.</strong></td>
                            <td><strong>State Of Origin</strong></td>
                            <td><strong>LGA</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">{{$applicant->phone}}</td>
                            <td class="text-muted">{{$applicant->stateOfResidence->name}}</td>
                            <td class="text-muted">{{$applicant->lgaOfResidence->name}}</td>
                        </tr>
                        <tr>
                            <th>Residential Address</th>
                            <td><strong>State of Residence</strong></td>
                            <td><strong>LGA of Residence</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">{{$applicant->address_of_residence}}</td>
                            <td class="text-muted">{{$applicant->stateOfOrigin->name}}</td>
                            <td class="text-muted">{{$applicant->lgaOfOrigin->name}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-xs-12">
                <br>
                <h4><i class="fa fa-briefcase"></i> VACANCIES <span class="badge badge-danger">1</span></h4>
            </div>
            <!-- Job item -->
            <div class="col-xs-12">
                <a class="item-block" href="http://careers.ikejaelectric.com/ie/applicant/job-application/view/57">
                    <header>
                        <img src="http://careers.ikejaelectric.com/img/job.png" alt="">
                        <div class="hgroup">
                            <h4>FRONT DESK RECEPTIONIST</h4>
                            <h5>N-2018-08-15933753614</h5>
                        </div>
                        <div class="header-meta">
                            <span class="location"> Lagos</span>
                            <span class="fa fa-calendar"> 29/08/2018</span>
                        </div>
                    </header>
                </a>
            </div>
            <!-- END Job item -->
            <div class="pull-right">
                <hr>
                <a class="btn btn-success" href="http://careers.ikejaelectric.com/ie/applicant/job-application">View All</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection