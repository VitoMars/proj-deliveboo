<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $items;
    private $total;

    public function __construct()
    {
        $this->items = [];
        $this->total = 0.00;
        $this->description = "";
    }

    // Carrello vuoto
    public function emptyCart()
    {
        $this->items = [];
        $this->total = 0.00;
    }

    // Items Getter e Setter

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function getItems()
    {
        $items = [];
        if ($this->hasItems()) {
            foreach ($this->items as $item) {
                $items[] = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal'],
                    'slug' => $item['slug']
                ];
            }
        }
        return $items;
    }

    //Total Getter e Setter

    public function setTotal($value)
    {
        $this->total = $value;
    }
    public function getTotal()
    {
        return $this->total;
    }


    // public function updateCart(Product $product, $quantity) {
    //     if($this->hasItems()) {
    //         foreach($this->items as &$item)  {
    //             if($product->id == $item['id']) {
    //                 $item['quantity'] = $quantity;
    //                 $item['subtotal'] = ($product->price * $quantity);
    //                 $this->calculateTotal();
    //             }
    //         }
    //     }
    // }
}
