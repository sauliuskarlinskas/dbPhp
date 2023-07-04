<body style="background-color:grey;">
    <div class="container">
        <div class="col m-5">
            <h1 style="color:crimson; font-weight: bold; text-decoration: underline;" class="display-3">Saskaitos</h1>
        </div>
        <?php if (empty($accounts)): ?>
            <p style="color:blue; font-weight: bold">Nėra saskaitų</p>
        <?php else: ?>
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
                    <?php foreach ($accounts as $account): ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?= $account['name'] ?>
                                </td>
                                <td>
                                    <?= $account['last_name'] ?>
                                </td>
                                <td>
                                    <?= $account['personal_id'] ?>
                                </td>
                                <td>
                                    LT:
                                    <?= $account['account_number'] ?>
                                </td>
                                <td>
                                    <?= $account['balance'] ?>€
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="/account/edit/<?= $account['id'] ?>">keisti balansą</a>
                                    <a class="btn btn-danger" href="/account/delete/<?= $account['id'] ?>">ištrinti</a>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach ?>
                <?php endif ?>
            </table>
        </div>
    </div>
</body>