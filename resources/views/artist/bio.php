<div class="artist">
    <div class="artist_id">
            <?= $artist->id ?>
        </div>
        <div class="image">
            <img src="<?= $artist->photo ?>" />
        </div>
        <div class="artist_info">
            <h2 class="artist_name"><?= $artist->name ?></h2>
            <div class="artist_date">Date of Birth: <?= $artist->birth ?></div>
            <div class="artist_bio">Bio<br><?= $artist->bio ?>
            </div>
            
        </div>
    </div>