<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1d1f21, #3a3f44);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(8px);
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .btn-admin {
            display: inline-block;
            padding: 15px 30px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            border-radius: 50px;
            transition: 0.3s ease;
            font-weight: 600;
        }

        .btn-admin:hover {
            background: #43a047;
            transform: scale(1.05);
        }
    </style>

</head>
<body>

    <div class="container">
        <h1>Bienvenido a la Página Principal</h1>
        <p>Accede al panel de administración desde aquí:</p>
        
        <a href="http://127.0.0.1:8000/admin" class="btn-admin">
            Ir al Panel de Administración
        </a>
    </div>

</body>
</html>
