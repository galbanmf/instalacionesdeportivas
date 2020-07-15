<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Installation $installation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $installation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $installation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Installations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="installations form large-9 medium-8 columns content">
    <?= $this->Form->create($installation) ?>
    <fieldset>
        <legend><?= __('Edit Installation') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('direccion');
            echo $this->Form->control('telefono');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
