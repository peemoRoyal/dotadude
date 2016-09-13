<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gold Xp'), ['action' => 'edit', $goldXp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gold Xp'), ['action' => 'delete', $goldXp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goldXp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gold Xp'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gold Xp'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="goldXp view large-9 medium-8 columns content">
    <h3><?= h($goldXp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Net Worth') ?></th>
            <td><?= h($goldXp->net_worth) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($goldXp->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Match Id') ?></th>
            <td><?= $this->Number->format($goldXp->match_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Hero Name') ?></h4>
        <?= $this->Text->autoParagraph(h($goldXp->hero_name)); ?>
    </div>
</div>
