<?php $this->assign('title', 'Melilla Deporte'); ?><div class="users content">
	<h3><?php echo __('Contraseña olvidada'); ?></h3>
	<?php
    	echo $this->Form->create();
        echo $this->Form->input('username', ['autofocus' => true, 'label' => 'Introduzca su correo electrónico', 'required' => true]);
		echo $this->Form->button('Enviar');
    	echo $this->Form->end();
	?>
</div>
