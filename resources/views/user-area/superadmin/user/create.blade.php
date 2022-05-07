@extends('layouts.superadmin.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;Add New User To {{ $adminPage->name }}
@endsection

@section('content')

  <form action="{{ route('superadmin.user.store') }}" class="p-4 bg-white rounded-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" method="POST">
    @csrf
    <input type="number" value="{{ $adminPage->id }}" name="admin_page_id" class="hidden">
    <div class="label-input">
      <label for="name" class="font-semibold">Name</label>
      <input type="text" id="name" name="name" class="mt-2" value="{{ old('name') }}">
      @error('name')
      <small class="text-maplaet-4 error">{{ $message }}</small>
      @enderror
    </div>
    <div class="label-input">
      <label for="email" class="font-semibold">Email</label>
      <input type="text" id="email" name="email" class="mt-2" value="{{ old('email') }}">
      @error('email')
      <small class="text-maplaet-4 error">{{ $message }}</small>
      @enderror
    </div>
    <div class="label-input">
      <label for="password" class="font-semibold">Password</label>
      <input type="password" id="password" name="password" class="mt-2">
      @error('password')
      <small class="text-maplaet-4 error">{{ $message }}</small>
      @enderror
    </div>
    <div class="label-input">
      <label for="password_confirmation" class="font-semibold">Password Confirmation</label>
      <input type="password" id="password_confirmation" name="password_confirmation" class="mt-2">
    </div>
    <div class="label-input">
      <label for="role" class="font-semibold">Role</label>
      <select name="role" id="role" class="mt-2">
        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
      </select>
      @error('role')
      <small class="text-maplaet-4 error">{{ $message }}</small>
      @enderror
    </div>
    <div></div>
    <button type="submit" class="btn w-fit bg-maplaet-1">Add</button>
  </form>

@endsection
