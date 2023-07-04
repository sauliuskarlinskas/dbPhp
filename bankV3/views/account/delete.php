<body style="background-color:salmon;">
    <div class="container">
        <div class="col m-5">
            <h2>Saskaitos trynimas</h2>
        </div>
        <form action="/account/destroy/<?= $account['id'] ?>" method="post">
            <div>
                <p style="color:crimson; font-weight: bold">Ar tikrai norite ištrinti saskaitą?</p>
                <div class="col">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Vardas</th>
                                <th scope="col">Pavardė</th>
                                <th scope="col">Asmens kodas</th>
                                <th scope="col">Saskaitos numeris</th>
                                <th scope="col">Likutis</th>
                            </tr>
                        </thead>
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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <button class="btn btn-danger" type="submit">Ištrinti</button>
                <a class="btn btn-info" href="/account">atšaukti</a>
            </div>
        </form>
    </div>
</body>