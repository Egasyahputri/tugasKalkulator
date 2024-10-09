<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .calculator {
            width: 300px;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator h2 {
            text-align: center;
            margin: 0;
            padding-bottom: 20px;
            font-size: 1.5em;
        }
        .calculator input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            font-size: 1.2em;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .calculator .buttons {
            display: flex;
            justify-content: space-between;
        }
        .calculator .buttons button {
            width: 65px;
            padding: 15px;
            font-size: 1.2em;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .calculator .buttons button:hover {
            background-color: #0056b3;
        }
        .calculator .result {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 10px;
            font-size: 1.4em;
            text-align: center;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Kalkulator</h2>
    <form method="post">
        <input type="text" name="number1" placeholder="Hasil 1" value="<?php echo isset($_POST['number1']) ? $_POST['number1'] : ''; ?>">
        <input type="text" name="number2" placeholder="Hasil 2" value="<?php echo isset($_POST['number2']) ? $_POST['number2'] : ''; ?>">
        <div class="buttons">
            <button type="submit" name="operation" value="add">+</button>
            <button type="submit" name="operation" value="subtract">-</button>
            <button type="submit" name="operation" value="multiply">×</button>
            <button type="submit" name="operation" value="divide">÷</button>
        </div>
        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $number1 = $_POST['number1'];
                $number2 = $_POST['number2'];
                $operation = $_POST['operation'];

                if (is_numeric($number1) && is_numeric($number2)) {
                    switch ($operation) {
                        case 'add':
                            $result = $number1 + $number2;
                            break;
                        case 'subtract':
                            $result = $number1 - $number2;
                            break;
                        case 'multiply':
                            $result = $number1 * $number2;
                            break;
                        case 'divide':
                            if ($number2 != 0) {
                                $result = $number1 / $number2;
                            } else {
                                $result = 'Error (bagi nol)';
                            }
                            break;
                        default:
                            $result = 'Operasi tidak valid';
                            break;
                    }
                    echo $result;
                } else {
                    echo "Masukkan angka valid!";
                }
            }
            ?>
        </div>
    </form>
</div>

</body>
</html>