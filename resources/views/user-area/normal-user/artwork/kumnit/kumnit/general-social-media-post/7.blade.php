@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  <style>
    .customized-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .customized-container #input-container {
      margin-top: 2rem;
      width: calc(100% - 3rem);
    }

    .customized-container #input-container button {
      color: white;
    }

    .customized-container #input-container * {
      font-family: "Stem-Regular", "Krasar-Regular";
    }

    .artwork-preview {
      width: 88vw;
      height: 88vw;
      position: relative;
      overflow: hidden;
      color: white;
    }

    .artwork-preview .featured-image {
      width: 100%;
      height: 84%;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
    }

    .artwork-preview .logo {
      position: absolute;
      width: 11%;
      top: 4%;
      right: 4%;
    }

    .artwork-preview .shape1 {
      position: absolute;
      bottom: 0px;
      left: 0px;
      width: 100%;
      background: url("/assets/kumnit/images/kumnit/general-personal-social-media-post/7/map.svg"), linear-gradient(145deg, #2857a5 0%, #00387c 100%);
      background-repeat: no-repeat;
      background-size: 50% auto, cover;
      line-height: 1.5;
      padding: 4% 4% 4% 25.5%;
    }

    .artwork-preview .shape1 img {
      position: absolute;
      left: -0.9%;
      top: -2.8vw;
      width: 23%;
      z-index: 1;
    }

    .artwork-preview .shape1 .message {
      min-height: 7vw;
      font-size: 3.3vw;
      word-wrap: break-word;
    }

    .artwork-preview .shape1::after {
      content: "";
      position: absolute;
      top: 0px;
      left: 0px;
      width: 100%;
      height: 0.8vw;
      background-color: #0043b8;
      transform: translateY(-98%);
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

    #download .artwork-preview .shape1 img {
      top: -19.6vw;
    }

    #download .artwork-preview .shape1 .message {
      min-height: 49vw;
      font-size: 23.1vw;
    }

    #download .artwork-preview .shape1::after {
      height: 5.6vw;
    }

    @media (min-width: 800px) {
      #_1 {
        text-align: left;
      }

      .customized-container {
        flex-direction: row;
        justify-content: space-between;
      }

      .customized-container .artwork-preview {
        width: 36vw;
        height: 36vw;
      }
      .customized-container .artwork-preview .shape1 img {
        top: -1.1454545455vw;
      }
      .customized-container .artwork-preview .shape1 .message {
        min-height: 2.8636363636vw;
        font-size: 1.35vw;
      }
      .customized-container .artwork-preview .shape1::after {
        height: 0.3272727273vw;
      }

      .customized-container #input-container {
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
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div id="download">
    <div class="artwork-preview">
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" class="featured-image">
      <div class="shape1">
        <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/7/label.svg') }}" alt="">
        <div class="message"></div>
      </div>
      <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" class="logo">
    </div>
  </div>
  <div id="download-overlay"></div>

  <div class="customized-container">
    <div class="artwork-preview shadow">
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" class="featured-image">
      <div class="shape1">
        <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/7/label.svg') }}" alt="">
        <div class="message"></div>
      </div>
      <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" class="logo">
    </div>
    
    <div id="input-container">
      @include('layouts.normal-user.operation-buttons')
      <div class="mb-3">
        <div class="input-group">
          <label for="quote" class="label">Message</label>
          <div class="space-y-4">
            <textarea id="message" class="form-control" style="min-height: 150px;"></textarea>
            <div class="flex flex-wrap">
              <label for="font-size-percentage" class="mr-2 mb-2">Font Size Percentage (%) :</label>
              <input type="number" id="font-size-percentage" min="0" value="100">
            </div>
            <div>
              <label for="font-family">Font Family</label>
              <select id="font-family"></select>
            </div>
            <div>
              <label for="font-style">Font Style</label>
              <select id="font-style"></select>
            </div>
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

<div id="loading" style="display: none;">
  <img src="{{ asset('assets/general-assets/images/loading.svg') }}" alt="">
</div>
@endsection

