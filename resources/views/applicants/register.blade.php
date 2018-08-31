@extends('layouts.app')

@section('content')
@include("partials._section", ["action" => "APPLICANTS NEW REGISTRATION"])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('applicant.register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

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
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

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
                                <input id="othername" type="text" class="form-control{{ $errors->has('othername') ? ' is-invalid' : '' }}" name="othername" value="{{ old('othername') }}">

                                @if ($errors->has('othername'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('othername') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 text-md-right checkbox-inline">Sex</label>

                            <div class="col-md-6">
                                <label for="male">Male</label> <input id="male" type="radio" name="sex" value="male" <?= old('sex') == 'male' ? 'checked' : '' ?>>
                                <label for="female">Female</label> <input id="female" type="radio" name="sex" value="female" <?= old('sex') == 'female' ? 'checked' : '' ?>>

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
                                    <option value='{{$state->id}}' {{ old('origin_state') == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
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
                                <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>

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
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

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
                                <textarea id="address_of_residence" class="form-control{{ $errors->has('address_of_residence') ? ' is-invalid' : '' }}" name="address_of_residence" required>{{ old('address_of_residence') }}</textarea>

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
                                    <option value='{{$state->id}}' {{ old('state_of_residence') == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
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
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
        var oldLGA = {{old('origin_lga') == null ? 0 : old('origin_lga')}};
        
        loadLGA(selected_state_id, lgaElement, oldLGA);
    });
    
    $("#state_of_residence").change(function(){
        
        var selected_state_id = $(this).val();
        var lgaElement = $('#lga_of_residence');
        var oldLGA = {{old('lga_of_residence')== null ? 0 : old('lga_of_residence')}};
        
        loadLGA(selected_state_id, lgaElement, oldLGA);
    });
    
    $(window).on('load', function(){
        
        var oldOriginLga = {{old('origin_lga') == null ? 0 : old('origin_lga')}};
        var oldLgaOfResidence = {{old('lga_of_residence') == null ? 0 : old('lga_of_residence')}};
        
        if(oldOriginLga !== 0){
            var lgaElement = $('#origin_lga');
            var selected_state_id = $('#origin_state').val();
            var oldLGA = {{old('origin_lga') != null ? old('origin_lga') : 0}};
            
            loadLGA(selected_state_id, lgaElement, oldLGA);
        }
        
        if(oldLgaOfResidence !== 0){
            var lgaElement = $('#lga_of_residence');
            var selected_state_id = $('#state_of_residence').val();
            var oldLGA = {{ old('lga_of_residence') != null ? old('lga_of_residence') : 0 }};
            
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