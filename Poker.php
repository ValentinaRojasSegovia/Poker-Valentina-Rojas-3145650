<?php

function repartirCartas() {
    $mazo = [
        "As de Corazones", "2 de Corazones", "3 de Corazones", "4 de Corazones", "5 de Corazones",
        "6 de Corazones", "7 de Corazones", "8 de Corazones", "9 de Corazones", "10 de Corazones",
        "J de Corazones", "Q de Corazones", "K de Corazones",
        "As de Picas", "2 de Picas", "3 de Picas", "4 de Picas", "5 de Picas",
        "6 de Picas", "7 de Picas", "8 de Picas", "9 de Picas", "10 de Picas",
        "J de Picas", "Q de Picas", "K de Picas",
        "As de Diamantes", "2 de Diamantes", "3 de Diamantes", "4 de Diamantes", "5 de Diamantes",
        "6 de Diamantes", "7 de Diamantes", "8 de Diamantes", "9 de Diamantes", "10 de Diamantes",
        "J de Diamantes", "Q de Diamantes", "K de Diamantes",
        "As de Treboles", "2 de Treboles", "3 de Treboles", "4 de Treboles", "5 de Treboles",
        "6 de Treboles", "7 de Treboles", "8 de Treboles", "9 de Treboles", "10 de Treboles",
        "J de Treboles", "Q de Treboles", "K de Treboles"
    ];

    $cartasSeleccionadas = [];
    $cantidadCartas = 5;
    $mazoSize = count($mazo);

    while (count($cartasSeleccionadas) < $cantidadCartas) {
        $indiceAleatorio = rand(0, $mazoSize - 1);
        
        if (!in_array($mazo[$indiceAleatorio], $cartasSeleccionadas)) {
            $cartasSeleccionadas[] = $mazo[$indiceAleatorio];
        }
    }

    return $cartasSeleccionadas;
}

function mostrarCartas($cartas) {
    foreach ($cartas as $carta) {
        echo $carta ;
    }
}

function evaluarMano($cartas) {

    echo "Evaluando la mano: \n";
    mostrarCartas($cartas);
    echo "Esta funcionalidad de evaluación aún no está implementada completamente. \n";
}

$cartasRepartidas = repartirCartas();
echo "Cartas repartidas: \n";
mostrarCartas($cartasRepartidas);

evaluarMano($cartasRepartidas);

?>