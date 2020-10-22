<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $second_name
 * @property string $email
 * @property \Cake\I18n\FrozenDate $birth_date
 * @property string $password
 * @property string $balance
 * @property int|null $role_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Role $role
 */
class User extends Entity
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
        'first_name' => true,
        'second_name' => true,
        'email' => false,
        'birth_date' => true,
        'password' => true,
        'balance' => true,
        'role' => false,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'created' ,
        'modified' ,
        'role_id',
        'deleted'
    ];

    protected function _setPassword($password) {
        $hash = new DefaultPasswordHasher();
        return $hash->hash($password);
    }
}
