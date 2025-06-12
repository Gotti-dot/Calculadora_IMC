<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
    <link rel="stylesheet" href="{{ asset('css/imc_form.css') }}">
</head>
<body>
    <div class="container">
        <h1>Calculadora de IMC</h1>

        @if ($errors->any())
            <div class="error-message" style="margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('imc.calculate') }}" method="POST">
            @csrf
            <div>
                <label for="weight">Peso (kg):</label>
                <input type="number" id="weight" name="weight" step="0.01" required value="{{ old('weight') }}">
                @error('weight')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="height">Altura (metros):</label>
                <input type="number" id="height" name="height" step="0.01" required value="{{ old('height') }}">
                @error('height')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Calcular IMC</button>
        </form>
    </div>
</body>
</html>