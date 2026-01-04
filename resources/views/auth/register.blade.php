<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#F5F1EC]">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <!-- HEADER -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-[#6F4E37]">
                    Daftar Pembaca
                </h1>
                <p class="text-sm text-[#5a3e2b] mt-2">
                    Buat akun untuk membaca artikel
                </p>
            </div>

            <!-- FORM REGISTER -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- NAMA -->
                <div>
                    <x-input-label for="name" value="Nama Lengkap" />
                    <x-text-input
                        id="name"
                        class="block mt-1 w-full"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- EMAIL -->
                <div class="mt-4">
                    <x-input-label for="email" value="Email" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
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
                        autocomplete="new-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                    <x-text-input
                        id="password_confirmation"
                        class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation"
                        required
                    />
                </div>

                <!-- HIDDEN ROLE PEMBACA -->
                <input type="hidden" name="role" value="pembaca">

                <!-- BUTTON REGISTER -->
                <div class="mt-6">
                    <button
                        type="submit"
                        class="w-full bg-[#6F4E37] hover:bg-[#5a3e2b] text-white font-semibold py-2 rounded-lg transition duration-200">
                        Daftar
                    </button>
                </div>
            </form>

            <!-- LINK LOGIN -->
            <div class="mt-6 text-center">
                <p class="text-sm text-[#5a3e2b]">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                       class="font-semibold text-[#6F4E37] hover:text-[#8b5e3c] underline">
                        Login di sini
                    </a>
                </p>
            </div>

        </div>
    </div>
</x-guest-layout>
