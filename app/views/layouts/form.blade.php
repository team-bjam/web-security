@extends('layouts.app')

@section('content')
<form action="{{ $form_action }}" method={{ $method ?? 'GET' }}>

   @yield('form')

   <button type="submit">{{ $submit_button_label }}</button>

</form>
@endsection
