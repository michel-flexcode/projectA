<x-guest-layout>
    <div class="flex flex-col justify-center h-screen"
        style="background-image: url('{{ asset('storage/backgrounds/HopliteV2.png') }}'); background-size: cover;">

        {{-- <div class=""></div> --}}
        {{-- // md:w-1/3 lg:w-1/4 --}}
        {{-- https://tailwindcss.com/docs/flex-basis#setting-the-flex-basis ml-[60%] --}}
        <div class="flex flex-row">
            <div class="basis-2/4">
            </div>
            <div class="basis-3/10 xl:w-1/4">
                <img src="{{ asset('storage/backgrounds/EY Digital Brand.png') }}" alt="Logo d'EY"
                    class="mx-auto w-1/2 h-auto object-cover mb-4">

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!--Attention à la font ! Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')"
                            class="text-white font-bold font-roboto text-2xl" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')"
                            class="text-white font-bold font-roboto text-2xl" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-6">
                        <div class="flex justify-evenly items-center">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-700 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-700">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                    </div>


                    <div class="flex items-center justify-center mt-4">

                        <!-- Login Button -->
                        <x-primary-button class="ms-3" style="background-color: #0050A1;">
                            {{ __('Log in') }}
                        </x-primary-button>

                        <!-- Register Button -->
                        <a href="{{ route('register') }}"
                            class="ms-8 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Register') }}
                        </a>

                    </div>


                </form>
            </div>
        </div>
        <footer class="w-full text-right p-4 text-white font-roboto fixed bottom-0">
            <p class="mr-[2%]">Legal Mentions</p>
        </footer>
    </div>
    </div>
</x-guest-layout>
