<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Event\Event;
/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->active = 0;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario creado correctamente.'));
                $passkey = uniqid();
                $url = Router::Url(['controller' => 'users', 'action' => 'active'], true) . '/' . $passkey;
                if ($this->Users->updateAll(['passkey' => $passkey], ['id' => $user->id])){
                    $this->sendRequestActiveMail($url, $user);
                    return $this->redirect(['controller' => 'pages', 'action' => 'index']);
                }
                else{
                    $this->Flash->error('Error. Inténtelo de nuevo');
                }
            }
            $this->Flash->error(__('No se ha podido crear el usuario. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('user'));
    }
    

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, ['password' => $this->request->getData('newPassword')]);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Cambios realizados correctamente.'));

                return $this->redirect(array('action'=>'view',$this->Auth->user('id')));
            }
            $this->Flash->error(__('No se han realizado los cambios. Por favor, inténtelo de nuevo'));
        }
        $this->set(compact('user'));
    }
    
    public function editpwd() {
        $id=$this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
            if ($user) {
                if (!empty($this->request->data)) {
                    if ($this->request->data('password')==$this->request->data('confirm_password')){
                        $user = $this->Users->patchEntity($user, $this->request->data);
                        $user->confirm_password = null;
                        if ($this->Users->save($user)) {
                            $this->Flash->set(__('Su contraseña ha sido guardada correctamente.'));
                            return $this->redirect(array('action'=>'view',$this->Auth->user('id')));
                        } else {
                            $this->Flash->error(__('La contraseña no se ha guardado correctamente. Por favor, inténtelo de nuevo'));
                        }
                    }
                    else {
                        $this->Flash->error('Las contraseñas no coinciden, inténtelo de nuevo.');
                    }
                }
             unset($user->password);
            $this->set(compact('user'));
            } else {
                $this->redirect('/');
            }
    }

public function login()
{
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        $activada=$user['active'];
        if ($user) {
            if ($activada){
                $this->Auth->setUser($user);
                return $this->redirect(array('action'=>'view',$this->Auth->user('id')));
            }
            else{
                $this->Flash->error(__('Su cuenta aún no está activada'));
            }
        }
        else{
            $this->Flash->error(__('Usuario o contraseña incorrecto. Inténtelo de nuevo'));
        }
    }
}

public function recarga($id = null){
    $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user->saldo_monedero=$user->saldo_monedero + $this->request->getData('recarga');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El monedero se ha recargado correctamente.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('No se ha podido recargar el monedero. Por favor, inténtelo de nuevo'));
        }
        $this->set(compact('user'));
}

