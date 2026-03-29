<div class="column items-center">
    <?php foreach ($notes as $note): ?>
        <a class="note note-<?= $note->style() ?> column" href="/notes/<?= $note->uuid() ?>">
            <b><?= $note->title() ?></b>
            <em><?= $note->modified() ?></em>
        </a>
    <?php endforeach ?>
</div>
