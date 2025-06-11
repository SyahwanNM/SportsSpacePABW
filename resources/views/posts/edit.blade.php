@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<main class="pt-20 pb-20">
    <div class="flex justify-end">
        <div class="lg:w-4/5 md:w-4/5 p-4">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Edit Post</h2>
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-red-600 transition">
                        <i class="fi fi-rs-cross-circle text-xl"></i>
                    </a>
                </div>
                
                <form action="{{ route('posts.update', $post->id_post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="post_title" class="block text-sm font-medium text-gray-700">Title (Optional)</label>
                        <input type="text" name="post_title" id="post_title" value="{{ old('post_title', $post->post_title) }}"
                               class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                        @error('post_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="post_content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="post_content" id="post_content" rows="6"
                                  class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500"
                                  required>{{ old('post_content', $post->post_content) }}</textarea>
                        @error('post_content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Post Image -->
                    <div>
                        <label for="post_image" class="block text-sm font-medium text-gray-700">Image (Optional)</label>
                        <input type="file" name="post_image" id="post_image" accept="image/*"
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                        @error('post_image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-400 mt-1">Max file size: 2MB. Supported formats: JPG, JPEG, PNG</p>

                        @if($post->post_image)
                            <p class="text-sm text-gray-500 mt-2">Current Image:</p>
                            <img src="{{ asset('storage/' . $post->post_image) }}" alt="Current Post Image" class="mt-2 w-48 h-auto object-cover rounded-lg shadow-sm">
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-4 pt-4">
                        <button
                            type="submit"
                            class="flex-1 py-3 text-white bg-red-600 rounded-lg hover:bg-red-700 transition flex items-center justify-center space-x-2"
                        >
                            <i class="fi fi-rs-disk"></i>
                            <span>Save Changes</span>
                        </button>
                        <a
                            href="{{ route('dashboard') }}"
                            class="flex-1 py-3 text-center text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition flex items-center justify-center space-x-2"
                        >
                            <i class="fi fi-rs-cross-circle"></i>
                            <span>Cancel</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
