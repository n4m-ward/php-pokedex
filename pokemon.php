<?php
include('./src/util/util.php');
if (isset($_GET['pokemon'])) {
    $pokeName = $_GET['pokemon'];
    $pokemon  = findPokemon($pokeName);
}

if (isset($_GET['abilitymodal'])) {
    $abilityModal = $_GET['abilitymodal'];
} else {
    $abilityModal = 1;
}
if (isset($_GET['abilityurl'])) {
    $abilityurl = $_GET['abilityurl'];
}

if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
} else {
    $menu = 1;
}

if (isset($pokemon)) {
    $stats     = array();
    $name      = $pokemon->name;
    $abilities = $pokemon->abilities;
    $moves     = $pokemon->moves;
    $sprite    = $pokemon->sprites->front_default;
    $pokeStats = $pokemon->stats;
    
    foreach ($pokeStats as $onePokeStats) {
        $statName = $onePokeStats->stat->name;
        $baseStat = $onePokeStats->base_stat;
        array_push($stats, [$statName, $baseStat]);
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<html>
    <div class="column is-half is-offset-one-quarter">
        
    <div class="card" id="pokemonCard">
      <header class="card-header">
        <p class="card-header-title">
          <?= $name ?> Dados
        </p>
      </header>
      <div class="card-content">
        <div class="content">
          
          <?php
include('./src/container/menu.php');
?>
         
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item">
            <form action="pokemon.php" method="get">
                    <input type="hidden" name="menu" value="1"/>
                    <input type="hidden" name="pokemon" value="<?= $name ?>"/>
                    <input class="button is-link is-outlined" type="submit" value="Moves"/>
          </form>
        </a>
        <a href="#" class="card-footer-item">
            <form action="pokemon.php" method="get">
                <input type="hidden" name="menu" value="2"/>
                <input type="hidden" name="pokemon" value="<?= $name ?>"/>
                <input class="button is-link is-outlined " type="submit" value="Stats"/>
          </form>
        </a>
        <a href="index.php" class="card-footer-item">
                <input class="button is-danger is-outlined " type="submit" value="Home"/>
        </a>
      </footer>
    </div>
    
    <?php
switch ($abilityModal) {
    case 1:
        echo '';
        break;
    case 2:
        include('./src/container/moveModal.php');
        break;
}
?>
</html>

<script>
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'value']
            
            <?php foreach($stats as $stat){ 
                $pokemonStat = $stat[0]; $baseStat = $stat[1];   ?>
            
                ,['<?php echo $pokemonStat;?>',<?php echo $baseStat ?>]
                
               <?php } ?>
            ]);
            
        var options = {
          title: '<?=$name?> Status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>

<link rel="stylesheet" type="text/css" href="./src/css/pokemon.css">
    
</link>