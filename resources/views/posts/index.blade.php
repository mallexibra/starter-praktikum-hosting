<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="mx-auto py-8" style="width: 80%">
        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-400 text-white p-2 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Button Create (dengan flex untuk menempatkan di kanan) -->
        <div class="mb-4 flex justify-end">
            <a href="{{ route('posts.create') }}"
               class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create New Post</a>
        </div>

        <!-- Table Posts -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if($posts->isEmpty())
                <p class="text-center text-gray-500">No posts available. Please create a new post.</p>
            @else
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Content</th>
                            <th class="px-4 py-2 border">Image</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-4 py-2 border">{{ $post->title }}</td>
                                <td class="px-4 py-2 border">{{ Str::limit($post->content, 50) }}</td>
                                <td class="px-4 py-2 border">
                                    @if ($post->image)
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"
                                            width="100">
                                    @else
                                        <em>No Image</em>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                       class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
