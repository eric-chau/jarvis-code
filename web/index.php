<?php

declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

use Jarvis\Jarvis;
use Jarvis\Skill\Debug\DebugCore;
use Jarvis\Skill\Twig\TwigCore;
use Symfony\Component\HttpFoundation\Response;

$app = new Jarvis([
    'debug' => true,
    'container_provider' => [
        DebugCore::class,
        TwigCore::class,
    ],
    'twig' => [
        'templates_paths' => __DIR__ . '/../res/views/',
    ],
]);

$app
    ->router
    ->beginRoute()
        ->setHandler(function (\Twig_Environment $twig) {
            return new Response($twig->render('index.html.twig'));
        })
    ->end()
;

$app->run()->send();
