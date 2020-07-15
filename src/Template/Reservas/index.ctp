<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva[]|\Cake\Collection\CollectionInterface $reservas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Volver'), ['controller' => 'users', 'action' => 'view', $user_id]) ?></li>
    </ul>
</nav>
<div class="reservas index large-9 medium-8 columns content">
    <h3><?= __('Reservas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id reserva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Reserva realizada el día:') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?= h($reserva->id) ?></td>
                <td><?= h($reserva->fecha) ?></td>
                <td><?= h($this->Number->format($reserva->precio).' €' ) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller'=>'usos', 'action' => 'view', $reserva->uso_id, $reserva->id]) ?>
                    <?php echo '/' ?>
                    <?= $this->Form->postLink(__('Cancelar Reserva'), ['action' => 'delete', $reserva->id], ['confirm' => __('¿Seguro que quiere cancelar la reserva?', $reserva->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} reserva(s) de {{count}}')]) ?></p>
    </div>
</div>
