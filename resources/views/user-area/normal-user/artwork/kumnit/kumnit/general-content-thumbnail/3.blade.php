@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  @include('layouts.normal-user.default-artwork-css')
  <style>
    .artwork-preview {
      width: 88vw;
      height: 46.0732984293vw;
      position: relative;
      overflow: hidden;
      background-color: white;
    }
    .artwork-preview .featured-image {
      width: 100%;
      height: 89%;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
    }
    .artwork-preview .shape-1 {
      position: absolute;
      bottom: 0;
      right: 0;
      left: 0;
      height: 11%;
      background: linear-gradient(0deg, #2857a5 0%, #00387c 100%);
    }
    .artwork-preview .title {
      max-width: 94%;
      position: absolute;
      bottom: 5.5%;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      text-align: center;
      font-family: "Stem-Bold", "Krasar-Bold", sans-serif;
      color: #2857a5;
      word-wrap: break-word;
      padding: 2vw 4vw;
      border-radius: 2vw;
      font-size: 3vw;
      box-shadow: 0.5vw 0.5vw 0 rgba(0, 0, 0, 0.05), -0.5vw 0.5vw 0 rgba(0, 0, 0, 0.05);
    }
    .artwork-preview .logo {
      position: absolute;
      top: 5%;
      right: 2.5%;
      width: 7%;
    }
    #download {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
    }
    #download .artwork-preview {
      width: 616vw;
      height: 322.5130890052vw;
    }
    #download .artwork-preview .title {
      padding: 14vw 28vw;
      border-radius: 14vw;
      font-size: 21vw;
      box-shadow: 3.5vw 3.5vw 0 rgba(0, 0, 0, 0.05), -3.5vw 3.5vw 0 rgba(0, 0, 0, 0.05);
    }
    #download-overlay {
      width: 616vw;
      height: 322.5130890052vw;
      background-color: white;
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
    }
    @media (min-width: 800px) {
      .customized-container .artwork-preview {
        width: 36vw;
        height: 18.8481675393vw;
      }
      .customized-container .artwork-preview .title {
        padding: 0.8181818182vw 1.6363636364vw;
        border-radius: 0.8181818182vw;
        font-size: 1.2272727273vw;
        box-shadow: 0.2045454545vw 0.2045454545vw 0 rgba(0, 0, 0, 0.05), -0.2045454545vw 0.2045454545vw 0 rgba(0, 0, 0, 0.05);
      }
    }
  </style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div id="download">
    <div class="artwork-preview">
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
      <div class="shape-1"></div>
      <div class="title hidden"></div>
      <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" alt="" class="logo">
    </div>
  </div>
  <div id="download-overlay"></div>

  <div class="customized-container">
    <div class="artwork-preview shadow">
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
      <div class="shape-1"></div>
      <div class="title hidden"></div>
      <img src="{{ asset('assets/kumnit/images/logo/default/kumnit-logo.svg') }}" alt="" class="logo">
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
        <h2 class="label">Brand Page</h2>
        <select id="logo">
          <option value="kumnit">Kumnit</option>
          <option value="ponlork">Ponlork</option>
          <option value="ponlork-white">Ponlork (White Logo)</option>
        </select>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">Title</h2>
        <div class="space-y-6">
          <div>
            <textarea id="title" rows="2" style="resize: none;"></textarea>
            <label for="title-font-size-percentage" class="mr-2 mb-2">Size Percentage (%) :</label>
            <input type="number" id="title-font-size-percentage" min="0" value="100">
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
@include('layouts.normal-user.default-artwork-js')
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

  $('#logo').on('change', function(){
      const name = this.value
      if(name == 'kumnit') {
        $('.logo').each(function(){
          this.src = '{{ asset("assets/kumnit/images/logo/default/kumnit-logo.svg") }}'
        })
        $('.title').each(function(){
          this.style.color = '#2857a5'
        })
        $('.shape-1').each(function(){
          this.style.background = 'linear-gradient(0deg, rgba(40,87,165,1) 0%, rgba(0,56,124,1) 100%)'
        })
      }
      else {
        $('.shape-1').each(function(){
          this.style.background = 'linear-gradient(0deg, rgba(27,68,114,1) 0%, rgba(17,52,92,1) 100%)'
        })
        $('.title').each(function(){
          this.style.color = '#1b4472'
        })
        if(name == 'ponlork') {
          $('.logo').each(function(){
            this.src = '{{ asset("assets/kumnit/images/logo/default/ponlork-logo.svg") }}'
          })
        } else {
          $('.logo').each(function(){
            this.src = '{{ asset("assets/kumnit/images/logo/white/ponlork-white-logo.svg") }}'
          })
        }
      }
    })

    $('#title').on('input', function(){
      const title = this.value.trim()
      $('.title').each(function(){
        this.innerText = title
        if(title) $(this).removeClass('hidden')
        else $(this).addClass('hidden')
      })
    })

    let windowWidth = $(window).width(), titleFontSizePercentage = 100

    $('#title-font-size-percentage').on('input', function() {
      titleFontSizePercentage = this.value
      fontSizePercentageChanger()
    })

    // Font Size Percentage Change Handler
    const fontSizePercentageChanger = () => {
      if(windowWidth < 800) {
        $('.title').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(3vw * 7 * (${titleFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(3vw * (${titleFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
      } else {
        $('.title').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(3vw * 7 * (${titleFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(3vw * 36 / 88 * (${titleFontSizePercentage} / 100))`,
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
          aspectRatio: 1.91/0.89,
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
