<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del IMC</title>
    <link rel="stylesheet" href="{{ asset('css/imc_result.css') }}">
</head>
<body>
    <div class="container">
        <h1>Resultado de tu IMC</h1>

        @if(isset($imc) && isset($category))
            <p>Tu peso es: {{ $weight }} kg</p>
            <p>Tu altura es: {{ $height }} metros</p>
            <p>Tu Índice de Masa Corporal (IMC) es:</p>
            <div class="imc-value">{{ number_format($imc, 2) }}</div>
            <p class="imc-category">Categoría: {{ $category }}</p>
        @else
            <p>No se pudo calcular el IMC. Por favor, intenta de nuevo.</p>
        @endif

        <a href="{{ route('imc.form') }}" class="back-button">Calcular de nuevo</a>
    </div>
</body>
</html>