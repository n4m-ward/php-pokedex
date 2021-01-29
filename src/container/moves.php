<?php
?>

  <?php
foreach ($moves as $move) {
    $moveName = $move->move->name;
    $moveUrl  = $move->move->url;
?>
   <form action="pokemon.php" method="get" style="float:left">
      <input type="hidden" name="pokemon" value="<?= $name ?>"/>
      <input type="hidden" name="abilitymodal" value="2"/>
      <input type="hidden" name="abilityurl" value="<?= $moveUrl ?>"/>
      <button class="button is-primary is-outlined" aria-label="close"><?= $moveName ?></button>
  </form>
    <?php
}
?>