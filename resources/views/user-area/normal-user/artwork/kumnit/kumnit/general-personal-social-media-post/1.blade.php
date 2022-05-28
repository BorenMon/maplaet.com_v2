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
    .artwork-preview .background {
      width: 100%;
      height: 100%;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
    }
    .artwork-preview .overlay {
      position: absolute;
      top: 0;
      right: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #2857a5 0%, #0a3e89 100%);
      opacity: 90%;
    }
    .artwork-preview .box,
    .artwork-preview .mark,
    .artwork-preview .info {
      position: absolute;
    }
    .artwork-preview .box {
      top: 60%;
      left: 50%;
      transform: translate(-50%, -60%);
      min-height: 35%;
      width: 67.5%;
      background-color: rgba(255, 255, 255, 0.88);
      padding: 5.5vw 0;
      border-radius: 3vw;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .artwork-preview .box .mark {
      left: 50%;
      top: 0;
      transform: translate(-50%, -50%);
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.88) 0%, rgba(255, 255, 255, 0.88) 51%, rgba(255, 255, 255, 0) 51%, rgba(255, 255, 255, 0) 100%);
      width: 10vw;
      height: 10vw;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .artwork-preview .box .mark img {
      width: 4.5vw;
    }
    .artwork-preview .box .quote {
      text-align: center;
      font-family: "Stem-Bold", "Krasar-Bold", sans-serif;
      line-height: 1.5;
      width: 85%;
      word-wrap: break-word;
      font-size: 4.5vw;
    }
    .artwork-preview .box .info {
      width: 133%;
      overflow: hidden;
      bottom: 0;
      transform: translate(-50%, 100%);
      left: 50%;
      padding-top: 1vw;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }
    .artwork-preview .box .info .page {
      font-size: 1.8vw;
      letter-spacing: 0.2vw;
      font-family: "Stem-Regular";
      line-height: 0;
    }
    .artwork-preview .box .info .divider {
      margin: 0 1vw;
      width: 0.3vw;
      height: 3vw;
      background-color: #fff;
    }
    .artwork-preview .box .info img {
      height: 3vw;
    }
    .artwork-preview .box .info .name {
      font-family: "Stem-Medium", "Krasar-Medium";
      white-space: nowrap;
      line-height: 0;
      font-size: 1.8vw;
      margin-left: 1vw;
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
    #download .artwork-preview .box {
      padding: 38.5vw 0;
      border-radius: 21vw;
    }
    #download .artwork-preview .box .mark {
      width: 70vw;
      height: 70vw;
    }
    #download .artwork-preview .box .mark img {
      width: 31.5vw;
    }
    #download .artwork-preview .box .quote {
      font-size: 31.5vw;
    }
    #download .artwork-preview .box .info {
      padding-top: 7vw;
    }
    #download .artwork-preview .box .info .page {
      font-size: 12.6vw;
      letter-spacing: 1.4vw;
    }
    #download .artwork-preview .box .info .divider {
      margin: 0 7vw;
      width: 2.1vw;
      height: 21vw;
    }
    #download .artwork-preview .box .info img {
      height: 21vw;
    }
    #download .artwork-preview .box .info .name {
      font-size: 12.6vw;
      margin-left: 7vw;
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
      .customized-container .artwork-preview .box {
        padding: 2.25vw 0;
        border-radius: 1.2272727273vw;
      }
      .customized-container .artwork-preview .box .mark {
        width: 4.0909090909vw;
        height: 4.0909090909vw;
      }
      .customized-container .artwork-preview .box .mark img {
        width: 1.8409090909vw;
      }
      .customized-container .artwork-preview .box .quote {
        font-size: 1.8409090909vw;
      }
      .customized-container .artwork-preview .box .info {
        padding-top: 0.4090909091vw;
      }
      .customized-container .artwork-preview .box .info .page {
        font-size: 0.7363636364vw;
        letter-spacing: 0.0818181818vw;
      }
      .customized-container .artwork-preview .box .info .divider {
        margin: 0 0.4090909091vw;
        width: 0.1227272727vw;
        height: 1.2272727273vw;
      }
      .customized-container .artwork-preview .box .info img {
        height: 1.2272727273vw;
      }
      .customized-container .artwork-preview .box .info .name {
        font-size: 0.7363636364vw;
        margin-left: 0.4090909091vw;
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
        <img src="{{ asset('assets/general-assets/images/background.jpg') }}" class="background">
        <div class="overlay hidden"></div>
            
        <div class="box">
          <div class="mark">
            <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/1/kumnit-quote-mark.svg') }}">
          </div>
          <div class="quote">
            
          </div>
          <div class="info">
            <div class="page"></div>
            <div class="divider"></div>
            <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/1/social-media-icon.svg') }}">
            <div class="name">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="customized-container">
      <div class="artwork-preview shadow">
        <img src="{{ asset('assets/general-assets/images/background.jpg') }}" class="background">
        <div class="overlay hidden"></div>
            
        <div class="box">
          <div class="mark">
            <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/1/kumnit-quote-mark.svg') }}">
          </div>
          <div class="quote">
            
          </div>
          <div class="info">
            <div class="page"></div>
            <div class="divider"></div>
            <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/1/social-media-icon.svg') }}">
            <div class="name">
              
            </div>
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
          <h3 class="label">Page</h3>
          <div class="flex">
            <div class="form-check mr-4">
              <input class="form-check-input focus:ring-opacity-5" type="radio" name="background" id="bg-1" data-bg="kumnit" data-page="WWW.KUMNIT.COM" checked>
              <label class="form-check-label" for="bg-1">
                KUMNIT
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" id="bg-2" name="background" data-bg="viniyuk" data-page="VINIYUK HUB">
              <label class="form-check-label" for="bg-2">
                VINIYUK
              </label>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <h3 class="label">Mark</h3>
          <div class="flex">
            <div class="form-check mr-4">
              <input class="form-check-input" type="radio" name="mark" id="mark-1" data-bg="/kumnit.jpg" data-mark="question" checked>
              <label class="form-check-label" for="mark-1">
                Question
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" id="mark-2" name="mark" data-mark="quote">
              <label class="form-check-label" for="mark-2">
                Quote
              </label>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <h3 class="label">Overlay</h3>
          <div class="flex">
            <div class="form-check mr-4">
              <input class="form-check-input" type="radio" name="overlay" value="1" checked>
              <label class="form-check-label" for="mark-1">
                Hide
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="0" name="overlay">
              <label class="form-check-label" for="mark-2">
                show
              </label>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <label for="quote" class="label">Quote</label>
          <textarea id="quote" style="height: 111px; resize: none;"></textarea>
          <label for="quote-font-size-percentage" class="mr-2 mb-2">Size Percentage (%) :</label>
          <input type="number" id="quote-font-size-percentage" min="0" value="100">
        </div>
        <div class="input-group mb-4">
          <label for="website" class="label">Website</label>
          <div class="mb-3 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="relative ">
              <input type="text" id="website" placeholder="Enter or Select Your Website"/>
            </div>
            
            <select class="block text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-maplaet-1 focus:border-maplaet-1" id="select-website">
              
            </select>

          </div>
        </div>
        <div class="input-group">
          <label for="social-media" class="label">Social Media</label>
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class=" relative ">
              <input type="text" id="social-media" placeholder="Enter or Select Your Socail Media"/>
            </div>

            <select class="block text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-maplaet-1 focus:border-maplaet-1" id="select-social-media">
              
            </select>
          </div>
        </div>
      </div>
    </div>

    {{--  Saved Background  --}}
    <div id="saved-backgrounds">
      <h2 class="text-md mb-4">Saved Background</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 max-h-96 overflow-auto">
        {{-- @foreach ($savedImages as $image)
        @if ($image->type == 'background')
        <div class="saved-background">
          <img src="{{ Storage::url($image->url) }}">
          <i class="fa-solid fa-circle-minus" data-image="{{ $image->id }}"></i>
        </div>
        @endif
        @endforeach --}}
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
    $('input[name="overlay"]').on('change', function(){
      if(+this.value){
        $('.overlay').each(function(){
          $(this).addClass('hidden')
        })
      } else {
        $('.overlay').each(function(){
          $(this).removeClass('hidden')
        })
      }
    })

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
            case 0 : {
              $(obj).css({
                'font-size' : `calc(4.5vw * 7 * (${quoteFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(4.5vw * (${quoteFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
      } else {
        $('.quote').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(4.5vw * 7 * (${quoteFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(4.5vw * 36 / 88 * (${quoteFontSizePercentage} / 100))`,
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

    document.querySelectorAll('input[name="background"]').forEach(el => {
      el.addEventListener('click', function() {
        const data = this.dataset
        
        let markSrc = document.querySelector('.mark img').src
        if(markSrc.includes('viniyuk')) {
          markSrc = markSrc.replace('viniyuk-', data.bg+'-')
        } else markSrc = markSrc.replace('kumnit-', data.bg+'-')
        document.querySelectorAll('.mark img').forEach(el => el.src = markSrc)
        if(data.bg == 'kumnit') {
          $('.overlay').each(function(){
            this.style.background = 'linear-gradient(135deg, rgba(40,87,165,1) 0%, rgba(10,62,137,1) 100%)'
          })
        } else {
          $('.overlay').each(function(){
            this.style.background = 'linear-gradient(135deg, rgba(165,40,40,1) 0%, rgba(129,6,6,1) 100%)'
          })
        }
      })
    })

    document.querySelectorAll('input[name="mark"]').forEach(el => {
      el.addEventListener('click', function() {
        const data = this.dataset.mark + '-mark'
        let markSrc = document.querySelector('.mark img').src
        if(markSrc.includes('quote-mark')) {
          markSrc = markSrc.replace('quote-mark', data)
        } else markSrc = markSrc.replace('question-mark', data)
        document.querySelectorAll('.mark img').forEach(el => el.src = markSrc)
      })
    })

    document.getElementById('quote').addEventListener('input', function () {
      document.querySelectorAll('.quote').forEach(el => el.innerText = this.value)
    })

    let cropper, canvas

    // Upload Background Image
    $('#uploadProfile').on('change', function() {
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
            formData.append('type', 'background')
            formData.append('artwork_id', "{{ $artwork->id }}")
            $('#loading').css('display', 'flex')
            $.ajax({
              url: "",
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

          bgImgSrc = this.src
          destroyCropper()
          $('.background').each((i, obj) => {
            obj.src = bgImgSrc
          })
          $('#cropperImg').attr('src', bgImgSrc)
        })
      })
    }
    refreshBg()

    // Check Which is Selected
    const whichWebsite = () => {
      $('#select-website option').each((i, obj) => {
        if(obj.selected) {
          $('#website').val(obj.innerText.trim())
          $('.page').each((i, website) => {
            website.innerText = obj.innerText.trim().toUpperCase()
          })
        }
      })
    }
    const whichSocialMedia = () => {
      $('#select-social-media option').each((i, obj) => {
        if(obj.selected) {
          $('#social-media').val(obj.innerText.trim())
          $('.name').each((i, name) => {
            name.innerText = obj.innerText.trim()
          })
        }
      })
    }

    whichWebsite()
    whichSocialMedia()

    // Data Input
    $('#website').on('input', function(){
      const term = this.value
      $('.page').each((i, obj) => {
        obj.innerText = term.toUpperCase()
      })
    })
    $('#social-media').on('input', function(){
      const term = this.value
      $('.name').each((i, obj) => {
        obj.innerText = term
      })
    })
    $('#select-website').on('click', () => {
      whichWebsite()
    })
    $('#select-social-media').on('click', () => {
      whichSocialMedia()
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
