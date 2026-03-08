<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; }
        form { display: flex; flex-direction: column; gap: 10px; }
        input, select, button { padding: 10px; font-size: 16px; }
        button { background: #333; color: white; border: none; cursor: pointer; }
        button:hover { background: #555; }
        .result { margin-top: 15px; padding: 10px; background: #f0f0f0; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Simple Calculator</h1>
    <form method="POST" action="">
        <input type="number" name="num1" step="any" placeholder="First number" required
               value="<?= isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : '' ?>">
        <select name="operator">
            <option value="+" <?= (isset($_POST['operator']) && $_POST['operator'] === '+') ? 'selected' : '' ?>>+</option>
            <option value="-" <?= (isset($_POST['operator']) && $_POST['operator'] === '-') ? 'selected' : '' ?>>−</option>
            <option value="*" <?= (isset($_POST['operator']) && $_POST['operator'] === '*') ? 'selected' : '' ?>>×</option>
            <option value="/" <?= (isset($_POST['operator']) && $_POST['operator'] === '/') ? 'selected' : '' ?>>÷</option>
        </select>
        <input type="number" name="num2" step="any" placeholder="Second number" required
               value="<?= isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : '' ?>">
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = (float) $_POST['num1'];
        $num2 = (float) $_POST['num2'];
        $operator = $_POST['operator'] ?? '+';

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                $result = $num2 != 0 ? $num1 / $num2 : 'Error: Division by zero';
                break;
            default:
                $result = 'Invalid operator';
        }
        echo '<div class="result"><strong>Result:</strong> ' . htmlspecialchars((string) $result) . '</div>';
    }
    ?>
</body>
</html>
