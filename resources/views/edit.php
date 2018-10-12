<?php if (Session::has('success_message')) : ?>
    <div class="alert alert-success">
        <?= Session::get('success_message') ?>
    </div>
<?php endif; ?>

<form action="" method="post">

    <?= csrf_field() ?>

    <label for="name">Name</label><br>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($song['name']) ?>">
    <br><br>

    <label for="author">Author</label><br>
    <input type="text" name="author" id="author" value="<?= htmlspecialchars($song['author']) ?>">
    <br><br>

    <label for="url">URL</label><br>
    <input type="text" name="url" id="url" value="<?= htmlspecialchars($song['url']) ?>">
    <br><br>

    <input type="submit" value="Save">

</form>