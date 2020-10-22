<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $category_id
 * @property string $price
 * @property int $seller_user_id
 * @property \Cake\I18n\FrozenTime $add_date
 * @property int|null $buyer_user_id
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property string $name
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Action[] $actions
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'category_id' => true,
        'price' => true,
        'seller_user_id' => true,
        'buyer_user_id' => true,
        'status_id' => true,
        'name' => true,
        'category' => true,
        'status' => true,
        'deleted' => true,

    ];

    protected $_hidden = [
        'created' ,
        'modified' ,
        'user',
        'actions'
    ];
}
