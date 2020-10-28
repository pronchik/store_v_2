<?php

namespace App\Model\Filter;

use Search\Model\Filter\FilterCollection;

class ProductsCollection extends FilterCollection{
    public function initialize():void{
        $this
            ->like('name',[
                'before' => true,
                'after' => true,
                'fieldMode' => 'AND',
                'comparison' => 'LIKE',
                'wildcardAny' => ' ',
                'fields' => [
                    'name',
                ],
            ])
            ->value('price')
            ->value('category_id')
            ->like('created',[
                'before' => true,
                'after' => true,
                'fieldMode' => 'AND',
                'comparison' => 'LIKE',
                'wildcardAny' => ' ',
                'fields' => [
                    'created',
                ],
            ])
            ->value('seller_user_id')
            ->value('buyer_user_id')
            ->value('status_id');
    }
}
