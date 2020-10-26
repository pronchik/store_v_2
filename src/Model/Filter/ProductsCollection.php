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
                    'id'
                ]
            ]);


    }
}
