<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Pokedex</title>
  </head>
  <body>
 <h1>My Pokedex</h1>
    <table>
      <thead>
        <tr>
          <th>Sprite</th>
          <th>ID</th>
          <th>Name</th>
          <th>Height</th>
          <th>Weight</th>
          <th>Base exp</th>
        </tr>
      </thead>
          <?php
  $link = mysqli_connect("localhost", "root", "", "pokedex");
    if(!$link){
      echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
        echo "Erreur de débogage : " . mysqli_connect_errno() . PHP_EOL;
        echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
        exit;
    }


    $req = "SELECT * FROM pokemon";
    $result = mysqli_query($link,$req);
    var_dump($result);

    if($result){
      echo "There are ".mysqli_num_rows($result)." pokemons from the database.<br>";
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      
        //echo '<img src="/pokedex_etu/sprites/' . $row["identifier"] . ".png"'
        //alt="' . $row["identifier"] . '">';
      echo "<table><tbody><thead>";

      echo  '<tr><td>
            <img src="sprites/' . $row["identifier"] . '.png"
            alt="' . $row["identifier"] . '"
            "></</td>';



            if($row["base_experience"] >= 200){
      echo "<td class='test'>". $row["id"] . "</td>";
      echo "<td class='test'>". $row["identifier"] . "</td>";
      echo "<td class='test'>". $row["height"] . "</td>";
      echo "<td class='test'>". $row["weight"] . "</td>";
      echo "<td class='test'>". $row["base_experience"] . "</td></tr><br>";

      echo "<thead></tbody><table>";
            }



            elseif($row["base_experience"] < 200){
      echo "<td>". $row["id"] . "</td>";
      echo "<td>". $row["identifier"] . "</td>";
      echo "<td>". $row["height"] . "</td>";
      echo "<td>". $row["weight"] . "</td>";
      echo "<td>". $row["base_experience"] . "</td></tr><br>";

      echo "<thead></tbody><table>";}

      }
        //mysqli_fetch-array donc mysqli_free_result
      mysqli_free_result($result);    
    }
      // connect donc close
    mysqli_close($link);
    
    ?>

        </tr>
      </tbody>
    </table>
  </body>
</html>
