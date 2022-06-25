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
      color: white;
    }
    .artwork-preview .background {
      width: 100%;
      height: 100%;
    }
    .artwork-preview .content {
      position: absolute;
      left: 7%;
      right: 7%;
      top: 40%;
      transform: translateY(-40%);
    }
    .artwork-preview .content .info {
      display: flex;
      align-items: center;
      height: 11.5vw;
      margin-bottom: 3.5vw;
    }
    .artwork-preview .content .info .profile {
      width: 11.5vw;
      height: 11.5vw;
      border-radius: 50%;
      -o-object-fit: cover;
        object-fit: cover;
      -o-object-position: center;
        object-position: center;
      margin-right: 2.5vw;
    }
    .artwork-preview .content .info .contact {
      display: flex;
      flex-direction: column;
    }
    .artwork-preview .content .info .contact .page {
      display: flex;
    }
    .artwork-preview .content .info .contact .page .name {
      font-family: "Stem-Medium", "Krasar-Medium", sans-serif;
      white-space: nowrap;
      font-size: 3vw;
      margin-right: 1vw;
    }
    .artwork-preview .content .info .contact .page .verified {
      width: 2.5vw;
    }
    .artwork-preview .content .info .contact .at {
      font-size: 2.5vw;
      font-family: "Stem-Regular", "Krasar-Regular", sans-serif;
      opacity: 0.7;
    }
    .artwork-preview .content .quote {
      font-family: "Stem-Regular", "Krasar-Regular", sans-serif;
      word-wrap: break-word;
      font-size: 4.12vw;
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
    #download .artwork-preview .content .info {
      height: 80.5vw;
      margin-bottom: 24.5vw;
    }
    #download .artwork-preview .content .info .profile {
      width: 80.5vw;
      height: 80.5vw;
      margin-right: 17.5vw;
    }
    #download .artwork-preview .content .info .contact .page .name {
      font-size: 21vw;
      margin-right: 7vw;
    }
    #download .artwork-preview .content .info .contact .page .verified {
      width: 17.5vw;
    }
    #download .artwork-preview .content .info .contact .at {
      font-size: 17.5vw;
    }
    #download .artwork-preview .content .quote {
      font-size: 28.84vw;
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
      .customized-container .artwork-preview .content .info {
        height: 4.7045454545vw;
        margin-bottom: 1.4318181818vw;
      }
      .customized-container .artwork-preview .content .info .profile {
        width: 4.7045454545vw;
        height: 4.7045454545vw;
        margin-right: 1.0227272727vw;
      }
      .customized-container .artwork-preview .content .info .contact .page .name {
        font-size: 1.2272727273vw;
        margin-right: 0.4090909091vw;
      }
      .customized-container .artwork-preview .content .info .contact .page .verified {
        width: 1.0227272727vw;
      }
      .customized-container .artwork-preview .content .info .contact .at {
        font-size: 1.0227272727vw;
      }
      .customized-container .artwork-preview .content .quote {
        font-size: 1.6854545455vw;
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
        <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/2/kumnit-background.svg') }}" class="background">
        
        <div class="content">
          <div class="info">
            <img src="{{ asset('assets/general-assets/images/maplaet-user-profile.svg') }}" class="profile">
            <div class="contact">
              <div class="page">
                <div class="name"></div>
                <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/2/verified.svg') }}" class="verified">
              </div>
              <div class="at">@kumnit</div>
            </div>
          </div>
          <div class="quote">
  
          </div>
        </div>
      </div>
    </div>
  
    <div class="customized-container">
      <div class="artwork-preview shadow">
        <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/2/kumnit-background.svg') }}" class="background">
        
        <div class="content">
          <div class="info">
            <img src="{{ asset('assets/general-assets/images/maplaet-user-profile.svg') }}" class="profile">
            <div class="contact">
              <div class="page">
                <div class="name"></div>
                <img src="{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/2/verified.svg') }}" class="verified">
              </div>
              <div class="at">@kumnit</div>
            </div>
          </div>
          <div class="quote">
  
          </div>
        </div>
      </div>
      
      <div id="input-container">
        @include('layouts.normal-user.operation-buttons')
        <div class="input-group mb-4">
          <h3 class="label">Page</h3>
          <div class="flex">
            <div class="form-check mr-4">
              <input class="form-check-input focus:ring-opacity-5" type="radio" name="background" id="bg-1" data-page="kumnit" checked>
              <label class="form-check-label" for="bg-1">
                KUMNIT
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" id="bg-2" name="background" data-page="viniyuk">
              <label class="form-check-label" for="bg-2">
                VINIYUK
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
        <div class="input-group">
          <label for="social-media" class="label">Social Media</label>
          <div class="flex">
            <input type="text" id="social-media" placeholder="Enter or Select Your Socail Media" style="width: calc(100% - 4rem) !important;"/>
            <button onclick="saveSocialMediaInput()" class="btn bg-gray-400 flex items-center justify-center" style="width: 3rem; margin-left: 1rem;"><i class="fa-solid fa-plus"></i></button>
          </div>
          <div class="flex flex-wrap mt-4 border saved-inputs" id="savedSocialMediaInputs">
            {{-- <div class="m-4 py-2 px-4 rounded bg-white text-sm cursor-pointer flex items-center selected" style="margin: 0.5rem;"><span class="mr-4">lorem ipsum</span><i class="fa-solid fa-xmark" style="font-family: 'Font Awesome 6 Free';"></i></div> --}}
            @foreach ($savedInputs as $input)
              @if ($input->category_name == 'Social Media')
                <div class="m-4 py-2 px-4 rounded bg-white text-sm cursor-pointer flex items-center" style="margin: 0.5rem;"><span class="mr-4">{{ $input->content }}</span><i data-id="{{ $input->id }}" class="fa-solid fa-xmark" style="font-family: 'Font Awesome 6 Free';"></i></div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>

    {{--  Saved Background  --}}
    <div id="saved-backgrounds">
      <h2 class="text-md mb-4">Saved Profile</h2>
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
  const saveSocialMediaInput = () => {
    const dataSet = {
      category_name: 'Social Media',
      content: $('#social-media').val().trim(),
      _token: "{{ csrf_token() }}"
    }
    $.ajax({
      url: "{{ route('saved-input.store') }}",
      type: 'POST',
      data: dataSet,
      success: function(response) {
        const content = document.createElement('div')
        content.className = 'm-4 py-2 px-4 rounded bg-white text-sm cursor-pointer flex items-center '
        content.style.margin = '0.5rem'
        content.innerHTML = `
          <span class="mr-4">${response.content}</span><i data-id="${response.id}" class="fa-solid fa-xmark" style="font-family: 'Font Awesome 6 Free';"></i>
        `
        $('#savedSocialMediaInputs').append(content)

        $('span', content).on('click', function(){
          $('#savedSocialMediaInputs div').each(function(){
            this.classList.remove('selected')
          })
          $(this).parent().addClass('selected')
          const term = this.innerText
          $('#social-media').val(term)
          $('.name').each(function() {
            this.innerText = term
          })
        })
        $('i', content).on('click', function(){
          const content = $(this).parent()
          if(confirm('Are you sure to delete this saved input?')){
            let route = "{{ route('saved-input.destroy', ['saved_input' => ':id']) }}"
            route = route.replace(':id', $(this).data('id'))
            $.ajax({
              url: route,
              type: 'DELETE',
              data: {_token: "{{ csrf_token() }}"},
              success: function(response) {
                content.remove()
              }
            })
          }
        })
      }
    })
  }
  $('#savedSocialMediaInputs div span').on('click', function(){
    $('#savedSocialMediaInputs div').each(function(){
      this.classList.remove('selected')
    })
    $(this).parent().addClass('selected')
    const term = this.innerText
    $('#social-media').val(term)
    $('.name').each(function() {
      this.innerText = term
    })
  })
  $('#savedSocialMediaInputs div i').on('click', function(){
    const content = $(this).parent()
    if(confirm('Are you sure to delete this saved input?')){
      let route = "{{ route('saved-input.destroy', ['saved_input' => ':id']) }}"
      route = route.replace(':id', $(this).data('id'))
      $.ajax({
        url: route,
        type: 'DELETE',
        data: {_token: "{{ csrf_token() }}"},
        success: function(response) {
          content.remove()
        }
      })
    }
  })


  const bg = document.querySelectorAll('.background')
  const at = document.querySelectorAll('.at')

  document.querySelectorAll('input[name="background"]').forEach(el => {
    el.addEventListener('click', function() {
      const page = this.dataset.page
      bg.forEach(el => {
        if(page == 'viniyuk') el.src = "{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/2/viniyuk-background.svg') }}"
        else el.src = "{{ asset('assets/kumnit/images/kumnit/general-personal-social-media-post/2/kumnit-background.svg') }}"
      })
      at.forEach(el => {
        if(page == 'viniyuk') el.innerText = '@viniyukhub'
        else el.innerText = '@kumnit'
      })
    })
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
                'font-size' : `calc(4.12vw * 7 * (${quoteFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(4.12vw * (${quoteFontSizePercentage} / 100))`,
              })             
            } break
          }
        })
      } else {
        $('.quote').each((i, obj) => {
          switch(i) {
            case 0 : {
              $(obj).css({
                'font-size' : `calc(4.12vw * 7 * (${quoteFontSizePercentage} / 100))`,
              })             
            } break
            case 1 : {
              $(obj).css({
                'font-size' : `calc(4.12vw * 36 / 88 * (${quoteFontSizePercentage} / 100))`,
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
              url: "{{ route('saved-image.store') }}",
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
          $('.profile').each((i, obj) => {
            obj.src = bgImgSrc
          })
          $('#cropperImg').attr('src', bgImgSrc)
        })
      })
    }
    refreshBg()

  // Data Input
  $('#social-media').on('input', function(){
    const term = this.value
    $('.name').each((i, obj) => {
      obj.innerText = term
    })
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
