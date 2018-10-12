<?php
/**
 * User: russ
 * Date: 12/10/2018
 * Time: 13:17
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Products extends BaseResponse
{
    private $products = [];

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     * @return Products
     */
    public function setProducts(array $products): Products
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
        return $this;
    }
}