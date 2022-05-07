@extends('layouts.normal-user.app')
@section('header', 'Manage Users')

@section('css')
  <style>
    
  </style>
@endsection

@section('content')
<div class="bg-white p-8 rounded-lg flex flex-col">
  <div class="mb-4 flex flex-wrap justify-between items-center">
      <span class="text-lg font-semibold">Users</span>
      <a href="{{ route('user.create') }}" class="btn bg-maplaet-1">Add New</a>
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
                Email
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
          {{ $user->email }}
        </td>
        <td class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-left space-x-4">
            <a href="{{ route('user.edit', ['user' => $user->id]) }}"><i class="fa-solid fa-pen text-maplaet-3" title="Edit"></i></a>
            <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" class="inline">
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
