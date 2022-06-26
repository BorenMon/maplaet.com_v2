{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

@extends('errors.new-layout')

@section('src')
  {{ asset('assets/general-assets/images/errors/403 Error Forbidden-pana.svg') }}
@endsection

@section('addition')
<form method="POST" action="{{ route('logout') }}">
  @csrf

  <button type="submit" style="border: none; border-radius: 21px; padding: 15px 21px; font-size: 21px; color: #0a254d; font-weight: bold; cursor: pointer; margin-top: 21px;">
      Refresh Page
  </button>
</form>
@endsection