public function logout()
{
    return $this->redirect($this->Auth->logout());
}

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
     public function password()
    {
        if ($this->request->is('post')) {
            $query = $this->Users->findByUsername($this->request->data['username']);
            $user = $query->first();
            if (is_null($user)) {
                $this->Flash->error('El correo electrónico introducido no se encuentra en el sistema. Inténtelo de nuevo');
            } else {
                $passkey = uniqid();
                $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey;
                $timeout = time() + DAY;
                 if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->id])){
                    $this->sendResetEmail($url, $user);
                    $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('Error. Inténtelo de nuevo');
                }
            }
        }
    }
    

    private function sendResetEmail($url, $user) {
        $email = new Email();
        $email->template('resetpw');
        $email->emailFormat('both');
        $email->from('instalaciones.melilla.deportes@gmail.com');
        $email->to($user->username, $user->apellidos);
        $email->subject('Resetear contraseña');
        $email->viewVars(['url' => $url, 'username' => $user->username]);
        if ($email->send()) {
            $this->Flash->success(__('Compruebe la bandeja de entrada de su correo electrónico'));
        } else {
            $this->Flash->error(__('Error enviado el correo electrónico: ') . $email->smtpError);
        }
    }
    
    private function sendRequestActiveMail($url, $user) {
        $email = new Email();
        $email->template('requestactiveuser');
        $email->emailFormat('both');
        $email->from('instalaciones.melilla.deportes@gmail.com');
        $email->to('administrador_melilla_deportes@gmail.com');
        $email->subject('Activar cuenta');
        $email->viewVars(['url' => $url, 'username' => $user->username, 'dni' => $user->dni]);
        if ($email->send()) {
            $this->Flash->success(__('Su cuenta será activada por el administrador en un plazo de 2 días laborables'));
        } else {
            $this->Flash->error(__('Error enviando el correo electrónico: ') . $email->smtpError);
        }
    }
    
    private function sendActiveMail($url, $user) {
        $email = new Email();
        $email->template('activeuser');
        $email->emailFormat('both');
        $email->from('instalaciones.melilla.deportes@gmail.com');
        $email->to($user->username, $user->apellido);
        $email->subject('Cuenta activada');
        $email->viewVars(['url' => $url, 'username' => $user->username]);
        if ($email->send()) {
            $this->Flash->success(__('Email mandado al usuario'));
        } else {
            $this->Flash->error(__('Error enviando el correo electrónico: ') . $email->smtpError);
        }
    }
    
     private function sendNoActiveMail($user) {
        $email = new Email();
        $email->template('noactiveuser');
        $email->emailFormat('both');
        $email->from('instalaciones.melilla.deportes@gmail.com');
        $email->to($user->username, $user->apellido);
        $email->subject('Cuenta no activada');
        $email->viewVars(['username' => $user->username]);
        if ($email->send()) {
            $this->Flash->success(__('Email mandado al usuario'));
        } else {
            $this->Flash->error(__('Error enviando el correo electrónico: ') . $email->smtpError);
        }
    }

    public function reset($passkey = null) {
        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();
            if ($user) {
                if (!empty($this->request->data)) {
                    if ($this->request->data('password')==$this->request->data('confirm_password')){
                        // Clear passkey and timeout
                        $user->passkey = null;
                        $user->timeout = null;
                        $user = $this->Users->patchEntity($user, $this->request->data);
                        $user->confirm_password = null;
                        if ($this->Users->save($user)) {
                            $this->Flash->set(__('Su contraseña ha sido guardada correctamente.'));
                            return $this->redirect(array('action' => 'login'));
                        } else {
                            $this->Flash->error(__('La contraseña no se ha guardado correctamente. Por favor, inténtelo de nuevo'));
                        }
                    }
                    else {
                        $this->Flash->error('Las contraseñas no coinciden, inténtelo de nuevo.');
                    }
                }
            } else {
                $this->Flash->error('El link no es válido. Por favor, inténtelo de nuevo');
                $this->redirect(['action' => 'password']);
            }
            unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
        }
    }
    
    public function active($passkey = null) {
        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey]]);
            $user = $query->first();
            if ($user) {
                if (!empty($this->request->data)) {
                        // Clear passkey
                        $user->passkey = null;
                        $activo=$this->request->data('active');
                        debug($activo);
                        $user = $this->Users->patchEntity($user, ['active' => $activo]);
                        if ($activo==1){
                            if ($this->Users->save($user)) {
                                $this->Flash->set(__('Usuario activado.'));
                                $url = Router::Url(['controller' => 'users', 'action' => 'login'], true);
                                $this->redirect(['controller'=>'pages','action'=>'index']);
                                $this->sendActiveMail($url, $user);
                            } else {
                                $this->Flash->error(__('Ha ocurrido un error. Por favor, inténtelo de nuevo'));
                            }
                        }
                        else{
                            $this->Flash->set(__('Usuario no autorizado.'));
                            $this->Users->delete($user);
                            $this->redirect(['controller'=>'pages','action'=>'index']);
                            $this->sendNoActiveMail($user);
                        }
                }
            } else {
                $this->Flash->error('El link no es válido. Por favor, inténtelo de nuevo');
            }
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
        }
    }
    
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout', 'password', 'reset', 'active']);
    }
    
    public function saldo ($id=null, $precio=null, $devolucion=null){
        $user = $this->Users->get($id);
        if ($devolucion==0){
            $user->saldo_monedero=$user->saldo_monedero-$precio;
        }else{
            $user->saldo_monedero=$user->saldo_monedero+$precio;
        }
        $this->Users->save($user);
        return $this->redirect(['controller'=> 'users', 'action' => 'view', $this->Auth->user('id')]);
    }
    

}
