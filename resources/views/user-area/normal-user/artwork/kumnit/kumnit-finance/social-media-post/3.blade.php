@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  <style>
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
    height: 88vw;
    overflow: hidden;
    position: relative;
    width: 88vw;
}
.artwork-preview .background {
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    -o-object-position: center;
    object-position: center;
    width: 100%;
}
.artwork-preview .image-overlay {
    height: 100%;
    left: 0;
    -o-object-fit: cover;
    object-fit: cover;
    -o-object-position: center;
    object-position: center;
    opacity: 0.1;
    position: absolute;
    top: 0;
    width: 100%;
}
.artwork-preview .logo {
    --tw-translate-x: -50%;
    height: 12%;
    left: 50%;
    position: absolute;
    top: 5%;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y))
        rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y))
        scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.artwork-preview .box {
    align-items: center;
    display: flex;
    justify-content: center;
    left: 50%;
    min-height: 35%;
    padding: 3vw 7vw;
    position: absolute;
    top: 58.5%;
    transform: translate(-50%, -50%);
    width: 70%;
}
.artwork-preview .box .mark-bottom,
.artwork-preview .box .mark-top {
    position: absolute;
    width: 9%;
}
.artwork-preview .box .border-bottom,
.artwork-preview .box .border-top {
    position: absolute;
    width: 100%;
}
.artwork-preview .box .mark-top {
    left: 2.7vw;
    top: -5.5vw;
}
.artwork-preview .box .border-top {
    left: 50%;
    top: 0;
    transform: translateY(-45%) translateX(-50%);
}
.artwork-preview .box .quote {
    word-wrap: break-word;
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
    /* font-family: Stem-Bold, Krasar-Bold, sans-serif; */
    font-size: 5vw;
    text-align: center;
    width: 100%;
}
.artwork-preview .box .border-bottom {
    bottom: 0;
    left: 50%;
    transform: translateY(45%) translateX(-50%) scaleX(-1) scaleY(-1);
}
.artwork-preview .box .mark-bottom {
    --tw-scale-x: -1;
    --tw-scale-y: -1;
    bottom: -5.5vw;
    right: 2.7vw;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y))
        rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y))
        scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.artwork-preview .box:after {
    left: 0;
}
.artwork-preview .box:after,
.artwork-preview .box:before {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
    bottom: 3.5vw;
    content: "";
    position: absolute;
    top: 3.5vw;
    width: 0.75vw;
}
.artwork-preview .box:before {
    right: 0;
}
#download {
    left: 0;
    position: fixed;
    top: 0;
    z-index: -1;
}
#download .artwork-preview {
    height: 616vw;
    width: 616vw;
}
#download .artwork-preview .box {
    padding: 21vw 49vw;
}
#download .artwork-preview .box .mark-top {
    left: 18.9vw;
    top: -38.5vw;
}
#download .artwork-preview .box .quote {
    font-size: 35vw;
}
#download .artwork-preview .box .mark-bottom {
    bottom: -38.5vw;
    right: 18.9vw;
}
#download .artwork-preview .box:after,
#download .artwork-preview .box:before {
    bottom: 24.5vw;
    top: 24.5vw;
    width: 5.25vw;
}
#download-overlay {
    background-color: #fff;
    height: 616vw;
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
        height: 36vw;
        width: 36vw;
    }
    .customized-container .artwork-preview .box {
        padding: 1.2272727273vw 2.8636363636vw;
    }
    .customized-container .artwork-preview .box .mark-top {
        left: 1.1045454545vw;
        top: -2.25vw;
    }
    .customized-container .artwork-preview .box .quote {
        font-size: 2.0454545455vw;
    }
    .customized-container .artwork-preview .box .mark-bottom {
        bottom: -2.25vw;
        right: 1.1045454545vw;
    }
    .customized-container .artwork-preview .box:after,
    .customized-container .artwork-preview .box:before {
        bottom: 1.4318181818vw;
        top: 1.4318181818vw;
        width: 0.3068181818vw;
    }
    .customized-container #input-container {
        margin-top: 0;
        width: calc(100% - 36vw - 2rem);
    }
    #saved-backgrounds {
        margin-left: 0;
        margin-right: 0;
        margin-top: 3.5rem;
    }
    }
    .artwork-preview .background-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: linear-gradient(135deg, rgba(165,40,40,1) 0%, rgba(129,6,6,1) 100%);
  opacity: 90%;
}
  </style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div id="download">
    <div class="artwork-preview">
      <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/background.jpg') }}" class="background">

      <div class="background-overlay hidden"></div>
      
      <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-finance-logo.svg') }}" alt="" class="logo">

      <div class="box">
        <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/quote.svg') }}" alt="" class="mark-top">
        <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/border.svg') }}" alt="" class="border-top">
        <div class="quote">
          
        </div>
        <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/border.svg') }}" alt="" class="border-bottom">
        <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/quote.svg') }}" alt="" class="mark-bottom">
      </div>
    </div>
  </div>
  <div id="download-overlay"></div>
  
    <div class="customized-container">
      <div class="artwork-preview">
        <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/background.jpg') }}" class="background">

        <div class="background-overlay hidden"></div>
        
        <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-finance-logo.svg') }}" alt="" class="logo">

        <div class="box">
          <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/quote.svg') }}" alt="" class="mark-top">
          <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/border.svg') }}" alt="" class="border-top">
          <div class="quote">
            
          </div>
          <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/border.svg') }}" alt="" class="border-bottom">
          <img src="{{ asset('assets/kumnit/images/kumnit-finance/social-media-post/3/quote.svg') }}" alt="" class="mark-bottom">
        </div>
      </div>
    
    <div id="input-container">
      @include('layouts.normal-user.operation-buttons')
      <div class="mb-3 space-y-6">
        <div>
          <label>Background Overlay</label>
          <div class="flex items-center mt-2">
            <input type="radio" name="background_overlay" value="1"><label>&nbsp;Show</label>
            <div class="mr-4"></div>
            <input type="radio" name="background_overlay" value="0" checked><label>&nbsp;Hide</label>
          </div>
        </div>
        <div>
          <label for="quote">Quote</label>
          <textarea id="quote" style="height: 150px; resize: none;"></textarea>
        </div>
        <div class="flex flex-wrap">
          <label for="quote-font-size-percentage">Font Size Percentage (%) :</label>
          <input type="number" id="quote-font-size-percentage" min="0" value="100">
        </div>
        <div class="mb-4">
          <label for="font-family">Font Family</label>
          <select id="font-family"></select>
        </div>
        <div class="mb-4">
          <label for="font-style">Font Style</label>
          <select id="font-style"></select>
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
          case 0 : obj.style.fontSize = `calc(5vw * 7 * (${quoteFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc(5vw * (${quoteFontSizePercentage} / 100))`; break
        }
      })
    } else {
      $('.quote').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(5vw * 7 * (${quoteFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc((5vw * 36 / 88) * (${quoteFontSizePercentage} / 100))`; break
        }
      })
    }
  }
    
  // Window Width Change Handler
  $(window).resize(() => {
    windowWidth = $(window).width()
    fontSizePercentageChanger()
  })

  $('input[name="background_overlay"]').on('change', function(){
    if(+this.value) {
      $('.background-overlay').each(function(){
        $(this).removeClass('hidden')
      })
    } else {
      $('.background-overlay').each(function(){
        $(this).addClass('hidden')
      })
    }
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
              $('.background').each((i, obj) => {
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
          $('.background').each((i, obj) => {
            obj.src = URL.createObjectURL(result)
          })
          $('#cropperImg').attr('src', URL.createObjectURL(result))
        }
      }
    )
    closeUploadModal()
    }
  })
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

    document.getElementById('quote').addEventListener('input', function () {
      document.querySelectorAll('.quote').forEach(el => el.innerText = this.value)
    })

    let bgImgSrc, cropper, canvas

    // Upload Background Image
    $('#uploadProfile').on('input', function() {
      const file = this.files[0]
      if(file){
        removeSelectedBg()
        destroyCropper()
        new Compressor(this.files[0], {
            quality : 0.8,
            maxHeight: 2000,
            maxWidth: 2000,
            success(result) {
              $('.background').each((i, obj) => {
                obj.src = URL.createObjectURL(result)
              })
              $('#cropperImg').attr('src', URL.createObjectURL(result))
            }
          }
        )
        closeUploadModal()
      }
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

      $('.background').each((i, obj) => {
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
