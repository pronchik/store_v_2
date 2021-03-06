<?php
declare(strict_types=1);

namespace App\Controller;

use App\Http\Exception\BadRequestException;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public function initialize(): void {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions(['index']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'SellerUsers', 'BuyerUsers', 'Statuses'],
        ];
        $products = $this->paginate($this->Products
            ->find('search', ['search' => $this->request->getQueryParams()]));

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'BuyerUsers','SellerUsers', 'Statuses', 'Actions'],
        ]);

        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'BuyerUsers','SellerUsers', 'Statuses', 'Actions'],
        ]);
        $product = $this->Products->patchEntity($product,$this->request->getData());
        if (!$this->Products->save($product)) {
            throw new BadRequestException($product->getErrors());
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    public function buyProduct($id){
        $newOwner = $this->Authentication->getResult()->getData();
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'SellerUsers','BuyerUsers', 'Statuses', 'Actions'],
        ]);
        $seller = $product->get('seller_user');
        $admin = $this->Users->find()
            ->select(['id','balance'])
            ->where(['Users.role_id' => '3'])
            ->first();
        $response = $this->Products->changeOwner($product,$newOwner,$seller,$admin);
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    public function create(){
        $ownerId = $this->Authentication->getResult()->getData()->get('id');
        $product = $this->Products->createProduct($this->request->getData(), $ownerId);
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    public function deleted($id){
        $userId = $this->Authentication->getResult()->getData()->get('id');
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'SellerUsers','BuyerUsers', 'Statuses', 'Actions'],
        ]);
        $response = $this->Products->deleted($product,$userId);
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }
}
