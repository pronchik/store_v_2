<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Controller\ActionsController;
use App\Controller\UsersController;
use App\Model\Entity\Product;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\ActionsTable&\Cake\ORM\Association\HasMany $Actions
 *
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'seller_user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'buyer_user_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'seller_user_id',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Actions', [
            'foreignKey' => 'product_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);
        $rules->add($rules->existsIn(['seller_user_id'], 'Users'), ['errorField' => 'seller_user_id']);
        $rules->add($rules->existsIn(['buyer_user_id'], 'Users'), ['errorField' => 'buyer_user_id']);
        $rules->add($rules->existsIn(['status_id'], 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }

    public function changeOwner($productId,$userId,$user,$seller,$admin){
        if($userId == $productId->seller_user_id){
            return 'You cant buy your product';
        }
        elseif ($user->balance < $productId->price){
            return 'You have not enough money';
        }
        elseif($productId->status_id == 2){
            return 'This product was sold';
        }
        else{
            $productId->buyer_user_id = $userId; //
            $productId->status_id = 2;           // делаем статус 'Sold'

            $user->balance = $user->balance - $productId->price; //вычитаем из баланса стоимость продукта

            $seller->balance = $seller->balance + ($productId->price * 0.95);
            $admin->balance = $admin->balance + ($productId->price * 0.05);

            $this->save($productId);
            $this->Users->save($user);
            $this->Users->save($admin);
            $this->Users->save($seller);

            return 'Вы купили '.$productId->name.' за '.$productId->price;
        }
    }

    public function createProduct($data, $ownerId){
        $product = $this->newEntity($data);
        $product->seller_user_id = $ownerId;
        $product->status_id = 1;
        $this->save($product);
        return $product;
    }
    public function deleted($product,$user){
        if($product->seller_user_id == $user && $product->status_id == 1){
            $product->deleted = date("F j, Y, g:i a");
            $this->save($product);
            return 'Deleted';
        }
        else{
            return 'NOT Deleted';
        }
    }
}
