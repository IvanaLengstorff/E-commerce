<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{

    public function index()
    {
        $paymentMethods = PaymentMethod::all(); // Obtén todas las marcas
        return view('paymentMethods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('paymentMethods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        PaymentMethod::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('paymentMethods.index')->with('success', 'Metodo de Pago creado exitosamente.');
    }

    public function edit($id)
    {
        $paymentMethod = PaymentMethod::find($id); 
        return view('paymentMethods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->name = $request->input('name');
        $paymentMethod->save();

        return redirect()->route('paymentMethods.index')
            ->with('success', 'Metodo de Pago actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id);

        if ($paymentMethod) {
            $paymentMethod->delete();
            return redirect()->route('paymentMethods.index')
                ->with('success', 'Metodo de Pago eliminado exitosamente.');
        } else {
            return redirect()->route('paymentMethods.index')
                ->with('error', 'Metodo ed Pago no encontrado.');
        }
    }
}
