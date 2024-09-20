<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seccion de tarea') }}
        </h2>
        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ url('homework/create') }}">
            {{ __('Crear tarea') }}
        </a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <table class="w-full mx-auto table-auto border-collapse border border-gray-800">
                        <thead class="bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Nombre</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Descripcion</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Fecha de vencimiento</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Estado</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Usuario</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($homeworks as $homework)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-800 border border-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800 border border-gray-800">{{ $homework->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800 border border-gray-800">{{ $homework->description }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800 border border-gray-800">{{ $homework->deadline }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800 border border-gray-800">{{ $homework->state ? 'Completada':'Pendiente' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800 border border-gray-800">{{ $homework->user_id == auth()->user()->id ? auth()->user()->name : '' }}</td>
                                <td class="px-4 py-2 text-sm  text-gray-800 border border-gray-800">
                                    <a class="px-4 py-2  bg-amber-500  rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" href="{{ url('homework/'.$homework->id.'/edit') }}">
                                        Editar tarea
                                    </a>
                                    <form method="POST" action="{{ url('homework/'.$homework->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500" onclick="return confirm('Borrar tarea {{ $homework->name }}?')">
                                            Eliminar tarea
                                        </button>
                                    </form>
                                    @if(!$homework->state)
                                        <form method="POST" action="{{ url('homework/check/'.$homework->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500" onclick="return confirm('Completar tarea {{ $homework->name }}?')">
                                                Completar tarea
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Nombre</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Descripcion</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Fecha de vencimiento</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Estado</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Usuario</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white border border-gray-800">Acciones</th>
                        </tr>
                        </tfoot>
                    </table>

                    {{ $homeworks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
