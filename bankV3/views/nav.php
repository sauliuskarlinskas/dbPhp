<div class="col m-5" style="display:flex;">
    <div class="col m-2">
        <?php if (isset($_SESSION['email'])): ?>
            <form action="<?= URL . 'logout' ?>" method="post" style="display: inline;">
            <h5>Bankininkas: <?= $_SESSION['name'] ?></h5>
                <button type="submit" class="btn btn-danger">Atsijungti
                </button>
            </form>
        <?php else: ?>
            <a href="<?= URL . 'login' ?>">Prisijungti</a>
        <?php endif ?>
    </div>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
            aria-expanded="false">
            Meniu
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <li><a href="<?= URL ?>" class="dropdown-item">Pradžia</a></li>
            <li><a href="<?= URL . 'account' ?>" class="dropdown-item">Saskaitos</a></li>
            <li><a href="<?= URL . 'account/create' ?>" class="dropdown-item">Sukurti naują saskaita</a></li>

        </ul>

    </div>


</div>