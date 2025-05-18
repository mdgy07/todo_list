<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do PhP </title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20%;
            max-width: 600px;
            margin: auto;
        }

        h2 {
            color: #333;
        }

        input[type=text] {
            padding: 5px;
            width: 70%;
        }

        input[type=submit],
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        button {
            background-color: red;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: white;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 4px;
        }

        form.inline {
            display: inline;
        }
    </style>
</head>

<body>
    <h2>Ajouter une tache</h2>
    <form action="" method="post">
        <input type="text" name="tache" placeholder="inserer une tache">
        <input type="submit" name="bouton" value="ajout">
    </form>

</body>

</html>


<?php
$file = "taches.txt";
//ajouter une tache  
if (isset($_POST['bouton']) && !empty(trim($_POST['tache']))) {

    $tache = trim($_POST['tache']) . "\n";
    file_put_contents($file, $tache, FILE_APPEND);
}
// Supprimer une tâche 
if (isset($_POST['supprimer'])) {
    $indexAsupprimer = $_POST['supprimer'];
    $taches = file($file);
    if (isset($taches[$indexAsupprimer])) {
        unset($taches[$indexAsupprimer]);
        file_put_contents($file, implode('', $taches));
    }
}

//affichage des taches  
if (file_exists($file)) {
    $taches = file($file);
    foreach ($taches as $index => $tache) {
        echo "<li>" . htmlspecialchars(trim($tache)) . "
        <form method=\"post\" class=\"inline\">
            <button type=\"submit\" name=\"supprimer\" value=\"$index\">Supprimer</button>
        </form>
        </li>";
    }
}


?>