<div class="column-4 items-center">
    <div class="note wrapper note-<?= $note->style() ?> column-0">
        <b class="header"><?= $note->title() ?></b>
        <p class="content"><?= $note->content() ?></p>
        <em class="footer"><?= $note->modified() ?></em>
    </div>

    <a href="/notes" class="btn w-10 text-center">Back</a>
</div>
