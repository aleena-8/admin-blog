<x-guest-layout>
    <div class="flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8 min-h-[auto]">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Welcome Back!
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Please login to your account
                </p>
            </div>

            <!-- Card -->
            <div class="bg-white py-8 px-6 shadow-lg rounded-lg sm:px-10">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-green-600" :status="session('status')" />

                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="font-semibold" />
                        <x-text-input id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="font-semibold" />
                        <x-text-input id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:text-indigo-900 font-medium"
                               href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div>
                        <x-primary-button class="w-full flex justify-center py-2 px-4 rounded-md shadow-sm text-white font-semibold bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center mt-4 text-gray-600 text-sm">
                        Don't have an account? <a href="{{ route('register') }}" class="text-indigo-600 font-medium hover:text-indigo-900">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>