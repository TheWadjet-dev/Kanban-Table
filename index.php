<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>
<body>
    <h2>PHP Calculator</h2>
    <form method="post">
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" required>
        <br><br>
        <label for="num2">Number 2:</label>
        <input type="number" name="num2" required>
        <br><br>
        <label for="operation">Operation:</label>
        <select name="operation">
            <option value="sum">Addition</option>
            <option value="sub">Subtraction</option>
            <option value="mul">Multiplication</option>
            <option value="div">Division</option>
        </select>
        <br><br>
        <input type="submit" value="Calculate">
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
                    $result = "Error: Cannot divide by 0";
                }
                break;
            default:
                $result = "Invalid operation";
        }

        echo "<h3>Result: $result</h3>";
    }
    ?>
</body>
</html>
