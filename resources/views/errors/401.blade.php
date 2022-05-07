{{-- @extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized')) --}}

@extends('errors.new-layout')

@section('src')
  {{ asset('assets/general-assets/images/errors/401 Error Unauthorized-pana.svg') }}
@endsection