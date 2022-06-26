<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Forbidden</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <style>
    *{
      font-family: "Nunito";
    }
  </style>

  <link rel="shortcut icon" href="{{ asset('assets/general-assets/images/maplaet-favicon.svg') }}" type="image/x-icon">
</head>
<body style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100vw; height: 100vh; margin: 0;">
  <img src="@yield('src')" alt="" style="max-width: 70%; max-height: 70%;">
  @yield('addition')
</body>
</html>