<?php
// calculadora.php - Vista simple de una calculadora en PHP (un solo archivo)

// Inicializaciones
$resultado = null;
$error = null;
$a = isset($_POST['a']) ? trim($_POST['a']) : '';
$b = isset($_POST['b']) ? trim($_POST['b']) : '';
$op = isset($_POST['op']) ? $_POST['op'] : '+';

function esNumerico($v)
{
    return $v === '0' || $v === 0 || ($v !== '' && is_numeric($v));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['limpiar'])) {
        // Resetear
        $a = $b = '';
        $op = '+';
        $resultado = null;
        $error = null;
    } else {
        if (!esNumerico($a) || !esNumerico($b)) {
            $error = 'Por favor, ingresa números válidos.';
        } else {
            $aNum = (float) $a;
            $bNum = (float) $b;
            switch ($op) {
                case '+':
                    $resultado = $aNum + $bNum;
                    break;
                case '-':
                    $resultado = $aNum - $bNum;
                    break;
                case '*':
                    $resultado = $aNum * $bNum;
                    break;
                case '/':
                    if ($bNum == 0.0) {
                        $error = 'No se puede dividir entre 0.';
                    } else {
                        $resultado = $aNum / $bNum;
                    }
                    break;
                default:
                    $error = 'Operación no válida.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculadora PHP Simple</title>
    <style>
        :root {
            --bg: #0f172a;
            --panel: #111827;
            --text: #e5e7eb;
            --muted: #94a3b8;
            --accent: #22c55e;
            --danger: #ef4444;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Inter, sans-serif;
            background: linear-gradient(180deg, #0b1220, #0f172a);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px
        }

        .card {
            width: 100%;
            max-width: 560px;
            background: rgba(17, 24, 39, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .5);
            overflow: hidden
        }

        .card header {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            display: flex;
            align-items: center;
            gap: 12px
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 12px rgba(34, 197, 94, .7)
        }

        h1 {
            font-size: 18px;
            margin: 0;
            letter-spacing: .2px
        }

        .content {
            padding: 24px
        }

        label {
            display: block;
            font-size: 14px;
            color: var(--muted);
            margin-bottom: 8px
        }

        input,
        select {
            width: 100%;
            padding: 12px 14px;
            background: #0b1020;
            color: var(--text);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            outline: none
        }

        input:focus,
        select:focus {
            border-color: rgba(34, 197, 94, .6);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, .2)
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 110px 1fr;
            gap: 12px;
            align-items: end
        }

        .row {
            display: grid;
            gap: 12px;
            margin-top: 12px
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 16px
        }

        button {
            flex: 1;
            padding: 12px 14px;
            border: none;
            border-radius: 12px;
            color: #0b1020;
            font-weight: 600;
            cursor: pointer
        }

        .btn-primary {
            background: var(--accent)
        }

        .btn-secondary {
            background: #e5e7eb
        }

        .result,
        .error {
            margin-top: 16px;
            padding: 14px;
            border-radius: 12px;
            background: #0b1020;
            border: 1px solid rgba(255, 255, 255, 0.08)
        }

        .result strong {
            color: var(--accent)
        }

        .error {
            border-color: rgba(239, 68, 68, .4);
            color: #fecaca
        }

        .hint {
            margin-top: 10px;
            font-size: 12px;
            color: var(--muted)
        }

        .divider {
            height: 1px;
            background: rgba(255, 255, 255, .06);
            margin: 20px 0
        }
    </style>
</head>

<body>
    <div class="card">
        <header>
            <div class="dot"></div>
            <h1>Calculadora PHP Simple</h1>
        </header>
        <div class="content">
            <form method="post">
                <div class="grid">
                    <div>
                        <label for="a">Primer número</label>
                        <input type="number" step="any" id="a" name="a" value="<?= htmlspecialchars($a) ?>" required />
                    </div>

                    <div>
                        <label for="op">Operación</label>
                        <select id="op" name="op">
                            <option value="+" <?= $op === '+' ? 'selected' : '' ?>>+</option>
                            <option value="-" <?= $op === '-' ? 'selected' : '' ?>>−</option>
                            <option value="*" <?= $op === '*' ? 'selected' : '' ?>>×</option>
                            <option value="/" <?= $op === '/' ? 'selected' : '' ?>>÷</option>
                        </select>
                    </div>

                    <div>
                        <label for="b">Segundo número</label>
                        <input type="number" step="any" id="b" name="b" value="<?= htmlspecialchars($b) ?>" required />
                    </div>
                </div>

                <div class="actions">
                    <button class="btn-primary" type="submit" name="calcular">Calcular</button>
                    <button class="btn-secondary" type="submit" name="limpiar">Limpiar</button>
                </div>

                <?php if ($error): ?>
                    <div class="error">⚠️ <?= htmlspecialchars($error) ?></div>
                <?php elseif ($resultado !== null): ?>
                    <div class="result">Resultado:
                        <strong><?= rtrim(rtrim(number_format((float) $resultado, 10, '.', ''), '0'), '.') ?></strong>
                    </div>
                <?php endif; ?>

                <div class="hint">Consejo: puedes usar decimales (ej. 3.14) y cambiar la operación desde el selector.
                </div>
                <div class="divider"></div>
                <div class="hint">Archivo único · Seguro contra división por 0 · Mantiene los valores después del envío.
                </div>
            </form>
        </div>
    </div>
</body>

</html>