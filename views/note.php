<div class="column-4 items-center">
    <div class="note wrapper note-<?= $note->style() ?> column-0">
        <b class="header">
            <a href="/notes" class="close text-center-both">&times;</a>
        </b>
        <p class="content"><?= $note->content() ?></p>
        <em class="footer"><?= $note->modified() ?></em>
    </div>
</div>
