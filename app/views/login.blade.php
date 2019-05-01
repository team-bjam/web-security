@extends('layouts.form', [
    'form_action'    => 'login',
    'method'    => 'POST',
    'submit_button_label'   => 'Log in'
])

@section('form')

    @include('partials.inputs.text', [
        'name'  => 'email',
        'label' => 'Email',
        'type'  => 'email',
    ])

    @include('partials.inputs.text', [
        'name'  => 'password',
        'label' => 'Password',
        'type'  => 'password'
    ])
    
@endsection