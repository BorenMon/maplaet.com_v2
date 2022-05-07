@extends('layouts.superadmin.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;Add New Artwork in {{ $brandPage->name }}
@endsection

@section('css')
  <style>
    #container {
      background-color: white;
      padding: 1rem;
      display: flex;
      justify-content: space-between
    }

    #image-preview {
      width: 21rem;
      height: 21rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #e5e7eb;
      cursor: pointer;
      position: relative;
    }

    #image-preview i {
      font-size: 4rem;
    }

    #image-preview img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 90%;
      max-height: 90%;
    }

    #form {
      width: calc(100% - 22rem);
      display: flex;
      flex-direction: column;
    }

    #inputs {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    #inputs .label-input {
      width: calc((100% - 1rem) / 2) !important;
    }

    @media (max-width: 888px) {
      #container {
        flex-direction: column;
      }

      #image-preview {
        width: 18rem;
        height: 18rem;
      }

      #form {
        width: 18rem;
        margin-top: 1rem;
      }

      #inputs .label-input {
        width: 100% !important;
      }
    }
  </style>
@endsection

@section('content')

  <div class="rounded-lg" id="container">
    <label for="image" id="image-preview" class="border-2 border-dashed">
      <i class="fa-solid fa-upload"></i>
      <div class="mt-4">Click here to upload preview</div>
      <img src="" alt="">
    </label>
    <div id="form">
      <div id="inputs" class="space-y-4">
        <input type="file" id="image" class="hidden" accept="image/*">
        <div class="label-input">
          <label for="number" class="font-semibold">Number</label>
          <input type="Number" id="number" class="mt-2" min="1" step="1">
          <small class="text-maplaet-4 error" data-label="number"></small>
        </div>
        <div class="label-input">
          <label for="artwork_category_id" class="font-semibold">Category</label>
          <select id="artwork_category_id" class="mt-2">
            @foreach ($brandPage->artworkCategories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          <small class="text-maplaet-4 error" data-label="artwork_category_id"></small>
        </div>
      </div>
      <button class="btn w-20 bg-maplaet-1 mt-8" onclick="addHandler()">Add</button>
    </div>
  </div>

@endsection

@section('js')
<script>
  let file
  $('#image').on('input', function(){
      if(this.files[0]) {
        file = this.files[0]
        $('#image-preview img').attr('src', URL.createObjectURL(file))
        $('#image-preview div').addClass('hidden')
        $('#image-preview i').addClass('hidden')
      }
  })
  const addHandler = () => {
    if(file) {
      new Compressor(file, {
          quality : 0.8,
          maxHeight: 2000,
          maxWidth: 2000,
          success(result) {
            const formData = new FormData()
            formData.append('_token', "{{ csrf_token() }}")
            formData.append('image', result)
            formData.append('number', $('#number').val().trim())
            formData.append('artwork_category_id', $('#artwork_category_id').val().trim())
            $.ajax({
              url: "{{ route('superadmin.artwork.store') }}",
              type: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response) {
                const message = {
                  title: 'Success',
                  text: 'Artwork is stored',
                  icon: 'success'
                }
                sessionStorage.setItem("message", JSON.stringify(message))
                window.location=document.referrer
              },
              error: function(response) {
                $('.error').each(function(){$(this).text('')})
                const errors = response.responseJSON.errors
                for (const [key, value] of Object.entries(errors)) {
                  $(`.error[data-label=${key}]`).text(value)
                }
              }
            })
          }
      })
    }
  }
</script>
@endsection
