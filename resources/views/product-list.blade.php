
<div class="col-12 pb-1">
    <div class="d-flex align-items-center justify-content-between mb-4">        
    </div>
</div>
@foreach($products as $product)

<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
    <div class="product-item bg-white mb-4" style="border-radius: 15px;">

        {{-- IMAGEN --}}
        <div class="product-img position-relative overflow-hidden bg-light">
            @php
                $imagenes = json_decode($product->images, true);
            @endphp

            <a href="{{ route('product.detail', $product) }}">
                @if(!empty($imagenes) && isset($imagenes[0]))
                    <img class="img-fluid w-100"
                         src="{{ asset('storage/' . $imagenes[0]) }}"
                         alt="{{ $product->name }}">
                @else
                    <img class="img-fluid d-block m-auto"
                         src="{{ asset('img/defectomaster.png') }}"
                         alt="Imagen no disponible">
                @endif
            </a>
        </div>

        {{-- INFO --}}
        <div class="text-center py-4">

            <div style="height: 50px;">
                <a class="h6 text-decoration-none"
                   href="{{ route('product.detail', $product) }}">
                    {{ $product->name }}
                </a>
            </div>

            <div class="d-block align-items-center justify-content-center mt-2">

                @auth

                    <h6 class="text-muted mx-2">
                        <del>
                            S/. {{ number_format($product->price * $business->tipo_cambio, 2) }}
                            -
                            $ {{ number_format($product->price, 2) }}
                        </del>
                    </h6>

                    <h5 class="price-tecnico">
                        S/. {{ number_format($product->price_tecnico * $business->tipo_cambio, 2) }}
                        -
                        $ {{ number_format($product->price_tecnico, 2) }}
                    </h5>

                @else

                    <h5 class="price-tecnico">
                        S/. {{ number_format($product->price * $business->tipo_cambio, 2) }}
                        -
                        $ {{ number_format($product->price, 2) }}
                    </h5>

                @endauth

            </div>
        </div>

        {{-- ACCIONES --}}
        <div class="product-action text-center pb-4 px-4 w-100">

            <input type="hidden" value="1">

            <button class="add-to-cart addcart w-100"
                    data-id="{{ $product->id }}">
                <span>Agregar al carrito</span>

                <svg class="morph" viewBox="0 0 64 13">
                    <path d="M0 12C6 12 17 12 32 12C47.9024 12 58 12 64 12V13H0V12Z" />
                </svg>

                <div class="shirt">
                    <!-- SVG se mantiene igual -->
                </div>

                <div class="cart">
                    <svg viewBox="0 0 36 26">
                        <path d="M1 2.5H6L10 18.5H25.5L28.5 7.5L7.5 7.5" class="shape" />
                        <path d="M11.5 25C12.6046 25 13.5 24.1046 13.5 23C13.5 21.8954 12.6046 21 11.5 21C10.3954 21 9.5 21.8954 9.5 23C9.5 24.1046 10.3954 25 11.5 25Z" class="wheel" />
                        <path d="M24 25C25.1046 25 26 24.1046 26 23C26 21.8954 25.1046 21 24 21C22.8954 21 22 21.8954 22 23C22 24.1046 22.8954 25 24 25Z" class="wheel" />
                        <path d="M14.5 13.5L16.5 15.5L21.5 10.5" class="tick" />
                    </svg>
                </div>
            </button>

            <div class="d-flex align-items-center justify-content-center mt-2">
                <small>
                    Stock ({{ $product->stock }} {{ $product->unidad_medida }})
                </small>
            </div>

        </div>
    </div>
</div>

@endforeach


{{-- PAGINACIÓN --}}
<div class="col-12">
    {{ $products->links('vendor.pagination.bootstrap-5') }}
</div>



