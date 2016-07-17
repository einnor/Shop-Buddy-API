<?php

namespace App\ShopBuddy\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'carts',
    ];

    /**
     * Turn this item object into a generic array
     * @param User $user
     * @return array
     */
    public function transform(User $user) {
        return [
            'userId'            =>      (int) $user->id,
            'roles'             =>      $user->roles,
            'name'              =>      $user->name,
            'email'             =>      $user->email,
        ];
    }

    /**
     * Include Carts
     * @param User $user
     * @return \League\Fractal\Resource\Item
     */
    public function includeCarts(User $user)
    {
        $carts = $user->carts;
        return $this->collection($carts, new CartTransformer);
    }
}