<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 py-12 px-4">
        
        <div class="w-full bg-white/95 backdrop-blur-lg rounded-2xl shadow-2xl p-8 border border-white/20" 
             style="max-width: 28rem; width: 100%;">
            
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg"
                     style="width: 4rem; height: 4rem;">
                    <svg style="width: 2rem; height: 2rem;" class="text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    Welcome Back
                </h2>
                <p class="mt-2 text-sm text-gray-600">Silakan masuk untuk melanjutkan</p>
            </div>

            <x-auth-session-status class="mb-4 mt-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-5">
                @csrf

                <!-- Email -->
                <!-- Email -->
    <div>
        <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
        <div class="mt-2 relative">
            <!-- Icon -->
            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                 style="padding-left: 0.875rem; z-index: 10;">
                <svg style="width: 1.25rem; height: 1.25rem; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
            </div>
            <!-- Input -->
            <input id="email" 
                type="email" 
                name="email" 
                value="{{ old('email') }}"
                required autofocus autocomplete="username"
                placeholder="nama@email.com"
                class="block w-full border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                style="padding: 0.75rem 1rem 0.75rem 2.75rem; font-size: 0.95rem; width: 100%;">
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div>
        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
        <div class="mt-2 relative">
            <!-- Icon -->
            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                 style="padding-left: 0.875rem; z-index: 10;">
                <svg style="width: 1.25rem; height: 1.25rem; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <!-- Input -->
            <input id="password" 
                type="password" 
                name="password" 
                required autocomplete="current-password"
                placeholder="••••••••"
                class="block w-full border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                style="padding: 0.75rem 1rem 0.75rem 2.75rem; font-size: 0.95rem; width: 100%;">
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" 
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 cursor-pointer" 
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-medium text-indigo-600 hover:text-indigo-500" 
                           href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <button type="submit" 
                    class="w-full flex justify-center items-center gap-2 py-3 px-4 text-sm font-semibold rounded-xl text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg hover:shadow-xl transition-all duration-200">
                    <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    {{ __('Log in') }}
                </button>

                @if (Route::has('register'))
                    <div class="text-center text-sm text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">
                            Daftar sekarang
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-guest-layout>