<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#F5F1EC]">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <!-- HEADER -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-[#6F4E37]">
                    Sistem Artikel
                </h1>
                <p class="text-sm text-[#5a3e2b] mt-2">
                    Login Admin & Pembaca
                </p>
            </div>

            <!-- INFO ROLE -->
            <div class="mb-6 text-center text-sm text-[#5a3e2b]">
                <p>
                    <span class="font-semibold">Admin</span> hanya untuk pengelola artikel.<br>
                    <span class="font-semibold">Pembaca</span> silakan login atau daftar akun.
                </p>
            </div>

            <!-- SESSION STATUS -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- FORM LOGIN -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- PASSWORD -->
                <div class="mt-4">
                    <x-input-label for="password" value="Password" />
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- REMEMBER -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 text-[#6F4E37] shadow-sm focus:ring-[#6F4E37]"
                            name="remember"
                        >
                        <span class="ms-2 text-sm text-gray-600">
                            Ingat saya
                        </span>
                    </label>
                </div>

                <!-- BUTTON LOGIN -->
                <div class="mt-6">
                    <button
                        type="submit"
                        class="w-full bg-[#6F4E37] hover:bg-[#5a3e2b] text-white font-semibold py-2 rounded-lg transition duration-200">
                        Login
                    </button>
                </div>
            </form>

            <!-- REGISTER PEMBACA -->
            <div class="mt-6 text-center">
                <p class="text-sm text-[#5a3e2b]">
                    Belum punya akun?
                    <a href="{{ route('register') }}"
                       class="font-semibold text-[#6F4E37] hover:text-[#8b5e3c] underline">
                        Daftar sebagai Pembaca
                    </a>
                </p>
            </div>

        </div>
    </div>
</x-guest-layout>
