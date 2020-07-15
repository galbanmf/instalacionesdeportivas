<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Installation[]|\Cake\Collection\CollectionInterface $installations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Volver'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="installations index large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <h3><?= __('Pistas disponibles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_fin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usos as $uso): ?>
            <tr>
                <td><?= h($uso->pista->nombre) ?></td>
                <td><?= h($uso->fecha->format('d-m-y')) ?></td>
                <td><?= h($this->Time->format($uso->hora_inicio, [\IntlDateFormatter::NONE, \IntlDateFormatter::SHORT])) ?></td>
                <td><?= h($this->Time->format($uso->hora_fin, [\IntlDateFormatter::NONE, \IntlDateFormatter::SHORT])) ?></td>
                <td><?= h($this->Number->format($uso->precio).' €' ) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Reservar'), ['controller'=>'reservas', 'action' => 'add', $uso->id, $uso->precio], ['confirm' => __('¿Desea reservar esta pista?')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primera')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} campos, {{count}} total')]) ?></p>
    </div>
</div>
