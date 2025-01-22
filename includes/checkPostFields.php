<?php

//Questo file è studiato per essere incluso in uno script che abbia già definito precedentemente la variabile $availablePostValues

if (!$availablePostValues) {
    //Se per qualche motivo la variabile non è disponibile, lanciamo un'eccezione Che verrà gestita nel file esterno. 
    throw new Exception('Missing array for post values');
}

//Comincio a ciclare l'array di valori post disponibili. 
foreach ($availablePostValues as $key) {
    //Utilizzo la variabile $key, che conterrà il nome delle chiavi che possibilmente si trovano nell'array super globale $_POST, questo per controllare l'esistenza delle chiavi all'interno DI $_POST stesso  
    if (!isset($_POST[$key]) || (empty($_POST[$key]) && !gettype($_POST[$key]) == 'bool')) {
        //Se il dato manca o è vuoto Ma andiamo via l'utente
        header('Location: add-pizza.php');
        throw new Exception('Missing ' . $key);
    }
    //Decumenta questo per vedere lo schema di come vengono formate le variabili di variabili 
    // echo "\$$key = \$_POST['$key']<br>";

    //Adopero le variabili di variabili per definire una variabile per ogni chiave presente nel riciclato ed assegno a queste variabili il valore della re super globale post corrispondente alla chiave 
    $$key = $_POST[$key];

    //Variabili di variabili
    //Scrivere  $$key Equivale a creare una variabile il cui nome sia pari al valore di $key

    //Ad esempio:
    /*
    Supponiamo di avere Il seguente valore, nella variabile $key

    $key = 'gusto';

    Scrivere : $$key Equivale a creare la variabile $gusto;

    */
}
