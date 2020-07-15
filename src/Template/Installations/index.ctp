<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Installation[]|\Cake\Collection\CollectionInterface $installations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Volver'), ['controller'=>'pages','action' => 'home']) ?></li>
    </ul>
</nav>
<div class="installations index large-9 medium-8 columns content">
    <h3><?= __('Instalaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($installations as $installation): ?>
            <tr>
                <td><?= h($installation->nombre) ?></td>
                <td><?= h($installation->direccion) ?></td>
                <td><?= h($installation->telefono) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver Detalle'), ['action' => 'view', $installation->id]) ?>
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
