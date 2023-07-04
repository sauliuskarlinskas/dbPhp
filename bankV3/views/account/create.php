<body style="background-color:olive;">
    <div class="container">
        <h1 class="col m-5">Naujos sąskaitos sukūrimas</h1>
        <div class="col m-5">
            <fieldset>
                <form action="/account/store" method="post">
                    <div>
                        <label class="form-label" for="name">Vardas</label>
                        <input class="form-label" type="text" name="name" id="name" required>
                    </div>
                    <div>
                        <label class="form-label" for="lastName">Pavardė</label>
                        <input class="form-label" type="text" name="last_name" id="last_name" required>
                    </div>
                    <div>
                        <label class="form-label" for="personalId">Asmens kodas</label>
                        <input class="form-label" type="number" name="personal_id" id="personal_id" required>
                    </div>
                    <div class="col m-3">

                        <button class="btn btn-success" type="submit">Sukurti naują saskaitą</button>
                    </div>
                </form>
            </fieldset>
        </div>
</body>