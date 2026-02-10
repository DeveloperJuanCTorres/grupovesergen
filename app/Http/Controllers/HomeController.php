<?php

namespace App\Http\Controllers;

use App\Mail\Contactanos;
use App\Mail\Reclamos;
use App\Models\Api;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Characteristic;
use App\Models\Company;
use App\Models\Field;
use App\Models\Order;
use App\Models\Page;
use App\Models\Politica;
use App\Models\Post;
use App\Models\Price;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Question;
use App\Models\Rede;
use App\Models\Service;
use App\Models\Share;
use App\Models\Sorteo;
use App\Models\Taxonomy;
use App\Models\Team;
use App\Models\Termino;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Cart;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $business = Company::find(1);
        $questions = Question::all();
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();

        $banners = Banner::all();
        $caracteristicas = Characteristic::all();
        $services = Service::take(4)->get();
        $teams = Team::all();
        $testimonios = Testimonial::all();

        return view('home',compact('categories','banners','caracteristicas','services','business','teams','questions','testimonios'));
    }

    // public function store(Request $request)
    // {
    //     $search = $request->input('search');
    //     $business = Company::find(1);
    //     $products = Product::query()->where('stock', '>', 0)
    //                 ->where('name', 'like', "%{$search}%");
    //     $page = Page::where('title','Tienda')->first();
    //     $services = Service::take(4)->get();
       
    //     if ($request->filled('categories')) {
    //         $categories = is_array($request->categories) ? $request->categories : [$request->categories];
    //         $products->whereIn('taxonomy_id', $categories);
    //     }

    //     if ($request->has('brands')) {
    //         $products->whereIn('brand_id', $request->brands);
    //     }

    //     if ($request->filled('search')) {
    //         $search = trim($request->search);
    //         $products->where('name', 'like', "%{$search}%");
    //     }

    //     $products = $products->paginate(6);

    //     if ($request->ajax()) {
    //         return view('product-list', compact('products'))->render();
    //     }


    //     $categories = Taxonomy::whereHas('products', function ($query) {
    //         $query->where('stock', '>', 0);
    //     })->get();

    //     $brands = Brand::whereHas('products', function ($query) {
    //         $query->where('stock', '>', 0);
    //     })->get();

       
    //     return view('store',compact('categories','brands','products','business','page','services'));
    // }

    public function store(Request $request)
    {
        $products = Product::where('stock', '>', 0);
        $business = Company::find(1);
        $services = Service::take(4)->get();

        if ($request->filled('search')) {
            $products->where('name', 'like', "%{$request->search}%");
        }

        if ($request->filled('category')) {
            $products->where('taxonomy_id', $request->category);
        }

        if ($request->filled('brand')) {
            $products->where('brand_id', $request->brand);
        }

        $products = $products->paginate(6);

        if ($request->ajax()) {
            return view('product-list', compact('products'))->render();
        }

        return view('store', [
            'products' => $products,
            'categories' => Taxonomy::withCount('products')->get(),
            'brands' => Brand::withCount('products')->get(),
            'business' => $business,
            'services' => $services
        ]);
    }


    public function detail (Product $product)
    {
        $business = Company::find(1);
        $page = Page::where('title','Tienda')->first();
        $services = Service::take(4)->get();
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();

        $relatedProducts = Product::whereNotNull('taxonomy_id')
            ->where('taxonomy_id', $product->taxonomy_id)
            ->where('id', '!=', $product->id)
            ->take(8)
            ->get();

        return view('product-detail', compact('product','categories','relatedProducts','business','page','services'));
    }

    public function contact()
    {
        $business = Company::find(1);
        $page = Page::where('title','Contactanos')->first();
        $services = Service::take(4)->get();

        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();

        return view('contact',compact('categories','business','page','services'));
    }

    public function about()
    {
        $business = Company::find(1);
        $nosotros = Field::find(1);
        $teams = Team::all();
        $services = Service::take(4)->get();
        $page = Page::where('title','Nosotros')->first();

        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();
        return view('about', compact('categories','business','nosotros','page','teams','services'));
    }

    public function services()
    {
        $business = Company::find(1);
        $nosotros = Field::find(1);
        $page = Page::where('title','Servicios')->first();
        
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();
        $services = Service::all();
        return view('services', compact('categories','business','nosotros','services','page'));
    }

     public function serviceDetail (Service $service)
    {
        $business = Company::find(1);
        $otherServices = Service::take(4)->get();
        $page = Page::where('title','Servicios')->first();
    
        return view('service-detail', compact('service', 'business','page','otherServices'));
    }

    public function blog()
    {
        $business = Company::find(1);
        $nosotros = Field::find(1);
        $blogs = Post::all();
        $services = Service::take(4)->get();
        $page = Page::where('title','Blog')->first();
        
        return view('blog', compact('business','nosotros', 'blogs','page','services'));
    }

    public function blogDetail (Post $blog)
    {
        $business = Company::find(1);
        $blogs = Post::all();
        $services = Service::take(4)->get();
        $page = Page::where('title','Blog')->first();
        
        return view('blog-detail', compact('blog', 'business','blogs','page','services'));
    }

    public function facturacion()
    {
        $business = Company::find(1);
        $nosotros = Field::find(1);
        $questions = Question::all();
        $services = Service::take(4)->get();
        $page = Page::where('title','Facturación Electrónica')->first();
        $testimonios = Testimonial::all();
        $precios = Price::all();

        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();
        return view('facturacion', compact('categories','business','nosotros','questions','services','page','testimonios','precios'));
    }

    public function checkout()
    {
        $business = Company::find(1);
        $page = Page::where('title','Tienda')->first();
        $services = Service::take(4)->get();

        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();

        return view('checkout',compact('categories','business','page','services'));
    }

    public function reclamaciones()
    {
        $business = Company::find(1);
        $services = Service::take(4)->get();
        $page = Page::where('title','Libro Reclamaciones')->first();

        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();
        return view('libro-reclamaciones', compact('categories','business','services', 'page'));
    }

    public function buscar(Request $request)
    {
        $productos = Product::where('name', 'like', '%' . $request->nombre . '%')->get();

        return response()->json($productos);
    }

    public function apiBrand()
    {
        try {
            $business = Company::find(1);
            $ruta = "https://erp2024.keyoficiales.com/api/Grupo/Listagruposxcodigo_web";

            $response = Http::post($ruta, [
                "ruc_empresa" => $business->ruc,
                "codigo_grupo" => 0
            ]);

            if ($response->successful() == true) {
                $body = json_decode($response->body());
                foreach ($body->listadoGrupo as $key => $item) {
                    Brand::create([
                        'name' => $item->descripcion,
                        'id_sistema' => $item->codigo
                    ]);
                }
                return response()->json(['status' => true, 'msg' => 'Registro masivo de Marcas con éxito']); 
            }
            else{
                return response()->json(['status' => true, 'msg' => 'Algo aslio mal']); 
            }

            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }
    }

    public function apiCategory()
    {
        try {
            $business = Company::find(1);
            $ruta = "https://erp2024.keyoficiales.com/api/Linea/Listalineasxcodigo_web";

            $response = Http::post($ruta, [
                "ruc_empresa" => $business->ruc,
                "codigo_liena" => 0
            ]);

            if ($response->successful() == true) {
                $body = json_decode($response->body());
                foreach ($body->listadoLinea as $key => $item) {
                    Taxonomy::create([
                        'name' => $item->descripcion,
                        'id_sistema' => $item->codigo
                    ]);
                }
                return response()->json(['status' => true, 'msg' => 'Registro masivo de Categorías con éxito']); 
            }
            else{
                return response()->json(['status' => true, 'msg' => 'Algo aslio mal']); 
            }

            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }
    }

    public function apiProduct()
    {
        try {
            $business = Company::find(1);
            $ruta = "https://erp2024.keyoficiales.com/api/Inventario/ProductosWeb";

            $response = Http::post($ruta, [
                "ruc_empresa" => $business->ruc,
                "idlinea" => 0,
                'idgrupo' => 0,
                'idalmacen' => 0,
                'descripcion' => '',
                'cantidad_producto' => 1000,
                'paginas' => 1,
                'estado' => 'P',
                'fechainicial' => '2025-04-25T14:54:34.307Z',
                'fechafinal' => '2025-04-25T14:54:34.307Z'
            ]);

            if ($response->successful() == true) {
                $body = json_decode($response->body());
                foreach ($body->listadoCatalogoWeb as $key => $item) {
                    $marca = Brand::where('id_sistema',$item->grupo)->get();
                    $categoria = Taxonomy::where('id_sistema',$item->linea)->get();
                    if ($marca) {
                        if ($categoria) {
                            
                            Product::create([
                                'name' => $item->descripcion,
                                'slug' => Str::slug($item->descripcion),
                                'price' => $item->precio_venta,
                                'taxonomy_id' => $categoria[0]->id,
                                'brand_id' => $marca[0]->id,
                                'id_sistema' => $item->codigo,
                                'unidad_medida' => $item->presentacion,
                                'stock' =>$item->stock
                            ]);
                        }
                    }             
                } 
                return response()->json(['status' => true, 'msg' => 'Registro masivo de Productos con éxito']);                
            }
            else{
                return response()->json(['status' => false, 'msg' => 'Algo aslio mal']); 
            }

            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }
    }

    public function pedido(Request $request)
    {
        try {
            $business = Company::find(1);
            $apis = Api::find(1);
                        

            // Generar el PDF y guardarlo en el storage/app/public/facturas/

            $orden = Order::create([
                'name' =>$request->nombre,
                'apellidos' => $request->apellidos,
                'empresa' => $request->empresa,
                'telefono' => $request->codigo . $request->telefono,
                'email' => $request->email,
                'direccion' => $request->direccion,
                'ruc' => $request->ruc
            ]);

            $data = ['nombre' => $request->nombre,
                    'apellidos' => $request->apellidos,
                    'ruc' => $request->ruc,
                    'empresa' => $request->empresa,
                    'telefono' => $request->codigo . $request->telefono,
                    'email' => $request->email,
                    'direccion' => $request->direccion,
                    'orden' => $orden];

            ini_set('memory_limit', '512M');

            $pdf = Pdf::loadView('partials.pdf', $data);  

            $pdfPath = 'pedido_' .$orden->id . '.pdf';
            Storage::put('public/pedidos/' . $pdfPath, $pdf->output());

            $ordenid = Order::where('id',$orden->id)->find(1);

            $orden->update([
                'pdf' => 'pedidos/' . $pdfPath
            ]);
            

            $mensaje = Http::post($apis->ruta_whatsapp, [
                "ruc_empresa" => $business->ruc,
                "numero_celular" => $request->codigo . $request->telefono,
                "mensaje" => 'Aquí le enviamos el detalle de su pedido',
                "ruta_imagen" => config('app.url') . '/storage/pedidos/' . $pdfPath,
                "apikey_bot" => $apis->apikey_bot_whatsapp,
                "ruta_bot" => $apis->ruta_bot_whatsapp
            ]);

            // config('app.url')

            Cart::destroy();
            return response()->json(['status' => true, 'msg' => 'El detalle de su pedido se envió a su WhatsApp']); 
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }        
    }

    public function correoContact(Request $request)
    {
        $correo = new Contactanos($request);
        try {
            Mail::to('administracion@vesergenperu.com')->send($correo);
            return response()->json(['status' => true, 'msg' => "El correo fue enviado satisfactoriamente"]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => "Hubo un error al enviar, inténtalo de nuevo más tarde." . $e->getMessage()]);
        }
    }

    public function correoReclamo(Request $request)
    {
        $correo = new Reclamos($request);
        try {
            // Mail::to('administracion@vesergenperu.com')->send($correo);
            Mail::to('administracion@vesergenperu.com')->send($correo);
            return response()->json(['status' => true, 'msg' => "El correo fue enviado satisfactoriamente"]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => "Hubo un error al enviar, inténtalo de nuevo más tarde." . $e->getMessage()]);
        }
    }

    public function redes()
    {
        $business = Company::find(1);
        $redes = Rede::orderBy('orden', 'asc')->get();
        return view('redes', compact('redes','business'));
    }

    public function sorteo()
    {
        $business = Company::find(1);
        $nosotros = Field::find(1);
        $page = Page::where('title','Sorteos')->first();
        
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();
        $sorteos = Sorteo::all();
        return view('sorteo', compact('categories','business','nosotros','sorteos','page'));
    }

    public function participar($id, $cantidad)
    {
        $sorteo = Sorteo::findOrFail($id);
        $user = auth()->user();

        $costoTotal = $sorteo->credito * $cantidad;

        if ($user->creditos < $costoTotal) {
            return back()->with('error', 'No tienes créditos suficientes.');
        }

        // Descontar créditos
        $user->creditos -= $costoTotal;
        $user->save();

        // Registrar múltiples participaciones
        for ($i = 0; $i < $cantidad; $i++) {
            Share::create([
                'user_id' => $user->id,
                'sorteo_id' => $sorteo->id,
            ]);
        }

        return back()->with('success', "Participaste {$cantidad} veces en este sorteo.");
    }

    public function terminos()
    {
        $business = Company::find(1);
        $nosotros = Field::find(1);
        $terminos = Termino::first();
        return view('terminos', compact('business','nosotros','terminos'));
    }

    public function politicas()
    {
        $business = Company::find(1);
        $nosotros = Field::find(1);
        $politicas = Politica::first();
        return view('politicas', compact('business','nosotros','politicas'));
    }


}
