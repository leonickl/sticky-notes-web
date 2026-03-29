<div class="column-4 items-center">
    <?php foreach ($notes as $note): ?>
        <div class="note note-<?= $note->style() ?> column">
            <a href="/notes/<?= $note->uuid() ?>">
                <b><?= $note->title() ?></b>
            </a>
            <em><?= $note->modified() ?></em>
        </div>
    <?php endforeach ?>

    <a href="/home" class="btn w-10 text-center">Back</a>
</div>
