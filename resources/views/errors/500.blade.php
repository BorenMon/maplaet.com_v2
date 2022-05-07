{{-- @extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error')) --}}

@extends('errors.new-layout')

@section('src')
  {{ asset('assets/general-assets/images/errors/500 Internal Server Error-pana.svg') }}
@endsection