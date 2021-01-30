<?php
include('./src/util/util.php');
if(isset($_POST['offset'])){
    $offset = $_POST['offset'];
    if($offset < 0){
        $offset = 0; 
    }
}else{
    $offset = 0;
}
if (isset($_POST['findPokemon'])) {
    $pokeName = $_POST['findPokemon'];
    if ($pokeName != '') {
        $pokeData->results[1] = findPokemon($pokeName);
    } else {
        $pokeData = findPokemonWithOffset($offset);
    }
} else {
    $pokeData = findPokemonWithOffset($offset);
}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/pokeType.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <title>Pokedex</title>
</head>

<body>
    <div class="searchDiv">
        <br>
        <h2>Pokedex</h2>
        <br>
        <form action="index.php" method="post">
            <input type="text" class="input" id="input" name="findPokemon">
            <button type="submit" class="button is-black">Buscar</button>
        </form>
        
    </div>
    <div id="mainDiv" >
    
        <div class="pokeInfoDiv">
            <?php
if (isset($pokeData)) {
    foreach ($pokeData->results as $pokeResult) {
        include('./src/container/pokeCard.php');
    }
}
?>
      </div>
    </div>
    <footer class="footer">
  <div class="content has-text-centered">
    <nav class="pagination" role="navigation" aria-label="pagination">

      <form action="index.php" method="post" class="button1">
            <input type="hidden" name="offset" value="<?php echo $offset -10; ?>">
            <button type="submit" class="button is-black">Previous</button>
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="offset" value="<?php echo $offset + 10; ?>">
            <button type="submit" class="button is-black">Next page</button>
        </form>
  </div>
</footer>
</body>
</html>
<style>
    .searchDiv{
        text-align:center;
        clear:both;
        margin-bottom:50px;
    }
    
    .pokeInfoDiv{
      display:flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center
    }
    
    .searchDiv input{
        width:200px;
    }
    #pokeCard{
        width:200px;
        border-radius:10px;
        box-shadow:4px 4px 4px 4px solid #0000;
        margin: 0 auto;
        margin:20px;
        text-align:center;
    }
    .pokecolor{
        background-color:blue;
    }
    @media(max-width: 800px){
        .button1{
            margin-right:50px;
        }
    }
    
</style>
<script>

</script>