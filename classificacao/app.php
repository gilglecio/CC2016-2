<?php

const MEDIA_MULHERES = 1.60;
const MEDIA_HOMEM = 1.75;

/**
 * Lista de alturas
 * @var array
 */
$alturas = file_get_contents('alturas.txt');
$alturas = explode("\n", $alturas);

/**
 * Ordena do mais baixo para o mais alto
 */
sort($alturas);

/**
 * Altura máxima para as mulheres
 * @var float
 */
$max = MEDIA_MULHERES + ((MEDIA_HOMEM - MEDIA_MULHERES) / 2);

$qtd_mulheres = count(array_filter($alturas, function ($r) use ($max) {
	return $r <= $max;
}));

$qtd_homens = count($alturas) - $qtd_mulheres;

$m = number_format($qtd_mulheres / count($alturas) * 100, 2, '.', '');
$h = number_format($qtd_homens / count($alturas) * 100, 2, '.', '');

echo sprintf("Das %s pessoas. %s (%s%%) são homens e %s (%s%%) são mulheres.\n", 
	count($alturas), $qtd_homens, $h, $qtd_mulheres, $m);