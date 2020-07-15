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
    <h3><?= __('Pistas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Precio por Hora</td>
                <td>Tipo</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pistas as $pista): ?>
            <tr>
                <td><?= h($pista->nombre) ?></td>
                <td><?= h($pista->precio_hora). ' €' ?></td>
                <td><?= h($pista->tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver Detalle'), ['action' => 'view', $pista->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
