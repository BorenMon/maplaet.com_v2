@extends('layouts.superadmin.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $adminPage->name }}'s Info
@endsection

@section('css')
    <style>
        @media(max-width: 700px) {
            #_1 {
                margin-top: 1rem;
                width: calc(100% - 3rem) !important;    
            }
            #_2 {
                margin-top: 1rem;
            }
        }
    </style>
@endsection

@section('content')
  
    <div class="bg-white p-4 rounded-lg flex flex-wrap justify-between">
        <div class="w-52 h-52 border border-dashed flex items-center justify-center rounded-lg">
            <img
            src="
            @if (str_contains($adminPage->logo_url, 'public/'))
            {{ Storage::url($adminPage->logo_url) }}
            @else
            {{ asset($adminPage->logo_url) }}
            @endif
            " alt="" style="max-width: 77%; max-height: 77%;">
        </div>
        <div class="flex flex-col" style="width: calc(100% - 18rem);" id="_1">
            <div class="text-2xl font-bold mb-4">{{ $adminPage->name }}</div>
            <div class="flex flex-wrap"><div class="text-gray-500 w-32">Folder Name</div><div>{{ $adminPage->folder_name }}</div></div>
            <div class="flex flex-wrap"><div class="text-gray-500 w-32">Status</div><div>{{ $adminPage->is_active ? 'Active' : 'Inactive' }}</div></div>
        </div>
        <div class="flex flex-col space-y-2" id="_2">
            <a href="{{ route('superadmin.admin-page.edit', ['admin_page' => $adminPage->id]) }}" class="flex items-center justify-center rounded-lg w-8 h-8 bg-maplaet-3">
                <i class="fa-solid fa-pen text-white cursor-pointer"></i>
            </a>
            <form action="{{ route('superadmin.admin-page.destroy', ['admin_page' => $adminPage->id]) }}" method="POST" class="flex items-center justify-center rounded-lg w-8 h-8 bg-maplaet-4">
                @csrf
                @method('DELETE')
                <i class="fa-solid fa-trash text-white cursor-pointer" onclick="deleteHandler(this, '{{ $adminPage->name }}')"></i>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-4">
        <div class="lg:col-span-2">
            <div class="bg-white p-4 rounded-lg flex flex-col h-fit">
                <div class="mb-4 flex flex-wrap justify-between items-center">
                    <span class="text-lg font-semibold">Brand Pages</span>
                    <a href="{{ route('superadmin.brand-page.create', ['adminPage' => $adminPage->id]) }}" class="btn bg-maplaet-1">Add New</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($brandPages as $page)
                    <div class="flex items-center relative">
                        <div class="w-24 h-24 flex items-center justify-center mr-4">
                            <img
                            src="
                            @if (str_contains($page->logo_url, 'public/'))
                            {{ Storage::url($page->logo_url) }}
                            @else
                            {{ asset($page->logo_url) }}
                            @endif
                            " alt="" style="max-width: 70%; max-height: 70%;">
                        </div>
                        <div style="width: calc(100% - 7rem);">{{ $page->name }}</div>
                        <div class="absolute right-1 top-1 flex flex-col items-center justify-center h-full">
                            <a href="{{ route('superadmin.brand-page.show', ['brand_page' => $page->id]) }}"><i class="fa-solid fa-eye text-maplaet-2"></i></a>
                            <a href="{{ route('superadmin.brand-page.edit', ['brand_page' => $page->id]) }}"><i class="fa-solid fa-square-pen text-maplaet-3"></i></a>
                            <form method="POST" action="{{ route('superadmin.brand-page.destroy', ['brand_page' => $page->id]) }}">
                                @csrf
                                @method('DELETE')
                                <i class="fa-solid fa-circle-minus text-maplaet-4 cursor-pointer" title="Delete" onclick="deleteHandler(this, '{{ $page->name }}')"></i>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @if (!count($brandPages))
                    No brand page is found.
                    @endif
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg flex flex-col h-fit mt-4">
                <div class="mb-4 flex flex-wrap justify-between items-center">
                    <span class="text-lg font-semibold">Users</span>
                    <a href="{{ route('superadmin.user.create', ['adminPage' => $adminPage->id]) }}" class="btn bg-maplaet-1">Add New</a>
                </div>
                @if (count($users))
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
                              Role
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
                      @foreach ($users as $user)
                      <tr>
                      <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                          {{ $i++; }}
                      </td>
                      <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                        {{ $user->name }}
                      </td>
                      <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left">
                        {{ ucwords($user->role) }}
                      </td>
                      <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left space-x-4">
                          <a href="{{ route('superadmin.user.edit', ['user' => $user->id, 'adminPage' => $adminPage->id]) }}"><i class="fa-solid fa-pen text-maplaet-3" title="Edit"></i></a>
                          <form method="POST" action="{{ route('superadmin.user.destroy', ['user' => $user->id]) }}" class="inline">
                              @csrf
                              @method('DELETE')
                              <i class="fa-solid fa-trash cursor-pointer text-maplaet-4" title="Delete" onclick="deleteHandler(this, '{{ $user->name }}')"></i>
                          </form>
                      </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                @else
                No user is found.
                @endif
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg flex flex-col h-fit">
            <span class="text-lg font-semibold">Overall</span>
            <div class="flex lg:flex-col flex-wrap">
                <div class="flex items-center mt-4 mr-4">
                    <div class="w-20 h-20 rounded-lg flex items-center justify-center" style="background-color: rgba(10, 37, 77, 0.05);"><i class="fa-regular fa-star text-3xl"></i></div>
                    <div class="flex flex-col ml-4">
                        <span>Brand Pages</span>
                        <span class="text-4xl">{{ count($brandPages) }}</span>
                    </div>
                </div>
                <div class="flex items-center mt-4 mr-4">
                    <div class="w-20 h-20 rounded-lg flex items-center justify-center" style="background-color: rgba(10, 37, 77, 0.05);"><i class="fa-regular fa-user text-3xl"></i></div>
                    <div class="flex flex-col ml-4">
                        <span>Users</span>
                        <span class="text-4xl">{{ count($users) }}</span>
                    </div>
                </div>
                <div class="flex items-center mt-4 mr-4">
                    <div class="w-20 h-20 rounded-lg flex items-center justify-center" style="background-color: rgba(10, 37, 77, 0.05);"><i class="fa-regular fa-image text-3xl"></i></div>
                    <div class="flex flex-col ml-4">
                        <span>Artworks</span>
                        <span class="text-4xl">{{ $artworks }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
