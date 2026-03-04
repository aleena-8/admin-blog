<!-- resources/views/categories/index.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card container -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Page Heading -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Categories</h1>
                    <a href="{{ route('categories.create') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        + Add Category
                    </a>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $category->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $category->slug }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $category->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($category->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>