<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" name="title" id="title"
                       class="form-input w-full rounded-md shadow-sm @error('title') border-red-500 @enderror"
                       value="{{ old('title', $post->title) }}"
                       required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
                <textarea name="content" id="content" rows="5"
                          class="form-textarea w-full rounded-md shadow-sm @error('content') border-red-500 @enderror"
                          required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Image -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Current Image</label>
                <div>
                    @if ($post->image)
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="150" class="rounded-lg shadow-sm">
                    @else
                        <p class="text-gray-500 italic">No Image</p>
                    @endif
                </div>
            </div>

            <!-- Upload New Image -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Upload New Image</label>
                <input type="file" name="image" id="image"
                       class="form-input w-full rounded-md shadow-sm @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center space-x-4">
                <button type="submit" class="btn btn-success px-4 py-2 bg-green-600 text-white rounded-lg shadow-sm hover:bg-green-700">Update</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary px-4 py-2 bg-gray-400 text-white rounded-lg shadow-sm hover:bg-gray-500">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
