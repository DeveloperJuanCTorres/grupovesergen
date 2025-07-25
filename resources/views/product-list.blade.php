<div class="col-12 pb-1">
    <div class="d-flex align-items-center justify-content-between mb-4">        
    </div>
</div>
@foreach($products as $product)
<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
    <div class="product-item bg-white mb-4" style="border-radius: 15px;">
        <div class="product-img position-relative overflow-hidden bg-light">
            @php
                $imagenes = json_decode($product->images)
            @endphp
            @if($imagenes)
            <a href="{{route('product.detail', $product)}}">
                <img class="img-fluid w-100" style="height: 200px;" src="storage/{{$imagenes[0]}}" alt="">
            </a>
            @else
            <a href="{{route('product.detail', $product)}}">
                <img class="img-fluid d-block m-auto" src="img/defectomaster.png" alt="">
            </a>
            @endif
        </div>
        <div class="text-center py-4" style="min-height: 160px;">
            <a class="h6 text-decoration-none" href="{{route('product.detail', $product)}}">{{$product->name}}</a>
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5>S/. {{$product->price}}</h5><h6 class="text-muted ml-2"><del>S/. {{$product->price*1.20}}</del></h6>
            </div>
        </div>
        <div class="product-action text-center pb-4 px-4 w-100">
            <input type="hidden" id="qty" value="1">
            <a class="btn btn-primary addcart w-100" href="#" data-id="{{$product->id}}">
                <i class="fa fa-shopping-cart"></i>
                Agregar al carrito
            </a>

            <div class="d-flex align-items-center justify-content-center mt-2">
                <small>Stock ({{$product->stock}} {{$product->unidad_medida}})</small>
            </div>
        </div>
    </div>
</div>
@endforeach  
<div class="col-12">
    {{ $products->links('vendor.pagination.bootstrap-5') }}
</div>
