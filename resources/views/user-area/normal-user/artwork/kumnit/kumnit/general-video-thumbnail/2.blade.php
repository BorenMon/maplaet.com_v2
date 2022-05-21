@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  <style>
    @font-face {
        font-family: Krasar-Bold;
        src: url(/assets/kumnit/fonts/Krasar-Bold.ttf);
    }
    @font-face {
        font-family: Krasar-Medium;
        src: url(/assets/kumnit/fonts/Krasar-Medium.ttf);
    }
    @font-face {
        font-family: Krasar-Regular;
        src: url(/assets/kumnit/fonts/Krasar-Regular.ttf);
    }
    @font-face {
        font-family: Stem-Bold;
        src: url(/assets/kumnit/fonts/Stem-Bold.ttf);
    }
    @font-face {
        font-family: Stem-Medium;
        src: url(/assets/kumnit/fonts/Stem-Medium.ttf);
    }
    @font-face {
        font-family: Stem-Regular;
        src: url(/assets/kumnit/fonts/Stem-Regular.ttf);
    }
    @font-face {
        font-family: Koulen;
        src: url(/assets/kumnit/fonts/Koulen.ttf);
    }
    .input-group {
        border-radius: 0.25rem;
        border-style: dashed;
        border-width: 2px;
        padding: 1.5rem 1rem 1rem;
        position: relative;
    }
    .input-group .label {
        --tw-text-opacity: 1;
        color: rgb(114 91 210 / var(--tw-text-opacity));
        font-size: 0.875rem;
        left: 1rem;
        line-height: 1.25rem;
        position: absolute;
        top: 0;
        transform: translateY(-50%);
    }
    textarea {
        --tw-border-opacity: 1;
        --tw-bg-opacity: 1;
        --tw-text-opacity: 1;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
        border-radius: 0.5rem;
        border-width: 1px;
        color: rgb(55 65 81 / var(--tw-text-opacity));
        font-size: 1rem;
        line-height: 1.5rem;
        padding: 0.5rem 1rem;
        width: 100%;
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
        --tw-text-opacity: 1;
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0
            var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0
            calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(10 37 77 / var(--tw-ring-opacity));
        border-color: transparent;
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow),
            var(--tw-shadow, 0 0 #0000);
        color: rgb(10 37 77 / var(--tw-text-opacity));
        outline: 2px solid transparent;
        outline-offset: 2px;
    }
    input:not(input[type="radio"], input[type="range"]),
    select {
        --tw-border-opacity: 1 !important;
        --tw-bg-opacity: 1 !important;
        --tw-text-opacity: 1 !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        appearance: none !important;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity)) !important;
        border-color: transparent !important;
        border-color: rgb(209 213 219 / var(--tw-border-opacity)) !important;
        border-radius: 0.5rem !important;
        border-width: 1px !important;
        color: rgb(55 65 81 / var(--tw-text-opacity)) !important;
        font-size: 1rem !important;
        line-height: 1.5rem !important;
        padding: 0.5rem 1rem !important;
        width: 100% !important;
    }
    input:not(input[type="radio"], input[type="range"])::-moz-placeholder,
    select::-moz-placeholder {
        --tw-placeholder-opacity: 1 !important;
        color: rgb(156 163 175 / var(--tw-placeholder-opacity)) !important;
    }
    input:not(input[type="radio"], input[type="range"]):-ms-input-placeholder,
    select:-ms-input-placeholder {
        --tw-placeholder-opacity: 1 !important;
        color: rgb(156 163 175 / var(--tw-placeholder-opacity)) !important;
    }
    input:not(input[type="radio"], input[type="range"])::placeholder,
    select::placeholder {
        --tw-placeholder-opacity: 1 !important;
        color: rgb(156 163 175 / var(--tw-placeholder-opacity)) !important;
    }
    input:not(input[type="radio"], input[type="range"]),
    select {
        --tw-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
        --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color) !important;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
            var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow) !important;
    }
    input:not(input[type="radio"], input[type="range"]):focus,
    select:focus {
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0
            var(--tw-ring-offset-width) var(--tw-ring-offset-color) !important;
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0
            calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color) !important;
        --tw-ring-opacity: 1 !important;
        --tw-ring-color: rgb(10 37 77 / var(--tw-ring-opacity)) !important;
        border-color: transparent !important;
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow),
            var(--tw-shadow, 0 0 #0000) !important;
        outline: 2px solid transparent !important;
        outline-offset: 2px !important;
    }
    #loading {
        align-items: center;
        display: flex;
        height: 100%;
        justify-content: center;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
    }
    #backdrop,
    #loading {
        background-color: rgba(0, 0, 0, 0.7);
    }
    #backdrop {
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 15;
    }
    #saved-backgrounds {
        --tw-border-opacity: 1;
        border: 2px dashed rgb(209 213 219 / var(--tw-border-opacity));
        margin-left: 1.75rem;
        margin-right: 1.75rem;
        margin-top: 1rem;
        padding: 1rem;
    }
    #saved-backgrounds .saved-background {
        padding-top: 100%;
        position: relative;
    }
    #saved-backgrounds .saved-background i {
        --tw-text-opacity: 1;
        color: rgb(235 70 85 / var(--tw-text-opacity));
        cursor: pointer;
        font-size: 1.25rem;
        line-height: 1.75rem;
        position: absolute;
        right: 0.75rem;
        top: 0.75rem;
    }
    #saved-backgrounds .saved-background img {
        --tw-translate-x: -50%;
        --tw-translate-y: -50%;
        cursor: pointer;
        left: 50%;
        max-height: 100%;
        max-width: 100%;
        position: absolute;
        top: 50%;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y))
            rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y))
            scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }
    #saved-backgrounds .saved-background.selected {
        --tw-border-opacity: 1;
        border-color: rgb(10 37 77 / var(--tw-border-opacity));
        border-width: 2px;
    }
    .customized-container {
        align-items: center;
        display: flex;
        flex-direction: column;
    }
    .customized-container #input-container {
        margin-top: 2rem;
        width: calc(100% - 3rem);
    }
    .customized-container #input-container button {
        color: #fff;
    }
    .customized-container #input-container * {
        font-family: Stem-Regular, Krasar-Regular;
    }
    .artwork-preview {
        color: #fff;
        height: 49.5vw;
        overflow: hidden;
        position: relative;
        width: 88vw;
    }
    .artwork-preview .featured-image {
        height: 100%;
        -o-object-fit: cover;
        object-fit: cover;
        -o-object-position: center;
        object-position: center;
        width: 100%;
    }
    .artwork-preview .gradient-overlay,
    .artwork-preview .title {
        position: absolute;
    }
    .artwork-preview .gradient-overlay {
        background: linear-gradient(0deg, #2857a5, rgba(40, 87, 165, 0));
        bottom: 0;
        height: 70%;
        left: 0;
        right: 0;
    }
    .artwork-preview .title {
        --tw-text-opacity: 1;
        bottom: 7%;
        color: rgb(255 255 255 / var(--tw-text-opacity));
        display: flex;
        flex-direction: column;
        font-family: Stem-Bold, Koulen, sans-serif;
        left: 50%;
        text-shadow: 0.3vw 0.3vw 0 rgba(0, 0, 0, 0.1);
        transform: translateX(-50%) skewY(-5deg);
        transform-origin: top bottom;
        width: 80%;
    }
    .artwork-preview .title .main-title,
    .artwork-preview .title .sub-title {
        word-wrap: break-word;
        text-align: center;
        width: 100%;
    }
    .artwork-preview .title .main-title {
        font-size: 7vw;
    }
    .artwork-preview .title .sub-title {
        font-size: 3vw;
    }
    #download {
        left: 0;
        position: fixed;
        top: 0;
        z-index: -1;
    }
    #download .artwork-preview {
        height: 346.5vw;
        width: 616vw;
    }
    #download .artwork-preview .title {
        text-shadow: 2.1vw 2.1vw 0 rgba(0, 0, 0, 0.1);
    }
    #download .artwork-preview .title .main-title {
        font-size: 49vw;
    }
    #download .artwork-preview .title .sub-title {
        font-size: 21vw;
    }
    #download-overlay {
        background-color: #fff;
        height: 346.5vw;
        left: 0;
        position: fixed;
        top: 0;
        width: 616vw;
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
            height: 20.25vw;
            width: 36vw;
        }
        .customized-container .artwork-preview .title {
            text-shadow: 0.1227272727vw 0.1227272727vw 0 rgba(0, 0, 0, 0.1);
        }
        .customized-container .artwork-preview .title .main-title {
            font-size: 2.8636363636vw;
        }
        .customized-container .artwork-preview .title .sub-title {
            font-size: 1.2272727273vw;
        }
        .customized-container #input-container {
            width: calc(100% - 36vw - 2rem);
        }
        #saved-backgrounds {
            margin-left: 0;
            margin-right: 0;
            margin-top: 3.5rem;
        }
    }

  </style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div id="download">
    <div class="artwork-preview">
      <img src="{{ asset("assets/general-assets/images/background.jpg") }}" alt="" class="featured-image">

      <div class="gradient-overlay"></div>

      <div class="title">
        <div class="main-title"></div>
        <div class="sub-title"></div>
      </div>
      <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" alt="" class="logo hidden">
    </div>
  </div>
  <div id="download-overlay"></div>

  <div class="customized-container">
    <div class="artwork-preview shadow">
      <img src="{{ asset("assets/general-assets/images/background.jpg") }}" alt="" class="featured-image">

      <div class="gradient-overlay"></div>

      <div class="title">
        <div class="main-title"></div>
        <div class="sub-title"></div>
      </div>
      <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" alt="" class="logo hidden">
    </div>
    
    <div id="input-container">
      <div class="mb-12 text-center" id="_1">
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
      <div class="input-group mt-8 mb-4">
        <h2 class="label">Page</h2>
        <select id="page">
          <option value="1">Kumnit</option>
          <option value="2">Kumnit Tech</option>
          <option value="3">Kumnit Finance</option>
          <option value="4">Viniyuk</option>
          <option value="5">Ponlork</option>
          <option value="6">Neak Arn</option>
        </select>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">Text SkewX Degree (deg)</h2>
        <input class="form-control" type="number" id="text-skew-degree" min="-365" max="365" value="-5">
      </div>
      <div class="input-group mb-4">
        <h2 class="label">Main Title</h2>
        <div class="space-y-4">
          <textarea id="main-title" rows="2" style="resize: none;"></textarea>
          <div class="flex flex-wrap">
            <label for="main-title-font-size" class="mr-2 mb-2">Font Size Percentage (%) :</label>
            <input type="number" id="main-title-font-size-percentage" min="0" value="100">
          </div>
          <div class="flex flex-wrap items-center">
            <label class="mr-2">Text Alignment :</label>
            <input type="radio" name="main-title-text-alignment" value="left" class="mr-2"> Left
            <input type="radio" name="main-title-text-alignment" value="center" checked class="ml-4 mr-2"> Center
            <input type="radio" name="main-title-text-alignment" value="right" class="ml-4 mr-2"> Right
          </div>
        </div>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">Sub Title</h2>
        <div class="space-y-4">
          <textarea id="sub-title" rows="2" style="resize: none;"></textarea>
          <div class="flex flex-wrap">
            <label for="sub-title-font-size" class="mr-2 mb-2">Font Size Percentage (%) :</label>
            <input type="number" id="sub-title-font-size-percentage" min="0" value="100">
          </div>
          <div class="flex flex-wrap items-center">
            <label class="mr-2">Text Alignment :</label>
            <input type="radio" name="sub-title-text-alignment" value="left" class="mr-2"> Left
            <input type="radio" name="sub-title-text-alignment" value="center" checked class="ml-4 mr-2"> Center
            <input type="radio" name="sub-title-text-alignment" value="right" class="ml-4 mr-2"> Right
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

  const gradientOverlay = document.querySelectorAll('.gradient-overlay')

    const destroyCropper = () => {
      if(cropper) {
        cropper.destroy()
        cropper = null
      }
    }

    const removeSelectedBg = () => {
      $('.saved-background').each((i, obj) => {
        obj.classList.remove('selected')
      })
    }

    document.querySelectorAll('input[name="background"]').forEach(el => {
      el.addEventListener('click', function() {
        const page = this.dataset.page
        gradientOverlay.forEach(el => {
          if(page == 'viniyuk') el.style.background = 'linear-gradient(0deg, rgba(169,27,13,1) 0%, rgba(169,27,13,0) 100%)'
          else el.style.background = 'linear-gradient(0deg, rgba(40,87,165,1) 0%, rgba(40,87,165,0) 100%)'
        })
      })
    })

    $('#text-skew-degree').on('input', function() {
      const value = this.value
      $('.title').each(function() {
        this.style.transform = `translateX(-50%) skewY(${value}deg)`
      })
    })

    $('input[name="main-title-text-alignment"]').on('change', function() {
      const textAlignment = this.value
      $('.main-title').each(function() {
        this.style.textAlign = textAlignment
      })
    })
    $('input[name="sub-title-text-alignment"]').on('change', function() {
      const textAlignment = this.value
      $('.sub-title').each(function() {
        this.style.textAlign = textAlignment
      })
    })

    document.getElementById('main-title').addEventListener('input', function () {
      document.querySelectorAll('.main-title').forEach(el => el.innerText = this.value)
    })
    document.getElementById('sub-title').addEventListener('input', function () {
      document.querySelectorAll('.sub-title').forEach(el => el.innerText = this.value)
    })

    let windowWidth = $(window).width(), mainTitleFontSizePercentage = 100, subTitleFontSizePercentage = 100

    $('#main-title-font-size-percentage').on('input', function() {
      mainTitleFontSizePercentage = this.value
      // fontSizePercentageDisplayHandler('main-title', this.value)
      fontSizePercentageChanger()
    })
    $('#sub-title-font-size-percentage').on('input', function() {
      subTitleFontSizePercentage = this.value
      // fontSizePercentageDisplayHandler('sub-title', this.value)
      fontSizePercentageChanger()
    })

    // Font Size Percentage Display Handler
    // const fontSizePercentageDisplayHandler = (title, value) => {
    //   $(`#${title}-font-size-percentage-output`).text(value + '%')
    // }

    // Font Size Percentage Change Handler
    const fontSizePercentageChanger = () => {
      if(windowWidth < 800) {
        $('.main-title').each((i, obj) => {
          switch(i) {
            case 0 : obj.style.fontSize = `calc(7vw * 7 * (${mainTitleFontSizePercentage} / 100))`; break
            case 1 : obj.style.fontSize = `calc(7vw * (${mainTitleFontSizePercentage} / 100))`; break
          }
        })
        $('.sub-title').each((i, obj) => {
          switch(i) {
            case 0 : obj.style.fontSize = `calc(3vw * 7 * (${subTitleFontSizePercentage} / 100))`; break
            case 1 : obj.style.fontSize = `calc(3vw * (${subTitleFontSizePercentage} / 100))`; break
          }
        })
      } else {
        $('.main-title').each((i, obj) => {
          switch(i) {
            case 0 : obj.style.fontSize = `calc(7vw * 7 * (${mainTitleFontSizePercentage} / 100))`; break
            case 1 : obj.style.fontSize = `calc((7vw * 36 / 88) * (${mainTitleFontSizePercentage} / 100))`; break
          }
        })
        $('.sub-title').each((i, obj) => {
          switch(i) {
            case 0 : obj.style.fontSize = `calc(3vw * 7 * (${subTitleFontSizePercentage} / 100))`; break
            case 1 : obj.style.fontSize = `calc((3vw * 36 / 88) * (${subTitleFontSizePercentage} / 100))`; break
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
      removeSelectedBg()
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
          aspectRatio: 16/9,
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
