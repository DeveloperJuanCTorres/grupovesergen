<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Page;
use App\Models\Product;
use App\Models\Service;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    // public function add(Request $request)
    // {
    //     try {
    //         $producto = Product::find($request->id);
    //         if (empty($producto)) {
    //             return redirect('/');
    //         }
    //         $imagen = json_decode($producto->images);
    //         if ($imagen) {
    //             $img = 'storage/' . $imagen[0];
    //         }
    //         else{
    //             $img = 'img/defectomaster.png';
    //         }
    //         Cart::add(
    //             $producto->id,
    //             $producto->name,
    //             $request->qty,
    //             $producto->price,
    //             ["image"=>$img]
    //         );

    //         return response()->json(['status' => true, 'msg' => 'Porducto se agrego a su carrito', 'count' => Cart::count()]);

    //     } catch (\Throwable $th) {
    //         return response()->json(['status' => false, 'msg' => $th->getMessage()]);
    //     }        
    // }

    public function add(Request $request)
    {
        try {

            $producto = Product::find($request->id);

            if (!$producto) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Producto no encontrado'
                ]);
            }

            // Imagen
            $imagen = json_decode($producto->images);
            $img = $imagen 
                ? 'storage/' . $imagen[0] 
                : 'img/defectomaster.png';

            // 🔥 LÓGICA DE PRECIO
            if (auth()->check()) {
                $precioBase = $producto->price_tecnico;
            } else {
                $precioBase = $producto->price;
            }

            // Convertir a soles
            $tipoCambio = Company::first()->tipo_cambio ?? 1;
            $precioSoles = $precioBase * $tipoCambio;

            Cart::add(
                $producto->id,
                $producto->name,
                $request->qty,
                $precioSoles,
                [
                    "image" => $img,
                    "currency" => "PEN",
                    "original_price" => $precioBase
                ]
            );

            return response()->json([
                'status' => true,
                'msg' => 'Producto agregado al carrito',
                'count' => Cart::count()
            ]);

        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }



    public function update(Request $request)
    {
        $rowId = $request->rowId;
        $qty = (int) $request->qty;

        if ($qty < 1) {
            $qty = 1;
        }

        \Cart::update($rowId, $qty);

        return response()->json([
            'status' => true,
            'count' => \Cart::count(),
            'subtotal' => number_format(\Cart::subtotal() - \Cart::subtotal()*0.18, 2),
            'igv' => number_format(\Cart::subtotal()*0.18, 2),
            'total' => number_format(\Cart::subtotal(), 2),
            'item_subtotal' => number_format(\Cart::get($rowId)->price * $qty, 2)
        ]);
    }

    public function cart()
    {
        $business = Company::find(1);
        $page = Page::where('title','Tienda')->first();
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->get();
        $services = Service::take(4)->get();

        return view('cart',compact('categories','business','page','services'));
    }

    public function removeItem(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect()->back()->with("success","Item eliminado");
    }

    public function clear()
    {
        Cart::destroy();
        return redirect()->back()->with("success","Carrito vacio");
    }
}
