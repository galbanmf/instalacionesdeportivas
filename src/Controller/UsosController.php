<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usos Controller
 *
 *
 * @method \App\Model\Entity\Uso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->set('iduser', $this->Auth->user('id'));
        $deporte= "ninguno";
            if ($this->request->getData('hora')==0) {
                $hora_inicio='09:00:00';
                $hora_fin='14:00:00';
            }
            else if ($this->request->getData('hora')==1){
                $hora_inicio='15:00:00';
                $hora_fin='19:00:00';
            }
            else if ($this->request->getData('hora')==2){
                $hora_inicio='20:00:00';
                $hora_fin='22:00:00';
            }
            switch ($this->request->getData('deporte')) {
            case 0:
                $deporte='Padel';
            break;
            case 1:
                $deporte='Tenis';
                break;
            case 2:
                $deporte='FS';
                break;
            case 3:
                $deporte='F7';
                break;
            case 4:
                $deporte='Voleibol';
                break;
            case 5:
                $deporte='Baloncesto';
                break;
            case 6:
                $deporte='F11';
                break;            
            }
            if ($this->request->getData()!=null){
                return $this->redirect(['action' => 'vista',$deporte, $this->request->getData('fecha'), $hora_inicio, $hora_fin ]);
            }
        }
        
    
    public function vista($deporte, $fecha, $hora_ini, $hora_fin)
    {
        $this->set('iduser', $this->Auth->user('id'));
        $query = $this->Usos->find('all', array(
    'contain' => array('Pistas'),
    'conditions' => array(
        'tipo' => $deporte,
        'fecha' => $fecha,
        'disponible' => 1,
        'hora_inicio >=' => $hora_ini, 
         'hora_inicio <=' => $hora_fin
        ),
            'order' => ['hora_inicio' => 'ASC']));
        $usos=$this->paginate($query);
        $this->set(compact('usos'));

    }
    

    /**
     * View method
     *
     * @param string|null $id Uso id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id_uso = null, $id = null)
    {
        $this->set('iduser', $this->Auth->user('id'));
        $uso = $this->Usos->get($id_uso, [
            'contain' => [],
        ]);

        $this->set('uso', $uso);
        
        $this->set('id_reserva', $id);
        
    }
    
    public function viewbytipo($tipo = null)
    {
        $this->set('usos',$this->Usos->find('all', array(
    'contain' => array('Pistas'),
    'conditions' => array(
        'tipo' => $tipo    ))));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $uso = $this->Usos->newEntity();
        if ($this->request->is('post')) {
            $uso = $this->Usos->patchEntity($uso, $this->request->getData());
            if ($this->Usos->save($uso)) {
                $this->Flash->success(__('The uso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uso could not be saved. Please, try again.'));
        }
        $this->set(compact('uso'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Uso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $uso = $this->Usos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uso = $this->Usos->patchEntity($uso, $this->request->getData());
            if ($this->Usos->save($uso)) {
                $this->Flash->success(__('The uso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uso could not be saved. Please, try again.'));
        }
        $this->set(compact('uso'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Uso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uso = $this->Usos->get($id);
        if ($this->Usos->delete($uso)) {
            $this->Flash->success(__('The uso has been deleted.'));
        } else {
            $this->Flash->error(__('The uso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function dispon($id = null, $precio = null)
    {
        $id_user=$this->Auth->user('id');
        $uso = $this->Usos->get($id);
        $uso->disponible=0;
        $this->Usos->save($uso);
        $i=0;
        return $this->redirect(['controller'=> 'users', 'action' => 'saldo', $id_user, $precio, $i]);
    }
    
}
