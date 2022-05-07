@extends('layouts.superadmin.app')
@section('header', 'Manage Admin Pages')

@section('css')
    <style>
        @media(max-width: 600px){
            #_1{
                margin-top: 1rem;
            }
        }

        @media(max-width: 405.5px){
            #_2{
                margin-top: 1rem;
            }
        }
    </style>
@endsection

@section('content')
  
    <div class="mb-3 flex flex-wrap justify-between items-center">
      <h2 class="text-xl font-semibold mr-4">Admin Pages</h2>
      <div class="flex flex-wrap" id="_1">
        <form action="{{ route('superadmin.admin-page.search') }}" class="relative mr-4" method="POST">
            @csrf
            <input type="text" style="padding-right: 3rem !important;" placeholder="Search" name="search_term">
            <i class="fa-solid fa-magnifying-glass absolute top-1/2 -translate-y-1/2 right-4 cursor-pointer active:scale-90" onclick="this.closest('form').submit()"></i>
        </form>
        <a id="_2" href="{{ route('superadmin.admin-page.create') }}" class="btn bg-maplaet-1">Add New</a>
      </div>
    </div>
    @if (!empty($search_term))
    <div class="my-2">Results of "{{ $search_term }}"</div>
    @endif
    @if (count($admin_pages))
    <table class="table p-4 bg-white shadow rounded-lg w-full">
      <thead>
          <tr>
            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                #
            </th>
            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                Logo
            </th>
            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                Name
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
        @foreach ($admin_pages as $page)
        <tr>
        <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
            {{ $i++; }}
        </td>
        <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
            <img
            src="
            @if (str_contains($page->logo_url, 'public/'))
            {{ Storage::url($page->logo_url) }}
            @else
            {{ asset($page->logo_url) }}
            @endif
            " style="max-width: 55px; max-height: 55px;" alt="">
        </td>
        <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
            {{ $page->name }}
        </td>
        <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left space-x-4">
            <a href="{{ route('superadmin.admin-page.show', ['admin_page' => $page->id]) }}"><i class="fa-solid fa-eye text-maplaet-2" title="View"></i></a>
            <a href="{{ route('superadmin.admin-page.edit', ['admin_page' => $page->id]) }}"><i class="fa-solid fa-pen text-maplaet-3" title="Edit"></i></a>
            <form method="POST" action="{{ route('superadmin.admin-page.destroy', ['admin_page' => $page->id]) }}" class="inline">
                @csrf
                @method('DELETE')
                <i class="fa-solid fa-trash cursor-pointer text-maplaet-4" title="Delete" onclick="deleteHandler(this, '{{ $page->name }}')"></i>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-4">
        {{ $admin_pages->links() }}
    </div>
    @else
    <div class="p-4 rounded-lg w-full border-dashed border-2">
      No admin page is found.
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

        const deleteHandler = (el, pageName) => {
            Swal.fire({
                title: `Are you sure to delete "${pageName}" admin page?`,
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
