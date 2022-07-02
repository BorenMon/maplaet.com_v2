@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  <style>
    .input-group {
      position: relative;
      border-radius: 0.25rem;
      border-width: 2px;
      border-style: dashed;
      padding-left: 1rem;
      padding-right: 1rem;
      padding-top: 1.5rem;
      padding-bottom: 1rem;
    }
    .input-group .label {
      position: absolute;
      top: 0px;
      font-size: 0.875rem;
      line-height: 1.25rem;
      --tw-text-opacity: 1;
      color: rgb(114 91 210 / var(--tw-text-opacity));
      left: 1rem;
      transform: translateY(-50%);
    }
    textarea {
      width: 100%;
      -webkit-appearance: none;
        -moz-appearance: none;
              appearance: none;
      border-radius: 0.5rem;
      border-width: 1px;
      --tw-border-opacity: 1;
      border-color: rgb(209 213 219 / var(--tw-border-opacity));
      --tw-bg-opacity: 1;
      background-color: rgb(255 255 255 / var(--tw-bg-opacity));
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      padding-left: 1rem;
      padding-right: 1rem;
      font-size: 1rem;
      line-height: 1.5rem;
      --tw-text-opacity: 1;
      color: rgb(55 65 81 / var(--tw-text-opacity));
    }
    textarea::-moz-placeholder {
      --tw-placeholder-opacity: 1;
      color: rgb(156 163 175 / var(--tw-placeholder-opacity));
    }
    textarea:-ms-input-placeholder {
      --tw-placeholder-opacity: 1;
      color: rgb(156 163 175 / var(--tw-placeholder-opacity));
    }
    textarea::placeholder {
      --tw-placeholder-opacity: 1;
      color: rgb(156 163 175 / var(--tw-placeholder-opacity));
    }
    textarea:focus {
      border-color: transparent;
      --tw-text-opacity: 1;
      color: rgb(10 37 77 / var(--tw-text-opacity));
      outline: 2px solid transparent;
      outline-offset: 2px;
      --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
      --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
      box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
      --tw-ring-opacity: 1;
      --tw-ring-color: rgb(10 37 77 / var(--tw-ring-opacity));
    }
    input:not(input[type=radio], input[type=range]), select {
      width: 100% !important;
      -webkit-appearance: none !important;
        -moz-appearance: none !important;
              appearance: none !important;
      border-radius: 0.5rem !important;
      border-width: 1px !important;
      border-color: transparent !important;
      --tw-border-opacity: 1 !important;
      border-color: rgb(209 213 219 / var(--tw-border-opacity)) !important;
      --tw-bg-opacity: 1 !important;
      background-color: rgb(255 255 255 / var(--tw-bg-opacity)) !important;
      padding-top: 0.5rem !important;
      padding-bottom: 0.5rem !important;
      padding-left: 1rem !important;
      padding-right: 1rem !important;
      font-size: 1rem !important;
      line-height: 1.5rem !important;
      --tw-text-opacity: 1 !important;
      color: rgb(55 65 81 / var(--tw-text-opacity)) !important;
    }
    input:not(input[type=radio], input[type=range])::-moz-placeholder, select::-moz-placeholder {
      --tw-placeholder-opacity: 1 !important;
      color: rgb(156 163 175 / var(--tw-placeholder-opacity)) !important;
    }
    input:not(input[type=radio], input[type=range]):-ms-input-placeholder, select:-ms-input-placeholder {
      --tw-placeholder-opacity: 1 !important;
      color: rgb(156 163 175 / var(--tw-placeholder-opacity)) !important;
    }
    input:not(input[type=radio], input[type=range])::placeholder, select::placeholder {
      --tw-placeholder-opacity: 1 !important;
      color: rgb(156 163 175 / var(--tw-placeholder-opacity)) !important;
    }
    input:not(input[type=radio], input[type=range]), select {
      --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05) !important;
      --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color) !important;
      box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow) !important;
    }
    input:not(input[type=radio], input[type=range]):focus, select:focus {
      border-color: transparent !important;
      outline: 2px solid transparent !important;
      outline-offset: 2px !important;
      --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color) !important;
      --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color) !important;
      box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000) !important;
      --tw-ring-opacity: 1 !important;
      --tw-ring-color: rgb(10 37 77 / var(--tw-ring-opacity)) !important;
    }
    #loading {
      background-color: rgba(0, 0, 0, 0.7);
      position: fixed;
      top: 0px;
      left: 0px;
      display: flex;
      height: 100%;
      width: 100%;
      align-items: center;
      justify-content: center;
    }
    #backdrop {
      background-color: rgba(0, 0, 0, 0.7);
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 15;
    }
    #saved-backgrounds {
      margin-left: 1.75rem;
      margin-right: 1.75rem;
      margin-top: 1rem;
      border-width: 2px;
      border-style: dashed;
      --tw-border-opacity: 1;
      border-color: rgb(209 213 219 / var(--tw-border-opacity));
      padding: 1rem;
    }
    #saved-backgrounds .saved-background {
      padding-top: 100%;
      position: relative;
    }
    #saved-backgrounds .saved-background i {
      position: absolute;
      top: 0.75rem;
      right: 0.75rem;
      cursor: pointer;
      font-size: 1.25rem;
      line-height: 1.75rem;
      --tw-text-opacity: 1;
      color: rgb(235 70 85 / var(--tw-text-opacity));
    }
    #saved-backgrounds .saved-background img {
      position: absolute;
      top: 50%;
      left: 50%;
      max-height: 100%;
      max-width: 100%;
      --tw-translate-x: -50%;
      --tw-translate-y: -50%;
      transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
      cursor: pointer;
    }
    #saved-backgrounds .saved-background.selected {
      border-width: 2px;
      --tw-border-opacity: 1;
      border-color: rgb(10 37 77 / var(--tw-border-opacity));
    }
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
    .artwork-preview .featured-image, .artwork-preview .shape-1, .artwork-preview .logo, .artwork-preview .quote {
      position: absolute;
    }
    .artwork-preview .featured-image {
      height: 64%;
      bottom: 0px;
      width: 100%;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
    }
    .artwork-preview .shape-1 {
      top: 0px;
      width: 100%;
    }
    .artwork-preview .logo {
      width: 12%;
      bottom: 5%;
      left: 50%;
      transform: translateX(-50%);
    }
    .artwork-preview .quote {
      bottom: 82.5%;
      transform: translate(-50%, 50%);
      min-height: 0;
      width: 63%;
      /* font-family: "Stem-Bold", "Krasar-Bold", sans-serif; */
      left: 50%;
      overflow-wrap: break-word;
      text-align: center;
      --tw-text-opacity: 1;
      color: rgb(255 255 255 / var(--tw-text-opacity));
      line-height: 1.6;
      font-size: 4vw;
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
    #download .artwork-preview .quote {
      font-size: 28vw;
    }
    #download-overlay {
      width: 616vw;
      height: 616vw;
      background-color: white;
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
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
      .customized-container .artwork-preview .quote {
        font-size: 1.6363636364vw;
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
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div id="download">
      <div class="artwork-preview">
        <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">

        <img src="{{ asset('assets/kumnit/images/kumnit/general-social-media-post/2/kumnit-and-kumnit-tech-shape-1.svg') }}" alt="" class="shape-1">
        <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" alt="" class="logo">

        <div class="quote"></div>
      </div>
    </div>
    <div id="download-overlay"></div>
  
    <div class="customized-container">
      <div class="artwork-preview shadow">
        <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">

        <img src="{{ asset('assets/kumnit/images/kumnit/general-social-media-post/2/kumnit-and-kumnit-tech-shape-1.svg') }}" alt="" class="shape-1">
        <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" alt="" class="logo">

        <div class="quote"></div>
      </div>
      
      <div id="input-container">
        <div class="mb-12 text-center">
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
        </div>
        <div class="mb-3">
          <div class="input-group mb-4">
            <label for="select-page" class="label">Page</label>
            <select id="select-page" class="mt-1 mb-2">
              <option value="kumnit">Kumnit</option>
            <option value="kumnit-finance">Kumnit Finance</option>
            <option value="kumnit-tech">Kumnit Tech</option>
            </select>
          </div>
          <div class="input-group">
            <label for="quote" class="label">Quote</label>
            <div class="space-y-4">
              <textarea id="quote" class="form-control" style="min-height: 150px;"></textarea>
              <div class="flex flex-wrap">
                <label for="quote-font-size-percentage" class="mr-2 mb-2">Font Size Percentage (%) :</label>
                <input type="number" id="quote-font-size-percentage" min="0" value="100">
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
    $('.quote').each(function(){
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

let url = 'https://cdn.shopify.com/s/files/1/0234/8017/2591/products/young-man-in-bright-fashion_925x_f7029e2b-80f0-4a40-a87b-834b9a283c39.jpg'
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

  const bg = document.querySelectorAll('.background')
  const at = document.querySelectorAll('.at')

  $('#select-page').on('change', function() {
    const page = this.value
    let shape1ImgSrc, logoImgSrc
    if(page == 'kumnit' || page == 'kumnit-tech') {
      shape1ImgSrc = '{{ asset("assets/kumnit/images/kumnit/general-social-media-post/2/kumnit-and-kumnit-tech-shape-1.svg") }}'
      if(page == 'kumnit') {
        logoImgSrc = '{{ asset("assets/kumnit/images/logo/default/kumnit-logo.svg") }}'
      } else if(page == 'kumnit-tech') {
        logoImgSrc = '{{ asset("assets/kumnit/images/logo/default/kumnit-tech-logo.svg") }}'
      }
    } else if(page == 'kumnit-finance') {
      shape1ImgSrc = '{{ asset("assets/kumnit/images/kumnit/general-social-media-post/2/kumnit-finance-shape-1.svg") }}'
      logoImgSrc = '{{ asset("assets/kumnit/images/logo/default/kumnit-finance-logo.svg") }}'
    }

    $('.shape-1').each((i, obj) => {
      obj.src = shape1ImgSrc
    })
    $('.logo').each((i, obj) => {
      obj.src = logoImgSrc
    })
  })

  const destroyCropper = () => {
    if(cropper) {
      cropper.destroy()
      cropper = null
    }
  }

  document.getElementById('quote').addEventListener('input', function () {
    document.querySelectorAll('.quote').forEach(el => el.innerText = this.value)
  })

  // Change Font Size Percentage
  let windowWidth = $(window).width(), quoteFontSizePercentage = 100

  $('#quote-font-size-percentage').on('input', function() {
    quoteFontSizePercentage = this.value
    fontSizePercentageChanger()
  })

  // Font Size Percentage Change Handler
  const fontSizePercentageChanger = () => {
    if(windowWidth < 800) {
      $('.quote').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(4vw * 7 * (${quoteFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc(4vw * (${quoteFontSizePercentage} / 100))`; break
        }
      })
    } else {
      $('.quote').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(4vw * 7 * (${quoteFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc((4vw * 36 / 88) * (${quoteFontSizePercentage} / 100))`; break
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
    closeUploadModal()
  })

  // Cropper Handler
  $('#openCropperModal').on('click', () => {
    $('#backdrop').removeClass('hidden')
    $('#cropperModal').removeClass('hidden')

    if(!cropper) {
      cropper = new Cropper(document.getElementById('cropperImg'), {
        aspectRatio: 29193/18683,
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
</script>
@endsection
