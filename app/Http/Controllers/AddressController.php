<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /* ---------------------------------------------------------
     * LISTADO DE DIRECCIONES DEL USUARIO
     * --------------------------------------------------------- */
    public function index()
    {
        $addresses = Auth::user()->addresses()->latest()->get();

        return view('clients.addresses.index', compact('addresses'));
    }

    /* ---------------------------------------------------------
     * FORMULARIO DE CREACIÓN
     * --------------------------------------------------------- */
    public function create()
    {
        return view('clients.addresses.create');
    }

    /* ---------------------------------------------------------
     * GUARDAR NUEVA DIRECCIÓN
     * --------------------------------------------------------- */
    public function store(AddressRequest $request)
    {
        Auth::user()->addresses()->create($request->validated());

        return redirect()
            ->route('addresses.index')
            ->with('status', 'Dirección agregada correctamente.');
    }

    /* ---------------------------------------------------------
     * FORMULARIO DE EDICIÓN
     * --------------------------------------------------------- */
    public function edit(Address $address)
    {
        abort_unless($address->user_id === Auth::id(), 403);

        return view('clients.addresses.edit', compact('address'));
    }

    /* ---------------------------------------------------------
     * ACTUALIZAR DIRECCIÓN
     * --------------------------------------------------------- */
    public function update(AddressRequest $request, Address $address)
    {
        abort_unless($address->user_id === Auth::id(), 403);

        $address->update($request->validated());

        return redirect()
            ->route('addresses.index')
            ->with('status', 'Dirección actualizada correctamente.');
    }

    /* ---------------------------------------------------------
     * ELIMINAR DIRECCIÓN
     * --------------------------------------------------------- */
    public function destroy(Address $address)
    {
        abort_unless($address->user_id === Auth::id(), 403);

        $address->delete();

        return redirect()
            ->route('addresses.index')
            ->with('status', 'Dirección eliminada correctamente.');
    }
}
