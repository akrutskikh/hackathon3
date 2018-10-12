<div class="create"><a href="http://www.hackathon.test/create/">Create</a></div>
<?php foreach ($songs as $song) : ?>

    <div class="song">
    <div class="id">
            <?= $song->id ?>
        </div>
        <div class="image">
            <img src="https://img.youtube.com/vi/<?= $song->url ?>/2.jpg" />
        </div>
        <div class="info">
            <h2 class="name"><a href="https://www.youtube.com/watch?v=<?= $song->url ?>"><?= $song->name ?></a></h2>
            <div class="date">Last Modified: <?= $song->date ?></div>
            <div class="author">Author: <a href="http://www.hackathon.test/artist?name=<?= $song->author ?>"><?= $song->author ?></a> 
            </div>
            <div class="url"><?= $song->url ?></div>
            <div class="edit"><a href="http://www.hackathon.test/edit?id=<?= $song->id ?>">Edit</a></div>
            <div class="edit"><a href="http://www.hackathon.test/delete?id=<?= $song->id ?>">Delete</a></div>
        </div>
    </div>

<?php endforeach; ?>