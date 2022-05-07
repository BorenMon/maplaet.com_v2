@section('css')
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
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
    </script>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($artworkCategories as $artworkCategory)
                <div class="text-xl rounded-lg bg-maplaet-1 p-2 text-white text-center">
                    {{ $artworkCategory->name }}
                </div>
                <div class="swiper">
                    <div class="swiper-wrapper mt-6 mb-12">
                        @foreach ($artworkCategory->artworks as $artwork)
                        <div class="swiper-slide">
                            <div class="box">
                                <a href="{{ route('artwork-preview.show', ['artworkCategory' => $artworkCategory->id, 'artwork' => $artwork->id]) }}" class="artwork-preview">
                                    <img
                                    @if (str_contains($artwork->thumbnail_url, 'public/'))
                                    src="{{ Storage::url($artwork->thumbnail_url) }}"
                                    @else
                                    src="{{ asset($artwork->thumbnail_url) }}"
                                    @endif
                                    alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                {{--  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 my-12" id="artwork-previews">
                    @foreach ($artworkCategory->artworks as $artwork)
                    <a href="{{ route('artwork-preview.show', ['artworkCategory' => $artworkCategory->id, 'artwork' => $artwork->id]) }}" class="artwork-preview">
                        <img src="{{ Storage::url($artwork->thumbnail_url) }}" alt="">
                    </a>
                    @endforeach
                </div>  --}}
            @endforeach
        </div>
    </div>
</x-app-layout>

{{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-jet-welcome />
</div> --}}
