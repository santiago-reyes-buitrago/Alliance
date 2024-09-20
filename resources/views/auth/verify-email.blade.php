<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Gracias por registrarte!. Antes de empezar, podrias verificar tu correo electronico dandole click en el email que te enviamos, si tu no lo recibes, estamos encantados de enviarte otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Un nuevo enlace de verificacion fue enviado a tu correo electronico que registraste.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Reenviar correo de verificacion') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Cerrar sesion') }}
            </button>
        </form>
    </div>
</x-guest-layout>
