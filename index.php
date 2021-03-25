
<Doctype! html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>POKEMON</title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <header>
        <img src="img/title.png" alt="png">
    </header>
    <body>
    
     <center>

        <form action="" method="POST">
            <input  type="text"  name="buscar" placeholder="Buscar Pokemon">
             <input  type ="submit" name="boton" value="Buscar" onclick="">
         </form>  

    </center>

         <?php


         if(isset($_POST['buscar'])){
                $pokemon = $_POST['buscar'];
             $pokeApi = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
            
             curl_setopt($pokeApi, CURLOPT_RETURNTRANSFER, true);
                  $val = curl_exec($pokeApi);

                curl_close($pokeApi);
                $code = json_decode($val);

                if($code == Null){

                echo 'No existe el Pokemon "'.$pokemon.'"';
                echo '<img src="img/pokemaster_337290.png" height="200" widht="200">'."\n";
                 
                }else{

                echo "\n";
                echo $code->forms[0]->name; 
                echo "\n"; 
                echo '<img src="'.$code->sprites->other->dream_world->front_default.'" width="190" height="170">'; 
                echo "\n";
                echo '<h4>Tipo</h4>';
                echo $code->types[0]->type->name; 
                echo "\n";
               $code->id;

               if(isset($_POST['evolucionar'])){

                $api = curl_init("https://pokeapi.co/api/v2/evolution-chain/$code->id/");

                 curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
                 $res = curl_exec($api);
   
                  curl_close($api);
                  $codres = json_decode($res);
  
                    echo $codres->chain[0]->evolvesTo ;
                 }
                 if(isset($_POST['eliminar'])){

                 }  
                }
            }
        
                      
    
    ?>
         </br>
         <center>
         <form action="" method="POST">
            <input  type="submit" name="eliminar" value="Eliminar">
	        <input type="submit" name="evolucionar" value="Evolucionar">
            </form>  
        </center>
            
    </body>
</html>