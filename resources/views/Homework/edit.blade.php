<x-app-layout><x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seccion de tarea - Editar ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ url('/homework/'.$data->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="user_id" name="user_id" value="{{ $data->user_id }}">
                        <!-- Nombre -->
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$data->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Descripcion -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Descripcion')" />
                            <x-input-textarea id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description',$data->description)" required/>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Fecha de vencimiento -->
                        <div class="mt-4">
                            <x-input-label for="deadline" :value="__('Fecha limite de completar la tarea')" />

                            <x-text-input id="deadline" class="block mt-1 w-full"
                                          type="date"
                                          :value="old('deadline',$data->deadline)"
                                          name="deadline"
                                          required />

                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('homework.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Regresar') }}
                            </a>

                            <x-secondary-button class="ms-4" type="reset">
                                {{ __('Reiniciar') }}
                            </x-secondary-button>

                            <x-primary-button class="ms-4" type="submit">
                                {{ __('Actualizar tarea') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
