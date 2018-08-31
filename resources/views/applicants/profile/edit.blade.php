@extends('layouts.app')

@section('content')
@include("partials._section", ["action" => "EDIT ACCOUNT INFORMATION"])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('applicant.profile.edit') }}" aria-label="{{ __('Edit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ $applicant->firstname }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $applicant->lastname }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="othername" class="col-md-4 col-form-label text-md-right">{{ __('Other Name') }}</label>

                            <div class="col-md-6">
                                <input id="othername" type="text" class="form-control{{ $errors->has('othername') ? ' is-invalid' : '' }}" name="othername" value="{{ $applicant->othername }}">

                                @if ($errors->has('othername'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('othername') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <span class="text-muted">{{ $applicant->email }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-md-right checkbox-inline">Sex</label>

                            <div class="col-md-6">
                                <label for="male">Male</label> <input id="male" type="radio" name="sex" value="male" <?= $applicant->sex == 'male' ? 'checked' : '' ?>>
                                <label for="female">Female</label> <input id="female" type="radio" name="sex" value="female" <?= $applicant->sex == 'female' ? 'checked' : '' ?>>

                                @if ($errors->has('sex'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="origin_state" class="col-md-4 col-form-label text-md-right">{{ __('State of Origin') }}</label>

                            <div class="col-md-6">
                                <select id="origin_state" class="form-control{{ $errors->has('origin_state') ? ' is-invalid' : '' }}" name="origin_state" required>
                                    <option value=''>- Select State -</option>
                                <?php foreach($states as $key => $state){ ?>
                                    <option value='{{$state->id}}' {{ $applicant->origin_state == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
                                <?php } ?>
                                ?>
                                </select>
                                @if ($errors->has('state_origin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('origin_state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="origin_lga" class="col-md-4 col-form-label text-md-right">{{ __('Origin LGA') }}</label>

                            <div class="col-md-6">
                                <select id="origin_lga" class="form-control{{ $errors->has('origin_lga') ? ' is-invalid' : '' }}" name="origin_lga" required>
                                    <option value=''>- Select LGA-</option>
                                </select>
                                @if ($errors->has('origin_lga'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('origin_lga') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ $applicant->dob }}" required>

                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $applicant->phone }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label for="address_of_residence" class="col-md-4 col-form-label text-md-right">Residential Address</label>

                            <div class="col-md-6">
                                <textarea id="address_of_residence" class="form-control{{ $errors->has('address_of_residence') ? ' is-invalid' : '' }}" name="address_of_residence" required>{{ $applicant->address_of_residence }}</textarea>

                                @if ($errors->has('address_of_residence'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_of_residence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                        <div class="form-group row">
                            <label for="state_of_residence" class="col-md-4 col-form-label text-md-right">{{ __('State of Residence') }}</label>

                            <div class="col-md-6">
                                <select id="state_of_residence" class="form-control{{ $errors->has('state_of_residence') ? ' is-invalid' : '' }}" name="state_of_residence" required>
                                    <option value=''>- Select State-</option>
                                <?php foreach($states as $key => $state){ ?>
                                    <option value='{{$state->id}}' {{ $applicant->state_of_residence == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
                                <?php } ?>
                                ?>
                                </select>
                                @if ($errors->has('state_of_residence'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state_of_residence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                            
  
                        <div class="form-group row">
                            <label for="lga_of_residence" class="col-md-4 col-form-label text-md-right">{{ __('LGA of Residence') }}</label>

                            <div class="col-md-6">
                                <select id="lga_of_residence" class="form-control{{ $errors->has('lga_of_residence') ? ' is-invalid' : '' }}" name="lga_of_residence" value="{{ old('lga_of_residence') }}" required>
                                    <option value=''>- Select LGA-</option>
                                </select>
                                @if ($errors->has('lga_of_residence'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lga_of_residence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class='fa fa-save'></i> {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type='text/javascript'>
//    var states = <?//= json_encode($states) ?>;
    var lgas = <?= json_encode($lgas) ?>;
    
    $("#origin_state").change(function(){
        
        var selected_state_id = $(this).val();
        var lgaElement = $('#origin_lga');
        var oldLGA = {{$applicant->origin_lga}};
        
        loadLGA(selected_state_id, lgaElement, oldLGA);
    });
    
    $("#state_of_residence").change(function(){
        
        var selected_state_id = $(this).val();
        var lgaElement = $('#lga_of_residence');
        var oldLGA = {{$applicant->lga_of_residence}};
        
        loadLGA(selected_state_id, lgaElement, oldLGA);
    });
    
    $(window).on('load', function(){
        
        var oldOriginLga = {{$applicant->origin_lga}};
        var oldLgaOfResidence = {{$applicant->lga_of_residence}};
        
        if(oldOriginLga !== 0){
            var lgaElement = $('#origin_lga');
            var selected_state_id = $('#origin_state').val();
            var oldLGA = {{$applicant->origin_lga}};
            
            loadLGA(selected_state_id, lgaElement, oldLGA);
        }
        
        if(oldLgaOfResidence !== 0){
            var lgaElement = $('#lga_of_residence');
            var selected_state_id = $('#state_of_residence').val();
            var oldLGA = {{ $applicant->lga_of_residence }};
            
            loadLGA(selected_state_id, lgaElement, oldLGA);
        }
        
    });
    
    function loadLGA(selected_state_id, lgaElement, oldLGA){
        
        //clear select in order to repopulate
        lgaElement.empty();
        
        lgas.forEach(function (lga) {

            if(lga.state_id == selected_state_id){
                var select = (oldLGA==lga.id ? 'selected' : '');
                lgaElement.append("<option value='" + lga.id + "'" + select + ">" + lga.name + "</option>");
            }

        });
    }
    
</script>    
@endsection