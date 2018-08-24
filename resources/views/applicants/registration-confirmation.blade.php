@extends('layouts.app')

@section('content')
    @include('partials._section', ['action' => 'REGISTRATION COMPLETE'])
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <p>Dear {{$applicant->fullName}},</p>
                <h3>{{$message}}</h3>
            </div>
        </div>
    </div>
@endsection