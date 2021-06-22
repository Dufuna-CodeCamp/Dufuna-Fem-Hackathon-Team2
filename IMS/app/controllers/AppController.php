<?php

namespace App\Controller;

use App\Constants\Constants;
use App\Model\Category;
use App\Model\Inventory;
use App\Model\Vendor;
use App\Model\Purchase;
use App\Model\Sale;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AppController
{
    // Endpoint to create a category
    public function createCategory(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $createdAt = date('Y-m-d H:i:s');

        $createdBy = 1;

        $category = Category::create([
            'category_name' => $data['category_name'],
            'created_at' => $createdAt,
            'created_by' => $createdBy
        ]);
        $category->save();
        $response->getBody()->write(json_encode(([
            'status' => 'success',
            'data' => $category->toArray()
        ])));
        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }

    // Endpoint to create a product
    public function addProduct(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $createdAt = date('Y-m-d H:i:s');

        $createdBy = 1;

        $product =  Inventory::create([
            'product_name' => $data['product_name'],
            'quantity' => $data['quantity'],
            'created_at' => $createdAt,
            'created_by' => $createdBy
        ]);
        $product->save();
        $response->getBody()->write(json_encode(([
            'status' => 'success',
            'data' => $product->toArray()
        ])));
        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }

    // Endpoint to create a vendor
    public function addVendor(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $vendor = Vendor::create([
            'vendor_name' => $data['vendor_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'address' => $data['address']
        ]);
        $vendor->save();
        $response->getBody()->write(json_encode(([
            'status' => 'success',
            'data' => $vendor->toArray()
        ])));
        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }

    // Endpoint to add a new purchase
    public function addPurchase(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $createdAt = date('Y-m-d H:i:s');

        $createdBy = 1;

        $purchase = Purchase::create([
            'product' => $data['product'],
            'product_price' => $data['product_price'],
            'quantity' => $data['quantity'],
            'vendor' => $data['vendor'],
            'created_at' => $createdAt,
            'created_by' => $createdBy
        ]);
        $purchase->save();
        $response->getBody()->write(json_encode(([
            'status' => 'success',
            'data' => $purchase->toArray()
        ])));
        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }

    // Endpoint to add a new sales
    public function addSale(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $createdAt = date('Y-m-d H:i:s');

        $createdBy = 1;

        $sale = Sale::create([
            'product' => $data['product'],
            'product_price' => $data['product_price'],
            'quantity' => $data['quantity'],
            'customer_name' => $data['customer_name'],
            'created_at' => $createdAt,
            'created_by' => $createdBy
        ]);
        $sale->save();
        $response->getBody()->write(json_encode(([
            'status' => 'success',
            'data' => $sale->toArray()
        ])));
        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }

    // Endpoint to update a category
    public function updateCategory(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $data = $request->getParsedBody();

        $category = Category::find($id);

        if (!$category) {
            $response->getBody()->write(json_encode([ 
                'error' => 'Category not found' 
            ]));
            return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(404);
        }

        $category->category_name = $data['category_name'];
        $category->save();

        $response->getBody()->write(json_encode([
            'status' => 'success',
            'data' => $category->toArray()
        ]));

        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }

    // Endpoint to update a vendor
    public function updateVendor(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $data = $request->getParsedBody();

        $vendor = Vendor::find($id);

        if (!$vendor) {
            $response->getBody()->write(json_encode([ 
                'error' => 'Vendor not found' 
            ]));
            return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(404);
        }

        $vendor->vendor_name = $data['vendor_name'];
        $vendor->save();

        $response->getBody()->write(json_encode([
            'status' => 'success',
            'data' => $vendor->toArray()
        ]));

        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }

    // Endpoint to retrieve all purchases
    public function showPurchases(Request $request, Response $response)
    {
        $purchases = Purchase::all();

        $response->getBody()->write(json_encode([
            'status' => 'success',
            'data' => $purchases->toArray()
        ]));

        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }

    // Endpoint to retrieve all sales
    public function showSales(Request $request, Response $response)
    {
        $sales = Sale::all();

        $response->getBody()->write(json_encode([
            'status' => 'success',
            'data' => $sales->toArray()
        ]));

        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }

    // Endpoint to retrieve all inventories
    public function showInventories(Request $request, Response $response)
    {
        $products = Inventory::all();

        $response->getBody()->write(json_encode([
            'status' => 'success',
            'data' => $products->toArray()
        ]));

        return $response->withHeader(Constants::CONTENT_TYPE_HEADER, Constants::APPLICATION_JSON)->withStatus(200);
    }
    
}