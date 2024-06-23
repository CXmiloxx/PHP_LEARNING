<?php 
    // Llamada a una API con comando curl
    const API_URL ="https://whenisthenextmcufilm.com/api";

    // Inicializar una nueva sesión de cURL
    $ch = curl_init(API_URL);

    // Indicar que queremos recibir el resultado y no mostrarlo en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    //alternativa para hacer un consumo de api con file_get_contents
    //$result = file_get_contents(API_URL); //si solo se quiere hacer consumo get


    // Ejecutar la petición y guardar el resultado
    $result = curl_exec($ch);
    $data = json_decode($result, true);

    // Cerrar la sesión de cURL
    curl_close($ch);

    /* Mostrar el resultado
    var_dump($data);*/
?>
    <head>
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
        />
    </head>
    <main>

        <section>
            <h2>La próxima película del UCM</h2>
            <img src="<?php echo $data['poster_url'];?>" alt="Poster de la película" width="300"/>
            <h3>Título: <?php echo $data['title'];?></h3>
        </section>

        <hgroup>
            <h3>
                <?= $data["title"]; ?> se estrena en : <?= $data["days_until"]; ?>
            </h3>
            <p>fecha de estreno : <?= $data["release_date"]?></p>
            <p>la siguiente pelicuala es : <?= $data["following_production"]["title"]; ?></p>
        </hgroup>
    </main>


<style>
    :root {
        color-scheme: light dark;
    }
    body {
        display: grid;
        grid-template-columns: 1fr 1fr;
        place-content: center;
    }
</style>
