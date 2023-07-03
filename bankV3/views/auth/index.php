<body style="background-color:grey;">

    <h1 class="col m-5">Prisijungimas</h1>
    <div class="col m-5">
        <form action="<?= '/login' ?>" method="post">
            <div class="mb-3">
                <label for="exampleDropdownFormEmail2" class="col-sm-2 col-form-label">Elektroninis paštas</label>
                <input type="email" class="form-control" name="email" placeholder="email@example.com"
                    value="<?= $old['email'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="exampleDropdownFormPassword2" class="col-sm-2 col-form-label">Slaptažodis</label>
                <input type="password" class="form-control" name="password" placeholder="Slaptažodis">
            </div>
            <div class="col m-5">
                <button type="submit" class="btn btn-primary">Prisijungti</button>
            </div>
        </form>
    </div>

</body>