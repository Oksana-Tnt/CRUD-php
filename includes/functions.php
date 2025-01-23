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
function updatePizza(int $id, string $gusto, int $prezzo, bool $disponibilita, PDO $db): bool
{
    $sql = "UPDATE pizze 
    SET gusto=:gusto,prezzo=:prezzo,disponibilita=:disponibilita
    WHERE id = :id";

    $query = $db->prepare($sql);

    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':gusto', $gusto, PDO::PARAM_STR);
    $query->bindParam(':prezzo', $prezzo, PDO::PARAM_INT);
    $query->bindParam(':disponibilita', $disponibilita, PDO::PARAM_BOOL);

    return $query->execute() ? true : false;
}
function deletePizza(int $id, $db): bool
{
    $sql = "DELETE FROM pizze WHERE id = :id";

    $query = $db->prepare($sql);

    $query->bindParam(':id', $id);

    return $query->execute() ? true : false;
}

function checkPostFields(array $availablePostValues): array|false
{
    $arrKey = [];
    if (!$availablePostValues) {
        throw new Exception('Missing array for post values');
    }

    foreach ($availablePostValues as $key) {
        if (!isset($_POST[$key]) || (empty($_POST[$key]) && !gettype($_POST[$key]) == 'bool')) {
            return false;
        }
        array_push($arrKey, $$key = $_POST[$key]);
    }
    return $arrKey;
}
