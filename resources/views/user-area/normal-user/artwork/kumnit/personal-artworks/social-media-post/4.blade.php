@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  @include('layouts.normal-user.default-artwork-css')
  <style>
    .artwork-preview {
      width: 88vw;
      height: 88vw;
      position: relative;
      overflow: hidden;
    }
    .artwork-preview .featured-image {
      width: 100%;
      height: 100%;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
    }
    .artwork-preview .overlay {
      position: absolute;
      top: 0px;
      left: 0px;
      width: 100%;
      height: 100%;
      background-image: linear-gradient(0deg, #2857a5 0%, #00387c 100%);
    }
    .artwork-preview .profile {
      top: 5%;
      left: 50%;
      --tw-translate-x: -50%;
      transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
      border-radius: 9999px;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
      width: 12%;
      height: 12%;
      position: absolute;
    }
    .artwork-preview .text {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 100%;
      color: white;
      word-wrap: break-word;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .artwork-preview .text .text-1 {
      font-size: 11vw;
      text-align: center;
      width: 90%;
      word-wrap: break-word;
    }
    .artwork-preview .text .text-2 {
      font-size: 4vw;
      text-align: center;
      width: 90%;
      word-wrap: break-word;
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
    #download .artwork-preview .text .text-1 {
      font-size: 77vw;
    }
    #download .artwork-preview .text .text-2 {
      font-size: 28vw;
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
      .customized-container .artwork-preview .text .text-1 {
        font-size: 4.5vw;
      }
      .customized-container .artwork-preview .text .text-2 {
        font-size: 1.6363636364vw;
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
        <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
        <div class="overlay"></div>
        <div class="text">
          <div class="text-1"></div>
          <div class="text-2"></div>
        </div>
        <img src="{{ asset('assets/general-assets/images/maplaet-user-profile.svg') }}" alt="" class="profile hidden">
      </div>
    </div>
    <div id="download-overlay"></div>
  
    <div class="customized-container">
      <div class="artwork-preview shadow">
        <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
        <div class="overlay"></div>
        <div class="text">
          <div class="text-1"></div>
          <div class="text-2"></div>
        </div>
        <img src="{{ asset('assets/general-assets/images/maplaet-user-profile.svg') }}" alt="" class="profile hidden">
      </div>
      
      <div id="input-container">
        @include('layouts.normal-user.operation-buttons')
        <div class="input-group mb-4 mt-8 space-y-4">
          <h2 class="label">Overlay</h2>
          <div>
            <select id="overlay">
              <option value="blue">Blue</option>
              <option value="red">Red</option>
            </select>
            <label for="overlay-opacity" class="mr-2 mb-2">Opacity (%)</label>
            <input type="number" id="overlay-opacity" min="0" value="100" max="100">
          </div>
        </div>
        <div class="input-group mb-4">
          <h2 class="label">Show / Hide Profile</h2>
          <select id="profile-display">
            <option value="1">Show</option>
            <option value="0" selected>Hide</option>
          </select>
        </div>
        <div class="input-group mb-4">
          <h2 class="label">Text</h2>
          <div class="space-y-6">
            <div>
              <label for="font-family">Font Family</label>
              <select id="font-family"></select>
              <label for="font-style">Font Style</label>
              <select id="font-style"></select>
            </div>
            <div>
              <label>SkewY Degree (deg)</label>
              <input class="form-control mt-2" type="number" id="skew-y-degree" min="-365" max="365" value="0">
            </div>
            <div>
              <label for="text-1">Text #1</label>
              <textarea id="text-1" rows="2" style="resize: none;"></textarea>
              <label for="text-1-font-size-percentage" class="mr-2 mb-2">Size Percentage (%) :</label>
              <input type="number" id="text-1-font-size-percentage" min="0" value="100">
              <label for="text-1-alignment" class="mr-2 mb-2">Alignment :</label>
              <select id="text-1-alignment">
                <option value="left">Left</option>
                <option value="center" selected>Center</option>
                <option value="right">Right</option>
              </select>
            </div>
            
            <div>
              <label for="text-2">Text #2</label>
              <textarea id="text-2" rows="2" style="resize: none;"></textarea>
              <label for="text-2-font-size-percentage" class="mr-2 mb-2">Size Percentage (%) :</label>
              <input type="number" id="text-2-font-size-percentage" min="0" value="100">
              <label for="text-2-alignment" class="mr-2 mb-2">Alignment :</label>
              <select id="text-2-alignment">
                <option value="left">Left</option>
                <option value="center" selected>Center</option>
                <option value="right">Right</option>
              </select>
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
</div>

<div id="loading" style="display: none;">
<img src="{{ asset('assets/general-assets/images/loading.svg') }}" alt="">
</div>
@endsection

@section('js')
@include('layouts.normal-user.default-artwork-js')
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
    $('.text').each(function(){
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

  // Profile Display Handling
  $('#profile-display').on('change', function(){
    const value = this.value
    if(+value) {
      $('.profile').each(function(){ $(this).removeClass('hidden') })
      $('.text').each(function(){ $(this).css('height', '88%') })
    } else {
      $('.profile').each(function(){ $(this).addClass('hidden') })
      $('.text').each(function(){ $(this).css('height', '100%') })
    }
  })

  $('#overlay-opacity').on('change', function(){
    const value = `${this.value}%`
    $('.overlay').each(function(){
      $(this).css({'opacity' : value})
    })
  })
  $('#overlay').on('change', function(){
    const value = this.value
    if(value == 'blue') {
      $('.overlay').each(function(){
        $(this).css({'background-image' : 'linear-gradient(0deg, rgba(40,87,165,1) 0%, rgba(0,56,124,1) 100%)'})
      }) 
    } else {
      $('.overlay').each(function(){
        $(this).css({'background-image' : 'linear-gradient(0deg, rgba(169,27,13,1) 0%, rgba(127,3,0,1) 100%)'})
      }) 
    }
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

  $('#skew-y-degree').on('input', function() {
    const value = this.value
    $('.text').each(function() {
      this.style.transform = `skewY(${value}deg)`
    })
  })

  let windowWidth = $(window).width(), text1FontSizePercentage = 100, text2FontSizePercentage = 100

  $('#text-1-font-size-percentage').on('input', function() {
    text1FontSizePercentage = this.value
    fontSizePercentageChanger()
  })
  $('#text-2-font-size-percentage').on('input', function() {
    text2FontSizePercentage = this.value
    fontSizePercentageChanger()
  })

  // Font Size Percentage Change Handler
  const fontSizePercentageChanger = () => {
    if(windowWidth < 800) {
      $('.text-1').each((i, obj) => {
        switch(i) {
          case 0 : {
            $(obj).css({
              'font-size' : `calc(11vw * 7 * (${text1FontSizePercentage} / 100))`
            })             
          } break
          case 1 : {
            $(obj).css({
              'font-size' : `calc(11vw * (${text1FontSizePercentage} / 100))`
            })             
          } break
        }
      })
      $('.text-2').each((i, obj) => {
        switch(i) {
          case 0 : {
            $(obj).css({
              'font-size' : `calc(4vw * 7 * (${text2FontSizePercentage} / 100))`
            })             
          } break
          case 1 : {
            $(obj).css({
              'font-size' : `calc(4vw * (${text2FontSizePercentage} / 100))`
            })             
          } break
        }
      })
    } else {
      $('.text-1').each((i, obj) => {
        switch(i) {
          case 0 : {
            $(obj).css({
              'font-size' : `calc(11vw * 7 * (${text1FontSizePercentage} / 100))`
            })             
          } break
          case 1 : {
            $(obj).css({
              'font-size' : `calc(11vw * 36 / 88 * (${text1FontSizePercentage} / 100))`
            })             
          } break
        }
      })
      $('.text-2').each((i, obj) => {
        switch(i) {
          case 0 : {
            $(obj).css({
              'font-size' : `calc(4vw * 7 * (${text2FontSizePercentage} / 100))`
            })             
          } break
          case 1 : {
            $(obj).css({
              'font-size' : `calc(4vw * 36 / 88 * (${text2FontSizePercentage} / 100))`
            })             
          } break
        }
      })
    }
  }

  $('#text-1').on('input', function(){
    $('.text-1').each((i, obj) => {
      obj.innerText = this.value
    })
  })
  $('#text-1-alignment').on('change', function(){
    const value = this.value
    $('.text-1').each(function(){
      this.style.textAlign = value
    })
  })
  $('#text-2').on('input', function(){
    $('.text-2').each((i, obj) => {
      obj.innerText = this.value
    })
  })
  $('#text-2-alignment').on('change', function(){
    const value = this.value
    $('.text-2').each(function(){
      this.style.textAlign = value
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
