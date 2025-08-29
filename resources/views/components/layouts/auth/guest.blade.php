<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Iniciar sessão' }}</title>
    @include('components.layouts.head.head')
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">

     {{-- <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
          </div>
      </div>
    </div> --}}

    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    @include('components.layouts.footer.footer')
    @livewireScripts
    @stack('scripts')
</body>
</html>
