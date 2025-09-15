<?php
// 2. Função de soma simples
function soma($a, $b) {
    return $a + $b;
}

// 3. Função de par ou ímpar
function parOuImpar($num) {
    return ($num % 2 == 0) ? "Par" : "Ímpar";
}

// 4. Função de maior número
function maiorNumero($a, $b, $c) {
    return max($a, $b, $c);
}

// 5. Função de média
function media($numeros) {
    return array_sum($numeros) / count($numeros);
}

// 8. Função de tabuada
function tabuada($num) {
    $resultado = "";
    for ($i = 1; $i <= 10; $i++) {
        $resultado .= "$num x $i = " . ($num * $i) . "\n";
    }
    return $resultado;
}

// 10. Função de formatar CPF
function formatarCPF($cpf) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $cpf);
}

// 11. Função de conversão Real -> Dólar
function converterRealParaDolar($valor, $cotacao) {
    return $valor / $cotacao;
}

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

// 19. Filtrar números pares
function filtrarPares($numeros) {
    return array_filter($numeros, fn($n) => $n % 2 === 0);
}

// 20. Retornar segundo maior número
function segundoMaior($numeros) {
    rsort($numeros);
    return $numeros[1] ?? null;
}

// 22. Cubo de um número
function cubo($n) {
    return $n ** 3;
}

// 23. Raiz quadrada de um número
function raizQuadrada($n) {
    return sqrt($n);
}