@extends('layouts.normal-user.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;{{ $brandPage->name }} / {{ $artworkCategory->name }} / {{ $artwork->number }}
@endsection

@section('css')
  @include('layouts.normal-user.default-artwork-css')
  <style>
    .artwork-preview {
      width: 88vw;
      height: calc(176vw / 3);
      position: relative;
      overflow: hidden;
      background-color: white;
      .featured-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
      }
      .logo {
        position: absolute;
        top: 6%;
        left: 4%;
        height: 11%;
      }
    }

    #download, #multiple-images-download-container {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;

      .artwork-preview {
        width: calc(88vw * 7);
        height: calc(176vw / 3 * 7);
      }
    }

    .artwork {
      width: 100%;
      padding-top: calc(200% / 3);
      background-color: white;
      position: relative;
      .image {
        @apply absolute left-0 top-0 w-full h-full object-cover object-center;
      }
      .logo {
        position: absolute;
        top: 6%;
        left: 4%;
        height: 11%;
      }
      i {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        cursor: pointer;
      }
    }

    #multiple-images-download-container {
      .artwork {
        flex-shrink: 0;
        padding-top: 0;
        width: calc(88vw * 7);
        height: calc(176vw / 3 * 7);
      }
    }

    #download-overlay {
      width: calc(88vw * 7);
      height: calc(176vw / 3 * 7);
      background-color: white;
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
    }

    @media(min-width: 800px) {
      .customized-container {
        .artwork-preview {
          width: 36vw;
          height: 24vw;
        }
      }
    }
  </style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div id="download">
    <div class="artwork-preview">
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
      <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}" alt="" class="logo">
    </div>
  </div>
  <div id="download-overlay"></div>

  <div class="customized-container">
    <div class="artwork-preview shadow">
      <img src="{{ asset('assets/general-assets/images/background.jpg') }}" alt="" class="featured-image">
      <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}" alt="" class="logo">
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
        <h2 class="label">Logo Position</h2>
        <div class="grid grid-cols-2 gap-4 w-16">
          <input type="radio" name="logo-position" value="1" checked>
          <input type="radio" name="logo-position" value="2">
          <input type="radio" name="logo-position" value="3">
          <input type="radio" name="logo-position" value="4">
        </div>
      </div>
      <div class="input-group mb-4">
        <h2 class="label">File Name</h2>
        <div class="space-y-6">
          <input type="text" id="file-name">
        </div>
      </div>
    </div>
  </div>

  {{-- multiple images --}}
  <div class="border-2 border-dashed p-4 mt-8">
    <div class="flex justify-between items-center">
      <div class="text-md">Multiple Images</div>
      <div>
        <label for="multiple-images" class="btn bg-maplaet-2 cursor-pointer">Upload</label>
        <input type="file" multiple accept="image/*" class="hidden" id="multiple-images">
        <button onclick="downloadPoster()" class="btn bg-maplaet-1">Download</button>
      </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 max-h-96 overflow-auto mt-4" id="multiple-images-preview-container">
    </div>
    <div id="multiple-images-download-container" class="flex overflow-hidden"></div>
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
  $('input[name="logo-position"]').on('change', function(){
    switch(+this.value){
      case 1 : 
        $('.logo').each(function(){
          $(this).css({
            'left' : '4%',
            'right' : 'unset',
            'top' : '6%',
            'bottom' : 'unset',
          })
        }); break
      case 2 : 
        $('.logo').each(function(){
          $(this).css({
            'left' : 'unset',
            'right' : '4%',
            'top' : '6%',
            'bottom' : 'unset',
          })
        }); break
      case 3 : 
        $('.logo').each(function(){
          $(this).css({
            'left' : '4%',
            'right' : 'unset',
            'top' : 'unset',
            'bottom' : '6%',
          })
        }); break
      case 4 : 
        $('.logo').each(function(){
          $(this).css({
            'left' : 'unset',
            'right' : '4%',
            'top' : 'unset',
            'bottom' : '6%',
          })
        }); break
    }
  })

  let fileName
  $('#file-name').on('input', function(){
    fileName = this.value.trim()
  })

  $('#multiple-images').on('input', function(){
    $.each(this.files, (index, file) => {
      new Compressor(file, {
          quality : 0.8,
          maxHeight: 2000,
          maxWidth: 2000,
          success(result) {
            const previewArtwork = document.createElement('div')
            previewArtwork.className = 'artwork'
            previewArtwork.innerHTML = `
              <img src="${URL.createObjectURL(result)}" alt="" class="image">
              <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}" alt="" class="logo">
              <i class="fa-solid fa-circle-minus text-maplaet-4"></i>
            `
            $('#multiple-images-preview-container').append(previewArtwork)
            const downloadArtwork = document.createElement('div')
            downloadArtwork.className = 'artwork'
            downloadArtwork.innerHTML = `
              <img src="${URL.createObjectURL(result)}" alt="" class="image">
              <img src="{{ asset('assets/kumnit/images/logo/default/kon-store-logo.svg') }}" alt="" class="logo">
            `
            $('#multiple-images-download-container').append(downloadArtwork)
            previewArtwork.querySelector('i').addEventListener('click', () => {
              previewArtwork.remove()
              downloadArtwork.remove()
            })
          }
        }
      )
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
          aspectRatio: 3/2,
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
        var link = document.createElement('a')
        link.download = `${fileName}.jpeg`
        link.href = dataUrl
        link.click()
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
          var link = document.createElement('a')
          link.download = `${fileName}.jpeg`
          link.href = dataUrl
          link.click()
        })
      })
    })
  }
</script>
@endsection
