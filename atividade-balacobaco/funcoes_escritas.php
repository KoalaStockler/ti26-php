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