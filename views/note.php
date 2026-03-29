<div class="column items-center">
    <div class="note note-<?= $note->style() ?> column">
        <b><?= $note->title() ?></b>
        <hr style="color: var(--text-light); opacity: .3"/>
        <p><?= $note->content() ?></p>
        <hr style="color: var(--text-light); opacity: .3"/>
        <em><?= $note->modified() ?></em>
    </div>

    <a href="/notes" class="btn w-10 text-center">Back</a>
</div>
