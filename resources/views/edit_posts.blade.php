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
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $post->title ?? '') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror">{{ old('content', $post->content ?? '') }}</textarea>
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
            @if(isset($post) && $post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="img-thumbnail mt-3" width="150">
            @endif
        </div>
        <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update' : 'Tambah' }}</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
