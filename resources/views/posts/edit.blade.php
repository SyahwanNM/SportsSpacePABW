@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold text-red-700 mb-4">Edit Post</h2>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded-lg shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="post_title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="post_title" name="post_title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('post_title', $post->post_title) }}" required>
        </div>

        <div class="mb-4">
            <label for="post_content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea id="post_content" name="post_content" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>{{ old('post_content', $post->post_content) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="post_image" class="block text-sm font-medium text-gray-700">Upload Image (optional)</label>
            <input type="file" id="post_image" name="post_image" accept="image/*" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            @if($post->post_image)
                <img src="{{ asset('storage/' . $post->post_image) }}" alt="Current Post Image" class="mt-2 w-32">
            @endif
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Update Post</button>
    </form>
</div>
@endsection
