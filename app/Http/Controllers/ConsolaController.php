<?php

namespace App\Http\Controllers;

use App\Models\Consola;
use Illuminate\Http\Request;

/**
 * Class ConsolaController
 * @package App\Http\Controllers
 */
class ConsolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consolas = Consola::paginate();

        return view('consola.index', compact('consolas'))
            ->with('i', (request()->input('page', 1) - 1) * $consolas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consola = new Consola();
        return view('consola.create', compact('consola'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Consola::$rules);

        $consola = Consola::create($request->all());

        return redirect()->route('consolas.index')
            ->with('success', 'Consola created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consola = Consola::find($id);

        return view('consola.show', compact('consola'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consola = Consola::find($id);

        return view('consola.edit', compact('consola'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consola $consola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consola $consola)
    {
        request()->validate(Consola::$rules);

        $consola->update($request->all());

        return redirect()->route('consolas.index')
            ->with('success', 'Consola updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consola = Consola::find($id)->delete();

        return redirect()->route('consolas.index')
            ->with('success', 'Consola deleted successfully');
    }
}
