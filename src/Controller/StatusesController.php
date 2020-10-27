<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Statuses Controller
 *
 * @property \App\Model\Table\StatusesTable $Statuses
 * @method \App\Model\Entity\Status[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatusesController extends AppController
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
            $statuses = $this->paginate($this->Statuses);

            $this->set(compact('statuses'));
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
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $status = $this->Statuses->get($id, [
                'contain' => ['Products'],
            ]);

            $this->set(compact('status'));
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

            $status = $this->Statuses->newEmptyEntity();
            if ($this->request->is('post')) {
                $status = $this->Statuses->patchEntity($status, $this->request->getData());
                if ($this->Statuses->save($status)) {
                    $this->Flash->success(__('The status has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The status could not be saved. Please, try again.'));
            }
            $this->set(compact('status'));
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
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $status = $this->Statuses->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $status = $this->Statuses->patchEntity($status, $this->request->getData());
                if ($this->Statuses->save($status)) {
                    $this->Flash->success(__('The status has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The status could not be saved. Please, try again.'));
            }
            $this->set(compact('status'));
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
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $this->request->allowMethod(['post', 'delete']);
            $status = $this->Statuses->get($id);
            if ($this->Statuses->delete($status)) {
                $this->Flash->success(__('The status has been deleted.'));
            } else {
                $this->Flash->error(__('The status could not be deleted. Please, try again.'));
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
