<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Urvaccine</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Estilo adicional para ajustar el tamaño de fuente y el espaciado */
        body {
            font-size: 0.9rem; /* Reduce el tamaño de fuente general */
        }
        .certificate-header {
            height: 3rem; /* Ajusta el tamaño del logo */
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #000; /* Asegura que haya un borde negro alrededor de cada celda */
            padding: 4px; /* Reduce el relleno dentro de las celdas */
            font-size: 0.8rem; /* Reduce el tamaño de fuente en la tabla */
        }
        .content-row {
            margin-bottom: 0.5rem; /* Reduce el espacio entre filas de contenido */
        }
    </style>
</head>
<body>
    <div class="container overflow-hidden mb-5">
        <div class="text-center mb-4">
            <img src="{{ public_path('images/logopdf.png') }}" alt="Logo urvaccine" class="img-fluid border border-secondary rounded-lg certificate-header">
        </div>
        <h2 class="text-center mb-4 font-weight text-uppercase" style="margin-top: 1.5rem; color: #0a0186">
            Certificado de vacunación
        </h2>

        <div class="row justify-content-between border border-dark rounded content-row">
            <div class="col font-weight-bold border-end border-dark">
                <p style="font-weight: 700;">Nombre completo: 
                    <span style="font-weight: normal;">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</span>
                </p>
            </div>
            <div class="col text-uppercase border-end border-dark">
                <p style="font-weight: 700;">{{ auth()->user()->tipo_doc }}: 
                    <span style="font-weight: normal;">{{ auth()->user()->documento }}</span>
                </p>
            </div>
            <div class="col">
                <p style="font-weight: 700;">Fecha nacimiento: 
                    <span style="font-weight: normal;">{{ auth()->user()->nacimiento->toFormattedDateString() }}</span>
                </p>
            </div>
            <div class="col">
                <p style="font-weight: 700;">Genero: 
                    <span style="font-weight: normal;">{{ auth()->user()->genero }}</span>
                </p>
            </div>
        </div>        
    
        <div class="mt-1 rounded border border-dark">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Fecha de aplicación</th>
                        <th scope="col" class="text-center">Vacuna</th>
                        <th scope="col" class="text-center">Lote</th>
                        <th scope="col" class="text-center">Edad de aplicación</th>
                        <th scope="col" class="text-center">Empresa vacunadora</th>
                        <th scope="col" class="text-center">Lugar de aplicación</th>
                        <th scope="col" class="text-center">Enfermedad que previene</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($historiales as $historial)
                    <tr>
                        <td>{{ $historial->campana->fecha->toFormattedDateString() }}</td>
                        <td>{{ $historial->campana->vacuna->nombre }}</td>
                        <td>{{ $historial->campana->vacuna->lote }}</td>
                        <td>{{ $historial->edad }}</td>
                        <td>{{ $historial->campana->empresa }}</td>
                        <td>{{ $historial->campana->municipio }}, {{ $historial->campana->departamento }}</td>
                        <td>{{ $historial->campana->vacuna->enfermedad }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-4" style="color: #686868; text-transform: uppercase;">
                            No se encontraron registros de vacunación aún
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <p class="text-center text-muted mt-4 mb-0">
            Certificamos que el paciente 
            <span class="font-weight-bold" style="font-weight: bold; text-transform: uppercase; color: #0300a7">
                {{ auth()->user()->name }} {{ auth()->user()->apellido }}
            </span> 
            consta con certificado físico y en línea de las vacunas aquí mostradas.
        </p>
        <p class="text-center text-muted mt-4" style="bottom: 0; text-align: center; color: #8f8f8f; background-color: #eeeeee9a; padding: 10px; border-radius: 0.5rem;">
            Visítanos en 
            <span style="text-decoration: underline;">www.urvaccine.com.co</span> 
            para más información.
        </p>
    </div>
</body>
</html>
