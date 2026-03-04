<!-- resources/views/categories/edit.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Card container -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Page Heading -->
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Category</h1>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Name:</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" required
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Slug:</label>
                        <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" required
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Status:</label>
                        <select name="status"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="active" {{ old('status', $category->status)=='active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $category->status)=='inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Update Category
                        </button>
                        <a href="{{ route('categories.index') }}"
                           class="ml-4 text-gray-600 hover:text-gray-900">Back to Categories</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>