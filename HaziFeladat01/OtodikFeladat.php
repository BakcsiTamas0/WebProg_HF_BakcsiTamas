<!DOCTYPE html>
<html>
<head>
    <title>Otodik Feladat</title>
</head>
<body>
    <main>
        <p>Calculator simulation</p>
        <div class="container">
            <form action="" method="POST" id="calculator-form">
                <input type="number" name="number1" id="number1">
                <select name="operator" id="operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
                <input type="number" name="number2" id="number2">
                <button id="btn" type="submit">Calculate</button>
            </form>
        </div>
        <div class="result-container">
            <p id="result"></p>
        </div>
    </main>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $operator = $_POST["operator"];
            $number1 = $_POST["number1"];
            $number2 = $_POST["number2"];
            switch ($operator){
                case "+": $result = $number1 + $number2; break;
                case "-": $result = $number1 - $number2; break;
                case "*": $result = $number1 * $number2; break;
                case "/": 
                    if ($number2 != 0){
                        $result = $number1 / $number2;
                    } else {
                        $result = "Cannot divide by zero";
                    }
                    break;
            }
            echo '<script>
                    document.getElementById("result").textContent = "Result: ' . $result . '";
                 </script>';
        }
    ?>
</body>
</html>
