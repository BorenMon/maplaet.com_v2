@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  @include('layouts.normal-user.default-artwork-css')
  <style>
    @font-face {
      font-family: "Kh-Ang-Midnight";
      src: url("/assets/kumnit/fonts/Kh-Ang-Midnight.otf");
    }
    @font-face {
      font-family: "FredokaOne";
      src: url("/assets/kumnit/fonts/FredokaOne-Regular.ttf");
    }
    @font-face {
      font-family: "AKbalthom-Freehand";
      src: url("/assets/kumnit/fonts/AKbalthom-Freehand.ttf");
    }
    .artwork-preview {
      width: 88vw;
      height: 110vw;
      position: relative;
      overflow: hidden;
      background-color: white;
    }
    .artwork-preview .featured-image {
      width: 100%;
      height: 100%;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
    }
    .artwork-preview .wish {
      top: 37%;
      position: absolute;
      left: 0px;
      display: flex;
      width: 100%;
      flex-direction: column;
      align-items: center;
    }
    .artwork-preview .wish .main {
      max-width: 88%;
      overflow: hidden;
      text-align: center;
      word-wrap: break-word;
      font-family: "FredokaOne", "Kh-Ang-Midnight", sans-serif;
      color: #f06499;
      font-size: 6vw;
    }
    .artwork-preview .wish .secondary {
      color: #606060;
      font-family: "AKbalthom-Freehand", sans-serif;
      text-align: center;
      word-wrap: break-word;
      width: 80%;
      margin-top: 1.5vw;
      font-size: 3.3vw;
    }
    .artwork-preview .from {
      position: absolute;
      bottom: 2.5%;
      left: 0;
      width: 100%;
      text-align: center;
      color: white;
      font-family: "AKbalthom-Freehand", sans-serif;
      overflow: hidden;
      white-space: nowrap;
      font-size: 3.3vw;
    }
    #download {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
      width: 700vw;
      height: 990vw;
      background-color: white;
      padding: 49vw;
    }
    #download .artwork-preview {
      border-width: 2px;
      border-style: dashed;
      width: 252vw;
      height: 315vw;
    }
    #download .artwork-preview .wish .main {
      font-size: 17.1818181818vw;
    }
    #download .artwork-preview .wish .secondary {
      margin-top: 4.2954545455vw;
      font-size: 9.45vw;
    }
    #download .artwork-preview .from {
      font-size: 9.45vw;
    }
    @media (min-width: 800px) {
      .customized-container .artwork-preview {
        width: 36vw;
        height: 45vw;
      }
      .customized-container .artwork-preview .wish .main {
        font-size: 2.4545454545vw;
      }
      .customized-container .artwork-preview .wish .secondary {
        margin-top: 0.6136363636vw;
        font-size: 1.35vw;
      }
      .customized-container .artwork-preview .from {
        font-size: 1.35vw;
      }
    }
  </style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div id="download">
    <div class="artwork-preview">
      <img src="{{ asset('assets/kumnit/images/kon-store/postcard/2/girl-background.svg') }}" alt="" class="featured-image">
      <div class="wish">
        <div class="main hidden"></div>
        <div class="secondary hidden"></div>
      </div>
      <div class="from hidden"></div>
    </div>
  </div>

  <div class="customized-container">
    <div class="artwork-preview shadow">
      <img src="{{ asset('assets/kumnit/images/kon-store/postcard/2/girl-background.svg') }}" alt="" class="featured-image">
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
        <h2 class="label">Girl or Boy</h2>
        <div class="flex space-x-4">
          <div class="flex items-center space-x-2">
            <input type="radio" checked name="gender" value="girl"><i class="fa-solid fa-child-dress text-xl" style="font-family: 'Font Awesome 6 Free'; color: #f06499;"></i>
          </div>
          <div class="flex items-center space-x-2">
            <input type="radio" name="gender" value="boy"><i class="fa-solid fa-child text-xl" style="font-family: 'Font Awesome 6 Free'; color: #34c8f4;"></i>
          </div>
        </div>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">Wish</h2>
        <div class="space-y-6">
          <div>
            <label for="main" class="mr-2 mb-2">Main</label>
            <textarea id="main" rows="2" style="resize: none;"></textarea>
            <label for="main-font-size-percentage" class="mr-2 mb-2">Font Size Percentage (%)</label>
            <input type="number" id="main-font-size-percentage" min="0" value="100">
          </div>
          <div>
            <label for="secondary" class="mr-2 mb-2">Secondary</label>
            <textarea id="secondary" rows="2" style="resize: none;"></textarea>
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

    $('input[name="gender"]').on('change', function(){
      if(this.value == 'boy') {
        $('.featured-image').each(function(){
          this.src = '{{ asset("assets/kumnit/images/kon-store/postcard/2/boy-background.svg") }}'
        })
        $('.main').each(function(){
          this.style.color = '#34c8f4'
        })
      } else {
        $('.featured-image').each(function(){
          this.src = '{{ asset("assets/kumnit/images/kon-store/postcard/2/girl-background.svg") }}'
        })
        $('.main').each(function(){
          this.style.color = '#f06499'
        })
      }
    })

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
                'font-size' : `calc(6vw * 36 / 88 * 7 * (${mainFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(6vw * (${mainFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
        $('.secondary').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(3.3vw * 36 / 88 * 7 * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(3.3vw * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
      } else {
        $('.main').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(6vw * 36 / 88 * 7 * (${mainFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(6vw * 36 / 88 * (${mainFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
        $('.secondary').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(3.3vw * 36 / 88 * 7 * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(3.3vw * 36 / 88 * (${secondaryFontSizePercentage} / 100))`,
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
        new Compressor(dataURLtoFile(dataUrl), {
            quality : 0.8,
            success(result) {
              const link = document.createElement('a')
              link.download = 'poster.jpeg'
              link.href = URL.createObjectURL(result)
              link.click()
            }
          }
        )
      })
    })
  })
</script>
@endsection
