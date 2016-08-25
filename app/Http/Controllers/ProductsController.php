<?php

namespace App\Http\Controllers;

use App\ShopBuddy\Product\ProductRepository;
use App\ShopBuddy\Transformers\ProductTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends Controller
{
    /**
     * @var CartRepository
     */
    protected $productRepository;

    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @api {get} /api/products Fetch all products
     * @apiVersion 0.2.0
     * @apiName GetProducts
     * @apiGroup Product
     *
     * @apiSuccess {String} asin_code Role of the Product.
     * @apiSuccess {String} name  Name of the Product.
     * @apiSuccess {Number} price  Price of the Product.
     * @apiSuccess {String} quantity  Quantity of the Product.
     * @apiSuccess {String} url  URL of the Product.
     * @apiSuccess {String} color  Color of the Product.
     * @apiSuccess {Number} weight  Weight of the Product.
     * @apiSuccess {Number} length  Length of the Product.
     * @apiSuccess {Number} width  Width of the Product.
     * @apiSuccess {Number} height  Height of the Product.
     * @apiSuccess {Number} size  Size of the Product.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *       {
     *              "productId": 1,
     *              "asin_code": "B01FFQEWE8",
     *              "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
     *              "price": 9999.90,
     *              "quantity": 1,
     *              "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
     *              "color": "Black",
     *              "weight": 4.50,
     *              "length": 50.70,
     *              "width": 50.70,
     *              "height": 50.70,
     *              "size": 50.70
     *          }
     *          ]
     *     }
     */

    /**
     * @api {get} /api/products?include=cart Fetch all products - Include cart
     * @apiVersion 0.2.0
     * @apiName GetProductsIncludeCart
     * @apiGroup Product Extension
     *
     * @apiSuccess {String} asin_code Role of the Product.
     * @apiSuccess {String} name  Name of the Product.
     * @apiSuccess {Number} price  Price of the Product.
     * @apiSuccess {String} quantity  Quantity of the Product.
     * @apiSuccess {String} url  URL of the Product.
     * @apiSuccess {String} color  Color of the Product.
     * @apiSuccess {Number} weight  Weight of the Product.
     * @apiSuccess {Number} length  Length of the Product.
     * @apiSuccess {Number} width  Width of the Product.
     * @apiSuccess {Number} height  Height of the Product.
     * @apiSuccess {Number} size  Size of the Product.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *       {
     *              "productId": 1,
     *              "asin_code": "B01FFQEWE8",
     *              "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
     *              "price": 9999.90,
     *              "quantity": 1,
     *              "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
     *              "color": "Black",
     *              "weight": 4.50,
     *              "length": 50.70,
     *              "width": 50.70,
     *              "height": 50.70,
     *              "size": 50.70,
     *              "cart":
     *              {
     *                  "cartId": 4,
                        "storeName": "Amazon",
                        "storeURL": "https:://www.amazon.com",
                        "totalPrice": 9999.99,
                        "createdAt": "2016-07-21 11:27:36"
     *              }
     *          }
     *          ]
     *     }
     */

    /**
     * @return mixed
     */
    public function getAllProducts()
    {
        $this->productRepository = new ProductRepository();

        $products = $this->productRepository->getAllProducts();

        return $this->collection($products, new ProductTransformer())->setStatusCode(200);
    }

    /**
     * @api {get} /api/carts/:id/products Fetch all cart products
     * @apiVersion 0.2.0
     * @apiName GetCartProducts
     * @apiGroup Product
     *
     * @apiSuccess {String} asin_code Role of the Product.
     * @apiSuccess {String} name  Name of the Product.
     * @apiSuccess {Number} price  Price of the Product.
     * @apiSuccess {String} quantity  Quantity of the Product.
     * @apiSuccess {String} url  URL of the Product.
     * @apiSuccess {String} color  Color of the Product.
     * @apiSuccess {Number} weight  Weight of the Product.
     * @apiSuccess {Number} length  Length of the Product.
     * @apiSuccess {Number} width  Width of the Product.
     * @apiSuccess {Number} height  Height of the Product.
     * @apiSuccess {Number} size  Size of the Product.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *       {
     *              "productId": 1,
     *              "asin_code": "B01FFQEWE8",
     *              "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
     *              "price": 9999.90,
     *              "quantity": 1,
     *              "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
     *              "color": "Black",
     *              "weight": 4.50,
     *              "length": 50.70,
     *              "width": 50.70,
     *              "height": 50.70,
     *              "size": 50.70
     *          }
     *          ]
     *     }
     */

    /**
     * @api {get} /api/carts/:id/products?include=cart Fetch all cart products - Include cart
     * @apiVersion 0.2.0
     * @apiName GetCartProductsIncludeCart
     * @apiGroup Product Extension
     *
     * @apiSuccess {String} asin_code Role of the Product.
     * @apiSuccess {String} name  Name of the Product.
     * @apiSuccess {Number} price  Price of the Product.
     * @apiSuccess {String} quantity  Quantity of the Product.
     * @apiSuccess {String} url  URL of the Product.
     * @apiSuccess {String} color  Color of the Product.
     * @apiSuccess {Number} weight  Weight of the Product.
     * @apiSuccess {Number} length  Length of the Product.
     * @apiSuccess {Number} width  Width of the Product.
     * @apiSuccess {Number} height  Height of the Product.
     * @apiSuccess {Number} size  Size of the Product.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *       {
     *              "productId": 1,
     *              "asin_code": "B01FFQEWE8",
     *              "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
     *              "price": 9999.90,
     *              "quantity": 1,
     *              "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
     *              "color": "Black",
     *              "weight": 4.50,
     *              "length": 50.70,
     *              "width": 50.70,
     *              "height": 50.70,
     *              "size": 50.70,
     *              "cart":
     *              {
     *                  "cartId": 4,
                        "storeName": "Amazon",
                        "storeURL": "https:://www.amazon.com",
                        "totalPrice": 9999.99,
                        "createdAt": "2016-07-21 11:27:36"
     *              }
     *          }
     *          ]
     *     }
     */

    /**
     * @param $cartId
     * @return mixed
     */
    public function getAllProductsByCartId($cartId)
    {
        $this->productRepository = new ProductRepository();

        $products = $this->productRepository->getAllProductsByCartId($cartId);

        return $this->collection($products, new ProductTransformer())->setStatusCode(200);
    }

    /**
     * @api {get} /api/products/:id Fetch one product
     * @apiVersion 0.2.0
     * @apiName GetProduct
     * @apiGroup Product
     *
     * @apiSuccess {String} asin_code Role of the Product.
     * @apiSuccess {String} name  Name of the Product.
     * @apiSuccess {Number} price  Price of the Product.
     * @apiSuccess {String} quantity  Quantity of the Product.
     * @apiSuccess {String} url  URL of the Product.
     * @apiSuccess {String} color  Color of the Product.
     * @apiSuccess {Number} weight  Weight of the Product.
     * @apiSuccess {Number} length  Length of the Product.
     * @apiSuccess {Number} width  Width of the Product.
     * @apiSuccess {Number} height  Height of the Product.
     * @apiSuccess {Number} size  Size of the Product.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data":
                {
     *              "productId": 1,
     *              "asin_code": "B01FFQEWE8",
     *              "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
     *              "price": 9999.90,
     *              "quantity": 1,
     *              "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
     *              "color": "Black",
     *              "weight": 4.50,
     *              "length": 50.70,
     *              "width": 50.70,
     *              "height": 50.70,
     *              "size": 50.70,
                }
    }
     *
     */

    /**
     * @api {get} /api/carts/:id/products?include=cart Fetch one product - Include cart
     * @apiVersion 0.2.0
     * @apiName GetProductIncludeCart
     * @apiGroup Product Extension
     *
     * @apiSuccess {String} asin_code Role of the Product.
     * @apiSuccess {String} name  Name of the Product.
     * @apiSuccess {Number} price  Price of the Product.
     * @apiSuccess {String} quantity  Quantity of the Product.
     * @apiSuccess {String} url  URL of the Product.
     * @apiSuccess {String} color  Color of the Product.
     * @apiSuccess {Number} weight  Weight of the Product.
     * @apiSuccess {Number} length  Length of the Product.
     * @apiSuccess {Number} width  Width of the Product.
     * @apiSuccess {Number} height  Height of the Product.
     * @apiSuccess {Number} size  Size of the Product.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *       {
     *              "productId": 1,
     *              "asin_code": "B01FFQEWE8",
     *              "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
     *              "price": 9999.90,
     *              "quantity": 1,
     *              "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
     *              "color": "Black",
     *              "weight": 4.50,
     *              "length": 50.70,
     *              "width": 50.70,
     *              "height": 50.70,
     *              "size": 50.70,
     *              "cart":
     *              {
     *                  "cartId": 4,
                        "storeName": "Amazon",
                        "storeURL": "https:://www.amazon.com",
                        "totalPrice": 9999.99,
                        "createdAt": "2016-07-21 11:27:36"
     *              }
     *          }
     *          ]
     *     }
     */

    /**
     * @param $id
     * @return mixed
     */
    public function getProductById($id)
    {
        $this->productRepository = new ProductRepository();

        $product = $this->productRepository->getProductById($id);

        return $this->item($product, new ProductTransformer())->setStatusCode(200);
    }


    /**
     * @api {put} /api/products/:id Update product
     * @apiVersion 0.2.0
     * @apiName UpdateProduct
     * @apiGroup Product
     *
     * @apiSuccess {String} asin_code Role of the Product.
     * @apiSuccess {String} name  Name of the Product.
     * @apiSuccess {Number} price  Price of the Product.
     * @apiSuccess {String} quantity  Quantity of the Product.
     * @apiSuccess {String} url  URL of the Product.
     * @apiSuccess {String} color  Color of the Product.
     * @apiSuccess {Number} weight  Weight of the Product.
     * @apiSuccess {Number} length  Length of the Product.
     * @apiSuccess {Number} width  Width of the Product.
     * @apiSuccess {Number} height  Height of the Product.
     * @apiSuccess {Number} size  Size of the Product.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data":
                {
     *              "productId": 1,
     *              "asin_code": "B01FFQEWE8",
     *              "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
     *              "price": 9999.90,
     *              "quantity": 1,
     *              "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
     *              "color": "Black",
     *              "weight": 4.50,
     *              "length": 50.70,
     *              "width": 50.70,
     *              "height": 50.70,
     *              "size": 50.70,
                }
            }
     *
     */

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateProductById(Request $request, $id)
    {
        $this->productRepository = new ProductRepository();

        $product = $this->productRepository->updateProduct($request->all(), $id);

        return $this->item($product, new ProductTransformer())->setStatusCode(200);
    }

    /**
     * @api {delete} /api/products/:id Delete product
     * @apiVersion 0.2.0
     * @apiName DeleteProduct
     * @apiGroup Product
     *
     * @apiSuccess {String} asin_code Role of the Product.
     * @apiSuccess {String} name  Name of the Product.
     * @apiSuccess {Number} price  Price of the Product.
     * @apiSuccess {String} quantity  Quantity of the Product.
     * @apiSuccess {String} url  URL of the Product.
     * @apiSuccess {String} color  Color of the Product.
     * @apiSuccess {Number} weight  Weight of the Product.
     * @apiSuccess {Number} length  Length of the Product.
     * @apiSuccess {Number} width  Width of the Product.
     * @apiSuccess {Number} height  Height of the Product.
     * @apiSuccess {Number} size  Size of the Product.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "data":
     *          {
     *              "productId": 1,
     *              "asin_code": "B01FFQEWE8",
     *              "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
     *              "price": 9999.90,
     *              "quantity": 1,
     *              "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
     *              "color": "Black",
     *              "weight": 4.50,
     *              "length": 50.70,
     *              "width": 50.70,
     *              "height": 50.70,
     *              "size": 50.70,
     *          }
     *      }
     *
     */

    /**
     * @param $id
     * @return mixed
     */
    public function deleteProduct($id)
    {
        $this->productRepository = new ProductRepository();

        $product = $this->productRepository->removeProduct($id);

        return $this->item($product, new ProductTransformer())->setStatusCode(200);
    }
}
