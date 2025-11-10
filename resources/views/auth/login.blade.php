<!-- Modernized with glassmorphic form, improved typography, better input styling -->
<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-slate-100 font-semibold mb-2" />
            <x-text-input 
                id="email" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username"
                class="w-full px-4 py-3 rounded-xl border border-white/20 bg-white/10 backdrop-blur text-white placeholder-slate-400 transition-all duration-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-white/20"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-slate-100 font-semibold mb-2" />
            <x-text-input 
                id="password" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password"
                class="w-full px-4 py-3 rounded-xl border border-white/20 bg-white/10 backdrop-blur text-white placeholder-slate-400 transition-all duration-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-white/20"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input 
                id="remember_me" 
                type="checkbox" 
                name="remember"
                class="w-4 h-4 rounded border-white/20 bg-white/10 text-blue-500 focus:ring-blue-400 cursor-pointer"
            >
            <label for="remember_me" class="ml-2 text-sm text-slate-300 cursor-pointer">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between pt-2">
            @if (Route::has('password.request'))
                <a 
                    class="text-sm text-blue-400 hover:text-blue-300 transition-colors underline" 
                    href="{{ route('password.request') }}"
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-200 shadow-lg hover:shadow-cyan-500/20">
                {{ __('Sign In') }}
            </x-primary-button>
        </div>

        <!-- Register Link -->
        <p class="text-center text-slate-400 text-sm pt-2">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors">
                Register here
            </a>
        </p>
    </form>
</x-guest-layout>
