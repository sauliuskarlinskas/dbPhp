<style>
    .alert {
       
    }

    .alert-success {
        margin: 30px;
        width: 30%;
        color: green;
        font-weight: bold;
    }

    .alert-danger {
        margin: 30px;
        width: 30%;
        color: red;
        font-weight: bold;
    }
</style>
<?php use BankV3\Messages ?>

<?php if (Messages::ifMessages()): ?>
    <?php foreach (Messages::getMessages() as $message): ?>
        <div class="alert alert-<?= $message['type'] ?>" role="alert">
            <?= $message['message'] ?>
        </div>
    <?php endforeach ?>
<?php endif ?>