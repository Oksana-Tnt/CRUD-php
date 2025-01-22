<?php include_once './includes/header.php'; ?>

<main class="container">

    <div class="row">

        <div class="col">

            <form action="insert-pizza.php" method="POST">

                <label for="gusto">Gusto</label>
                <input type="text" name="gusto" id="gusto" class="form-control" placeholder="gusto">

                <label for="prezzo">Prezzo</label>
                <input type="number" name="prezzo" id="prezzo" class="form-control" placeholder="prezzo">

                <label for="disponibilita">Disponibile</label>
                <select name="disponibilita" id="disponibilita" class="form-control">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>

                <button class="mt-3 btn btn-primary">Salva</button>
            </form>

        </div>
    </div>
</main>

<?php include_once './includes/footer.php'; ?>