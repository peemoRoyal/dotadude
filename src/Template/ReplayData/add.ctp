<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Replay Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="replayData form large-9 medium-8 columns content">
    <?= $this->Form->create($replayData) ?>
    <fieldset>
        <legend><?= __('Add Replay Data') ?></legend>
        <?php
            echo $this->Form->input('data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
