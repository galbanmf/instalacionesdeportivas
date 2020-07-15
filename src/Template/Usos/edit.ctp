<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uso $uso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $uso->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $uso->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Usos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pistas'), ['controller' => 'Pistas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pista'), ['controller' => 'Pistas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usos form large-9 medium-8 columns content">
    <?= $this->Form->create($uso) ?>
    <fieldset>
        <legend><?= __('Edit Uso') ?></legend>
        <?php
            echo $this->Form->control('fecha');
            echo $this->Form->control('hora_inicio');
            echo $this->Form->control('hora_fin');
            echo $this->Form->control('disponible');
            echo $this->Form->control('precio');
            echo $this->Form->control('pista_id', ['options' => $pistas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
