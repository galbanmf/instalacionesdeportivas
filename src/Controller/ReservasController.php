<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reservas Controller
 *
 *
 * @method \App\Model\Entity\Reserva[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($user_id=null)
    {
        $query = $this->Reservas->find('all', array(
    'conditions' => array(
        'user_id' => $user_id,

        ),            
            'order' => ['fecha' => 'DESC']));
        $reservas=$this->paginate($query);
        $this->set(compact('reservas'));
        $this->set('user_id',$user_id);
    }

    /**
     * View method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $reserva = $this->Reservas->get($id, [
            'contain' => [],
        ]);

        $this->set('reserva', $reserva);
    }
    


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id_uso=null, $precio=null)
    {
        $id_user = $this->Auth->user('id');
        $reserva = $this->Reservas->newEntity();
        $reserva -> fecha = date('Y-m-d H:i:s');
        $reserva -> precio = $precio;
        $reserva -> user_id = $id_user;
        $reserva -> uso_id = $id_uso;

                if ($this->Reservas->save($reserva)) {
                    $this->Flash->success(__('La reserva se ha realizado correctamente.'));
                    return $this->redirect(['controller'=>'usos','action' => 'dispon', $id_uso, $precio]);
                }   
                else{
                    $this->Flash->error(__('La reserva no se ha realizado. Por favor, inténtelo de nuevo'));
                    return $this->redirect(['controller'=>'pages', 'action'=>'index']);
            }
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserva = $this->Reservas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
            if ($this->Reservas->save($reserva)) {
                $this->Flash->success(__('The reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserva could not be saved. Please, try again.'));
        }
        $this->set(compact('reserva'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $id_user = $this->Auth->user('id');
        $this->request->allowMethod(['post', 'delete']);
        $reserva = $this->Reservas->get($id);
        $precio = $reserva->precio;
        $i=1;
        if ($this->Reservas->delete($reserva)) {
            $this->Flash->success(__('La reserva ha sido cancelada.'));
        } else {
            $this->Flash->error(__('La reserva no se puede cancelar.'));
        }

        return $this->redirect(['controller'=>'users','action' => 'saldo', $id_user, $precio, $i]);
    }
}
