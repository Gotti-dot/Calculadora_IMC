<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ImcController extends Controller
{
    /**
     * Muestra el formulario para calcular el IMC.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('imc.imc_form');
    }

    /**
     * Procesa los datos del formulario y calcula el IMC.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function calculateImc(Request $request)
    {
        try {
            $validated = $request->validate([
                'weight' => 'required|numeric|min:1|max:600', // Peso en kg
                'height' => 'required|numeric|min:0.5|max:3', // Altura en metros
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $weight = $validated['weight'];
        $height = $validated['height'];

        // Calcular IMC
        // Fórmula: IMC = peso (kg) / (altura (m) * altura (m))
        $imc = $weight / ($height * $height);

        // Determinar la categoría del IMC
        $category = $this->getImcCategory($imc);

        return view('imc.imc_result', [
            'imc' => $imc,
            'category' => $category,
            'weight' => $weight,
            'height' => $height,
        ]);
    }

    /**
     * Determina la categoría del IMC.
     *
     * @param float $imc
     * @return string
     */
    private function getImcCategory(float $imc): string
    {
        if ($imc < 18.5) {
            return 'Bajo peso';
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            return 'Peso normal';
        } elseif ($imc >= 25 && $imc < 29.9) {
            return 'Sobrepeso';
        } elseif ($imc >= 30 && $imc < 34.9) {
            return 'Obesidad (Clase I)';
        } elseif ($imc >= 35 && $imc < 39.9) {
            return 'Obesidad (Clase II)';
        } else {
            return 'Obesidad (Clase III - Obesidad mórbida)';
        }
    }
}