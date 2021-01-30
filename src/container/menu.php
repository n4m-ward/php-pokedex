<?php
$types    = $pokemon->types;
$typeName = array();
foreach ($types as $oneType) {
    array_push($typeName, $oneType->type->name);
}
$typeName = implode(" | ", $typeName);
?>
<div id="mainPokeDiv">
<div id="pokeSpriteDiv">
    <img src="<?= $sprite ?>" alt="<?= $name ?> Foto" class="pokeSprite">
    <h4 class="pokeType"><?= $typeName ?></h4>
</div>

<div class="abilitiesDiv">
    
    <?php
foreach ($abilities as $ability) {
    $abilityName = $ability->ability->name;
    $abilityUrl  = $ability->ability->url;
    
    $abilityInfo   = executarCurl($abilityUrl);
    $effectEntries = getEffectEntries($abilityInfo);
    
    $entryEfects = $effectEntries->effect;
    $shortEfect  = $effectEntries->short_effect;
?>
       
    <div class="dropdown is-primary is-outlined is-hoverable is-right">
      <div class="dropdown-trigger">
        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
          <span><?= $abilityName ?></span>
          <span class="icon is-small">
            <i class="fas fa-angle-down" aria-hidden="true"></i>
          </span>
        </button>
      </div>
      <div class="dropdown-menu" id="dropdown-menu4" role="menu">
        <div class="dropdown-content">
          <div class="dropdown-item" id="efectsDiv">
            <p style="text-align: justify;"> <strong>entryEfects: </strong> <?= $entryEfects ?></p>
            <br>
            <p style="text-align: justify;"> <strong>shortEfect: </strong><?= $shortEfect ?></p>
          </div>
        </div>
      </div>
    </div>
    <?php
}
?>
</div>
  <?php
switch ($menu) {
    case 1:
?>
       <div>
          <div id="movesDiv">
            <h3>Moves</h3>
            <p>Click to Show More</p>
            <?php
        include('./src/container/moves.php');
?>
         </div>
        </div>
        <?php
        break;
    case 2:
?> 
        <div>
          <div id="statsDiv">
            <?php
        include('./src/container/status.php');
?>
         </div>
        </div>
            
        <?php
        break;
}
?>
</div>