@section('js')
<script>
  // Google Font API
  let googleFonts
  window.onload = async () => {
    const response = await fetch('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyB6rEXLdBoL4enkt4-H6xQ63BksLir8Uio')
    const data = await response.json()
    googleFonts = await data.items
    googleFonts.unshift(
      {
        family: 'Niradei',
        files: {
          medium: '/assets/kumnit/fonts/Niradei-Medium.ttf',
          black: '/assets/kumnit/fonts/Niradei-Black.ttf',
        },
        subsets: ['khmer'],
      },
      {
        family: 'Krasar',
        files: {
          regular: '/assets/kumnit/fonts/Krasar-Regular.ttf',
          medium: '/assets/kumnit/fonts/Krasar-Medium.ttf',
          bold: '/assets/kumnit/fonts/Krasar-Bold.ttf',
        },
        subsets: ['khmer'],
      }
    )
    
    initGoogleFont()
  }

  let fontFamily, fontStyle

  function initGoogleFont() {
    $.each(googleFonts, function(key, value){
      if(value.subsets.includes('khmer')){
        fontFamily = value.family
        $('#font-family').append(`
          <option value="${value.family}">${value.family}</option>
        `)
        $.each(value.files, function(key, value){
          $('style:first').prepend(`
            @font-face {
              font-family: "${fontFamily + '-' + key}";
              src: url("${value.replace('http://', 'https://')}");
              font-weight: ${key};
            }
          `)
        })
      }
    })
    $.each(googleFonts, function(key, value){
      if(value.family == $('#font-family').val()){
        $.each(value.files, (style, file) => {
          $('#font-style').append(`
            <option value="${file}">${style.toUpperCase()}</option>
          `)
        })
      }
    })
    updateTextStyle()
  }

  const updateTextStyle = () => {
    fontFamily = $('#font-family').find(":selected").val()
    fontStyle = $('#font-style').find(":selected").text().trim().toLowerCase()
    $('.message').each(function(){
      this.style.fontFamily = fontFamily + '-' + fontStyle
    })
  }

  $('#font-family').on('change', function(){
    fontFamily = this.value
    $.each(googleFonts, function(key, value){
      if(value.family == fontFamily){
        $('#font-style').html('')
        $.each(value.files, (style, file) => {
          $('#font-style').append(`
            <option value="${file}">${style.toUpperCase()}</option>
          `)
        })
      }
    })
    updateTextStyle()
  })

  $('#font-style').on('change', () => {
    updateTextStyle()
  })


  
  // ***Here is the code for converting "image source" (url) to "Base64".***
const toDataURL = url => fetch(url)
      .then(response => response.blob())
      .then(blob => new Promise((resolve, reject) => {
      const reader = new FileReader()
      reader.onloadend = () => resolve(reader.result)
      reader.onerror = reject
      reader.readAsDataURL(blob)
     }))


// ***Here is code for converting "Base64" to javascript "File Object".***

  function dataURLtoFile(dataurl, filename) {
     let arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
     bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
     while(n--){
     u8arr[n] = bstr.charCodeAt(n);
     }
   return new File([u8arr], filename, {type:mime});
  }

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
      // $('.featured-image').each(function() {
      //   featuredImgSrc = url
      //   this.src = featuredImgSrc
      // })
      // $('#cropperImg').attr('src', featuredImgSrc)
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
    // $('.featured-image').each(function() {
    //   featuredImgSrc = URL.createObjectURL(file)
    //   this.src = featuredImgSrc
    // })
    // $('#cropperImg').attr('src', featuredImgSrc)
    closeUploadModal()
    }
  })

  const destroyCropper = () => {
    if(cropper) {
      cropper.destroy()
      cropper = null
    }
  }

  document.getElementById('message').addEventListener('input', function () {
    document.querySelectorAll('.message').forEach(el => el.innerText = this.value)
  })
  
  // Change Font Size Percentage
  let windowWidth = $(window).width(), fontSizePercentage = 100

  $('#font-size-percentage').on('input', function() {
    fontSizePercentage = this.value
    fontSizePercentageChanger()
  })

  // Font Size Percentage Change Handler
  const fontSizePercentageChanger = () => {
    if(windowWidth < 800) {
      $('.message').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(3.3vw * 7 * (${fontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc(3.3vw * (${fontSizePercentage} / 100))`; break
        }
      })
    } else {
      $('.message').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(3.3vw * 7 * (${fontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc((3.3vw * 36 / 88) * (${fontSizePercentage} / 100))`; break
        }
      })
    }
  }
    
  // Window Width Change Handler
  $(window).resize(() => {
    windowWidth = $(window).width()
    fontSizePercentageChanger()
  })

  let featuredImgSrc, cropper, canvas

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

    // $('.featured-image').each((i, obj) => {
    //   featuredImgSrc = URL.createObjectURL(this.files[0])
    //   obj.src = featuredImgSrc
    // })
    // $('#cropperImg').attr('src', featuredImgSrc)
    closeUploadModal()
  })

  // Cropper Handler
  $('#openCropperModal').on('click', () => {
    $('#backdrop').removeClass('hidden')
    $('#cropperModal').removeClass('hidden')

    if(!cropper) {
      cropper = new Cropper(document.getElementById('cropperImg'), {
        aspectRatio: 100/84,
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
