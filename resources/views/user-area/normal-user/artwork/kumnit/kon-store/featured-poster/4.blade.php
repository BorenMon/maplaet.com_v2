@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  @include('layouts.normal-user.default-artwork-css')
  <style>
    @font-face {
      font-family: "Dangrek";
      src: url("/assets/kumnit/fonts/Dangrek.ttf");
    }
    @font-face {
      font-family: "Bahnschrift";
      src: url("/assets/kumnit/fonts/BAHNSCHRIFT.TTF");
    }
    @font-face {
      font-family: "Romnea";
      src: url("/assets/kumnit/fonts/Romnea-Italic.ttf");
    }
    .artwork-preview {
      width: 88vw;
      height: 44vw;
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
    .artwork-preview .footer {
      position: absolute;
      bottom: 5%;
      left: 50%;
      transform: translateX(-50%);
      background-color: white;
      display: flex;
      align-items: center;
      padding: 1.2vw;
      border-radius: 1.5vw;
    }
    .artwork-preview .footer img {
      height: 4.7vw;
    }
    .artwork-preview .footer .divider {
      height: 4.7vw;
      border-left: 0.1vw solid #7f8080;
      margin: 0 1.5vw;
    }
    .artwork-preview .footer .contact {
      font-family: "Bahnschrift", "Dangrek", sans-serif;
      color: #7f8080;
      display: flex;
      justify-content: center;
      flex-direction: column;
      white-space: nowrap;
      padding-top: 1.2vw;
      height: 4.7vw;
      font-size: 1.7vw;
      line-height: 1.2;
    }
    .artwork-preview .footer .contact .phone {
      font-size: 2vw;
    }
    .artwork-preview .overlay {
      background: linear-gradient(0deg, #f58e8b 0%, rgba(245, 142, 139, 0) 100%);
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 30%;
    }
    .artwork-preview .boundary {
      position: absolute;
      top: 4.5%;
      left: 4%;
      right: 4%;
      height: 68%;
    }
    .artwork-preview .boundary .key-message {
      position: absolute;
      color: white;
      width: 80%;
      text-shadow: 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b, 0 0 0.15em #f58e8b;
      top: 0;
      left: 50%;
      transform: translate(-50%, 0);
      text-align: center;
      font-size: 4vw;
      font-family: "Romnea", sans-serif;
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
      height: 308vw;
    }
    #download .artwork-preview .footer {
      padding: 8.4vw;
      border-radius: 10.5vw;
    }
    #download .artwork-preview .footer img {
      height: 32.9vw;
    }
    #download .artwork-preview .footer .divider {
      height: 32.9vw;
      border-left: 0.7vw solid #7f8080;
      margin: 0 10.5vw;
    }
    #download .artwork-preview .footer .contact {
      padding-top: 8.4vw;
      height: 32.9vw;
      font-size: 11.9vw;
    }
    #download .artwork-preview .footer .contact .phone {
      font-size: 14vw;
    }
    #download .artwork-preview .boundary .key-message {
      font-size: 28vw;
    }
    @media (min-width: 800px) {
      .customized-container {
        flex-direction: row;
        justify-content: space-between;
      }
      .customized-container .artwork-preview {
        width: 36vw;
        height: 18vw;
      }
      .customized-container .artwork-preview .footer {
        padding: 0.4909090909vw;
        border-radius: 0.6136363636vw;
      }
      .customized-container .artwork-preview .footer img {
        height: 1.9227272727vw;
      }
      .customized-container .artwork-preview .footer .divider {
        height: 1.9227272727vw;
        border-left: 0.0409090909vw solid #7f8080;
        margin: 0 0.6136363636vw;
      }
      .customized-container .artwork-preview .footer .contact {
        padding-top: 0.4909090909vw;
        height: 1.9227272727vw;
        font-size: 0.6954545455vw;
      }
      .customized-container .artwork-preview .footer .contact .phone {
        font-size: 0.8181818182vw;
      }
      .customized-container .artwork-preview .boundary .key-message {
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
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div id="download">
    <div class="artwork-preview">
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
      <div class="overlay"></div>
      <div class="footer">
        <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}" alt="">
        <div class="divider"></div>
        <div class="contact">
          <div>ទំនាក់ទំនង</div>
          <div class="phone">077 | 015 26 16 26</div>
        </div>
      </div>

      <div class="boundary">
        <div class="key-message">
          <div class="primary-text"></div>
          <div class="secondary-text"></div>
        </div>
      </div>
    </div>
  </div>
  <div id="download-overlay"></div>

  <div class="customized-container">
    <div class="artwork-preview shadow">
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
      <div class="overlay"></div>
      <div class="footer">
        <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}" alt="">
        <div class="divider"></div>
        <div class="contact">
          <div>ទំនាក់ទំនង</div>
          <div class="phone">077 | 015 26 16 26</div>
        </div>
      </div>

      <div class="boundary">
        <div class="key-message">
          <div class="primary-text"></div>
          <div class="secondary-text"></div>
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
      <div class="input-group mb-4 mt-8">
        <h2 class="label">Key Message Position</h2>
        <div class="grid grid-cols-3 gap-4 w-24">
          <input type="radio" name="position" value="1">
          <input type="radio" name="position" value="2" checked>
          <input type="radio" name="position" value="3">
          <input type="radio" name="position" value="4">
          <input type="radio" name="position" value="5">
          <input type="radio" name="position" value="6">
          <input type="radio" name="position" value="7">
          <input type="radio" name="position" value="8">
          <input type="radio" name="position" value="9">
        </div>
      </div>
      <div class="input-group mb-4">
        <label for="primary-text" class="label">Primary Text</label>
        <textarea id="primary-text" style="resize: none;"></textarea>
        <label for="primary-text-font-size-percentage">Font Size Percentage</label>
        <input id="primary-text-font-size-percentage" type="number" min="0" value="100">
      </div>
      <div class="input-group mb-4">
        <label for="secondary-text" class="label">Secondary Text</label>
        <textarea id="secondary-text" style="resize: none;"></textarea>
        <label for="secondary-text-font-size-percentage">Font Size Percentage</label>
        <input id="secondary-text-font-size-percentage" type="number" min="0" value="100">
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
  let text, fileName

  $('#primary-text').on('input', function(){
    text = this.value.trim()
    $('.primary-text').each(function(){
      $(this).text(text)
    })
  })

  $('#secondary-text').on('input', function(){
    text = this.value.trim()
    $('.secondary-text').each(function(){
      $(this).text(text)
    })
  })

  $('#file-name').on('change', function(){
    fileName = this.value.trim()
  })
      
  // Change Font Size Percentage
  let windowWidth = $(window).width(), primaryTextFontSizePercentage = 100, secondaryTextFontSizePercentage = 100

  $('#primary-text-font-size-percentage').on('input', function() {
    primaryTextFontSizePercentage = this.value
    fontSizePercentageChanger()
  })

  $('#secondary-text-font-size-percentage').on('input', function() {
    secondaryTextFontSizePercentage = this.value
    fontSizePercentageChanger()
  })

  // Font Size Percentage Change Handler
  const fontSizePercentageChanger = () => {
    console.log(windowWidth)
    if(windowWidth < 800) {
      $('.primary-text').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(4vw * 7 * (${primaryTextFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc(4vw * (${primaryTextFontSizePercentage} / 100))`; break
        }
      })
      $('.secondary-text').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(4vw * 7 * (${secondaryTextFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc(4vw * (${secondaryTextFontSizePercentage} / 100))`; break
        }
      })
    } else {
      $('.primary-text').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(4vw * 7 * (${primaryTextFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc((4vw * 36 / 88) * (${primaryTextFontSizePercentage} / 100))`; break
        }
      })
      $('.secondary-text').each((i, obj) => {
        switch(i) {
          case 0 : obj.style.fontSize = `calc(4vw * 7 * (${secondaryTextFontSizePercentage} / 100))`; break
          case 1 : obj.style.fontSize = `calc((4vw * 36 / 88) * (${secondaryTextFontSizePercentage} / 100))`; break
        }
      })
    }
  }
    
  // Window Width Change Handler
  $(window).resize(() => {
    windowWidth = $(window).width()
    fontSizePercentageChanger()
  })

  // Change Key Message Position
  $('input[name="position"]').on('change', function(){
    const value = this.value
    $('.key-message').each(function(){
      switch(+value) {
        case 1 : $(this).css({
          'top' : '0',
          'left': '0',
          'right': 'unset',
          'bottom' : 'unset',
          'transform': 'translate(0, 0)',
          'text-align': 'left'
        }); break
        case 2 : $(this).css({
          'top' : '0',
          'left': '50%',
          'right': 'unset',
          'bottom' : 'unset',
          'transform': 'translate(-50%, 0)',
          'text-align': 'center'
        }); break
        case 3 : $(this).css({
          'top' : '0',
          'left': 'unset',
          'right': '0',
          'bottom' : 'unset',
          'transform': 'translate(0, 0)',
          'text-align': 'right'
        }); break
        case 4 : $(this).css({
          'top' : '50%',
          'left': '0',
          'right': 'unset',
          'bottom' : 'unset',
          'transform': 'translate(0, -50%)',
          'text-align': 'left'
        }); break
        case 5 : $(this).css({
          'top' : '50%',
          'left': '50%',
          'right': 'unset',
          'bottom' : 'unset',
          'transform': 'translate(-50%, -50%)',
          'text-align': 'center'
        }); break
        case 6 : $(this).css({
          'top' : '50%',
          'left': 'unset',
          'right': '0',
          'bottom' : 'unset',
          'transform': 'translate(0, -50%)',
          'text-align': 'right'
        }); break
        case 7 : $(this).css({
          'top' : 'unset',
          'left': '0',
          'right': 'unset',
          'bottom' : '0',
          'transform': 'translate(0, 0)',
          'text-align': 'left'
        }); break
        case 8 : $(this).css({
          'top' : 'unset',
          'left': '50%',
          'right': 'unset',
          'bottom' : '0',
          'transform': 'translate(-50%, 0)',
          'text-align': 'center'
        }); break
        case 9 : $(this).css({
          'top' : 'unset',
          'left': 'unset',
          'right': '0',
          'bottom' : '0',
          'transform': 'translate(0, 0)',
          'text-align': 'right'
        }); break
      }
    })
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
          aspectRatio: 2/3,
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

  const downloadPoster = () => {
    $('#multiple-images-download-container .artwork').each(function(){
      $('#loading').css('display', 'flex')
      domtoimage.toJpeg(this, {
        quality: 0.8
      }).then(dataUrl => {
      domtoimage
        .toJpeg(this, {
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
  }
</script>
@endsection
