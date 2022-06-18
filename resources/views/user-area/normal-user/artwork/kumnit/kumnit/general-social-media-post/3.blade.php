@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  <style>
    @font-face {
      font-family: "Krasar-Bold";
      src: url("/assets/kumnit/fonts/Krasar-Bold.ttf");
    }
    @font-face {
      font-family: "Krasar-Medium";
      src: url("/assets/kumnit/fonts/Krasar-Medium.ttf");
    }
    @font-face {
      font-family: "Krasar-Regular";
      src: url("/assets/kumnit/fonts/Krasar-Regular.ttf");
    }
    @font-face {
      font-family: "Stem-Bold";
      src: url("/assets/kumnit/fonts/Stem-Bold.ttf");
    }
    @font-face {
      font-family: "Stem-Medium";
      src: url("/assets/kumnit/fonts/Stem-Medium.ttf");
    }
    @font-face {
      font-family: "Stem-Regular";
      src: url("/assets/kumnit/fonts/Stem-Regular.ttf");
    }
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
    .artwork-preview .profile, .artwork-preview .quote-box, .artwork-preview .logo {
      position: absolute;
    }
    .artwork-preview .background {
      background-color: #2857a5;
      height: 100%;
      width: 100%;
    }
    .artwork-preview .profile {
      top: 7%;
      left: 50%;
      --tw-translate-x: -50%;
      transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
      border-radius: 9999px;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
      width: 17vw;
      height: 17vw;
    }
    .artwork-preview .quote-box {
      top: 30%;
      width: 76%;
      left: 50%;
      --tw-translate-x: -50%;
      transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }
    .artwork-preview .quote-box .quote {
      font-family: "Stem-Bold", "Krasar-Bold", sans-serif;
      line-height: 1.5;
      overflow-wrap: break-word;
      --tw-text-opacity: 1;
      color: rgb(255 255 255 / var(--tw-text-opacity));
      font-size: 4.3vw;
    }
    .artwork-preview .quote-box .name {
      font-size: 3.3vw;
      margin-top: 1.5vw;
      word-wrap: break-word;
    }
    .artwork-preview .logo {
      bottom: 5%;
      width: 11%;
      left: 50%;
      --tw-translate-x: -50%;
      transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
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
    #download .artwork-preview .profile {
      width: 119vw;
      height: 119vw;
    }
    #download .artwork-preview .quote-box .quote {
      font-size: 30.1vw;
    }
    #download .artwork-preview .quote-box .name {
      font-size: 23.1vw;
      margin-top: 10.5vw;
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
      .customized-container .artwork-preview .profile {
        width: 6.9545454545vw;
        height: 6.9545454545vw;
      }
      .customized-container .artwork-preview .quote-box .quote {
        font-size: 1.7590909091vw;
      }
      .customized-container .artwork-preview .quote-box .name {
        font-size: 1.35vw;
        margin-top: 0.6136363636vw;
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
        <div class="background"></div>

        <img src="{{ asset('assets/general-assets/images/maplaet-user-profile.svg') }}" alt="" class="profile">

        <div class="quote-box">
          <div class="quote"></div>
          <div class="name">—&nbsp;<span></span></div>
        </div>

        <img src="{{ asset('assets/kumnit/images/logo/white/kumnit-white-logo.svg') }}" alt="" class="logo">
      </div>
    </div>
    <div id="download-overlay"></div>
  
    <div class="customized-container">
      <div class="artwork-preview shadow">
        <div class="background"></div>

        <img src="{{ asset('assets/general-assets/images/maplaet-user-profile.svg') }}" alt="" class="profile">

        <div class="quote-box">
          <div class="quote"></div>
          <div class="name">—&nbsp;<span></span></div>
        </div>

        <img src="{{ asset('assets/kumnit/images/logo/white/kumnit-white-logo.svg') }}" alt="" class="logo">
      </div>
      
      <div id="input-container">
        @include('layouts.normal-user.operation-buttons')
        <div class="mb-3">
          <label for="select-page">Page</label>
          <select id="select-page" class="mt-1 mb-2">
            <option value="kumnit">Kumnit</option>
            <option value="ponlork">Ponlork</option>
          </select>
          <label for="select-text-alignment">Text Alignment</label>
          <select id="select-text-alignment" class="mt-1 mb-2">
            <option value="left">Left</option>
            <option value="center">Center</option>
            <option value="right">Right</option>
          </select>
          <textarea id="quote" class="form-control" placeholder="សម្ដីដកស្រង់" style="min-height: 150px;"></textarea>
          <input id="name" type="text" placeholder="ឈ្មោះម្ចាស់សម្ដី">
        </div>
      </div>
    </div>

    {{--  Saved Background  --}}
    <div id="saved-backgrounds">
      <h2 class="text-md mb-4">Saved Profiles</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 max-h-96 overflow-auto">
        @foreach ($savedImages as $image)
        @if ($image->type == 'profile')
        <div class="saved-background">
          <img src="{{ Storage::url($image->url) }}">
          <i class="fa-solid fa-circle-minus" data-image="{{ $image->id }}"></i>
        </div>
        @endif
        @endforeach
        <label for="add-background" style="padding-top: 100%;" class="border-2 border-dashed border-gray-200 relative cursor-pointer">
          <i class="fa-solid fa-plus text-gray-200 text-5xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></i>
        </label>
      </div>
    </div>
    <input type="file" class="hidden" accept="image/*" id="add-background" name="saved_background">
  
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
        <img src="{{ asset('assets/general-assets/images/maplaet-user-profile.svg') }}" id="cropperImg" width="100%">
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
// Add Preview After Storing Background Function
const addBgPreview = (node) => {
  document.querySelector('label[for="add-background"]').parentNode.insertBefore(node, document.querySelector('label[for="add-background"]'))
}

// Save Background
$('#add-background').on('input', function() {
  const file = this.files[0]
  if(file){
    new Compressor(file, {
      quality : 0.8,
      maxHeight: 2000,
      maxWidth: 2000,
      success(result) {
        const formData = new FormData()
        formData.append('_token', "{{ csrf_token() }}")
        formData.append('image', result)
        formData.append('type', 'profile')
        formData.append('artwork_id', "{{ $artwork->id }}")
        $('#loading').css('display', 'flex')
        $.ajax({
          url: '{{ route("saved-image.store") }}',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            const savedBg = document.createElement('div')
            savedBg.className = 'saved-background'
            savedBg.innerHTML = `
              <img src="/storage/${response.url.replace('public/', '')}">
              <i class="fa-solid fa-circle-minus" data-image="${response.id}"></i>
            `
            addBgPreview(savedBg)
            refreshBg()
            $('#loading').css('display', 'none')
          }
        })
      }
    })
  }
})

