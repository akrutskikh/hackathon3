
<?php foreach ($songs as $song) : ?>

    <div class="song">
    <div class="id">
            <?= $song->id ?>
        </div>
        <div class="image">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $song->url ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        <div class="info">
            <h2 class="name"><a href="https://www.youtube.com/watch?v=<?= $song->url ?>"><?= $song->name ?></a></h2>
            <div class="date">Last Modified: <?= $song->date ?></div>
            <div class="author">Author: <a href="http://www.hackathon.test/artist?name=<?= $song->author ?>"><?= $song->author ?></a> 
            </div>
            <div class="url"><?= $song->url ?></div>
        
        </div>
    </div>

<?php endforeach; ?>