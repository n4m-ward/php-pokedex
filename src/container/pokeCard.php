<?php
if (isset($pokeResult)) {
    if (isset($pokeResult->url)) {
        $pokeResult = executarCurl($pokeResult->url);
    }
    
    $frontSprite = $pokeResult->sprites->front_default;
    $name        = $pokeResult->name;
    $moves       = $pokeResult->moves;
    $types       = $pokeResult->types;
    $typeName    = array();
    $typeClassName = $types[0]->type->name;
    
    foreach ($types as $oneType) {
        array_push($typeName, $oneType->type->name);
    }
    $typeName = implode(" | ", $typeName);
    
?>
  <div class="<?=$typeClassName ?>" id="pokeCard">
      <br>
      <div class="media-content">
                        <p class="title is-4"><?= $name ?></p>
                        <p class="subtitle is-6"><?= $typeName ?></p>
                    </div>
      <div class="card-content">
        <div class="content" id="pokeImg">
          <img src="<?= $frontSprite ?>" alt="<?= $name ?> Sprite" class="pokeSprite">
        </div>
          <form action="pokemon.php" method="get">
            <input type="hidden" name="pokemon" value="<?= $name ?>"/>
            <button type="submit" class="button is-dark is-rounded">Poke Info</button>
          </form>
      </div>
    </div>
    
  <?php
} else {
?>

<div class="notification is-danger">
  Nenhum pokemon foi encontrado
</div>

<?php
}
?>