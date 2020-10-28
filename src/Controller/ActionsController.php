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
        $user_role_id = $this->Authentication->getResult()->getData()->get('role_id');
        if ($user_role_id == 3) {
            $this->paginate = [
                'contain' => ['Products', 'Users',],
            ];
            $actions = $this->paginate($this->Actions);

            $this->set(compact('actions'));
            $this->set('_serialize', ['actions']);
        } else {
            $response = 'Access is denied';
            $this->set(compact('response'));
            $this->set('_serialize', ['response']);
        }
    }
}
