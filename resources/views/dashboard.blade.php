<x-app-layout>
@section('content')
        <div class="container mx-auto mt-4 mb-44 px-4 sm:px-0">
            <div class="flex flex-wrap justify-evenly mt-20">
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/5 px-2 mb-4 bg-white">
                    <a href="{{ route('beneficiario') }}">
                        <div class="w-full h-full bg-grey shadow-lg text-center pt-10 flex flex-col justify-center items-center">
                            <h3 class="mb-10">Beneficiarios</h3>
                        </div>
                    </a>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/5 px-2 mb-4 bg-white">
                    <a href="{{ route('prensa') }}">
                        <div class="w-full h-full bg-grey-light shadow-lg text-center pt-10 flex flex-col justify-center items-center">
                            <h3 class="mb-10">Prensa</h3>
                        </div>
                    </a>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/5 px-2 mb-4 bg-white">
                    <a href="{{ route('equipo') }}">
                        <div class="w-full h-full bg-grey shadow-lg text-center pt-10 flex flex-col justify-center items-center">
                            <h3 class="mb-10">Equipo</h3>
                        </div>
                    </a>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/5 px-2 mb-4 bg-white">
                    <a href="{{ route('pregunta') }}">
                        <div class="w-full h-full bg-grey shadow-lg text-center pt-10 flex flex-col justify-center items-center">
                            <h3 class="mb-10">Preguntas</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
