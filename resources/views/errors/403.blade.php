{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

@extends('errors.new-layout')

@section('src')
  {{ asset('assets/general-assets/images/errors/403 Error Forbidden-pana.svg') }}
@endsection