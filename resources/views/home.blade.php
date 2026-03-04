<!-- resources/views/home.blade.php -->

<x-app-layout>
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white p-8 rounded-lg shadow mb-8">
                <h1 class="text-3xl font-bold mb-2">Hello, {{ Auth::user()->name }}!</h1>
                <p class="text-lg">Welcome back! Here’s what you can do today.</p>
            </div>

            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @if(optional(Auth::user()->role)->name === 'admin')
                    <!-- Admin Cards -->
                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold mb-3">Manage Categories</h2>
                        <p class="text-gray-600 mb-4">Create, edit, or delete categories for posts.</p>
                        <a href="{{ route('categories.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Go
                        </a>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold mb-3">View All Users Posts</h2>
                        <p class="text-gray-600 mb-4">See posts submitted by all users.</p>
                        <a href="{{ route('posts.index') }}" class="inline-block px-4 py-2 bg-pink-600 text-white rounded hover:bg-pink-700 transition">
                            Go
                        </a>
                    </div>
                
                @else
                    <!-- User Cards -->
                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold mb-3">Add Post</h2>
                        <p class="text-gray-600 mb-4">Create a new post and share it with others.</p>
                        <a href="{{ route('posts.create') }}" class="inline-block px-4 py-2 bg-pink-600 text-white rounded hover:bg-pink-700 transition">
                            Go
                        </a>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold mb-3">View Posts</h2>
                        <p class="text-gray-600 mb-4">Browse posts from all users.</p>
                        <a href="{{ route('posts.index') }}" class="inline-block px-4 py-2 bg-pink-600 text-white rounded hover:bg-pink-700 transition">
                            Go
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>