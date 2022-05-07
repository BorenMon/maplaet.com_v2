@extends('layouts.superadmin.app')
@section('header')
<i class="fa-solid fa-angle-left cursor-pointer" onclick="history.back()"></i>&emsp;Add New Admin Page
@endsection

@section('css')
  <style>
    #container {
      background-color: white;
      padding: 1rem;
      display: flex;
      justify-content: space-between
    }

    #logo-preview {
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

    #logo-preview i {
      font-size: 4rem;
    }

    #logo-preview img {
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

      #logo-preview {
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
    <label for="logo" id="logo-preview" class="border-2 border-dashed">
      <i class="fa-solid fa-upload"></i>
      <div class="mt-4">Click here to upload logo</div>
      <img src="" alt="">
    </label>
    <div id="form">
      <div id="inputs" class="space-y-4">
        <input type="file" id="logo" class="hidden" accept="image/*">
        <div class="label-input">
          <label for="name" class="font-semibold">Name</label>
          <input type="text" id="name" class="mt-2">
          <small class="text-maplaet-4 error" data-label="name"></small>
        </div>
        <div class="label-input">
          <label for="folder_name" class="font-semibold">Folder Name</label>
          <input type="text" id="folder_name" class="mt-2">
          <small class="text-maplaet-4 error" data-label="folder_name"></small>
        </div>
        <div class="label-input">
          <label for="is_active" class="font-semibold">Status</label>
          <select id="is_active">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
          <small class="text-maplaet-4 error" data-label="is_active"></small>
        </div>
      </div>
      <button class="btn w-20 bg-maplaet-1 mt-8" onclick="addHandler()">Add</button>
    </div>
  </div>

@endsection

@section('js')
<script>
  let file
  $('#logo').on('input', function(){
      if(this.files[0]) {
        file = this.files[0]
        $('#logo-preview img').attr('src', URL.createObjectURL(file))
        $('#logo-preview div').addClass('hidden')
        $('#logo-preview i').addClass('hidden')
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
            formData.append('logo', result)
            formData.append('name', $('#name').val().trim())
            formData.append('folder_name', $('#folder_name').val().trim())
            formData.append('is_active', $('#is_active').val().trim())
            $.ajax({
              url: "{{ route('superadmin.admin-page.store') }}",
              type: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response) {
                const message = {
                  title: 'Success',
                  text: 'Admin page is stored',
                  icon: 'success'
                }
                sessionStorage.setItem("message", JSON.stringify(message))
                window.location.href = "{{ route('superadmin.admin-page.index') }}"
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
