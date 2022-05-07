@extends('layouts.superadmin.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;Add New Artwork Category To {{ $brandPage->name }}
@endsection

@section('content')

  <form action="{{ route('superadmin.artwork-category.store') }}" class="p-4 bg-white rounded-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" method="POST">
    @csrf
    <input type="number" value="{{ $brandPage->id }}" name="brand_page_id" class="hidden">
    <div class="label-input">
      <label for="name" class="font-semibold">Name</label>
      <input type="text" id="name" name="name" class="mt-2" value="{{ old('name') }}">
      @error('name')
      <small class="text-maplaet-4 error">{{ $message }}</small>
      @enderror
    </div>
    <div class="label-input">
      <label for="folder_name" class="font-semibold">Folder Name</label>
      <input type="text" id="folder_name" name="folder_name" class="mt-2" value="{{ old('folder_name') }}">
      @error('folder_name')
      <small class="text-maplaet-4 error">{{ $message }}</small>
      @enderror
    </div>
    <div></div>
    <button type="submit" class="btn w-fit bg-maplaet-1">Add</button>
  </form>

@endsection
