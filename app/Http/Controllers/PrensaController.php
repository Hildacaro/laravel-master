<?php

namespace App\Http\Controllers;

use App\Models\Prensa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

/**
 * Class PrensaController
 * @package App\Http\Controllers
 */
class PrensaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prensas = Prensa::paginate();

        return view('prensa.index', compact('prensas'))
            ->with('i', (request()->input('page', 1) - 1) * $prensas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prensa = new Prensa();
        return view('prensa.create', compact('prensa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'date' => 'required|date_format:d-m-Y',
            'URL' => 'required',
            'photo' => 'mimes:avif,AVIF,jpeg,png,jpg,gif,svg,webp|max:2048', // Validar que sea una imagen y tenga ciertos formatos y tamaños
        ]);
        $data = $request->except(['_token', '_method']);

        // Formatear la fecha antes de insertarla
        $data['date'] = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');

        // Manejar la carga de la foto y almacenarla en el sistema de archivos o en la nube
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/imagenes');
            $data['photo'] = str_replace('public/', 'storage/', $path);
        }

        Prensa::create($data);

        return redirect()->route('prensa')
            ->with('success', 'Artículo creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prensa = Prensa::find($id);

        return view('prensa.show', compact('prensa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prensa = Prensa::find($id);
        $prensa->date = \Carbon\Carbon::parse($prensa->date);
        return view('prensa.edit', compact('prensa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Prensa $prensa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prensa $prensa, $id)
    {
        $prensa = Prensa::find($id);
        $request->validate([
            'title' => 'required',
            'date' => 'required|date_format:d-m-Y',
            'URL' => 'required',
            'photo' => 'image|mimes:avif,AVIF,jpeg,png,jpg,gif,svg,webp|max:2048', // Validar que sea una imagen y tenga ciertos formatos y tamaños
        ]);

        $data = $request->only(['title', 'date', 'URL', 'photo']);

        // Formatear la fecha antes de insertarla
        $data['date'] = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');

        // Manejar la carga de la foto y almacenarla en el sistema de archivos o en la nube
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/imagenes');
            $data['photo'] = str_replace('public/', 'storage/', $path);
        }

        $prensa->update($data);

        return redirect()->route('prensa')
            ->with('success', 'Articulo actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Prensa::find($id);

        return redirect()->route('prensa')
            ->with('success', 'Artículo eliminado correctamente');
    }

    public function news()
    {
        $prensas = Prensa::all();
        $data = $prensas->map(function ($prensa) {
            return [
                'id' => $prensa->id,
                'title' => $prensa->title,
                'date' => \Carbon\Carbon::parse($prensa->date),
                'URL' => $prensa->URL,
                'photo' => asset($prensa->photo), // Asumiendo que la ruta de la imagen está almacenada en la base de datos
            ];
        });

    return response()->json($data);
    }
}


