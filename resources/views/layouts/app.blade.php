<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
    rel="stylesheet"
    href="https://unpkg.com/papercss@1.9.2/dist/paper.min.css"
  />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Memorily</title>
</head>
<body>
    <div class="flex flex-col justify-between h-screen">
   

        @include('layouts.header')
    
        <div class="paper m-6">
            @yield('content')
        </div>
    
        @include('layouts.footer')
  </div>
</body>
</html>