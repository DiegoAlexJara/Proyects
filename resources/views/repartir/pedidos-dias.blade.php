<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Pagos</title>

    {{-- Floowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000000;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #555555;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #000000;
            color: white;
        }
        th {
            background-color: #000000;
            color: #ffffff;
        }
        .total-row {
            font-weight: bold;
            background-color: #000000;
        }
        .highlight {
            color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        
        @livewire('repartir.pedidos-entregados-dias')
    </div>
</body>
</html>