<div class="mb-12 text-center space-y-2" id="_1">
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
  <button @if(!Auth::user()->telegram_id) disabled title="Update your telegram id in profile setting to enable this feature." @endif class="btn ml-1 disabled:opacity-30 disabled:cursor-not-allowed disabled:transform-none" style="background-color: #2AABEE;" onclick="sendToTelegram()">
    <i class="fa-brands fa-telegram" style="font-family: 'Font Awesome 6 Brands' !important;"></i>
  </button>
</div>