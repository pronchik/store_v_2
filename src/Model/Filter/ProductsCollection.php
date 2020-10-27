<?php

namespace App\Model\Filter;

use Search\Model\Filter\FilterCollection;

class ProductsCollection extends FilterCollection{
    public function initialize():void{
        $this
            ->like('q',[
                'before' => true,
                'after' => true,
                'fieldMode' => 'AND',
                'comparison' => 'LIKE',
                'wildcardAny' => ' ',
                'fields' => [
                    'name',
                ],
            ])
            ->value('id')
            ->value('price')
            ->value('category_id')
            ->value('created')
            ->value('seller_user_id')
            ->value('buyer_user_id')
            ->value('status_id');
    }
}
