@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  @include('layouts.normal-user.default-artwork-css')
  <style>
    @font-face {
      font-family: "Lazy";
      src: url("/assets/kumnit/fonts/LazySmooth.ttf");
    }
    .artwork-preview {
      width: 88vw;
      height: 88vw;
      position: relative;
      overflow: hidden;
      color: white;
    }
    .artwork-preview .background {
      width: 100%;
      height: 100%;
    }
    .artwork-preview .featured-image {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: 15%;
      border-radius: 5vw;
      width: 88%;
      height: 50%;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
    }
    .artwork-preview .footer {
      position: absolute;
      bottom: 4%;
      left: 0;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .artwork-preview .footer img {
      width: 10%;
    }
    .artwork-preview .footer .footer-text {
      margin-left: 2%;
      font-family: "Lazy", sans-serif;
      text-shadow: -0.1em 0.1em 0.1em rgba(255, 87, 100, 0.5);
    }
    .artwork-preview .footer .footer-text .footer-text-1 {
      font-size: 2vw;
    }
    .artwork-preview .footer .footer-text .footer-text-2 {
      font-size: 2.4vw;
    }
    .artwork-preview .key-messages {
      position: absolute;
      top: 0px;
      left: 0px;
      display: flex;
      width: 100%;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 5%;
      font-family: "Lazy", sans-serif;
      text-align: center;
      line-height: 1.4;
    }
    .artwork-preview .key-messages .main::before {
      width: 100%;
      display: block;
      word-wrap: break-word;
      content: attr(data-text);
      white-space: pre-wrap;
      position: absolute;
      background-color: white;
      background-clip: text;
      -webkit-text-stroke-color: transparent;
      -webkit-text-stroke-width: 0.15em;
      -webkit-background-clip: text;
      top: -0.1em;
      left: 0.1em;
      padding: 0.1em 1em;
    }
    .artwork-preview .key-messages .main {
      width: 95%;
      word-wrap: break-word;
      position: relative;
      font-size: 7vw;
      top: 0.1em;
      left: -0.1em;
      color: #ff5764;
      background-color: #ff5764;
      background-clip: text;
      -webkit-text-stroke-color: transparent;
      -webkit-text-stroke-width: 0.15em;
      -webkit-background-clip: text;
      padding: 0.1em 1em;
    }
    .artwork-preview .key-messages .main::after {
      display: block;
      width: 100%;
      word-wrap: break-word;
      content: attr(data-text);
      white-space: pre-wrap;
      position: absolute;
      top: -0.1em;
      left: 0.1em;
      color: black;
      background-clip: text;
      background-image: linear-gradient(176deg, #ff9237 50%, #ffaf00 50%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      -webkit-text-stroke-width: 0;
      padding: 0.1em 1em;
    }
    .artwork-preview .key-messages .sub {
      padding: 0.5vw 1.5vw;
      border-radius: 100vw;
      font-size: 3vw;
      background-color: #ff5764;
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
    #download .artwork-preview .featured-image {
      border-radius: 35vw;
    }
    #download .artwork-preview .footer .footer-text .footer-text-1 {
      font-size: 14vw;
    }
    #download .artwork-preview .footer .footer-text .footer-text-2 {
      font-size: 16.8vw;
    }
    #download .artwork-preview .key-messages .main {
      font-size: 49vw;
    }
    #download .artwork-preview .key-messages .sub {
      padding: 3.5vw 10.5vw;
      border-radius: 700vw;
      font-size: 21vw;
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
      .customized-container .artwork-preview .featured-image {
        border-radius: 2.0454545455vw;
      }
      .customized-container .artwork-preview .footer .footer-text .footer-text-1 {
        font-size: 0.8181818182vw;
      }
      .customized-container .artwork-preview .footer .footer-text .footer-text-2 {
        font-size: 0.9818181818vw;
      }
      .customized-container .artwork-preview .key-messages .main {
        font-size: 2.8636363636vw;
      }
      .customized-container .artwork-preview .key-messages .sub {
        padding: 0.2045454545vw 0.6136363636vw;
        border-radius: 40.9090909091vw;
        font-size: 1.2272727273vw;
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
      <img src="{{ asset('assets/kumnit/images/kon-store/featured-poster/6/background.jpg') }}" class="background">
      <div class="key-messages">
        <div class="main" data-text=""></div>
        <div class="sub hidden"></div>
      </div>
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" class="featured-image">
      <div class="footer">
        <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}">
        <div class="footer-text">
          <div class="footer-text-1">ប្រឹក្សាផលិតផលជាមួយអ្នកជំនាញ</div>
          <div class="footer-text-2">ដោយឥតគិតថ្លៃ 077 / 015 26 16 26</div>
        </div>
      </div>
    </div>
  </div>
  <div id="download-overlay"></div>

  <div class="customized-container">
    <div class="artwork-preview shadow" id="test">
      <img src="{{ asset('assets/kumnit/images/kon-store/featured-poster/6/background.jpg') }}" class="background">
      <div class="key-messages">
        <div class="main" data-text=""></div>
        <div class="sub hidden"></div>
      </div>
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" class="featured-image">
      <div class="footer">
        <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}">
        <div class="footer-text">
          <div class="footer-text-1">ប្រឹក្សាផលិតផលជាមួយអ្នកជំនាញ</div>
          <div class="footer-text-2">ដោយឥតគិតថ្លៃ 077 / 015 26 16 26</div>
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
      <div class="input-group mb-4">
        <label for="featured-image-height" class="label">Featured Image Height (%)</label>
        <input id="featured-image-height" type="number" min="0" value="50">
      </div>
      <div class="input-group mb-4">
        <label for="main" class="label">Main</label>
        <textarea id="main" style="resize: none;"></textarea>
        <label for="main-font-size-percentage">Font Size Percentage</label>
        <input id="main-font-size-percentage" type="number" min="0" value="100">
      </div>
      <div class="input-group mb-4">
        <label for="sub" class="label">Sub</label>
        <textarea id="sub" style="resize: none;"></textarea>
        <label for="sub-font-size-percentage">Font Size Percentage</label>
        <input id="sub-font-size-percentage" type="number" min="0" value="100">
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
@include('layouts.normal-user.default-artwork-js')
<script>
  let featuredImageHeight = 50
  $('#featured-image-height').on('change', function(){
    featuredImageHeight = +this.value
    $('.featured-image').each(function(){
      $(this).css('height', `${featuredImageHeight}%`)
    })
  })

  let text, fileName

  $('#main').on('input', function(){
    text = this.value.trim()
    $('.main').each(function(){
      this.innerText = text
      this.setAttribute('data-text', text)
    })
  })

  $('#sub').on('input', function(){
    text = this.value.trim()
    $('.sub').each(function(){
      if(text == '') $(this).addClass('hidden')
      else {
        $(this).text(text)
        $(this).removeClass('hidden')
      }
    })
  })

  $('#file-name').on('change', function(){
    fileName = this.value.trim()
  })
      
  // Change Font Size Percentage
  let windowWidth = $(window).width(), mainFontSizePercentage = 100, subFontSizePercentage = 100

  $('#main-font-size-percentage').on('input', function() {
    mainFontSizePercentage = this.value
    fontSizePercentageChanger()
  })

  $('#sub-font-size-percentage').on('input', function() {
    subFontSizePercentage = this.value
    fontSizePercentageChanger()
  })

  // Font Size Percentage Change Handler
  const fontSizePercentageChanger = () => {
    if(windowWidth < 800) {
      $('.main').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(7vw * 7 * (${mainFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc(7vw * (${mainFontSizePercentage} / 100))`; break
        }
      })
      $('.sub').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(3vw * 7 * (${subFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc(3vw * (${subFontSizePercentage} / 100))`; break
        }
      })
    } else {
      $('.main').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(7vw * 7 * (${mainFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc((7vw * 36 / 88) * (${mainFontSizePercentage} / 100))`; break
        }
      })
      $('.sub').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(3vw * 7 * (${subFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc((3vw * 36 / 88) * (${subFontSizePercentage} / 100))`; break
        }
      })
    }
  }
    
  // Window Width Change Handler
  $(window).resize(() => {
    windowWidth = $(window).width()
    fontSizePercentageChanger()
  })


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

    let cropper, canvas

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
          aspectRatio: 88/featuredImageHeight,
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
            maxHeight: 2000,
            maxWidth: 2000,
            success(result) {
              const link = document.createElement('a')
              link.download = `${fileName}.jpeg`
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
