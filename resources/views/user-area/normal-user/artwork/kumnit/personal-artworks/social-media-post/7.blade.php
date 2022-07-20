@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  <style>
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
        height: 88vw;
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
        height: 60%;
        left: 0;
        right: 0;
    }
    .artwork-preview .title {
        --tw-text-opacity: 1;
        bottom: 7%;
        color: rgb(255 255 255 / var(--tw-text-opacity));
        display: flex;
        flex-direction: column;
        /* font-family: Stem-Bold, Koulen, sans-serif; */
        left: 50%;
        text-shadow: 0.5vw 0.5vw 0 rgba(0, 0, 0, 0.1);
        transform: translateX(-50%) skewY(-3deg);
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
        font-size: 11vw;
    }
    .artwork-preview .title .sub-title {
        font-size: 5vw;
    }
    .artwork-preview .profile {
        height: 13vw;
        width: 13vw;
        -o-object-position: top right;
        object-position: top right;
        position: absolute;
        right: 5%;
        top: 4%;
        object-fit: cover;
        object-position: center;
        border-radius: 50%;
    }
    #download {
        left: 0;
        position: fixed;
        top: 0;
        z-index: -1;
    }
    #download .artwork-preview .profile {
      height: calc(13vw * 616 / 88);
      width: calc(13vw * 616 / 88);
    }
    #download .artwork-preview {
        height: 616vw;
        width: 616vw;
    }
    #download .artwork-preview .title {
        text-shadow: 3.5vw 3.5vw 0 rgba(0, 0, 0, 0.1);
    }
    #download .artwork-preview .title .main-title {
        font-size: 77vw;
    }
    #download .artwork-preview .title .sub-title {
        font-size: 35vw;
    }
    #download-overlay {
        background-color: #fff;
        height: 770vw;
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
        .customized-container .artwork-preview .profile {
          height: calc(13vw * 36 / 88);
          width: calc(13vw * 36 / 88);
        }
        .customized-container .artwork-preview .title {
            text-shadow: 0.2045454545vw 0.2045454545vw 0 rgba(0, 0, 0, 0.1);
        }
        .customized-container .artwork-preview .title .main-title {
            font-size: 4.5vw;
        }
        .customized-container .artwork-preview .title .sub-title {
            font-size: 2.0454545455vw;
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
      <img src="{{ asset('assets/general-assets/images/maplaet-user-profile.svg') }}" alt="" class="profile hidden">
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
      <img src="{{ asset('assets/general-assets/images/maplaet-user-profile.svg') }}" alt="" class="profile hidden">
    </div>
    
    <div id="input-container">
      @include('layouts.normal-user.operation-buttons')
      <div class="input-group mt-8 mb-4">
        <h2 class="label">Overlay</h2>
        <select id="overlay">
          <option value="blue">Blue</option>
          <option value="red">Red</option>
        </select>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">Show / Hide Profile</h2>
        <select id="profile-display">
          <option value="1">Show</option>
          <option value="0" selected>Hide</option>
        </select>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">Text SkewX Degree (deg)</h2>
        <input class="form-control" type="number" id="text-skew-degree" min="-365" max="365" value="-3">
      </div>
      <div class="mb-4">
        <label for="font-family">Font Family</label>
        <select id="font-family"></select>
      </div>
      <div class="mb-4">
        <label for="font-style">Font Style</label>
        <select id="font-style"></select>
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

  {{--  Saved Profiles  --}}
  <div id="saved-backgrounds">
    <h2 class="text-md mb-4">Saved Profiles</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 max-h-96 overflow-auto">
      @foreach ($savedImages as $image)
      @if ($image->type == 'profile')
      <div class="saved-background @if($loop->first) selected @endif">
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

// Add Preview After Storing Profile Function
const addBgPreview = (node) => {
  document.querySelector('label[for="add-background"]').parentNode.insertBefore(node, document.querySelector('label[for="add-background"]'))
}

// Save Profile
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
    })
  })
}
refreshBg()

if($('.saved-background.selected').length) {
  $('.profile').each(function() {
    this.src = $('.saved-background.selected img').attr('src')
  })
}

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

  const destroyCropper = () => {
      if(cropper) {
        cropper.destroy()
        cropper = null
      }
    }

    // Overlay Handling
    $('#overlay').on('change', function(){
      const value = this.value
      $('.gradient-overlay').each(function(){
        $(this).css('background-image', value == 'blue' ? 'linear-gradient(0deg, rgba(40,87,165,1) 0%, rgba(40,87,165,0) 100%)' : 'linear-gradient(0deg, rgba(169,27,13,1) 0%, rgba(169,27,13,0) 100%)')
      })
    })

    // Profile Display Handling
    $('#profile-display').on('change', function(){
      const value = this.value
      $('.profile').each(function(){ +value ? $(this).removeClass('hidden') : $(this).addClass('hidden') })
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
      fontSizePercentageChanger()
    })
    $('#sub-title-font-size-percentage').on('input', function() {
      subTitleFontSizePercentage = this.value
      fontSizePercentageChanger()
    })

    // Font Size Percentage Change Handler
    const fontSizePercentageChanger = () => {
      if(windowWidth < 800) {
        $('.main-title').each((i, obj) => {
          switch(i) {
            case 0 : obj.style.fontSize = `calc(11vw * 7 * (${mainTitleFontSizePercentage} / 100))`; break
            case 1 : obj.style.fontSize = `calc(11vw * (${mainTitleFontSizePercentage} / 100))`; break
          }
        })
        $('.sub-title').each((i, obj) => {
          switch(i) {
            case 0 : obj.style.fontSize = `calc(5vw * 7 * (${subTitleFontSizePercentage} / 100))`; break
            case 1 : obj.style.fontSize = `calc(5vw * (${subTitleFontSizePercentage} / 100))`; break
          }
        })
      } else {
        $('.main-title').each((i, obj) => {
          switch(i) {
            case 0 : obj.style.fontSize = `calc(11vw * 7 * (${mainTitleFontSizePercentage} / 100))`; break
            case 1 : obj.style.fontSize = `calc((11vw * 36 / 88) * (${mainTitleFontSizePercentage} / 100))`; break
          }
        })
        $('.sub-title').each((i, obj) => {
          switch(i) {
            case 0 : obj.style.fontSize = `calc(5vw * 7 * (${subTitleFontSizePercentage} / 100))`; break
            case 1 : obj.style.fontSize = `calc((5vw * 36 / 88) * (${subTitleFontSizePercentage} / 100))`; break
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
        family: 'Koulen',
        files: {
          regular: '/assets/kumnit/fonts/Koulen.ttf',
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
    $('.title').each(function(){
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
