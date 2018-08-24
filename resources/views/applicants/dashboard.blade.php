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

                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs btn-success">
                                <a href="http://careers.ikejaelectric.com/ie/applicants/my-profile/edit" id="edit-profile" class='text-white'>
                                    <i class="fa fa-pencil-square-o"></i> Edit Data</a></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content no-padding">
                    <table class="table table-hover table-striped table-bordered table-highlight-head text-primary">

                        <tbody>
                        <tr>
                            <td><strong>Last Name</strong></td>
                            <td><strong>First Name</strong></td>
                            <td><strong>Other Names</strong></td>
                        </tr>
                        <tr>
                            <td style="color: #818a91;">AFOLABI</td>
                            <td style="color: #818a91;">OLATUNJI</td>
                            <td style="color: #818a91;">IBUKUN</td>
                        </tr>
                        <tr>
                            <td><strong>Sex</strong></td>
                            <td><strong>Date Of Birth</strong></td>
                            <td><strong>Alt. Email</strong></td>
                        </tr>
                        <tr>
                            <td style="color: #818a91;">Male</td>
                            <td style="color: #818a91;">08/11/1989</td>
                            <td style="color: #818a91;"></td>
                        </tr>
                        <tr>
                            <td><strong>Phone No.</strong></td>
                            <td><strong>State Of Origin</strong></td>
                            <td><strong>LGA</strong></td>
                        </tr>
                        <tr>
                            <td style="color: #818a91;">07062415800</td>
                            <td style="color: #818a91;"></td>
                            <td style="color: #818a91;"></td>
                        </tr>
                        <tr>
                            <td><strong>Country of Residence</strong></td>
                            <td><strong>State of Residence</strong></td>
                            <td><strong>City of Residence</strong></td>
                        </tr>
                        <tr>
                            <td style="color: #818a91;">Nigeria</td>
                            <td style="color: #818a91;">Lagos</td>
                            <td style="color: #818a91;"></td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td><strong>Home Town</strong></td>
                            <td><strong>Country Of Origin</strong></td>
                        </tr>
                        <tr>
                            <td style="color: #818a91;">13, ONANUBI STREET, OFF JONATHAN COKER ROAD, NEW OKO OBA, AGEGE</td>
                            <td style="color: #818a91;">IDO</td>
                            <td style="color: #818a91;">Nigeria</td>
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
