@extends('layouts.email')

@section('content')
    <h1>Thank you for joining us, {{ ucfirst($name) }} !</h1>
    <p>Please click on the link below to activate your account:</p>
    <a href="{{ activation_url($token, $email) }}">Confirm</a>
@endsection