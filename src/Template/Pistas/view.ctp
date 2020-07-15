<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pista $pista
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Volver'), ['controller'=>'installations','action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pistas view large-9 medium-8 columns content">
    <h3><?= h($pista->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($pista->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio Hora') ?></th>
            <td><?= $this->Number->format($pista->precio_hora).' €' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($pista->tipo) ?></td>
        </tr>
    </table>
    <!--
    <div class="related">
        <h4><?= __('Related Usos') ?></h4>
        <?php if (!empty($pista->usos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Hora Inicio') ?></th>
                <th scope="col"><?= __('Hora Fin') ?></th>
                <th scope="col"><?= __('Disponible') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col"><?= __('Pista Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pista->usos as $usos): ?>
            <tr>
                <td><?= h($usos->id) ?></td>
                <td><?= h($usos->fecha) ?></td>
                <td><?= h($usos->hora_inicio) ?></td>
                <td><?= h($usos->hora_fin) ?></td>
                <td><?= h($usos->disponible) ?></td>
                <td><?= h($usos->tipo) ?></td>
                <td><?= h($usos->precio) ?></td>
                <td><?= h($usos->pista_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Usos', 'action' => 'view', $usos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Usos', 'action' => 'edit', $usos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usos', 'action' => 'delete', $usos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->
</div>
