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