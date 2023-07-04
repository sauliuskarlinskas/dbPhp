<body style="background-color:grey;">
    <div class="container">
        <div class="col m-5">
            <h2>Balanso keitimas</h2>
        </div>
        <form action="<?= '/account/update/' . $id ?>" method="post">
            <div class="col">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Vardas</th>
                            <th scope="col">Pavardė</th>
                            <th scope="col">Asmens kodas</th>
                            <th scope="col">Saskaitos numeris</th>
                            <th scope="col">Balansas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?= $name ?>
                            </td>
                            <td>
                                <?= $last_name ?>
                            </td>
                            <td>
                                <?= $personal_id ?>
                            </td>
                            <td>
                                LT:
                                <?= $account_number ?>
                            </td>
                            <td>
                                <?= $balance ?>€
                            </td>
                            <td>
                                <input type="number" name="amount" id="amount" required>
                                <button class="btn btn-success" type="submit" name="add" value=<?= 1 ?>>Pridėti</button>
                                <button class="btn btn-danger" type="submit" name="withdraw"
                                    value=<?= 1 ?>>Išimti</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </form>
    </div>
</body>