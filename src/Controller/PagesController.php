<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['home']);
    }

    public function home() {
        $api = 'v1';
        $this->set(compact('api'));
        $this->set('_serialize', ['api']);
    }
    public function balance() {
        $admin = $this->Users->find()
            ->select(['id','balance'])
            ->where(['Users.role_id' => '3'])
            ->first();
        $adminBalance = $admin->get('balance');
        $this->set(compact('adminBalance'));
        $this->set('_serialize', ['adminBalance']);
    }
}
