<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .calculator {
            max-width: 350px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator button {
            font-size: 1.5rem;
            margin: 5px;
        }
        .calculator input {
            height: 60px;
            font-size: 1.5rem;
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="calculator">
        <form action="calculadora.php" method="post">

            <h1 class="mb-3">Calculadora</h1>

            <input type="text" class="form-control mb-3" id="display" placeholder="Primer operador">

            <input type="text" class="form-control mb-3" id="display" placeholder="Segundo operador">


            <div class="row">
                <div class="col-4">
                    <button class="btn btn-secondary w-100">C</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-secondary w-100">/</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-secondary w-100">*</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-secondary w-100">-</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-secondary w-100">+</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
