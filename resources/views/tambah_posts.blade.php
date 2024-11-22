@extends('layouts.app')

@section('title', isset($post) ? 'Edit Post' : 'Tambah Post')

@section('content')
    <h1>{{ isset($post) ? 'Edit' : 'Tambah' }} Post</h1>
    <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror"></textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update' : 'Tambah' }}</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

    <button class="btn btn-info mt-3" id="generate-random" type="button">Generate Random Post</button>


@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/faker@5.1.0/dist/faker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/faker@5.1.0/dist/locales/id_ID.js"></script>
<script>
    faker.locale = 'id_ID'; // Set default locale to Bahasa Indonesia
    
    // Generate random title and content using Faker.js with Bahasa Indonesia
    document.getElementById('generate-random').addEventListener('click', function () {
        // Generate random title and content with Faker.js in Bahasa Indonesia
        const randomTitle = faker.lorem.sentence();   // Generate a random sentence for title
        const randomContent = faker.lorem.paragraph(); // Generate a random paragraph for content

        // Set the values in the input fields
        document.getElementById('title').value = randomTitle;
        document.getElementById('content').value = randomContent;
    });
</script>
@endpush
