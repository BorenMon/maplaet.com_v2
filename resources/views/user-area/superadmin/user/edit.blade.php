@extends('layouts.superadmin.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;Edit {{ $user->name }} In {{ $adminPage->name }}
@endsection

@section('content')

  <form action="{{ route('superadmin.user.update', ['user' => $user->id, 'adminPage' => $adminPage->id]) }}" class="p-4 bg-white rounded-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" method="POST">
    @csrf
    @method('PUT')
    <div class="label-input">
      <label for="role" class="font-semibold">Role</label>
      <select name="role" id="role" class="mt-2">
        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
      </select>
      @error('role')
      <small class="text-maplaet-4 error">{{ $message }}</small>
      @enderror
    </div>
    <div class="md:col-span-2"></div>
    <div class="md:col-span-3">
      <label class="font-semibold">Brand Page Privileges</label>
      <div class="flex mt-2 space-x-4">
        @foreach ($adminPage->brand_pages as $page)
        <div class="flex items-center space-x-2">
          <input class="form-control" type="checkbox" id="{{ $page->name }}" name="{{ $page->folder_name }}" {{ isset($user->accessible_pages_id) && in_array($page->id, $user->accessible_pages_id) ? 'checked' : '' }}><label for="{{ $page->name }}">{{ $page->name }}</label>
        </div>
        @endforeach
      </div>
    </div>
    <button type="submit" class="btn w-fit bg-maplaet-1">Update</button>
  </form>

@endsection
