@extends('layouts.app')

@section('template_title')
    Equipo
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8 mt-4">
            <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Panel</a>
            <h1 class="text-3xl font-bold text-gray-800 mx-auto text-center">Integrantes del equipo</h1>
            <a href="{{ route('equipo.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-2 px-2 rounded">Nuevo Registro</a>
        </div>
        @if($equipos->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group text-white">
                    <tr class="w-full border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">
                        <th class="w-1/4 p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Nombre</th>
                        <th class="w-1/4 p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Apellido</th>
                        <th class="w-1/10 p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Cargo</th>
                        <th class="w-1/6 p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Foto</th>
                        <th class="w-1/6 p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @foreach ($equipos as $equipo)
                    <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">{{ $equipo->name }}</td>
                        <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">{{ $equipo->lastName }}</td>
                        <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">{{ $equipo->position }}</td>
                        <td class="p-2 md:border md:border-grey-500 items-center block md:table-cell" style="vertical-align: middle; text-align: center;">
                                <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                    @if($equipo->photo)
                                        <img src="{{ asset($equipo->photo) }}" alt="Imagen" style="width: 150px; height: 120px;">
                                    @endif
                                </div>
                            </td>
                        <td class="flex items-center space-x-2 justify-center md:table-cell" >
                                <div style="display: flex; justify-content: space-evenly; align-items: center; height: 100%;">
                                    <a href="{{ route('equipo.show', $equipo->id) }}" class="btn-blue">Ver</a>
                                    <a href="{{ route('equipo.edit', $equipo->id) }}" class="btn-blue">Editar</a>
                                    <form id="deleteForm1" action="{{ route('equipo.destroy', $equipo->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-red" >Eliminar</button>
                                    </form>
                                </div>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p class="font-bold text-center">No hay datos disponibles</p>
        @endif
        {!! $equipos->links() !!}
    </div>
@endsection
@section('scripts')


<script>
    $(".inline").on("submit", function(e) {
        e.preventDefault();
        const form = $(this);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger mr-10"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "¿Quieres eliminar este registro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            reverseButtons: true,
            customContainerClass: 'swal2-buttons-space'
        }).then((result) => {
            if (result.isConfirmed) {
                form.off("submit");
                form.submit();
            }
        });

        // Agregar estilo personalizado al botón de confirmación
        const confirmButton = document.querySelector('.swal2-confirm');
        if (confirmButton) {
            confirmButton.style.marginRight = '10px';
            confirmButton.style.backgroundColor = '#3490dc';
            confirmButton.style.borderColor = '#3490dc';
        }

        // Agregar estilo personalizado al botón de cancelación
        const cancelButton = document.querySelector('.swal2-cancel');
        if (cancelButton) {
            cancelButton.style.backgroundColor = '#dc3545';
            cancelButton.style.borderColor = '#dc3545';
            cancelButton.style.marginLeft = '10px';
        }
    });
</script>
@if (session('success'))
<script>
    Swal.fire({
        title: "¡Éxito!",
        text: "{{ session('success') }}",
        icon: "success"
    });
</script>
@endif

@endsection
