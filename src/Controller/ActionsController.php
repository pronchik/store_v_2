<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Actions Controller
 *
 * @property \App\Model\Table\ActionsTable $Actions
 * @method \App\Model\Entity\Action[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $this->paginate = [
                'contain' => ['Products', 'Users'],
            ];
            $actions = $this->paginate($this->Actions);

            $this->set(compact('actions'));
            $this->set('_serialize', ['actions']);
        }
        else{
            $response = 'Access is denied';
            $this->set(compact('response'));
            $this->set('_serialize', ['response']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $action = $this->Actions->get($id, [
                'contain' => ['Products', 'Users'],
            ]);

            $this->set(compact('action'));
            $this->set('_serialize', ['action']);
        }
        else{
            $response = 'Access is denied';
            $this->set(compact('response'));
            $this->set('_serialize', ['response']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $action = $this->Actions->newEmptyEntity();
            if ($this->request->is('post')) {
                $action = $this->Actions->patchEntity($action, $this->request->getData());
                if ($this->Actions->save($action)) {
                    $this->Flash->success(__('The action has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The action could not be saved. Please, try again.'));
            }
            $products = $this->Actions->Products->find('list', ['limit' => 200]);
            $users = $this->Actions->Users->find('list', ['limit' => 200]);
            $this->set(compact('action', 'products', 'users'));
        }
        else{
            $response = 'Access is denied';
            $this->set(compact('response'));
            $this->set('_serialize', ['response']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $action = $this->Actions->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $action = $this->Actions->patchEntity($action, $this->request->getData());
                if ($this->Actions->save($action)) {
                    $this->Flash->success(__('The action has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The action could not be saved. Please, try again.'));
            }
            $products = $this->Actions->Products->find('list', ['limit' => 200]);
            $users = $this->Actions->Users->find('list', ['limit' => 200]);
            $this->set(compact('action', 'products', 'users'));
        }
        else{
            $response = 'Access is denied';
            $this->set(compact('response'));
            $this->set('_serialize', ['response']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $this->request->allowMethod(['post', 'delete']);
            $action = $this->Actions->get($id);
            if ($this->Actions->delete($action)) {
                $this->Flash->success(__('The action has been deleted.'));
            } else {
                $this->Flash->error(__('The action could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }
        else{
            $response = 'Access is denied';
            $this->set(compact('response'));
            $this->set('_serialize', ['response']);
        }
    }
}
