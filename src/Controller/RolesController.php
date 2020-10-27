<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
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
            $roles = $this->paginate($this->Roles);

            $this->set(compact('roles'));
            $this->set('_serialize', ['roles']);
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
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $role = $this->Roles->get($id, [
                'contain' => ['Users'],
            ]);

            $this->set(compact('role'));
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
            $role = $this->Roles->newEmptyEntity();
            if ($this->request->is('post')) {
                $role = $this->Roles->patchEntity($role, $this->request->getData());
                if ($this->Roles->save($role)) {
                    $this->Flash->success(__('The role has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The role could not be saved. Please, try again.'));
            }
            $this->set(compact('role'));
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
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $role = $this->Roles->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $role = $this->Roles->patchEntity($role, $this->request->getData());
                if ($this->Roles->save($role)) {
                    $this->Flash->success(__('The role has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The role could not be saved. Please, try again.'));
            }
            $this->set(compact('role'));
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
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $this->request->allowMethod(['post', 'delete']);
            $role = $this->Roles->get($id);
            if ($this->Roles->delete($role)) {
                $this->Flash->success(__('The role has been deleted.'));
            } else {
                $this->Flash->error(__('The role could not be deleted. Please, try again.'));
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
