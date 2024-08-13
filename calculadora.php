<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Calculadora PHP</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="number1">Número 1:</label>
                <input type="text" class="form-control" id="number1" name="number1" required>
            </div>
            <div class="form-group">
                <label for="number2">Número 2:</label>
                <input type="text" class="form-control" id="number2" name="number2" required>
            </div>
            <div class="form-group">
                <label for="operation">Operação:</label>
                <select class="form-control" id="operation" name="operation" required>
                    <option value="add">Adição</option>
                    <option value="subtract">Subtração</option>
                    <option value="multiply">Multiplicação</option>
                    <option value="divide">Divisão</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number1 = $_POST['number1'];
            $number2 = $_POST['number2'];
            $operation = $_POST['operation'];

            // Validações básicas
            if (is_numeric($number1) && is_numeric($number2)) {
                switch ($operation) {
                    case 'add':
                        $result = $number1 + $number2;
                        $operation_symbol = '+';
                        break;
                    case 'subtract':
                        $result = $number1 - $number2;
                        $operation_symbol = '-';
                        break;
                    case 'multiply':
                        $result = $number1 * $number2;
                        $operation_symbol = '×';
                        break;
                    case 'divide':
                        if ($number2 != 0) {
                            $result = $number1 / $number2;
                            $operation_symbol = '÷';
                        } else {
                            $result = 'Erro: Divisão por zero!';
                            $operation_symbol = '';
                        }
                        break;
                    default:
                        $result = 'Operação inválida!';
                        $operation_symbol = '';
                }

                // Exibe o resultado
                echo "<div class='mt-4 alert alert-info'>";
                if (is_numeric($result)) {
                    echo "<strong>Resultado: </strong> $number1 $operation_symbol $number2 = $result";
                } else {
                    echo "<strong>$result</strong>";
                }
                echo "</div>";

            } else {
                // Exibe uma mensagem de erro para entradas inválidas
                echo "<div class='mt-4 alert alert-danger'><strong>Erro: </strong>Insira números válidos!</div>";
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
