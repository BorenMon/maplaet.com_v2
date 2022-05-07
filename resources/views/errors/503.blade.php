{{-- @extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable')) --}}

@extends('errors.new-layout')

@section('src')
  {{ asset('assets/general-assets/images/errors/503 Error Service Unavailable-pana.svg') }}
@endsection