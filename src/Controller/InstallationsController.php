<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Installations Controller
 *
 *
 * @method \App\Model\Entity\Installation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InstallationsController extends AppController
{
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $installations = $this->paginate($this->Installations);

        $this->set(compact('installations'));
    }
    

    /**
     * View method
     *
     * @param string|null $id Installation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $installation = $this->Installations->get($id, [
            'contain' => [],
        ]);

        $this->set('installation', $installation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $installation = $this->Installations->newEntity();
        if ($this->request->is('post')) {
            $installation = $this->Installations->patchEntity($installation, $this->request->getData());
            if ($this->Installations->save($installation)) {
                $this->Flash->success(__('The installation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The installation could not be saved. Please, try again.'));
        }
        $this->set(compact('installation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Installation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $installation = $this->Installations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $installation = $this->Installations->patchEntity($installation, $this->request->getData());
            if ($this->Installations->save($installation)) {
                $this->Flash->success(__('The installation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The installation could not be saved. Please, try again.'));
        }
        $this->set(compact('installation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Installation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $installation = $this->Installations->get($id);
        if ($this->Installations->delete($installation)) {
            $this->Flash->success(__('The installation has been deleted.'));
        } else {
            $this->Flash->error(__('The installation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user){
        return parent::isAuthorized($user);
}
}
