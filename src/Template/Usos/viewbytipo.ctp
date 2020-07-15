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
    <h3><?= __('Usos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <td></td>
                <td>Nombre</td>
                <td>Fecha</td>
                <td>Hora Inicio</td>
                <td>Hora Fin</td>
                <td>Precio</td>
                <td>Disponible</td>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($usos as $uso): ?>
            <tr>
                <td><?= h($uso->pista->nombre) ?></td>
                <td><?= h($uso->fecha) ?></td>
                <td><?= h($uso->hora_inicio) ?></td>
                <td><?= h($uso->hora_fin) ?></td>
                <td><?= h($uso->precio) ?></td>
                <td><?= h($uso->disponible) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('RESERVAR'), ['controller'=>'reservas','action' => 'add']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
