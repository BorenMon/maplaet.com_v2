@extends('layouts.normal-user.app')
@section('header', 'Home')

@section('css')
  <style>
    .swiper {
      width: 100%;
    }
    .swiper .swiper-slide {
      cursor: pointer;
    }
    .swiper-slide .box {
      width: 100%;
      padding-top: 100%;
      position: relative;
    }
    .swiper-slide .box img {
      position: absolute;
      top: 50%;
      left: 50%;
      max-height: 100%;
      max-width: 100%;
      --tw-translate-x: -50%;
      --tw-translate-y: -50%;
      transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }
    .swiper-button-prev {
      background-image: url("/assets/general-assets/images/chevron-left-solid.svg");
      background-size: 1.1rem;
      background-repeat: no-repeat;
      background-position: center;
      left: 0;
    }
    .swiper-button-prev::after {
      content: none;
    }
    .swiper-button-next {
      background-image: url("/assets/general-assets/images/chevron-right-solid.svg");
      background-size: 1.1rem;
      background-repeat: no-repeat;
      background-position: center;
      right: 0;
    }
    .swiper-button-next::after {
      content: none;
    }

    * {
      transition: 0.21s linear all;
    }
    .brand-page {
      opacity: 50%;
    }
    .brand-page.active {
      opacity: 100%;
      box-shadow: 0 0 7px rgba(0,0,0,0.05);
    }

    @media(max-width: 1200px) {
      #_1 {
        flex-direction: row;
        grid-column: span 4 / span 4;
      }
      #_1 .brand-page {
        margin-bottom: 0;
        margin-right: 1rem;
        min-width: 150px;
      }

      #_2 {
        grid-column: span 4 / span 4;
      }
    }
  </style>
@endsection

@section('content')
  <div class="grid grid-cols-4 gap-4">
    <div class="flex flex-col overflow-auto" id="_1">
      @php($i = 0)
      @foreach ($brandPages as $page)
      <div class="bg-white p-4 rounded-lg flex items-center cursor-pointer brand-page {{ $i == 0 ? 'active' : '' }} mb-4">
        <img
        @if (str_contains($page->logo_url, 'public/'))
        src="{{ Storage::url($page->logo_url) }}"
        @else
        src="{{ asset($page->logo_url) }}"
        @endif
        alt="" class="h-12 w-20 object-contain object-center mr-4">
        <span class="font-semibold text-lg truncate" style="width: calc(100% - 6rem);">{{ $page->name }}</span>
      </div>
      @php($i++)
      @endforeach
    </div>
    @php($i = 0)
    <div class="col-span-3" id="_2">
      @foreach ($brandPages as $page)
      <div class="bg-white p-6 rounded-lg h-fit mb-4 brand-page-artworks {{ $i == 0 ? '' : 'hidden' }}">
        @php($j = 0)
        @foreach ($page->artworkCategories as $category)
        <div class="font-semibold text-maplaet-1 text-center text-xl">{{ $category->name }}</div>
        <div class="swiper">
          <div class="swiper-wrapper mt-6 mb-12" style="{{ $j == count($page->artworkCategories) - 1 ? 'margin-bottom: 0 !important;' : '' }}">
              @foreach ($category->artworks as $artwork)
              <div class="swiper-slide">
                  <div class="box">
                      <a href="{{ route('artwork-preview', ['id' => $artwork->id]) }}" class="artwork-preview">
                          <img
                          @if (str_contains($artwork->image_preview_url, 'public/'))
                          src="{{ Storage::url($artwork->image_preview_url) }}"
                          @else
                          src="{{ asset($artwork->image_preview_url) }}"
                          @endif
                          alt="" class="border border-dashed">
                      </a>
                  </div>
              </div>
              @endforeach
          </div>
          @php($j++)
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        @if ($j != count($page->artworkCategories))
        <hr class="mb-6">
        @endif
        @endforeach
      </div>
      @php($i++)
      @endforeach
    </div>
  </div>
@endsection

@section('js')
    <script>
      new Swiper(".swiper", {
          slidesPerView: 3,
          spaceBetween: 35,
          navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },
          breakpoints: {
              // when window width is >= 320px
              320: {
              slidesPerView: 1,
              spaceBetween: 20
              },
              // when window width is >= 480px
              480: {
              slidesPerView: 2,
              spaceBetween: 30
              },
              // when window width is >= 900px
              900: {
              slidesPerView: 3,
              spaceBetween: 40
              }
          }
      })

      $('.brand-page').on('click', function(){
        $('.brand-page').each(function(){
          $(this).removeClass('active')
        })
        $('.brand-page-artworks').each(function(){
          $(this).addClass('hidden')
        })
        $(this).addClass('active')
        $($('.brand-page-artworks')[$('.brand-page').index(this)]).removeClass('hidden')
      })
    </script>
@endsection
