<?php

namespace App;
class DNI {
    // Atributos
    private $dniSinLetra; // Número del DNI
    private $dniConLetra; // Número del DNI con la letra

    // Constructor
    public function __construct($dniSinLetra) {
        $this->dniSinLetra = $dniSinLetra;
        $this->dniConLetra = $this->calcularDNIConLetra();
    }

    // Método para calcular la letra del DNI
    private function calcularLetraDNI($dniSinLetra) {
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE"; // Secuencia de letras del DNI
        $indice = $dniSinLetra % 23; // Índice según el módulo 23
        return $letras[$indice]; // Devuelve la letra correspondiente
    }

    // Método para generar el DNI completo con la letra
    private function calcularDNIConLetra() {
        $letra = $this->calcularLetraDNI($this->dniSinLetra);
        return $this->dniSinLetra . $letra;
    }

    public function getDNIConLetra() {
        return $this->dniConLetra;
    }

}