<?php
// ---------- FUNÇÕES ----------

// 17. Função de aumento salarial
function aumentoSalarial($nome, $salario) {
    if ($salario < 1000) {
        $novoSalario = $salario * 1.20;
    } elseif ($salario <= 2000) {
        $novoSalario = $salario * 1.15;
    } else {
        $novoSalario = $salario * 1.10;
    }
    return "Funcionário: $nome - Novo salário: R$ " . number_format($novoSalario, 2, ',', '.');
}

// 18. Verificar se letra é vogal ou consoante
function tipoLetra($letra) {
    $vogais = ['a', 'e', 'i', 'o', 'u'];
    return in_array(strtolower($letra), $vogais) ? "Vogal" : "Consoante";
}

// 19. Filtrar números pares
function filtrarPares($numeros) {
    return array_filter($numeros, fn($n) => $n % 2 === 0);
}

// 20. Retornar segundo maior número
function segundoMaior($numeros) {
    rsort($numeros);
    return $numeros[1] ?? null;
}

// 21. Strings que começam com vogal
function filtrarStringsVogais($strings) {
    return array_filter($strings, fn($s) => preg_match('/^[aeiouAEIOU]/', $s));
}

// 22. Cubo de um número
function cubo($n) {
    return $n ** 3;
}

// 23. Raiz quadrada de um número
function raizQuadrada($n) {
    return sqrt($n);
}

// ---------- INTERAÇÃO ----------

// Pega os dados enviados pelo formulário
$resultado = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $opcao = $_POST["opcao"];

    switch ($opcao) {
        case "17":
            $resultado = aumentoSalarial($_POST["nome"], (float)$_POST["salario"]);
            break;
        case "18":
            $resultado = tipoLetra($_POST["letra"]);
            break;
        case "19":
            $array = explode(",", $_POST["numeros"]);
            $resultado = implode(", ", filtrarPares(array_map("intval", $array)));
            break;
        case "20":
            $array = explode(",", $_POST["numeros"]);
            $resultado = segundoMaior(array_map("intval", $array));
            break;
        case "21":
            $array = explode(",", $_POST["strings"]);
            $resultado = implode(", ", filtrarStringsVogais($array));
            break;
        case "22":
            $resultado = cubo((float)$_POST["numero"]);
            break;
        case "23":
            $resultado = raizQuadrada((float)$_POST["numero"]);
            break;
    }
}
?>