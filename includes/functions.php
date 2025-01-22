<?php
function getAllPizza(PDO $db): array|null
{

    $sql = "SELECT * FROM pizze ORDER BY prezzo DESC";

    $query = $db->prepare($sql);

    return $query->execute() ? $query->fetchAll(PDO::FETCH_ASSOC) : die();
}

function getPizzaById(int $id, PDO $db): array|null
{
    $sql = "SELECT * FROM pizze WHERE id = $id";

    $query = $db->prepare($sql);

    return $query->execute() ? $query->fetchAll(PDO::FETCH_ASSOC) : die();
}

function addPizza(string $gusto, int $prezzo, bool $disponibilita, PDO $db): bool
{

    $sql = "INSERT INTO pizze (gusto, prezzo, disponibilita) VALUES (:gusto, :prezzo, :disponibilita)";

    $query = $db->prepare($sql);

    $query->bindParam(':gusto', $gusto, PDO::PARAM_STR);
    $query->bindParam(':prezzo', $prezzo, PDO::PARAM_INT);
    $query->bindParam(':disponibilita', $disponibilita, PDO::PARAM_BOOL);

    return $query->execute() ? true : false;
}
function updatePizza(int $id, string $gusto, int $prezzo, bool $disponibilita, PDO $db): void
{
    $sql = "UPDATE pizze 
    SET gusto=:gusto,prezzo=:prezzo,disponibilita=:disponibilita
    WHERE id = :id";

    $query = $db->prepare($sql);

    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':gusto', $gusto, PDO::PARAM_STR);
    $query->bindParam(':prezzo', $prezzo, PDO::PARAM_INT);
    $query->bindParam(':disponibilita', $disponibilita, PDO::PARAM_BOOL);

    if ($query->execute()) {
        header("Location: index.php?message=Pizza Modificata con successo!");
    } else {
        echo $query->errorInfo();
    }
}
function deletePizza(int $id, $db): void
{
    $sql = "DELETE FROM pizze WHERE id = :id";

    $query = $db->prepare($sql);

    $query->bindParam(':id', $id);

    if ($query->execute()) {

        header("Location: index.php?message=Pizza eliminata");
    } else {
        echo $query->errorInfo();
    }
}

function checkPostFields(array $availablePostValues): array
{
    $arrKey = [];
    if (!$availablePostValues) {
        throw new Exception('Missing array for post values');
    }

    foreach ($availablePostValues as $key) {
        if (!isset($_POST[$key]) || (empty($_POST[$key]) && !gettype($_POST[$key]) == 'bool')) {
            header('Location: add-pizza.php');
            throw new Exception('Missing ' . $key);
        }
        array_push($arrKey, $$key = $_POST[$key]);
    }
    return $arrKey;
}
