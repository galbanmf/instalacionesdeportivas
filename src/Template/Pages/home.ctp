<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Iniciar sesión'), ['controller' => 'Users', 'action' => 'login']) ?></li>
        <li><?= $this->Html->link(__('Nuevo usuario'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Nuestras instalaciones'), ['controller' => 'Installations', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-10 medium-10 columns content">
    <div>
<?php echo $this->Html->image('PadelReal.jpg', array('alt' => 'PistaPadelReal', 'width' => '300', 'height' => '150'))?> 
<?php echo $this->Html->image('piscina.jpg', array('alt' => 'Piscina', 'width' => '400', 'height' => '150'))?>
<?php echo $this->Html->image('pezzi.jpg', array('alt' => 'Pezzi', 'width' => '350', 'height' => '150'))?>
    </div>
    <div>
        <p></p>
<?php echo $this->Html->image('tenis.jpg', array('alt' => 'Tenis', 'width' => '300', 'height' => '150'))?>
<?php echo $this->Html->image('tesorillo.jpg', array('alt' => 'Tesorillo', 'width' => '400', 'height' => '150'))?>
<?php echo $this->Html->image('altosreal.jpg', array('alt' => 'AltosReal', 'width' => '350', 'height' => '150'))?>
    </div>
</div>

