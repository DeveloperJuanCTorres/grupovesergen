<div class="col-12 pb-1">
    <div class="d-flex align-items-center justify-content-between mb-4">        
    </div>
</div>
@foreach($products as $product)
<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
    <div class="product-item bg-light mb-4">
        <div class="product-img position-relative overflow-hidden">
            @php
                $imagenes = json_decode($product->images)
            @endphp
            @if($imagenes)
            <img class="img-fluid w-100" src="storage/{{$imagenes[0]}}" alt="">
            @else
            <img class="img-fluid w-100" src="img/defectomaster.png" alt="">
            @endif
        </div>
        <div class="text-center py-4">
            <a class="h6 text-decoration-none " href="">{{$product->name}}</a>
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5>S/. {{$product->price}}</h5><h6 class="text-muted ml-2"><del>S/. {{$product->price*1.20}}</del></h6>
            </div>
            <div class="d-flex align-items-center justify-content-center mb-1">
                <small>Stock ({{$product->stock}} {{$product->unidad_medida}})</small>
            </div>
        </div>
        <div class="product-action text-center pb-2">
            <input type="hidden" id="qty" value="1">
            <a class="btn btn-outline-dark addcart" href="#" data-id="{{$product->id}}">
                <i class="fa fa-shopping-cart"></i>
                Agregar al carrito
            </a>
            <a class="btn btn-outline-dark" href="{{route('product.detail', $product)}}">
                <i class="fa fa-search"></i>
            </a>
        </div>
    </div>
</div>
@endforeach  
<div class="col-12">
    {{ $products->links('vendor.pagination.bootstrap-5') }}
</div>
