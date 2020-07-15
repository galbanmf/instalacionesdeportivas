<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pista $pista
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pista->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pista->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pistas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Instalations'), ['controller' => 'Instalations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Instalation'), ['controller' => 'Instalations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usos'), ['controller' => 'Usos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Uso'), ['controller' => 'Usos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pistas form large-9 medium-8 columns content">
    <?= $this->Form->create($pista) ?>
    <fieldset>
        <legend><?= __('Edit Pista') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('precio_hora');
            echo $this->Form->control('instalation_id', ['options' => $instalations, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
