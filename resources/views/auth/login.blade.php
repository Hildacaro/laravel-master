<x-guest-layout>
    <a href="{{ route('welcome') }}" class="text-blue-500 hover:underline">Volver</a>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-24 w-auto" src="{{ asset('images/logo1.svg') }}" alt="Nombre de tu organización">
            <!-- <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Bienvenido</h2> -->
        </div>

            <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @csrf

                            <!-- Email Address -->
                <div>
                    <x-input-label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                        {{ __('Correo electrónico') }}
                    </x-input-label>
                    <div class="mt-2">
                        <x-text-input id="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                    <!-- Password -->
                <div>
                    <div class="flex items-center justify-between">
                        <x-input-label for="password" class="block text-sm font-medium leading-6 text-gray-900 mt-3">{{ __('Contraseña') }}</x-input-label>
                        <div class="text-sm">
                            @if (Route::has('password.request'))
                                <a 	class="font-semibold text-blue-600 hover:text-blue-500" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-text-input id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:outline-none" name="remember">
                        <span class="ml-2 block text-sm text-gray-700 dark:text-gray-300">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <div class="flex items-center mt-4">
                <!-- Button Login -->
                <button  class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Acceder') }}
                </button>
                </div>
            </form>
            <div>
                <p class="mt-3 text-sm text-gray-900 text-center">
                    ¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-500">
                        {{ __('Regístrate') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>


