<?php

// Home page
$app->get('/', function () use ($app) {
    $pokemons = $app['dao.pokemon']->findTrainersPokemons();
    return $app['twig']->render('home.html.twig', array('pokemons' => $pokemons));
})->bind('home');

// Liste des pokémons
$app->get('/liste', function () use ($app) {
    $pokemons = $app['dao.pokemon']->findAll();
    return $app['twig']->render('liste.html.twig', array('pokemons' => $pokemons));
})->bind('liste');

// Show
$app->get('/liste/{id}', function ($id) use ($app) {
    $attacks = $app['dao.pokemon']->find($id);
    return $app['twig']->render('attack.html.twig', array('attacks' => $attacks));
})->bind('attack');