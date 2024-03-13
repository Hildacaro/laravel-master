<x-guest-layout>
    <a href="{{ route('welcome') }}" class="text-blue-500 hover:underline">Volver</a>
    <div class="flex min-h-full flex-col justify-center px-4 py-8 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-24 w-auto" src="{{ asset('images/logo1.svg') }}" alt="Nombre de tu organización">
            <!-- <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Registrate</h2> -->
        </div>
        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
            <form method="POST" action="{{ route('register') }}" class="mt-4">
                @csrf

                <!-- Name -->
                <div class="mb-2">
                    <x-input-label for="name" class="block text-sm font-medium leading-6 text-gray-900" :value="__('Nombre')" />
                    <div class="mt-2">
                        <x-text-input id="name" class="form-control shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-input-label for="email" class="block text-sm font-medium leading-6 text-gray-900" :value="__('Email')" />
                    <div class="mt-2">
                        <x-text-input id="email" class="form-control shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" class="block text-sm font-medium leading-6 text-gray-900" :value="__('Contraseña')" />
                    <div class="mt-2">
                        <x-text-input
                            id="password"
                            class="form-control shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                    <div class="mt-2">
                        <x-text-input
                            id="password_confirmation"
                            class="form-control shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center mt-4">
                    <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Registrarse') }}
                    </button>
                </div>

                <div>
                <p class="mt-3 text-sm text-gray-900 text-center">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-blue-500">
                        {{ __('Acceder') }}
                    </a>
                </p>
            </div>
            </form>
        </div>
    </div>
</x-guest-layout>
