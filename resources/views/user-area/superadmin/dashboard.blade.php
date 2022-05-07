@extends('layouts.superadmin.app')
@section('header', 'Dashboard')

@section('css')
  <style>
    @media(max-width: 305px){
      i.text-maplaet-1 {
        display: none;
      }
    }
  </style>
@endsection

@section('content')
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="bg-white p-8 rounded-lg flex flex-wrap">
      <i class="fa-solid fa-sun text-maplaet-1 text-7xl mr-8"></i>
      <div>
        <div class="text-xl font-semibold leading-none mb-2">Admin Pages</div>
        <div class="text-5xl leading-none font-bold">{{ $adminPagesNum }}</div>
      </div>
    </div>
    <div class="bg-white p-8 rounded-lg flex flex-wrap">
      <i class="fa-solid fa-star text-maplaet-1 text-7xl mr-8"></i>
      <div>
        <div class="text-xl font-semibold leading-none mb-2">Brand Pages</div>
        <div class="text-5xl leading-none font-bold">{{ $brandPagesNum }}</div>
      </div>
    </div>
    <div class="bg-white p-8 rounded-lg flex flex-wrap">
      <i class="fa-solid fa-user text-maplaet-1 text-7xl mr-8"></i>
      <div>
        <div class="text-xl font-semibold leading-none mb-2">Users</div>
        <div class="text-5xl leading-none font-bold">{{ $usersNum }}</div>
      </div>
    </div>
    <div class="bg-white p-8 rounded-lg flex flex-wrap">
      <i class="fa-solid fa-image text-maplaet-1 text-7xl mr-8"></i>
      <div>
        <div class="text-xl font-semibold leading-none mb-2">Artworks</div>
        <div class="text-5xl leading-none font-bold">{{ $artworksNum }}</div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    
@endsection
