<!-- resources/views/posts/index.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Posts</h1>
                    <a href="{{ route('dashboard') }}" 
                       class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                        &larr; Back 
                    </a>
                    <!--<a href="{{ route('posts.create') }}" 
                       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        + Add Post
                    </a>-->
                </div>

                @if($posts->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="text-left px-4 py-2 border-b">Title</th>
                                    <th class="text-left px-4 py-2 border-b">Category</th>
                                    <th class="text-left px-4 py-2 border-b">Published</th>
                                    <th class="text-left px-4 py-2 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">{{ $post->title }}</td>
                                        <td class="px-4 py-2 border-b">{{ $post->category->name ?? 'N/A' }}</td>
                                        <td class="px-4 py-2 border-b">
                                            @if ($post->published_at)
                                                <span class="text-green-600 font-medium">Published</span>
                                            @else
                                                <span class="text-red-600 font-medium">Not Published</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 border-b space-x-2">
                                            <a href="{{ route('posts.edit', $post->id) }}" 
                                               class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                                                        onclick="return confirm('Are you sure you want to delete this post?');">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-600">No posts found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>