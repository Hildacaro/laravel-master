@extends('layouts.app')

@section('template_title')
    Prensa
@endsection

@section('content')

    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8 mt-4">
            <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Panel</a>
            <h1 class="text-3xl font-bold text-gray-800 mx-auto text-center">Lista de Artículos de Prensa</h1>
            <a href="{{ route('prensa.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-center py-2 px-2 rounded">Nuevo Registro</a>
        </div>
        @if($prensas->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group text-white">
                    <tr class="w-full border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                        <th class="w-1/12 p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Número</th>
                        <th class="w-1/4 p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Titulo</th>
                        <th class="w-1/12 p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Fecha</th>
                        <th class="w-1/4 p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">URL</th>
                        <th class="p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Foto</th>
                        <th class="p-2 text-white font-bold md:border md:border-grey-500 block md:table-cell text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($prensas as $prensa)
                        <tr class="bg-white border border-grey-500 md:border-none block md:table-row ">
                            <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">{{ ++$i }}</td>
                            <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">{{ $prensa->title }}</td>
                            <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">{{ $prensa->date ? \Carbon\Carbon::parse($prensa->date)->format('d-m-Y') : "" }}</td>
                            <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">{{ $prensa->URL }}</td>
                            <td class="p-2 md:border md:border-grey-500 items-center block md:table-cell" style="vertical-align: middle; text-align: center;">
                                <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                    @if($prensa->photo)
                                        <img src="{{ asset($prensa->photo) }}" alt="Imagen" style="width: 200px; height: 150px;">
                                    @endif
                                </div>
                            </td>
                            <td class="flex items-center space-x-2 justify-center md:table-cell" >
                                <div style="display: flex; justify-content: space-around; align-items: center; height: 100%;">
                                    <a href="{{ route('prensa.show', $prensa->id) }}" class="btn-blue">Ver</a>
                                    <a href="{{ route('prensa.edit', $prensa->id) }}" class="btn-blue">Editar</a>
                                    <form id="deleteForm1" action="{{ route('prensa.destroy', $prensa->id) }}" method="POST" class="inline">
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
            No hay datos disponibles.
        @endif
        {!! $prensas->links() !!}
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
