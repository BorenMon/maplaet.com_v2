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
    background-color: #fff;
    height: 46.0732984293vw;
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
.artwork-preview .boundary {
    bottom: 5.5%;
    left: 2.5%;
    position: absolute;
    right: 2.5%;
    top: 5.5%;
}
.artwork-preview .boundary .logo {
    max-height: 15%;
    max-width: 21%;
    position: absolute;
    right: 0;
    top: 0;
}
.artwork-preview .boundary .title-container {
    font-family: Stem-Bold, Koulen, sans-serif;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%) skewY(-5deg);
}
.artwork-preview .boundary .title-container .title-1 {
    color: #fff;
    font-size: 3vw;
    margin-bottom: 0.5vw;
    text-shadow: 0.2vw 0.2vw 0 rgba(0, 0, 0, 0.5);
    white-space: nowrap;
}
.artwork-preview .boundary .title-container .title-2 {
    background-color: #fff;
    border-radius: 1.5vw;
    color: #2857a5;
    font-size: 4vw;
    padding: 1.5vw 3.5vw 3vw;
    position: relative;
    white-space: nowrap;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
    z-index: -1;
}
.artwork-preview .boundary .title-container .title-3 {
    background-color: #2857a5;
    border-radius: 1vw;
    box-shadow: -0.2vw 0.3vw 0 #fff;
    color: #fff;
    font-size: 2vw;
    margin-left: 6vw;
    margin-top: -2vw;
    padding: 1.5vw 2.5vw;
    white-space: nowrap;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
}
#download {
    left: 0;
    position: fixed;
    top: 0;
    z-index: -1;
}
#download .artwork-preview {
    height: 322.5130890052vw;
    width: 616vw;
}
#download .artwork-preview .boundary .title-container .title-1 {
    font-size: 21vw;
    margin-bottom: 3.5vw;
    text-shadow: 1.4vw 1.4vw 0 rgba(0, 0, 0, 0.5);
}
#download .artwork-preview .boundary .title-container .title-2 {
    border-radius: 10.5vw;
    font-size: 28vw;
    padding: 10.5vw 24.5vw 21vw;
}
#download .artwork-preview .boundary .title-container .title-3 {
    border-radius: 7vw;
    box-shadow: -1.4vw 2.1vw 0 #fff;
    font-size: 14vw;
    margin-left: 42vw;
    margin-top: -14vw;
    padding: 10.5vw 17.5vw;
}
#download-overlay {
    background-color: #fff;
    height: 322.5130890052vw;
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
        height: 18.8481675393vw;
        width: 36vw;
    }
    .customized-container .artwork-preview .boundary .title-container .title-1 {
        font-size: 1.2272727273vw;
        margin-bottom: 0.2045454545vw;
        text-shadow: 0.0818181818vw 0.0818181818vw 0 rgba(0, 0, 0, 0.5);
    }
    .customized-container .artwork-preview .boundary .title-container .title-2 {
        border-radius: 0.6136363636vw;
        font-size: 1.6363636364vw;
        padding: 0.6136363636vw 1.4318181818vw 1.2272727273vw;
    }
    .customized-container .artwork-preview .boundary .title-container .title-3 {
        border-radius: 0.4090909091vw;
        box-shadow: -0.0818181818vw 0.1227272727vw 0 #fff;
        font-size: 0.8181818182vw;
        margin-left: 2.4545454545vw;
        margin-top: -0.8181818182vw;
        padding: 0.6136363636vw 1.0227272727vw;
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
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
      <div class="boundary">
        <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" alt="" class="logo">
        <div class="title-container">
          <div class="title-1 hidden"></div>
          <div class="title-2 hidden"></div>
          <div class="title-3 hidden"></div>
        </div>
      </div>
    </div>
  </div>
  <div id="download-overlay"></div>

  <div class="customized-container">
    <div class="artwork-preview shadow">
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
      <div class="boundary">
        <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" alt="" class="logo">
        <div class="title-container">
          <div class="title-1 hidden"></div>
          <div class="title-2 hidden"></div>
          <div class="title-3 hidden"></div>
        </div>
      </div>
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
      <div class="input-group mb-4 mt-8 space-y-4">
        <h2 class="label">Logo</h2>
        <select id="logo">
          <option value="kumnit">Kumnit</option>
          <option value="ponlork">Ponlork</option>
          <option value="ponlork-white">Ponlork (White Logo)</option>
        </select>
        <div>
          <label class="mr-2">Position :</label>
          <div class="grid grid-cols-3 gap-4 w-52 mt-2">
            <input type="radio" name="logo-position" value="1">
            <input type="radio" name="logo-position" value="2">
            <input type="radio" name="logo-position" value="3" checked>
            <input type="radio" name="logo-position" value="4">
            <input type="radio" name="logo-position" value="5">
            <input type="radio" name="logo-position" value="6">
            <input type="radio" name="logo-position" value="7">
            <input type="radio" name="logo-position" value="8">
            <input type="radio" name="logo-position" value="9">
          </div>
        </div>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">Title</h2>
        <div class="space-y-6">
          <div>
            <label>SkewY Degree (deg)</label>
            <input class="form-control mt-2" type="number" id="skew-y-degree" min="-365" max="365" value="-5">
          </div>
          <div>
            <label class="mr-2">Position :</label>
            <div class="grid grid-cols-3 gap-4 w-52 mt-2">
              <input type="radio" name="title-position" value="1">
              <input type="radio" name="title-position" value="2">
              <input type="radio" name="title-position" value="3">
              <input type="radio" name="title-position" value="4">
              <input type="radio" name="title-position" value="5">
              <input type="radio" name="title-position" value="6" checked>
              <input type="radio" name="title-position" value="7">
              <input type="radio" name="title-position" value="8">
              <input type="radio" name="title-position" value="9">
            </div>
          </div>
          <div>
            <label for="title-1">Title #1</label>
            <textarea id="title-1" rows="2" style="resize: none;"></textarea>
            <label for="title-1-font-size-percentage" class="mr-2 mb-2">Size Percentage (%) :</label>
            <input type="number" id="title-1-font-size-percentage" min="0" value="100">
          </div>
          
          <div>
            <label for="title-2">Title #2</label>
            <textarea id="title-2" rows="2" style="resize: none;"></textarea>
            <label for="title-2-font-size-percentage" class="mr-2 mb-2">Size Percentage (%) :</label>
            <input type="number" id="title-2-font-size-percentage" min="0" value="100">
          </div>
          <div>
            <label for="title-3">Title #3</label>
            <textarea id="title-3" rows="2" style="resize: none;"></textarea>
            <label for="title-3-font-size-percentage" class="mr-2 mb-2">Size Percentage (%) :</label>
            <input type="number" id="title-3-font-size-percentage" min="0" value="100">
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
  // Upload Image Into Artwork Handler
  const inputImageURL = url => {
    const tester = new Image()
    tester.src = url
    tester.onerror = () => {
      alert('We can\'t process this image url! Please input another url.')
    }
    tester.onload = () => {
      destroyCropper()
      $('.featured-image').each(function() {
        featuredImgSrc = url
        this.src = featuredImgSrc
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
    $('.featured-image').each(function() {
      featuredImgSrc = URL.createObjectURL(file)
      this.src = featuredImgSrc
    })
    $('#cropperImg').attr('src', featuredImgSrc)
    closeUploadModal()
    }
  })

  $('#logo').on('change', function(){
      const name = this.value
      if(name == 'kumnit') {
        $('.logo').each(function(){
          this.src = '{{ asset("assets/kumnit/images/logo/default/kumnit-logo.svg") }}'
        })
        $('.title-2').each(function(){
          this.style.color = '#2857a5'
        })
        $('.title-3').each(function(){
          this.style.backgroundColor = '#2857a5'
        })
      }
      else if(name == 'ponlork') {
        $('.logo').each(function(){
          this.src = '{{ asset("assets/kumnit/images/logo/default/ponlork-logo.svg") }}'
        })
        $('.title-2').each(function(){
          this.style.color = '#1b4472'
        })
        $('.title-3').each(function(){
          this.style.backgroundColor = '#1b4472'
        })
      }
      else {
        $('.logo').each(function(){
          this.src = '{{ asset("assets/kumnit/images/logo/white/ponlork-white-logo.svg") }}'
        })
        $('.title-2').each(function(){
          this.style.color = '#1b4472'
        })
        $('.title-3').each(function(){
          this.style.backgroundColor = '#1b4472'
        })
      }
    })

    let cssTranslate = 'translateY(-50%)', cssSkewY = 'skewY(-5deg)'

    $('#title-1').on('input', function(){
      const title = this.value.trim()
      $('.title-1').each(function(){
        this.innerText = title
        if(title) $(this).removeClass('hidden')
        else $(this).addClass('hidden')
      })
    })
    $('#title-2').on('input', function(){
      const title = this.value.trim()
      $('.title-2').each(function(){
        this.innerText = title
        if(title) $(this).removeClass('hidden')
        else $(this).addClass('hidden')
      })
    })
    $('#title-3').on('input', function(){
      const title = this.value.trim()
      $('.title-3').each(function(){
        this.innerText = title
        if(title) $(this).removeClass('hidden')
        else $(this).addClass('hidden')
      })
    })

    $('#skew-y-degree').on('input', function() {
      const value = this.value
      $('.title-container').each(function() {
        cssSkewY = `skewY(${value}deg)`
        this.style.transform = `${cssTranslate} ${cssSkewY}`
      })
    })

    let windowWidth = $(window).width(), title1FontSizePercentage = 100, title2FontSizePercentage = 100, title3FontSizePercentage = 100

    $('#title-1-font-size-percentage').on('input', function() {
      title1FontSizePercentage = this.value
      fontSizePercentageChanger()
    })
    $('#title-2-font-size-percentage').on('input', function() {
      title2FontSizePercentage = this.value
      fontSizePercentageChanger()
    })
    $('#title-3-font-size-percentage').on('input', function() {
      title3FontSizePercentage = this.value
      fontSizePercentageChanger()
    })

    // Font Size Percentage Change Handler
    const fontSizePercentageChanger = () => {
      if(windowWidth < 800) {
        $('.title-1').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(3vw * 7 * (${title1FontSizePercentage} / 100))`,
                'text-shadow' : `calc(0.2vw * 7 * (${title1FontSizePercentage} / 100)) calc(0.2vw * 7 * (${title1FontSizePercentage} / 100)) 0 rgba(0,0,0,0.5)`,
                'margin-bottom' : `calc(0.5vw * 7 * (${title1FontSizePercentage} / 100))`
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(3vw * (${title1FontSizePercentage} / 100))`,
                'text-shadow' : `calc(0.2vw * (${title1FontSizePercentage} / 100)) calc(0.2vw * (${title1FontSizePercentage} / 100)) 0 rgba(0,0,0,0.5)`,
                'margin-bottom' : `calc(0.5vw * (${title1FontSizePercentage} / 100))`
              })             
            } break
          }
        })
        $('.title-2').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(4vw * 7 * (${title2FontSizePercentage} / 100))`
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(4vw * (${title2FontSizePercentage} / 100))`
              })             
            } break
          }
        })
        $('.title-3').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(2vw * 7 * (${title3FontSizePercentage} / 100))`
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(2vw * (${title3FontSizePercentage} / 100))`
              })             
            } break
          }
        })
      } else {
        $('.title-1').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(3vw * 7 * (${title1FontSizePercentage} / 100))`,
                'text-shadow' : `calc(0.2vw * 7 * (${title1FontSizePercentage} / 100)) calc(0.2vw * 7 * (${title1FontSizePercentage} / 100)) 0 rgba(0,0,0,0.5)`,
                'margin-bottom' : `calc(0.5vw * 7 * (${title1FontSizePercentage} / 100))`
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(3vw * 36 / 88 * (${title1FontSizePercentage} / 100))`,
                'text-shadow' : `calc(0.2vw * 36 / 88 * (${title1FontSizePercentage} / 100)) calc(0.2vw * 36 / 88 * (${title1FontSizePercentage} / 100)) 0 rgba(0,0,0,0.5)`,
                'margin-bottom' : `calc(0.5vw * 36 / 88 * (${title1FontSizePercentage} / 100))`
              })             
            } break
          }
        })
        $('.title-2').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(4vw * 7 * (${title2FontSizePercentage} / 100))`
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(4vw * 36 / 88 * (${title2FontSizePercentage} / 100))`
              })             
            } break
          }
        })
        $('.title-3').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(2vw * 7 * (${title3FontSizePercentage} / 100))`
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(2vw * 36 / 88 * (${title3FontSizePercentage} / 100))`
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

    $('input[name="title-position"]').on('change', function(){
      switch(+this.value){
        case 1 : 
          cssTranslate = 'translate(0, 0)'
          $('.title-container').each(function() {
            $(this).css({
              'top' : '0',
              'left' : '0',
              'bottom' : 'unset',
              'right' : 'unset',
              'transform' : `${cssTranslate} ${cssSkewY}`,
            })
          }); break
        case 2 : 
          cssTranslate = 'translateX(-50%)'
          $('.title-container').each(function() {
            $(this).css({
              'top' : '0',
              'left' : '50%',
              'bottom' : 'unset',
              'right' : 'unset',
              'transform' : `${cssTranslate} ${cssSkewY}`,
            })
          }); break
        case 3 : 
          cssTranslate = 'translate(0, 0)'
          $('.title-container').each(function() {
            $(this).css({
              'top' : '0',
              'left' : 'unset',
              'bottom' : 'unset',
              'right' : '0',
              'transform' : `${cssTranslate} ${cssSkewY}`,
            })
          }); break
        case 4 : 
          cssTranslate = 'translateY(-50%)'
          $('.title-container').each(function() {
            $(this).css({
              'top' : '50%',
              'left' : '0',
              'bottom' : 'unset',
              'right' : 'unset',
              'transform' : `${cssTranslate} ${cssSkewY}`,
            })
          }); break
        case 5 : 
          cssTranslate = 'translate(-50%, -50%)'
          $('.title-container').each(function() {
            $(this).css({
              'top' : '50%',
              'left' : '50%',
              'bottom' : 'unset',
              'right' : 'unset',
              'transform' : `${cssTranslate} ${cssSkewY}`,
            })
          }); break
        case 6 : 
          cssTranslate = 'translateY(-50%)'
          $('.title-container').each(function() {
            $(this).css({
              'top' : '50%',
              'left' : 'unset',
              'bottom' : 'unset',
              'right' : '0',
              'transform' : `${cssTranslate} ${cssSkewY}`,
            })
          }); break
        case 7 : 
          cssTranslate = 'translate(0, 0)'
          $('.title-container').each(function() {
            $(this).css({
              'top' : 'unset',
              'left' : '0',
              'bottom' : '0',
              'right' : 'unset',
              'transform' : `${cssTranslate} ${cssSkewY}`,
            })
          }); break
        case 8 : 
          cssTranslate = 'translateX(-50%)'
          $('.title-container').each(function() {
            $(this).css({
              'top' : 'unset',
              'left' : '50%',
              'bottom' : '0',
              'right' : 'unset',
              'transform' : `${cssTranslate} ${cssSkewY}`,
            })
          }); break
        case 9 : 
          cssTranslate = 'translate(0, 0)'
          $('.title-container').each(function() {
            $(this).css({
              'top' : 'unset',
              'left' : 'unset',
              'bottom' : '0',
              'right' : '0',
              'transform' : `${cssTranslate} ${cssSkewY}`,
            })
          }); break
      }
    })

    $('input[name="logo-position"]').on('change', function(){
      switch(+this.value){
        case 1 : 
          $('.logo').each(function() {
            $(this).css({
              'top' : '0',
              'left' : '0',
              'bottom' : 'unset',
              'right' : 'unset',
              'transform' : `translate(0, 0)`,
            })
          }); break
        case 2 : 
          $('.logo').each(function() {
            $(this).css({
              'top' : '0',
              'left' : '50%',
              'bottom' : 'unset',
              'right' : 'unset',
              'transform' : `translateX(-50%)`,
            })
          }); break
        case 3 : 
          $('.logo').each(function() {
            $(this).css({
              'top' : '0',
              'left' : 'unset',
              'bottom' : 'unset',
              'right' : '0',
              'transform' : 'translate(0, 0)',
            })
          }); break
        case 4 : 
          $('.logo').each(function() {
            $(this).css({
              'top' : '50%',
              'left' : '0',
              'bottom' : 'unset',
              'right' : 'unset',
              'transform' : 'translateY(-50%)',
            })
          }); break
        case 5 : 
          $('.logo').each(function() {
            $(this).css({
              'top' : '50%',
              'left' : '50%',
              'bottom' : 'unset',
              'right' : 'unset',
              'transform' : 'translate(-50%, -50%)',
            })
          }); break
        case 6 : 
          $('.logo').each(function() {
            $(this).css({
              'top' : '50%',
              'left' : 'unset',
              'bottom' : 'unset',
              'right' : '0',
              'transform' : 'translateY(-50%)',
            })
          }); break
        case 7 : 
          $('.logo').each(function() {
            $(this).css({
              'top' : 'unset',
              'left' : '0',
              'bottom' : '0',
              'right' : 'unset',
              'transform' : 'translate(0, 0)',
            })
          }); break
        case 8 : 
          $('.logo').each(function() {
            $(this).css({
              'top' : 'unset',
              'left' : '50%',
              'bottom' : '0',
              'right' : 'unset',
              'transform' : 'translateX(-50%)',
            })
          }); break
        case 9 : 
          $('.logo').each(function() {
            $(this).css({
              'top' : 'unset',
              'left' : 'unset',
              'bottom' : '0',
              'right' : '0',
              'transform' : 'translate(0, 0)',
            })
          }); break
      }
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

      $('.featured-image').each((i, obj) => {
        featuredImgSrc = URL.createObjectURL(this.files[0])
        obj.src = featuredImgSrc
      })
      $('#cropperImg').attr('src', featuredImgSrc)
      closeUploadModal()
    })

    // Cropper Handler
    $('#openCropperModal').on('click', () => {
      $('#backdrop').removeClass('hidden')
      $('#cropperModal').removeClass('hidden')

      if(!cropper) {
        cropper = new Cropper(document.getElementById('cropperImg'), {
          aspectRatio: 1.91/1,
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
      domtoimage
      .toJpeg(document.getElementById('download'), { quality: 0.8 })
      .then(function (dataUrl) {
        $('#loading').css('display', 'none')
        var link = document.createElement('a');
        link.download = 'poster.jpeg';
        link.href = dataUrl;
        link.click()
      })
    })
</script>
@endsection
