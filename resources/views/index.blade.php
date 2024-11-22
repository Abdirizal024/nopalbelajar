@extends('layouts.app')

@section('title', 'Posts List')

@section('content')
<div class="d-flex flex-column align-items-start mb-4">
    <h1>CRUD Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mt-2">Tambah Post</a>
</div>
    {{-- @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;">Title</th>
                    <th style="width: 40%;">Content</th>
                    <th style="width: 15%;">Image</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td class="text-break">{{ $post->content }}</td>
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-thumbnail"
                                    style="width: 100px; height: auto;">
                            @else
                                <span class="text-muted">Tidak Ada Gambar</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-between gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm edit-button mb-1 w-75">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="w-75">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm delete-button w-100" data-id="{{ $post->id }}">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak Ada Data Posts</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        /* Toastr Success Styling */
        .toast-success {
            background-color: #28a745 !important; /* Hijau lebih cerah */
            color: white !important; /* Teks putih untuk kontras */
            font-weight: bold; /* Membuat teks lebih tebal */
        }

        /* Progress Bar Warna */
        .toast-success .toast-progress {
            background-color: #155724 !important; /* Warna hijau lebih gelap */
        }
    </style>

@endpush

@push('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
          // Konfigurasi Toastr
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000",  // Durasi tampil 5 detik
        "extendedTimeOut": "1000",
    };
            // Cek jika ada pesan di session
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
    </script>
    <script>
        // Menyesuaikan SweetAlert dengan Bootstrap Buttons
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false
        });

        // Konfirmasi hapus menggunakan SweetAlert
        $(document).on('click', '.delete-button', function() {
            let postId = $(this).data('id'); // Ambil ID post
            swalWithBootstrapButtons.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data ini akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batal!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form penghapusan jika tombol "Ya, hapus!" ditekan
                    document.getElementById(`delete-form-${postId}`).submit();

                    swalWithBootstrapButtons.fire({
                        title: 'Terhapus!',
                        text: 'Data Anda telah dihapus.',
                        icon: 'success'
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: 'Dibatalkan',
                        text: 'Data Anda aman :)',
                        icon: 'error'
                    });
                }
            });
        });

        // SweetAlert untuk Edit
        $(document).on('click', '.edit-button', function(e) {
            e.preventDefault(); // Mencegah default action
            Swal.fire({
                title: 'Edit Data',
                text: 'Anda akan diarahkan ke halaman pengeditan.',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Lanjutkan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Arahkan ke halaman edit jika "Lanjutkan" ditekan
                    window.location.href = $(this).attr('href');
                }
            });
        });
    </script>
@endpush
