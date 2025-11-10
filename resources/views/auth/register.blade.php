<!-- Modernized with glassmorphic form and improved input styling -->
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" class="text-slate-100 font-semibold mb-2" />
            <x-text-input 
                id="name" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required 
                autofocus 
                autocomplete="name"
                class="w-full px-4 py-3 rounded-xl border border-white/20 bg-white/10 backdrop-blur text-white placeholder-slate-400 transition-all duration-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-white/20"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400 text-sm" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-slate-100 font-semibold mb-2" />
            <x-text-input 
                id="email" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
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
                autocomplete="new-password"
                class="w-full px-4 py-3 rounded-xl border border-white/20 bg-white/10 backdrop-blur text-white placeholder-slate-400 transition-all duration-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-white/20"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-100 font-semibold mb-2" />
            <x-text-input 
                id="password_confirmation" 
                type="password" 
                name="password_confirmation" 
                required 
                autocomplete="new-password"
                class="w-full px-4 py-3 rounded-xl border border-white/20 bg-white/10 backdrop-blur text-white placeholder-slate-400 transition-all duration-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-white/20"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400 text-sm" />
        </div>

        <!-- Role Selection -->
        <div>
            <x-input-label for="role" :value="__('Role')" class="text-slate-100 font-semibold mb-2" />
            <select 
                id="role" 
                name="role" 
                required
                class="w-full px-4 py-3 rounded-xl border border-white/20 bg-white/10 backdrop-blur text-white transition-all duration-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-white/20"
            >
                <option value="user" class="bg-slate-900 text-white">User</option>
                <option value="admin" class="bg-slate-900 text-white">Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-400 text-sm" />
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between pt-2">
            <a 
                class="text-sm text-blue-400 hover:text-blue-300 transition-colors" 
                href="{{ route('login') }}"
            >
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-200 shadow-lg hover:shadow-cyan-500/20">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
