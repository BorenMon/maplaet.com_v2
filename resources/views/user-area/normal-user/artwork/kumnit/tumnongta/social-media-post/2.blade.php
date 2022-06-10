@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  @include('layouts.normal-user.default-artwork-css')
  <style>
    @font-face {
      font-family: "Lazy";
      src: url("/assets/kumnit/fonts/Kh BL LazySmooth.ttf");
    }
    .artwork-preview {
      width: 88vw;
      height: 88vw;
      position: relative;
      overflow: hidden;
    }
    .artwork-preview .background {
      width: 100%;
      height: 100%;
    }
    .artwork-preview .content {
      width: 100%;
      height: 80%;
      position: absolute;
      left: 50%;
      top: 40%;
      transform: translate(-50%, -50%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .artwork-preview .content .text {
      width: 90%;
      font-family: "Lazy";
      text-align: center;
      color: #f9a61a;
      word-wrap: break-word;
      font-size: 5vw;
      margin: 5vw 0;
      text-shadow: 0.4vw 0.4vw 0 white;
    }
    .artwork-preview .content .featured-image {
      width: 80%;
      height: 55%;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
      border-radius: 5vw;
      box-shadow: 0.7vw 0.7vw 0.5vw rgba(248, 166, 27, 0.1);
    }
    #download {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
    }
    #download .artwork-preview {
      width: 616vw;
      height: 616vw;
    }
    #download .artwork-preview .content .text {
      font-size: 35vw;
      margin: 35vw 0;
      text-shadow: 2.8vw 2.8vw 0 white;
    }
    #download .artwork-preview .content .featured-image {
      border-radius: 35vw;
      box-shadow: 4.9vw 4.9vw 3.5vw rgba(248, 166, 27, 0.1);
    }
    @media (min-width: 800px) {
      .customized-container {
        flex-direction: row;
        justify-content: space-between;
      }

      .customized-container .artwork-preview {
        width: 36vw;
        height: 36vw;
      }
      .customized-container .artwork-preview .content .text {
        font-size: 2.0454545455vw;
        margin: 2.0454545455vw 0;
        text-shadow: 0.1636363636vw 0.1636363636vw 0 white;
      }
      .customized-container .artwork-preview .content .featured-image {
        border-radius: 2.0454545455vw;
        box-shadow: 0.2863636364vw 0.2863636364vw 0.2045454545vw rgba(248, 166, 27, 0.1);
      }

      .customized-container #input-container {
        margin-top: 0;
        width: calc(100% - 36vw - 2rem);
      }

      #saved-backgrounds {
        margin-left: 0px;
        margin-right: 0px;
      }

      #saved-backgrounds {
        margin-top: 3.5rem;
      }
    }
  </style>
