<x-guest-layout>
    <div class="flex flex-col justify-center h-screen"
        style="background-image: url('{{ asset('storage/backgrounds/HopliteV2.png') }}'); background-size: cover;">

        <div class="flex flex-row">
            <div class="basis-2/4">
                <!-- You can add some content or leave it empty for spacing -->
            </div>
            <div class="basis-3/10 xl:w-1/4">
                <img src="{{ asset('storage/backgrounds/EY Digital Brand.png') }}" alt="Logo d'EY"
                    class="mx-auto w-1/2 h-auto object-cover mb-4">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-white font-bold font-roboto text-2xl" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" class="text-white font-bold font-roboto text-2xl" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" class="text-white font-bold font-roboto text-2xl" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white font-bold font-roboto text-2xl" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <a class="underline text-sm text-gray-700 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4" style="background-color: #0050A1;">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
                <div class="flex items-center justify-center mt-4">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Back to Login') }}
                    </a>
                </div>
            </div>
        </div>
        <footer class="w-full text-right p-4 text-white font-roboto fixed bottom-0">
            <p class="mr-[2%]">
                <a href="{{ route('legal') }}">Legal Mentions</a>
            </p>   
        </footer>
    </div>
</x-guest-layout>
