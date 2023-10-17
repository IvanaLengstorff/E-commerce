@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@stop

@section('content')
    <p>Bienvenido a ShopStyle</p>
    <!DOCTYPE html>
<html>
<head>
    <title>Cuadro de Bienvenida</title>
    <style>
        /* Estilos para el cuadro de bienvenida */
        .welcome-box {
            width: 400px;
            margin: 0 auto;
            background-color: #e3aad0;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
        }

        /* Estilos para el texto de bienvenida */
        .welcome-text {
            font-size: 24px;
            color: #0f010c;
        }
    </style>
</head>
<body>
    <div class="welcome-box">
        <h1 class="welcome-text">¡Bienvenido a Mi Sitio Web VirtualStyle!</h1>
        <p>Esperamos que disfrutes de tu visita y compres mucho.</p>
    </div>
</body>
</html>

@stop

@section('css')
@stop

@section('js')
@stop
