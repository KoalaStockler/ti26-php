<?php
// 1. Função de boas-vindas
function boasVindas($nome) {
    return "Bem-vindo, $nome!";
}

// 6. Função de inverter string
function inverterString($palavra) {
    return strrev($palavra);
}

// 7. Função de contar vogais
function contarVogais($str) {
    return preg_match_all('/[aeiouAEIOU]/', $str);
}

// 9. Função geradora de senhas
function gerarSenha($tamanho) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle(str_repeat($chars, ceil($tamanho/strlen($chars)))), 0, $tamanho);
}

// 18. Verificar se letra é vogal ou consoante
function tipoLetra($letra) {
    $vogais = ['a', 'e', 'i', 'o', 'u'];
    return in_array(strtolower($letra), $vogais) ? "Vogal" : "Consoante";
}

// 21. Strings que começam com vogal
function filtrarStringsVogais($strings) {
    return array_filter($strings, fn($s) => preg_match('/^[aeiouAEIOU]/', $s));
}