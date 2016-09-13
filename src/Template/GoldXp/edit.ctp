<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $goldXp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $goldXp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Gold Xp'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="goldXp form large-9 medium-8 columns content">
    <?= $this->Form->create($goldXp) ?>
    <fieldset>
        <legend><?= __('Edit Gold Xp') ?></legend>
        <?php
            echo $this->Form->input('net_worth');
            echo $this->Form->input('match_id');
            echo $this->Form->input('hero_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
