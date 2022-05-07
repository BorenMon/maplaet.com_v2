@extends('layouts.superadmin.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }}'s Artworks
@endsection

@section('css')
    <style>
        
    </style>
@endsection

@section('content')
  
<div class="bg-white p-4 rounded-lg flex flex-col h-fit mt-4">
    <div class="mb-4 flex flex-wrap justify-between items-center">
        <span class="text-lg font-semibold">Artwork Categories</span>
        <a href="{{ route('superadmin.artwork-category.create', ['brandPage' => $brandPage->id]) }}" class="btn bg-maplaet-1">Add New</a>
    </div>
    @if (count($brandPage->artworkCategories))
    <table class="table p-4 bg-white rounded-lg w-full">
        <thead>
            <tr>
              <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  #
              </th>
              <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  Name
              </th>
              <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  Folder Name
              </th>
              <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  Action
              </th>
            </tr>
        </thead>
        <tbody>
          @php
              $i = 1;
          @endphp
          @foreach ($brandPage->artworkCategories as $category)
          <tr>
          <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
              {{ $i++; }}
          </td>
          <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                {{ $category->name }}
          </td>
          <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                {{ $category->folder_name }}
          </td>
          <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left space-x-4">
              <a href="{{ route('superadmin.artwork-category.edit', ['artwork_category' => $category->id, 'brandPage' => $brandPage->id]) }}"><i class="fa-solid fa-pen text-maplaet-3" title="Edit"></i></a>
              <form method="POST" action="{{ route('superadmin.artwork-category.destroy', ['artwork_category' => $category->id]) }}" class="inline">
                  @csrf
                  @method('DELETE')
                  <i class="fa-solid fa-trash cursor-pointer text-maplaet-4" title="Delete" onclick="deleteHandler(this, '{{ $category->name }}')"></i>
              </form>
          </td>
          </tr>
          @endforeach
        </tbody>
    </table>
    @else
    No category is found.
    @endif
</div>

@if (count($brandPage->artworkCategories))
<div class="bg-white p-4 rounded-lg flex flex-col h-fit mt-8">
    <div class="mb-4 flex flex-wrap justify-between items-center">
        <span class="text-lg font-semibold">Artworks</span>
        <a href="{{ route('superadmin.artwork.create', ['brandPage' => $brandPage->id]) }}" class="btn bg-maplaet-1">Add New</a>
    </div>
    @php
        $artworksNumber = 0;
        foreach($brandPage->artworkCategories as $category) {
            foreach ($category->artworks as $artwork) {
                $artworksNumber++;
            }
        }
    @endphp
    @if ($artworksNumber)
    <table class="table p-4 bg-white rounded-lg w-full">
        <thead>
            <tr>
              <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  #
              </th>
              <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  Image Preview
              </th>
              <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  Category
              </th>
              <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  Number
              </th>
              <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  Action
              </th>
            </tr>
        </thead>
        <tbody>
          @php
              $i = 1;
          @endphp
          @foreach ($brandPage->artworkCategories as $category)
          @foreach ($category->artworks as $artwork)
          <tr>
            <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                {{ $i++; }}
            </td>
            <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                <img
                src="
                @if (str_contains($artwork->image_preview_url, 'public/'))
                {{ Storage::url($artwork->image_preview_url) }}
                @else
                {{ asset($artwork->image_preview_url) }}
                @endif
                " style="max-width: 77px; max-height: 77px;" alt="" class="border border-dashed">
            </td>
            <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  {{ $artwork->artworkCategory->name }}
            </td>
            <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                  {{ $artwork->number }}
            </td>
            <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left space-x-4">
                <a href="{{ route('superadmin.artwork.edit', ['artwork' => $artwork->id, 'brandPage' => $brandPage->id]) }}"><i class="fa-solid fa-pen text-maplaet-3" title="Edit"></i></a>
                <form method="POST" action="{{ route('superadmin.artwork.destroy', ['artwork' => $artwork->id]) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <i class="fa-solid fa-trash cursor-pointer text-maplaet-4" title="Delete" onclick="deleteHandler(this, 'artwork')"></i>
                </form>
            </td>
          </tr>
          @endforeach
          @endforeach
        </tbody>
    </table>
    @else
    No artwork is found.
    @endif
</div>
@endif

@endsection

@section('js')
<script>
if(sessionStorage.message) {
    const message = JSON.parse(sessionStorage.message)
    Swal.fire({
        title: message.title,
        text: message.text,
        icon: message.icon,
        showConfirmButton: false,
        timer: 1500,
    })
    sessionStorage.removeItem('message')
}

@if (session('title'))
Swal.fire({
    title: "{{ session('title') }}",
    text: "{{ session('text') }}",
    icon: "{{ session('icon') }}",
    showConfirmButton: false,
    timer: 1500,
})
@endif

const deleteHandler = (el, name) => {
    Swal.fire({
        title: `Are you sure to delete ${name}?`,
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0a254d',
        cancelButtonColor: '#eb4655',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            el.closest('form').submit()
        }
    })
}
</script>   
@endsection
