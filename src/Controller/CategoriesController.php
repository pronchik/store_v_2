<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method$this->set('_serialize', ['categories']);
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $categories = $this->paginate($this->Categories);

            $this->set(compact('categories'));
            $this->set('_serialize', ['categories']);
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
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $category = $this->Categories->get($id, [
                'contain' => ['Products'],
            ]);

            $this->set(compact('category'));
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
            $category = $this->Categories->newEmptyEntity();
            if ($this->request->is('post')) {
                $category = $this->Categories->patchEntity($category, $this->request->getData());
                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('The category has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
            $this->set(compact('category'));
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
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $category = $this->Categories->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $category = $this->Categories->patchEntity($category, $this->request->getData());
                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('The category has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
            $this->set(compact('category'));
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
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user_role_id  = $this->Authentication->getResult()->getData()->get('role_id');
        if($user_role_id  == 3 ){
            $this->request->allowMethod(['post', 'delete']);
            $category = $this->Categories->get($id);
            if ($this->Categories->delete($category)) {
                $this->Flash->success(__('The category has been deleted.'));
            } else {
                $this->Flash->error(__('The category could not be deleted. Please, try again.'));
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
