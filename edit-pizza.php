<?php include_once './includes/header.php';
include_once "./includes/functions.php";
?>

<?php
try {
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    $rows = getPizzaById($_GET["id"], $db);

    [
        'gusto' => $gusto,
        'prezzo' => $prezzo,
        'disponibilita' => $disponibilita
    ] = $rows[0];
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<main class="container">

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?= $_GET['message'] ?>
        </div>
    <?php endif; ?>

    <h1>Modifica pizza</h1>

    <form action="update-pizza.php" method="POST">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <label for="gusto">Gusto</label>
        <input type="text" value="<?= $gusto ?>" name="gusto" id="gusto" class="form-control" placeholder="gusto">

        <label for="prezzo">Prezzo</label>
        <input type="number" value="<?= $prezzo ?>" name="prezzo" id="prezzo" class="form-control" placeholder="prezzo">

        <label for="disponibilita">Disponibile</label>
        <select name="disponibilita" value="<?= $disponibilita ?>" id="disponibilita" class="form-control">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>

        <button class="mt-3 btn btn-primary">Salva</button>
    </form>

</main>

<?php include_once './includes/footer.php'; ?>