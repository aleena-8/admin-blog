<!-- resources/views/posts/edit.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Edit Post</h1>
                    <a href="{{ route('posts.index') }}" 
                       class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                        Back to Posts
                    </a>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium text-gray-700">Title:</label>
                        <input type="text" name="title" 
                               value="{{ old('title', $post->title) }}" 
                               required 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Slug (optional):</label>
                        <input type="text" name="slug" 
                               value="{{ old('slug', $post->slug) }}" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Category:</label>
                        <select name="category_id" required 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">--Select Category--</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $post->category_id)==$category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Description:</label>
                        <textarea name="description" rows="5" required
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $post->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Published At (optional):</label>
                        <input type="datetime-local" name="published_at"
                               value="{{ old('published_at') ? \Carbon\Carbon::parse(old('published_at'))->format('Y-m-d\TH:i') : '' }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <button type="submit" 
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Update Post
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>