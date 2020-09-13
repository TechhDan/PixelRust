<?php
//header('Content-Type: application/json');

require_once __DIR__ . '/vendor/autoload.php';

use PixelRust\GeneratorAdapter;
use PixelRust\Generators\PerlinNoise;

$generatorAdapter = new GeneratorAdapter(new PerlinNoise(3000));
$result = $generatorAdapter->generate(100, 100);

