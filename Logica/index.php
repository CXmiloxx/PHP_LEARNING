<?php
    // Variables y Tipos de Datos
    $name = "juan";
    $edad = 3;
    $newEdad = $edad > 20;
    var_dump($edad);
    var_dump($name);
    var_dump($newEdad);

    // Comentado: Esto es muy peligroso debido a que esto siempre se muestra en la pantalla 
    // var_dump($newEdads); 

    // sirve para saber solo el tipo de la variable 
    echo gettype($name);

    echo "<br>";

    // Constante global
    define('LOGO_PHP', 'https://th.bing.com/th/id/R.a64aa98408a0d6df8f0accb876456b7c?rik=LKOP4%2bNl%2bijnUg&pid=ImgRaw&r=0');
    
    //constantes loclaes
    const NOMBRE = "Miguel";

    //variables con texto
    $salida = "hola " . NOMBRE;

    $salidaEdad = match (true){
        $edad < 2   => "Eres un bebe",
        $edad < 10  => "Eres un niño",
        $edad < 18  => "Eres un adolescente",
        $edad == 18 => "Eres mayor de edad",
        $edad < 60  => "Eres un adulto",
        $edad > 60  => "Eres un adulto mayor",
        default     => "Eres muy viejo",
    };

    //arreglos con indices 
    $lenguajes = [
        "PHP",
        "JavaScript",
        "Python",
        "C++",
        "C",
        "Java",
        "C#",
        6
    ];
    //reazignar elemento
    $lenguajes[7] = "Go";
    //agregar elemento
    $lenguajes[] = "Dart";

//diccionarios  o map
    $personas = [
        "nombre" => "Miguel",
        "edad" => 30,
        "lenguajes" => [
            "PHP",
            "JavaScript",
            "Python",
            "C++",
            "C",
            "Java",
            "C#",
            "Go",
            "Dart"
        ]
    ];
    echo "<br>";

    // Output con HTML
?>

<h1>
    <?= $salida ?>
</h1>

<h3>
    <?= $salidaEdad?>
</h3>

<h2>
    <?= "Tu nombre es " . $name . " y tu edad es: " . $edad ?>
</h2>

<h3>
    <?=
        //sintaxis rapida para no escribir el echo
        NOMBRE 
    ?>
</h3>
<h3>
    <img src="<?= LOGO_PHP ?>" alt="LOGO" width="200">
</h3>

<ul>
    <?php foreach ($lenguajes as $key => $lenguaje) : ?>
        <li>

            <?= $key ."  " .  $lenguaje ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php
    // Condicionales forma tradicional y en php no se puede separar el else if
    if ($newEdad) {
        echo "<h2>Eres muy viejo</h2>";
    } elseif ($newEdad) {
        echo "<h2>No eres tan viejo</h2>";
    } else {
        echo "<h2>Eres joven</h2>";
    }

    // If ternario
    echo $newEdad ? '<h2>Eres muy viejo</h2>' : '<h2>Eres joven</h2>';
?>

<style>
    body {
        background-color: #000000;
        color: #ffffff;
        font-size: 20px;
        font-family: Arial;
        text-align: center;
        padding-top: 100px;
    }

    h1 {
        font-size: 50px;
        font-family: Arial;
        text-align: center;
    }
</style>