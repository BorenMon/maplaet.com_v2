@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  @include('layouts.normal-user.default-artwork-css')
  <style>
    @font-face {
      font-family: 'Kh-Ang-Midnight';
      src: url('/assets/kumnit/fonts/Kh-Ang-Midnight.otf');
    }
    @font-face {
      font-family: 'FredokaOne';
      src: url('/assets/kumnit/fonts/FredokaOne-Regular.ttf');
    }
    @font-face {
      font-family: 'AKbalthom-Freehand';
      src: url('/assets/kumnit/fonts/AKbalthom-Freehand.ttf');
    }
    .artwork-preview {
      width: 88vw;
      height: calc(352vw / 5);
      position: relative;
      overflow: hidden;
      background-color: white;
      .featured-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
      }
      .wish {
        @apply absolute top-1/2 left-0 w-full flex flex-col items-center;

        .main {
          min-width: 70%;
          max-width: 100%;
          overflow: hidden;
          background-color: white;
          text-align: center;
          white-space: nowrap;
          font-family: 'FredokaOne', 'Kh-Ang-Midnight', sans-serif;
          color: #34c8f4;
          padding: 1vw 2vw;
          border-radius: 2vw;
          font-size: 4vw;
        }
        .secondary {
          color: white;
          font-family: 'AKbalthom-Freehand', sans-serif;
          text-align: center;
          width: 80%;
          margin-top: 1.5vw;
          font-size: 2.5vw;
          word-wrap: break-word;
        }
      }
      .from {
        position: absolute;
        bottom: 3%;
        left: 0;
        width: 100%;
        text-align: center;
        color: white;
        font-family: 'AKbalthom-Freehand', sans-serif;
        overflow: hidden;
        white-space: nowrap;
        font-size: 2.5vw;
      }
    }

    #download {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
      width: calc(100vw * 7);
      height: calc(990vw * 7/7);
      background-color: white;
      padding: calc(7vw * 7);

      .artwork-preview {
        width: calc(45vw * 7);
        height: calc(36vw * 7);
        .wish {   
          .main {
            padding: calc(1vw * 45 / 88 * 7) calc(2vw * 45 / 88 * 7);
            border-radius: calc(2vw * 45 / 88 * 7);
            font-size: calc(4vw * 45 / 88 * 7);
          }
          .secondary {
            margin-top: calc(1.5vw * 45 / 88 * 7);
            font-size: calc(2.5vw * 45 / 88 * 7);
          }
        }
        .from {
          font-size: calc(2.5vw * 45 / 88 * 7);
        }
      }
    }

    @media(min-width: 800px) {
      .customized-container {
        .artwork-preview {
          width: 36vw;
          height: calc(144vw / 5);
          .wish {   
            .main {
              padding: calc(1vw * 36 / 88) calc(2vw * 36 / 88);
              border-radius: calc(2vw * 36 / 88);
              font-size: calc(4vw * 36 / 88);
            }
            .secondary {
              margin-top: calc(1.5vw * 36 / 88);
              font-size: calc(2.5vw * 36 / 88);
            }
          }
          .from {
            font-size: calc(2.5vw * 36 / 88);
          }
        }
      }
    }
  </style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div id="download">
    <div class="artwork-preview">
      <img src="{{ asset('assets/kumnit/images/kon-store/baby-boy-postcard/1/background.svg') }}" alt="" class="featured-image">
      <div class="wish">
        <div class="main hidden"></div>
        <div class="secondary hidden"></div>
      </div>
      <div class="from hidden"></div>
    </div>
  </div>
  <div id="download-overlay"></div>

  <div class="customized-container">
    <div class="artwork-preview shadow">
      <img src="{{ asset('assets/kumnit/images/kon-store/baby-boy-postcard/1/background.svg') }}" alt="" class="featured-image">
      <div class="wish">
        <div class="main hidden"></div>
        <div class="secondary hidden"></div>
      </div>
      <div class="from hidden"></div>
    </div>
    
    <div id="input-container">
      <div class="mb-12 text-center" id="_1">
        <button class="btn" style="background-color: #0a254d;" id="download-poster">
          Download
        </button>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">Wish</h2>
        <div class="space-y-6">
          <div>
            <label for="main" class="mr-2 mb-2">Main</label>
            <input type="text" id="main">
            <label for="main-font-size-percentage" class="mr-2 mb-2">Font Size Percentage (%)</label>
            <input type="number" id="main-font-size-percentage" min="0" value="100">
          </div>
          <div>
            <label for="secondary" class="mr-2 mb-2">Secondary</label>
            <input type="text" id="secondary">
            <label for="secondary-font-size-percentage" class="mr-2 mb-2">Font Size Percentage (%)</label>
            <input type="number" id="secondary-font-size-percentage" min="0" value="100">
          </div>
        </div>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">From</h2>
        <input type="text" id="from">
      </div>
    </div>
  </div>

<div id="loading" style="display: none;">
  <img src="{{ asset('assets/general-assets/images/loading.svg') }}" alt="">
</div>
@endsection

@section('js')
@include('layouts.normal-user.default-artwork-js')
<script>

    $('#main').on('input', function(){
      const main = this.value.trim()
      $('.main').each(function(){
        this.innerText = main
        if(main) $(this).removeClass('hidden')
        else $(this).addClass('hidden')
      })
    })
    $('#secondary').on('input', function(){
      const secondary = this.value.trim()
      $('.secondary').each(function(){
        this.innerText = secondary
        if(secondary) $(this).removeClass('hidden')
        else $(this).addClass('hidden')
      })
    })
    $('#from').on('input', function(){
      const from = this.value.trim()
      $('.from').each(function(){
        this.innerText = from
        if(from) $(this).removeClass('hidden')
        else $(this).addClass('hidden')
      })
    })

    let windowWidth = $(window).width(), mainFontSizePercentage = 100, secondaryFontSizePercentage = 100

    $('#main-font-size-percentage').on('input', function() {
      mainFontSizePercentage = this.value
      fontSizePercentageChanger()
    })
    $('#secondary-font-size-percentage').on('input', function() {
      secondaryFontSizePercentage = this.value
      fontSizePercentageChanger()
    })

    // Font Size Percentage Change Handler
    const fontSizePercentageChanger = () => {
      if(windowWidth < 800) {
        $('.main').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(4vw * 45 / 88 * 7 * (${mainFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(4vw * (${mainFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
        $('.secondary').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(2.5vw * 45 / 88 * 7 * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(2.5vw * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
      } else {
        $('.main').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(4vw * 45 / 88 * 7 * (${mainFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(4vw * 36 / 88 * (${mainFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
        $('.secondary').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(2.5vw * 45 / 88 * 7 * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(2.5vw * 36 / 88 * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
      }
    }
      
    // Window Width Change Handler
    $(window).resize(() => {
      windowWidth = $(window).width()
      fontSizePercentageChanger()
    })
    
  // Download Artwork
  $('#download-poster').on('click', () => {
    $('#loading').css('display', 'flex')
    domtoimage.toJpeg(document.getElementById('download'), {
      quality: 0.8
    }).then(dataUrl => {
    domtoimage
      .toJpeg(document.getElementById('download'), {
        quality: 0.8
      })
      .then(dataUrl => {
        $('#loading').css('display', 'none')
        var link = document.createElement('a')
        link.download = 'poster.jpeg'
        link.href = dataUrl
        link.click()
      })
    })
  })
</script>
@endsection