@endsection

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div id="download">
      <div class="artwork-preview">
        <img src="{{ asset('assets/kumnit/images/tumnongta/social-media-post/2/background.jpg') }}" alt="" class="background">
        <div class="content">
          <div class="text"></div>
          <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
        </div>
      </div>
    </div>
    <div id="download-overlay"></div>
  
    <div class="customized-container">
      <div class="artwork-preview shadow">
        <img src="{{ asset('assets/kumnit/images/tumnongta/social-media-post/2/background.jpg') }}" alt="" class="background">
        <div class="content">
          <div class="text"></div>
          <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
        </div>
      </div>
      
      <div id="input-container">
        <div class="mb-12 text-center space-y-2" id="_1">
          <button id="upload-image" class="btn mb-0 text-white mr-2 cursor-pointer" style="background-color: #61c3f5;">
            Upload
          </button>
          <input type="file" id="uploadProfile" class="hidden" accept="image/*">

          <button class="btn mr-1" style="background-color: #725bd2;" id="openCropperModal">
            Crop
          </button>
          <button class="btn" style="background-color: #0a254d;" id="download-poster">
            Download
          </button>
          <button @if(!Auth::user()->telegram_id) disabled title="Update your telegram id in profile setting to enable this feature." @endif class="btn ml-1 disabled:opacity-30 disabled:cursor-not-allowed disabled:transform-none" style="background-color: #2AABEE;" onclick="sendToTelegram()">
            <i class="fa-brands fa-telegram" style="font-family: 'Font Awesome 6 Brands' !important;"></i>
          </button>
        </div>
        <div class="input-group mb-4 mt-8">
          <h2 class="label">Text</h2>
          <div class="space-y-6">
            {{-- <div>
              <label for="font-family">Font Family</label>
              <select id="font-family"></select>
              <label for="font-style">Font Style</label>
              <select id="font-style"></select>
            </div> --}}
            <div>
              <textarea id="text" rows="2" style="resize: none;"></textarea>
              <label for="text-font-size-percentage" class="mr-2 mb-2">Size Percentage (%) :</label>
              <input type="number" id="text-font-size-percentage" min="0" value="100">
            </div>
          </div>
        </div>
        
      </div>
    </div>
  
    <!-- Cropper Modal -->
    <div id="backdrop" class="hidden"></div>
    <div class="bg-white max-w-xl w-11/12 absolute top-4 left-1/2 -translate-x-1/2 rounded-md hidden" style="z-index: 21;" id="uploadModal">
      <div class="flex items-center justify-between">
        <span class="text-xl p-4">Upload Image</span>
        <i class="fa-solid fa-circle-xmark mr-4 cursor-pointer text-maplaet-4" onclick="closeUploadModal()"></i>
      </div>
      <label for="uploadProfile" class="border border-dashed rounded p-4 flex flex-col items-center space-y-4 cursor-pointer" style="margin: 0 1rem;" id="drag-drop">
        <div class="text-lg font-semibold">Drag & Drop</div>
        <i class="fa-solid fa-file-arrow-down text-7xl text-gray-200"></i>
        <div class="text-center">
          <div>
            image here, or <label for="uploadProfile" class="text-maplaet-2 cursor-pointer">browse</label>
          </div>
          <div class="text-gray-300">jpg, jpeg, png</div>
        </div>
      </label>
      <div class="p-4 flex justify-between">
        <input type="url" style="width: calc(100% - 1rem - 70.19px) !important;" placeholder="or enter image url here">
        <button class="btn bg-maplaet-1" onclick="inputImageURL(this.previousElementSibling.value.trim())">Enter</button>
      </div>
    </div>
    <div class="bg-white max-w-xl w-11/12 absolute top-4 left-1/2 -translate-x-1/2 rounded-md hidden" style="z-index: 21;" id="cropperModal">
      <div class="text-xl p-4">Crop Background</div>
      <div>
        <img src="{{ asset('assets/general-assets/images/background.jpg') }}" id="cropperImg" width="100%">
      </div>
      <div class="p-4 text-right">
        <button class="btn bg-gray-500" id="cancel-crop">Cancel</button>
        <button class="btn bg-maplaet-1" id="crop">Crop</button>
      </div>
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
  // // Google Font API
  // let googleFonts
  // window.onload = async () => {
  //   const response = await fetch('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyB6rEXLdBoL4enkt4-H6xQ63BksLir8Uio')
  //   const data = await response.json()
  //   googleFonts = await data.items
    
  //   initGoogleFont()
  // }

  // let fontFamily, fontStyle

  // function initGoogleFont() {
  //   $.each(googleFonts, function(key, value){
  //     if(value.subsets.includes('khmer')){
  //       fontFamily = value.family
  //       $('#font-family').append(`
  //         <option value="${value.family}">${value.family}</option>
  //       `)
  //       $.each(value.files, function(key, value){
  //         $('style:first').prepend(`
  //           @font-face {
  //             font-family: "${fontFamily + '-' + key}";
  //             src: url("${value.replace('http://', 'https://')}");
  //             font-weight: ${key};
  //           }
  //         `)
  //       })
  //     }

  //     // if(true) {
  //     //   fontFamily = value.family
  //     //   $('#font-family').append(`
  //     //     <option value="${value.family}">${value.family}</option>
  //     //   `)
  //     //   $.each(value.files, function(key, value){
  //     //     $('style:first').prepend(`
  //     //       @font-face {
  //     //         font-family: "${fontFamily + '-' + key}";
  //     //         src: url('${value}');
  //     //         font-weight: ${key};
  //     //       }
  //     //     `)
  //     //   })
  //     // }
  //   })
  //   $.each(googleFonts, function(key, value){
  //     if(value.family == $('#font-family').val()){
  //       $.each(value.files, (style, file) => {
  //         $('#font-style').append(`
  //           <option value="${file}">${style.toUpperCase()}</option>
  //         `)
  //       })
  //     }
  //   })
  //   updateTextStyle()
  // }

  // const updateTextStyle = () => {
  //   fontFamily = $('#font-family').find(":selected").val()
  //   fontStyle = $('#font-style').find(":selected").text().trim().toLowerCase()
  //   $('.text').each(function(){
  //     this.style.fontFamily = fontFamily + '-' + fontStyle
  //   })
  // }

  // $('#font-family').on('change', function(){
  //   fontFamily = this.value
  //   $.each(googleFonts, function(key, value){
  //     if(value.family == fontFamily){
  //       $('#font-style').html('')
  //       $.each(value.files, (style, file) => {
  //         $('#font-style').append(`
  //           <option value="${file}">${style.toUpperCase()}</option>
  //         `)
  //       })
  //     }
  //   })
  //   updateTextStyle()
  // })

  // $('#font-style').on('change', () => {
  //   updateTextStyle()
  // })


  // Upload Image Into Artwork Handler
  const inputImageURL = url => {
    const tester = new Image()
    tester.src = url
    tester.onerror = () => {
      alert('We can\'t process this image url! Please input another url.')
    }
    tester.onload = () => {
      destroyCropper()
      toDataURL(url)
      .then(dataUrl => {
        const file = dataURLtoFile(dataUrl, "imageName.jpg")
        new Compressor(file, {
            quality : 0.8,
            maxHeight: 2000,
            maxWidth: 2000,
            success(result) {
              $('.featured-image').each((i, obj) => {
                obj.src = URL.createObjectURL(result)
              })
              $('#cropperImg').attr('src', URL.createObjectURL(result))
            }
          }
        )
      })
      $('#cropperImg').attr('src', featuredImgSrc)
      closeUploadModal()
    }
  }

  const openUploadModal = () => {
    $('#backdrop').removeClass('hidden')
    $('#uploadModal').removeClass('hidden')
  }
  const closeUploadModal = () => {
    $('#backdrop').addClass('hidden')
    $('#uploadModal').addClass('hidden')
  }

  $('#upload-image').on('click', function(){
    openUploadModal()
  })

  document.getElementById('drag-drop').addEventListener('dragover', e => {
    e.preventDefault()
  })
  document.getElementById('drag-drop').addEventListener('drop', function(e) {
    e.preventDefault()
    const file = e.dataTransfer.files[0]
    if(file.type.includes('image')){
    destroyCropper()
    new Compressor(file, {
        quality : 0.8,
        maxHeight: 2000,
        maxWidth: 2000,
        success(result) {
          $('.featured-image').each((i, obj) => {
            obj.src = URL.createObjectURL(result)
          })
          $('#cropperImg').attr('src', URL.createObjectURL(result))
        }
      }
    )
    closeUploadModal()
    }
  })

  let windowWidth = $(window).width(), textFontSizePercentage = 100

  $('#text-font-size-percentage').on('input', function() {
    textFontSizePercentage = this.value
    fontSizePercentageChanger()
  })

  // Font Size Percentage Change Handler
  const fontSizePercentageChanger = () => {
    if(windowWidth < 800) {
      $('.text').each((i, obj) => {
        switch(i) {
          case 0 : {
            $(obj).css({
              'font-size' : `calc(5vw * 7 * (${textFontSizePercentage} / 100))`
            })             
          } break
          case 1 : {
            $(obj).css({
              'font-size' : `calc(5vw * (${textFontSizePercentage} / 100))`
            })             
          } break
        }
      })
    } else {
      $('.text').each((i, obj) => {
        switch(i) {
          case 0 : {
            $(obj).css({
              'font-size' : `calc(5vw * 7 * (${textFontSizePercentage} / 100))`
            })             
          } break
          case 1 : {
            $(obj).css({
              'font-size' : `calc(5vw * 36 / 88 * (${textFontSizePercentage} / 100))`
            })             
          } break
        }
      })
    }
  }

  $('#text').on('input', function(){
    $('.text').each((i, obj) => {
      obj.innerText = this.value
    })
  })
    
  // Window Width Change Handler
  $(window).resize(() => {
    windowWidth = $(window).width()
    fontSizePercentageChanger()
  })

  let featuredImgSrc, cropper, canvas

  const destroyCropper = () => {
    if(cropper) {
      cropper.destroy()
      cropper = null
    }
  }

  // Upload Profile Image
  $('#uploadProfile').on('change', function() {
    destroyCropper()
    new Compressor(this.files[0], {
        quality : 0.8,
        maxHeight: 2000,
        maxWidth: 2000,
        success(result) {
          $('.featured-image').each((i, obj) => {
            obj.src = URL.createObjectURL(result)
          })
          $('#cropperImg').attr('src', URL.createObjectURL(result))
        }
      }
    )
    closeUploadModal()
  })

  // Cropper Handler
  $('#openCropperModal').on('click', () => {
    $('#backdrop').removeClass('hidden')
    $('#cropperModal').removeClass('hidden')

    if(!cropper) {
      cropper = new Cropper(document.getElementById('cropperImg'), {
        aspectRatio: 3520/1936,
        autoCropArea: 1,
      })
    }
  }) 
  $('#cancel-crop').on('click', () => {
    closeCropperModal()
  })
  const closeCropperModal = () => {
    $('#backdrop').addClass('hidden')
    $('#cropperModal').addClass('hidden')
  }
  $('#crop').on('click', () => {
    canvas = cropper.getCroppedCanvas()

    $('.featured-image').each((i, obj) => {
      obj.src = canvas.toDataURL()
    })

    closeCropperModal()
  }) 

  // Download
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
            maxHeight: 2000,
            maxWidth: 2000,
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
            maxHeight: 2000,
            maxWidth: 2000,
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
