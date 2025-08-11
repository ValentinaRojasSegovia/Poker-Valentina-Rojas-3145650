<?php

function mazoBarajado() {
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

        "As de Tréboles", "2 de Tréboles", "3 de Tréboles", "4 de Tréboles", "5 de Tréboles",
        "6 de Tréboles", "7 de Tréboles", "8 de Tréboles", "9 de Tréboles", "10 de Tréboles",
        "J de Tréboles", "Q de Tréboles", "K de Tréboles"
    ];

    shuffle($mazo);
    return $mazo;
}

function repartirCartas($mazo, $cantidad) {
    return array_splice($mazo, 0, $cantidad);
}

function mostrar($cartas) {
    foreach ($cartas as $i => $carta) {
        echo ($i + 1) . ". " . $carta . "\n";
    }
}

function reemplazarCartas($mano, &$mazo, $indices) {
    foreach ($indices as $indice) {
        if (isset($mano[$indice - 1])) {
            $mano[$indice - 1] = array_shift($mazo);
        }
    }
    return $mano;
}

function evaluar($cartas) {
    echo "\nEvaluando la mano...\n";
    mostrar($cartas);

    $valores = [];
    foreach ($cartas as $carta) {
        $partes = explode(" de ", $carta);
        $valor = $partes[0];
        if (!isset($valores[$valor])) {
            $valores[$valor] = 0;
        }
        $valores[$valor]++;
    }

    $parejas = 0;
    $trios = 0;
    $poker = 0;

    foreach ($valores as $cantidad) {
        if ($cantidad == 2) {
            $parejas++;
        } elseif ($cantidad == 3) {
            $trios++;
        } elseif ($cantidad == 4) {
            $poker++;
        }
    }

    if ($poker > 0) {
        echo "Tienes un Póker\n";
    } elseif ($trios > 0 && $parejas > 0) {
        echo "Full House\n";
    } elseif ($trios > 0) {
        echo "Tienes un Trío\n";
    } elseif ($parejas == 2) {
        echo "Doble pareja\n";
    } elseif ($parejas == 1) {
        echo "Tienes una pareja\n";
    } else {
        echo "Nada especial...\n";
    }
}

// Programa principal
$mazo = mazoBarajado();
$manoJugador = repartirCartas($mazo, 5);

echo "Tus cartas son:\n";
mostrar($manoJugador);

echo "\nEscribe los números separados por coma o si se conservan dale Enter: ";
$entrada = trim(fgets(STDIN));

if (!empty($entrada)) {
    $indices = array_map('intval', explode(",", $entrada));
    $manoJugador = reemplazarCartas($manoJugador, $mazo, $indices);
}

echo "\nTu mano final es:\n";
mostrar($manoJugador);

evaluar($manoJugador);

?>