const removeSelectedBg = () => {
      $('.saved-background').each((i, obj) => {
        obj.classList.remove('selected')
      })
    }

const refreshBg = () => {
  $('.saved-background i').each((i, obj) => {
    obj.addEventListener('click', function() {
      const data = this.dataset
      const savedBg = this.parentNode
      $.ajax({
        url: `/saved-image/destroy/${data.image}`,
        type: 'GET',
        success: function(response) {
          if(response.success) {
            savedBg.remove()
          }
        }
      })
    })
  })
  $('.saved-background img').each((i, obj) => {
    obj.addEventListener('click', function() {
      const savedBg = this.parentNode
      removeSelectedBg()
      savedBg.classList.add('selected')

      destroyCropper()
      $('.profile').each((i, obj) => {
        obj.src = this.src
      })
      $('#cropperImg').attr('src', this.src)
    })
  })
}
refreshBg()

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
              $('.profile').each((i, obj) => {
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
          $('.profile').each((i, obj) => {
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
    let bgColor, logoImgSrc
    if(page == 'kumnit') {
      bgColor = '#2857a5'
      logoImgSrc = '{{ asset("assets/kumnit/images/logo/white/kumnit-white-logo.svg") }}'
    } else if(page == 'ponlork') {
      bgColor = '#1b4472'
      logoImgSrc = '{{ asset("assets/kumnit/images/logo/white/ponlork-white-logo.svg") }}'
    }

    $('.background').each((i, obj) => {
      obj.style.backgroundColor = bgColor
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

  document.getElementById('name').addEventListener('input', function () {
    document.querySelectorAll('.name span').forEach(el => el.innerText = this.value)
  })

  $('#select-text-alignment').on('change', function() {
    const textAlignment = this.value
    $('.quote-box').each((i, obj) => {
      obj.style.textAlign = textAlignment
    })
  })

  let profileImgSrc, cropper, canvas

  // Upload Profile Image
  $('#uploadProfile').on('change', function() {
    destroyCropper()
    new Compressor(this.files[0], {
        quality : 0.8,
        maxHeight: 2000,
        maxWidth: 2000,
        success(result) {
          $('.profile').each((i, obj) => {
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
        aspectRatio: 1/1,
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

    $('.profile').each((i, obj) => {
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
