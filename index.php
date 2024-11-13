<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora en PHP</title>
</head>
<body>
    <h2>Calculadora en PHP</h2>
    <form method="post">
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" required>
        <br><br>
        <label for="num2">Número 2:</label>
        <input type="number" name="num2" required>
        <br><br>
        <label for="operation">Operación:</label>
        <select name="operation">
            <option value="sum">Suma</option>
            <option value="sub">Resta</option>
            <option value="mul">Multiplicación</option>
            <option value="div">División</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        
        $result = 0;

        switch ($operation) {
            case 'sum':
                $result = $num1 + $num2;
                break;
            case 'sub':
                $result = $num1 - $num2;
                break;
            case 'mul':
                $result = $num1 * $num2;
                break;
            case 'div':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Error: No se puede dividir entre 0";
                }
                break;
            default:
                $result = "Operación no válida";
        }

        echo "<h3>Resultado: $result</h3>";
    }
    ?>
</body>
</html>
