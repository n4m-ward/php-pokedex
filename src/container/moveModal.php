<?php

if (isset($abilityurl)) {
    $moveData          = executarCurl($abilityurl);
    $moveName          = $moveData->name;
    $movePower         = $moveData->power;
    $movePP            = $moveData->pp;
    $moveAccuracy      = $moveData->accuracy;
    $moveEffectChance  = $moveData->effect_chance . '%';
    $moveType          = $moveData->type;
    $moveEffectEntries = getMoveEffectEntries($moveData->effect_entries);
    $moveEffect        = $moveEffectEntries->effect;
    $contestCombos     = $moveData->contest_combos;
    $moveType = $moveData->type->name;
    if ($contestCombos) {
        if ($contestCombos->normal->use_after) {
            $useAfter = $contestCombos->normal->use_after[0]->name;
        } else {
            $useAfter = '?';
        }
        if ($contestCombos->normal->use_before) {
            $useBefore = $contestCombos->normal->use_before[0]->name;
        } else {
            $useBefore = '?';
        }
    }else{
      $useAfter = '?';
      $useBefore = '?';
    }
    if (mb_strpos($moveEffect, '$effect_chance%')) {
        $moveEffect = str_replace('$effect_chance%', $moveEffectChance, $moveEffect);
    }
?>

<div class="modal is-active">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"><?= $moveName ?>  (<?=$moveType ?>)</p>
      <form action="pokemon.php" method="get">
      <input type="hidden" name="abilitymodal" value="1"/>
      <input type="hidden" name="pokemon" value="<?= $name ?>"/>
      <button class="modal-close is-large" aria-label="close"></button>
  </form>
    </header>
    
    <section class="modal-card-body">
      <p><?= $moveEffect ?></p>
      <br>
      
      <div id="moveTables">
        <table class="table is-bordered" style="float:left;margin-right:10px;">
          <thead>
          </thead>
            <tr>
                <td>Move Info</td>
                <td>Value</td>
            </tr>
          
            <tr>
                <td>power</td>
                <td><?= $movePower ?></td>
            </tr>
            <tr>
                <td>accuracy</td>
                <td><?= $moveAccuracy ?></td>
            </tr>
            <tr>
                <td>pp</td>
                <td><?= $movePP ?></td>
            </tr>
          </table>
        
        
          <table class="table is-bordered" style="text-align:center">
            <thead>
            <tr>
            <th COLSPAN="2">
               <h3><br>COMBOS</h3>
            </th>
            </tr>
            </thead>
            </tr>

            <tr>
              <td>Use after</td>
              <td>Use Before</td>
            </tr>
            
            <tr>
              <td><?= $useAfter ?></td>
              <td><?= $useBefore ?></td>
            </tr>
          </table>
    </div>
    </section>
    <footer class="modal-card-foot">
      <form action="pokemon.php" method="get">
      <input type="hidden" name="abilitymodal" value="1"/>
      <input type="hidden" name="pokemon" value="<?= $name ?>"/>
      <button class="button is-danger">Close</button>
  </form>
    </footer>
  </div>
</div>
    
<?php
}
?>