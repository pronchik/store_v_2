<?php
declare(strict_types=1);

namespace App\Controller;

use App\Http\Exception\BadRequestException;
use App\Model\Entity\User;
use App\Model\Table\UsersTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;
use Firebase\JWT\JWT;

/**
 * Users Controller
 *
 * @property UsersTable $Users
 * @method User[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize(): void {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions(['login']);
        $this->Authentication->addUnauthenticatedActions(['register']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }


    public function register() {
        $user = $this->Users->newEmptyEntity();
        $user = $this->Users->patchEntity($user, $this->request->getData());
        $user->password = $this->request->getData('password');
        $user->role_id = 1;
        $user->email = $this->request->getData('email');// email for registration
        if (!$this->Users->save($user)) {
            throw new BadRequestException($user->getErrors());
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }


    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if (!$this->Users->save($user)) {
            throw new BadRequestException($user->getErrors());
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /*public function delete($id = null) {
        $user = $this->Users->get($id);
        if (!$this->Users->delete($user)) {
            throw new BadRequestException([], 'Cant delete this');
        }
        $response = 'ok';
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }*/



    public function login() {
        $result = $this->Authentication->getResult();
        $deleted = $this->Authentication->getResult()->getData()->get('deleted');
        if ($result->isValid() && $deleted == null) {
            $privateKey = file_get_contents(CONFIG . '/jwt.key');
            $user = $result->getData();
            $payload = [
                'iss' => 'store.local',
                'sub' => $user->id,
                'exp' => time() + 5000,
            ];
            $json = [
                'token' => JWT::encode($payload, $privateKey, 'RS256'),
            ];
        } else {
            $this->response = $this->response->withStatus(401);
            $json = ['fail'];
        }
        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
    }

    public function myAccount(){
        $user = $this->Users->find('all',  array(
            'conditions' => array('Users.role_id' => '3'),
        ));

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function updateBalance(){
        $user = $this->Authentication->getResult()->getData();
        $amount = $this->request->getData('amount');
        $response = $this->Users->updateBalance($user,$amount);
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    public function deleted(){
        $user = $this->Authentication->getResult()->getData();
        $response = $this->Users->deleted($user);
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    /*public function register(){
        //$user = $this->request->getData();
        $user = $this->Users->register($this->request->getData());
        $user->email = $this->request->getData('email');
        $this->set(compact('email'));
        $this->set('_serialize', ['email']);
    }*/
}

