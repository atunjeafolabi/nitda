@extends('layouts.app')

@section('styles')
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    @include('partials._section', ['action' => 'Academic Records'])
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('partials._alert')
                <div class="card" id="olevelCard">
                    <h5 class="card-header text-dark-green">
                        O Level Information
                        <span class="pull-right">
                            <a href="#addOLevelModal" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-plus"></i> <span>Add</span></a>						
                        </span>
                    </h5>
                    <div class="card-body">
                        <table id="o-level-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Certificate Type</th>
                                    <th>Date Obtained</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($olevel_records as $olevel_record)
                                <tr>
                                    <td>{{$olevel_record->certificate_type}}</td>
                                    <td>{{$olevel_record->date_issued}}</td>
                                    <td class="text-center">
                                        <a href="{{asset('storage/' . $olevel_record->certificate_path)}}" class="text-success" target="_blank" title="View Document"><i class="fa fa-eye" style="font-size:20px;"></i></a>
                                        <a href="#deleteOLevelModal" class="text-danger delete" title='Delete Record' data-toggle="modal" 
                                           onclick='$("#deleteOLevelModal form").attr("action", "{{route('academic-records.deleteOLevel', ['id' => $olevel_record->id])}}"); return false;'>
                                            <i class='fa fa-trash-o' style="font-size:20px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                  </div>
                </div>
            </div>
        </div>
        
	<!-- Add O-Level Modal -->
	<div id="addOLevelModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id='addOLevelForm' action='{{route('academic-records.addOLevel')}}' enctype="multipart/form-data">
                        <div class="modal-header">						
                                <h4 class="modal-title text-dark-green">Add O Level Information</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <div class="form-group">
                                    <label for='Certificate_type'>Certificate Type</label>
                                    <select class="form-control" id='certificate_type' name="certificate_type">
                                        <option value=''>- - Please Select - -</option>
                                        <option value='WAEC'>WAEC</option>
                                        <option value='NECO'>NECO</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for='date_obtained'>Date Obtained</label>
                                <input type="date" class="form-control" id='date_issued' name="date_issued">
                            </div>
                            <div class="form-group">
                                <label for='certificate_path'>Upload Certfifcate</label>
                                <input type="file" class="form-control" id='certificate_path' name='certificate_path'>
                            </div>					
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
	</div> <!--end of add O-Level Modal-->  
        
	<!-- Delete OLevel Modal HTML -->
	<div id="deleteOLevelModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="modal-header">						
                                <h4 class="modal-title text-dark-green">Delete OLevel Record</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                                <p>Are you sure you want to delete this Record?</p>
                                <p class="text-danger"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
	</div>  <!--end of Delete O-Level Modal-->  
        
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="tertiaryCard">
                    <h5 class="card-header text-dark-green">
                        Tertiary Institution Information
                        <span class="pull-right">
                            <a href="#addTertiaryInfoModal" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-plus"></i> <span>Add</span></a>						
                        </span>
                    </h5>
                    <div class="card-body">
                        <table id="tertiary-info-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name of Institution</th>
                                    <th>Certificate Type</th>
                                    <th>Course</th>
                                    <th>Class of Degree</th>
                                    <th>Year Obtained</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($localTertiaryRecords as $localTertiaryRecord)
                                <tr>
                                    <td>{{$localTertiaryRecord->tertiaryInstitution->name}}</td>
                                    <td>{{$localTertiaryRecord->degree->type}}</td>
                                    <td>{{$localTertiaryRecord->course->name}}</td>
                                    <td>{{$localTertiaryRecord->grade->class}}</td>
                                    <td>{{$localTertiaryRecord->end_date}}</td>
                                    <td class="text-center">
                                        <a href="{{asset('storage/' . $localTertiaryRecord->degree_path)}}" class="text-success" target="_blank" title="View Document"><i class="fa fa-eye" style="font-size:20px;"></i></a>
                                        <a href="#deleteTertiaryInfoModal" class="text-danger delete" title='Delete Record' data-toggle="modal" 
                                           onclick='$("#deleteTertiaryInfoModal form").attr("action", "{{route('academic-records.deleteTertiaryInfo', ['id' => $localTertiaryRecord->id])}}"); return false;'>
                                            <i class='fa fa-trash-o' style="font-size:20px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                <!--International Institution Records-->
                                @foreach($internationalTertiaryRecords as $internationalTertiaryRecord)
                                <tr>
                                    <td>{{$internationalTertiaryRecord->tertiary_institution}}</td>
                                    <td>{{$internationalTertiaryRecord->degree->type}}</td>
                                    <td>{{$internationalTertiaryRecord->course_of_study}}</td>
                                    <td>{{$internationalTertiaryRecord->grade}}</td>
                                    <td>{{$internationalTertiaryRecord->end_date}}</td>
                                    <td class="text-center">
                                        <a href="{{asset('storage/' . $internationalTertiaryRecord->degree_path)}}" class="text-success" target="_blank" title="View Document"><i class="fa fa-eye" style="font-size:20px;"></i></a>
                                        <a href="#deleteTertiaryInfoModal" class="text-danger delete" title='Delete Record' data-toggle="modal" 
                                           onclick='$("#deleteTertiaryInfoModal form").attr("action", "{{route('academic-records.deleteTertiaryInfo', ['id' => $internationalTertiaryRecord->id, 'intl'=>'yes'])}}"); return false;'>
                                            <i class='fa fa-trash-o' style="font-size:20px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                  </div>
                </div>
            </div>
        </div>
        
	<!-- Add Tertiary Info Modal -->
	<div id="addTertiaryInfoModal" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id='addTertiaryInfoForm' action='{{route('academic-records.addTertiaryInfo')}}'>
                        <div class="modal-header">						
                            <h4 class="modal-title text-dark-green">Add Tertiary Institution Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for='country'>Country of Institution</label>
                                <select class="form-control" id='country' name="country">
                                    <option value=''>- - Please Select - -</option>
                                    <!--Select Nigeria by default-->
                                    @foreach($countries as $country)
                                    <option value='{{$country->id}}' {{$country->name == 'Nigeria' ? 'selected' : ''}}>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for='name_of_institution'>Name of Institution</label>
                                <select class="form-control" id='name_of_institution' name="name_of_institution">
                                    <option value=''>- - Please Select - -</option>
                                    @foreach($tertiary_institutions as $tertiary_institution)
                                    <option value='{{$tertiary_institution->id}}'>{{$tertiary_institution->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for='course_of_study'>Course of Study</label>
                                <select class="form-control" id='course_of_study' name="course_of_study">
                                    <option value=''>- - Please Select - -</option>
                                    @foreach($courses as $course)
                                    <option value='{{$course->id}}'>{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for='degree_type'>Degree Type</label>
                                <select class="form-control" id='degree_type' name="degree_type">
                                    <option value=''>- - Please Select - -</option>
                                    @foreach($degrees as $degree)
                                    <option value='{{$degree->id}}'>{{$degree->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for='start_date'>Start Date</label>
                                <input type="date" class="form-control" id='start_date' name="start_date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for='end_date'>End Date</label>
                                <input type="date" class="form-control" id='end_date' name="end_date">
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for='degree_path'>Upload Certfifcate</label>
                                <input type="file" class="form-control" id='degree_path' name='degree_path'>
                            </div>
                            <div class="form-group col-md-6">
                                <label for='grade'>Grade</label>
                                <select class="form-control" id='grade' name="grade">
                                    <option value=''>- - Please Select - -</option>
                                    @foreach($grades as $grade)
                                    <option value='{{$grade->id}}'>{{$grade->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
	</div> <!--end of add Tertiary Info Modal--> 
        
	<!-- Delete TertiaryInfo Modal HTML -->
	<div id="deleteTertiaryInfoModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="modal-header">						
                                <h4 class="modal-title text-dark-green">Delete Tertiary Institution Record</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                                <p>Are you sure you want to delete this Record?</p>
                                <p class="text-danger"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
	</div>  <!--end of Delete TertiaryInfo Modal-->  
        
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#o-level-table').DataTable();
            $('#tertiary-info-table').DataTable();
        } );
        
        //add the csrf token to all ajax requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        //======Submit O-Level form via ajax=======
        $('form#addOLevelForm').submit(function(e){
            e.preventDefault();
            var allInputs = $("form#addOLevelForm input[type=text],form#addOLevelForm input[type=date],form#addOLevelForm input[type=file], form#addOLevelForm select");
            var fd = formData('form#addOLevelForm', allInputs);
            
            var url = "{{ route('academic-records.addOLevel') }}";
            submitForm(fd,url,'addOLevelModal','o-level-table','addOLevelForm');
        });
        
        //======Submit Tertiary Information form via ajax======
        $('form#addTertiaryInfoForm').submit(function(e){
            e.preventDefault();
            var allInputs = $("form#addTertiaryInfoForm input[type=text],form#addTertiaryInfoForm input[type=date],form#addTertiaryInfoForm input[type=hidden],form#addTertiaryInfoForm input[type=file], form#addTertiaryInfoForm select");
            var fd = formData('form#addTertiaryInfoForm', allInputs);
            
            var url = "{{ route('academic-records.addTertiaryInfo') }}";
            submitForm(fd,url,'addTertiaryInfoModal','tertiary-info-table','addTertiaryInfoForm');
        }); 
        
        function submitForm(fd,url,modalId,table,form){
            $.ajax({
                method: "POST",
                url: url,
                contentType: false,
                cache: false,
                processData:false,
                data: fd
            }).done(function(result){
                console.log(result);
                //if there are validation errors from server
                if(result.errors){
                    
                    //clear all previously existing errors for new errors
                    $('#' + modalId + ' .invalid-feedback').remove();
                    $('#' + modalId + ' .is-invalid').removeClass('is-invalid');
                    
                    for (var key in result.errors){
                        var selector = "[name='" + key + "']";
                        
                        $(selector).addClass('is-invalid');
                        $(selector).after(function(){return '<div class="invalid-feedback">' + result.errors[key][0] + '</div>';});
                    }
                }else{
                    if(result == 1){
                        $('#'+modalId).modal('hide');
                        $('#'+table).before('<div class="alert alert-success alert-dismissible fade show" role="alert">Record Successfully Added</div>');
                        setTimeout(function(){$('.alert-success').alert('close');}, 5000);
                        setTimeout(function(){location.reload(true);}, 7000);   //reload the page to reflect newly added record
                    }else{
                        $('#' + form + ' .alert').remove();  //hide p[revious alerts before showing new alerts to avoid duplicates 
                        $('#' + form + ' .modal-header').after('<div class="alert alert-danger alert-dismissible fade show" role="alert">Unable To Add Record. Try Again!</div>');
                        setTimeout(function(){$('.alert-danger').alert('close');}, 5000);
                    }
                }
            });            
        }
        
        function formData(form,inputs){
            var fd = new FormData(form);
            //loop through all input and select
            $.each(inputs, function(index, input){
                var id = input.id;
//                console.log(input.id);
                if(input.type  == "file"){
                    var fileObj = $('#'+id)[0].files[0];
                    fd.append(id,fileObj);
                }else{
                    fd.append(id, $('#'+id).val());
                }
            });

            return fd;
        }
    </script>
    
    <!--Change select input to text input for international universities-->
    <script>
        var name_of_institution_select_tag = $('#addTertiaryInfoModal #name_of_institution').clone();
        var course_of_study_select_tag = $('#addTertiaryInfoModal #course_of_study').clone();
        var certificate_type_select_tag = $('#addTertiaryInfoModal #certificate_type').clone();
        var grade_select_tag = $('#addTertiaryInfoModal #grade').clone();

        $('#addTertiaryInfoModal #country').on('change', function(){

            if($(this).find('option:selected').text() !== 'Nigeria'){
                $('#addTertiaryInfoModal #name_of_institution').replaceWith('<input type="text" class="form-control" id="name_of_institution" name="name_of_institution" placeholder="Enter Name of Institution">');
                $('#addTertiaryInfoModal #course_of_study').replaceWith('<input type="text" class="form-control" id="course_of_study" name="course_of_study" placeholder="Enter Course of Study">');
                $('#addTertiaryInfoModal #certificate_type').replaceWith('<input type="text" class="form-control" id="certificate_type" name="certificate_type"  placeholder="Enter Certificate Type Obtained">');
                $('#addTertiaryInfoModal #grade').replaceWith('<input type="text" class="form-control" id="grade" name="grade" placeholder="Enter Grade Class e.g(Summa Cum Laude)">');
                
                $('#addTertiaryInfoModal form input[name="international"]').remove();
                $('#addTertiaryInfoModal form').append('<input type="hidden" id="international" name="international" value="1">');
                
            }else{
                $('#addTertiaryInfoModal #name_of_institution').replaceWith(name_of_institution_select_tag[0]);
                $('#addTertiaryInfoModal #course_of_study').replaceWith(course_of_study_select_tag[0]);
                $('#addTertiaryInfoModal #certificate_type').replaceWith(certificate_type_select_tag[0]);
                $('#addTertiaryInfoModal #grade').replaceWith(grade_select_tag[0]);
                $('#addTertiaryInfoModal form input[name="international"]').remove();
            }
        });
    </script>
@endsection