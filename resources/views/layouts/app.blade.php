<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRUD Posts')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    @stack('css')
</head>
<body>
    <div class="container mt-4">
        @yield('content')
    </div>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        {{-- <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            // Toastr configuration
            toastr.options = {
                "closeButton": true,         // Tombol Close
                "progressBar": true,        // Progress bar
                "onclick": null,
                "showDuration": "5000",      // Durasi muncul (ms)
                "hideDuration": "1000",     // Durasi hilang (ms)
                "timeOut": "10000",          // Durasi tampil (ms)
                "hideEasing": "linear",
                "showMethod": "fadeIn",     // Efek muncul
                "hideMethod": "fadeOut"     // Efek hilang
            };

            // Menampilkan notifikasi dari session Laravel
            @if(session('success'))
                toastr.success("{{ session('success') }}");
            @elseif(session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        </script> --}}
        @stack('js')
</body>
</html>
