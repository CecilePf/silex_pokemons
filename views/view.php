<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="pokemons.css" rel="stylesheet" />
    <title>Pokemons - Home</title>
</head>
<?php
include('header.php');
?>
<body>
    <header>
        <h1>Pokemons ! Attrapez les tous ! ♫</h1>
    </header>
    <?php foreach ($articles as $article): ?>
    <article>
        <h3><?php echo $article->getId() ?> - <?php echo $article->getNameTrainer() ?></h3>
        <p>Pokémon(s) possédé(s) : <?php echo $article->getNamePokemon() ?></p>
    </article>
    <?php endforeach; ?>
</body>
</html>
