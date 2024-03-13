<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

/**
 * Class EquipoController
 * @package App\Http\Controllers
 */
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::paginate();

        return view('equipo.index', compact('equipos'))
            ->with('i', (request()->input('page', 1) - 1) * $equipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipo = new Equipo();
        return view('equipo.create', compact('equipo'));
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
            'name' => 'required',
            'lastName' => 'required',
            'position' => 'required',
            'photo' => 'mimes:avif,AVIF,jpeg,png,jpg,gif,svg,webp|max:2048', // Validar que sea una imagen y tenga ciertos formatos y tamaños
        ]);
        $data = $request->except(['_token', '_method']);

        // Manejar la carga de la foto y almacenarla en el sistema de archivos o en la nube
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/imagenes');
            $data['photo'] = str_replace('public/', 'storage/', $path);
        }

        Equipo::create($data);

        return redirect()->route('equipo')
            ->with('success', 'Integrante creado correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);

        return view('equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);

        return view('equipo.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Equipo $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo, $id)
    {

        $equipo = Equipo::find($id);

        $request->validate([
            'name' => 'required',
            'lastName' => 'required',
            'position' => 'required',
            'photo' => 'mimes:avif,AVIF,jpeg,png,jpg,gif,svg,webp|max:2048', // Validar que sea una imagen y tenga ciertos formatos y tamaños
        ]);

        $data = $request->only(['name', 'lastName', 'position', 'photo']);

        // Manejar la carga de la foto y almacenarla en el sistema de archivos o en la nube
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/imagenes');
            $data['photo'] = str_replace('public/', 'storage/', $path);
        }

        $equipo->update($data);

        return redirect()->route('equipo')
            ->with('success', 'Equipo actualizado correctamente!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Equipo::find($id)->delete();

        return redirect()->route('equipo')
            ->with('success', 'Equipo eliminado correctamente!');
    }

    public function team()
    {
        $equipos = Equipo::all();
        $data = $equipos->map(function ($equipo) {
            return [
                'id' => $equipo->id,
                'name' => $equipo->name,
                'lastName' => $equipo->lastName,
                'position' => $equipo->position,
                'photo' => asset($equipo->photo)
            ];
        });

        return response()->json($data);
    }
}
