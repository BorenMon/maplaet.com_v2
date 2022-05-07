@extends('layouts.superadmin.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;Edit {{ $artworkCategory->name }} In {{ $brandPage->name }}
@endsection

@section('content')

<form action="{{ route('superadmin.artwork-category.update', ['artwork_category' => $artworkCategory, 'brand_page_id' => $brandPage->id]) }}" class="p-4 bg-white rounded-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" method="POST">
  @csrf
  @method('PUT')
  <div class="label-input">
    <label for="name" class="font-semibold">Name</label>
    <input type="text" id="name" name="name" class="mt-2" value="{{ old('name', $artworkCategory->name) }}">
    @error('name')
    <small class="text-maplaet-4 error">{{ $message }}</small>
    @enderror
  </div>
  <div class="label-input">
    <label for="folder_name" class="font-semibold">Folder Name</label>
    <input type="text" id="folder_name" name="folder_name" class="mt-2" value="{{ old('folder_name', $artworkCategory->folder_name) }}">
    @error('folder_name')
    <small class="text-maplaet-4 error">{{ $message }}</small>
    @enderror
  </div>
  <div></div>
  <button type="submit" class="btn w-fit bg-maplaet-1">Update</button>
</form>

@endsection
