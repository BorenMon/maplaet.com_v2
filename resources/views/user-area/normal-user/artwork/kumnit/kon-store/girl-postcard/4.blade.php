@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  @include('layouts.normal-user.default-artwork-css')
  <style>
    @font-face {
      font-family: "GochiHand";
      src: url("/assets/kumnit/fonts/GochiHand-Regular.ttf");
    }
    @font-face {
      font-family: "NanumPen";
      src: url("/assets/kumnit/fonts/NanumPenScript-Regular.ttf");
    }
    @font-face {
      font-family: "Krasar-Bold";
      src: url("/assets/kumnit/fonts/Krasar-Bold.ttf");
    }
    @font-face {
      font-family: "Krasar-Regular";
      src: url("/assets/kumnit/fonts/Krasar-Regular.ttf");
    }
    .artwork-preview {
      width: 88vw;
      height: 132vw;
      position: relative;
      overflow: hidden;
    }
    .artwork-preview .logo {
      position: absolute;
      bottom: 3%;
      left: 4%;
      width: 17%;
    }
    .artwork-preview .wrapper {
      position: absolute;
      left: 0px;
      display: flex;
      width: 100%;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      top: 3%;
    }
    .artwork-preview .wrapper .main {
      width: 85%;
      word-wrap: break-word;
      font-family: "GochiHand", "Krasar-Bold";
      color: #47a091;
      font-size: 10vw;
      text-align: center;
    }
    .artwork-preview .wrapper .secondary {
      width: 85%;
      word-wrap: break-word;
      font-family: "NanumPen", "Krasar-Regular";
      color: #ff7b4d;
      font-size: 5.5vw;
      text-align: center;
    }
    .artwork-preview .from {
      position: absolute;
      left: 50%;
      width: 80%;
      --tw-translate-x: -50%;
      transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
      overflow-wrap: break-word;
      text-align: center;
      --tw-text-opacity: 1;
      color: rgb(255 255 255/var(--tw-text-opacity));
      font-family: "NanumPen", "Krasar-Regular";
      bottom: 53%;
      font-size: 5.5vw;
      color: #ffb54a;
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
      width: 252vw;
      height: 378vw;
    }
    #download .artwork-preview .wrapper .main {
      font-size: 28.6363636364vw;
    }
    #download .artwork-preview .wrapper .secondary {
      font-size: 15.75vw;
    }
    #download .artwork-preview .from {
      font-size: 15.75vw;
    }
    @media (min-width: 800px) {
      .customized-container .artwork-preview {
        width: 36vw;
        height: 54vw;
      }
      .customized-container .artwork-preview .wrapper .main {
        font-size: 4.0909090909vw;
      }
      .customized-container .artwork-preview .wrapper .secondary {
        font-size: 2.25vw;
      }
      .customized-container .artwork-preview .from {
        font-size: 2.25vw;
      }
    }
  </style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div id="download">
    <div class="artwork-preview">
      <img src="{{ asset('assets/kumnit/images/kon-store/girl-postcard/4/background.svg') }}" alt="background">
      <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}" alt="logo" class="logo">
      <div class="wrapper">
        <div class="main"></div>
        <div class="secondary"></div>
      </div>
      <div class="from"></div>
    </div>
  </div>

  <div class="customized-container">
    <div class="artwork-preview shadow">
      <img src="{{ asset('assets/kumnit/images/kon-store/girl-postcard/4/background.svg') }}" alt="background">
      <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}" alt="logo" class="logo">
      <div class="wrapper">
        <div class="main"></div>
        <div class="secondary"></div>
      </div>
      <div class="from"></div>
    </div>
    
    <div id="input-container">
      <div class="mb-12 text-center" id="_1">
        <button class="btn" style="background-color: #0a254d;" id="download-poster">
          Download
        </button>
        <button @if(!Auth::user()->telegram_id) disabled title="Update your telegram id in profile setting to enable this feature." @endif class="btn ml-1 disabled:opacity-30 disabled:cursor-not-allowed disabled:transform-none" style="background-color: #2AABEE;" onclick="sendToTelegram()">
          <i class="fa-brands fa-telegram" style="font-family: 'Font Awesome 6 Brands' !important;"></i>
        </button>
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
        <textarea id="from" rows="2" style="resize: none;"></textarea>
        <label for="from-font-size-percentage" class="mr-2 mb-2">Font Size Percentage (%)</label>
        <input type="number" id="from-font-size-percentage" min="0" value="100">
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

    let windowWidth = $(window).width(), mainFontSizePercentage = 100, secondaryFontSizePercentage = 100, fromFontSizePercentage = 100

    $('#main-font-size-percentage').on('input', function() {
      mainFontSizePercentage = this.value
      fontSizePercentageChanger()
    })
    $('#secondary-font-size-percentage').on('input', function() {
      secondaryFontSizePercentage = this.value
      fontSizePercentageChanger()
    })
    $('#from-font-size-percentage').on('input', function() {
      fromFontSizePercentage = this.value
      fontSizePercentageChanger()
    })

    // Font Size Percentage Change Handler
    const fontSizePercentageChanger = () => {
      if(windowWidth < 800) {
        $('.main').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(10vw * 36 / 88 * 7 * (${mainFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(10vw * (${mainFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
        $('.secondary').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(5.5vw * 36 / 88 * 7 * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(5.5vw * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
        $('.from').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(5.5vw * 36 / 88 * 7 * (${fromFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(5.5vw * (${fromFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
      } else {
        $('.main').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(10vw * 36 / 88 * 7 * (${mainFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(10vw * 36 / 88 * (${mainFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
        $('.secondary').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(5.5vw * 36 / 88 * 7 * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(5.5vw * 36 / 88 * (${secondaryFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
        $('.from').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(5.5vw * 36 / 88 * 7 * (${fromFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(5.5vw * 36 / 88 * (${fromFontSizePercentage} / 100))`,
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

  // Send to Telegram
  const sendToTelegram = () => {
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
              var chat_id = '{{ Auth::user()->telegram_id }}'
              var token = "5348766637:AAFS9CRCB1mtG3YirFj-OZV83IDR0LCCgC0"

              var formData = new FormData();
              formData.append('chat_id', chat_id)
              formData.append('document', result, 'poster.jpeg')

              var request = new XMLHttpRequest();
              request.open('POST', `https://api.telegram.org/bot${token}/sendDocument`)
              request.send(formData)
            }
          }
        )
      })
    })
  }
</script>
@endsection
