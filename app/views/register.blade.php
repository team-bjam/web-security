@extends('layouts.form', [
    'form_action'    => 'register',
    'method'    => 'POST',
    'submit_button_label'   => 'Register'
])

@section('form')

    @include('partials.inputs.text', [
        'name'  => 'first_name',
        'label' => 'First name'
    ])

    @include('partials.inputs.text', [
        'name'  => 'last_name',
        'label' => 'Last name'
    ])

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
    @include('partials.inputs.text', [
        'name'  => 'password_confirmation',
        'label' => 'Confirm password',
        'type'  => 'password'
    ])
@endsection