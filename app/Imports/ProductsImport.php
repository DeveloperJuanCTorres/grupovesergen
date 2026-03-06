<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;

class ProductsImport implements ToModel, WithHeadingRow, WithEvents
{
    protected $proveedor_id;

    public function __construct($proveedor_id)
    {
        $this->proveedor_id = $proveedor_id;
    }

    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function () {

                // 🔴 Poner stock en 0 a todos los productos del proveedor
                Product::where('proveedor_id', $this->proveedor_id)
                    ->update(['stock' => 0]);

            },
        ];
    }

    public function model(array $row)
    {

        $product = Product::where('codigo_interno_proveedor', $row['codigo_interno_proveedor'])
        ->where('proveedor_id', $this->proveedor_id)
        ->first();

        if ($product) {

            // 🔄 actualizar
            $product->update([
                'price' => $row['price'],
                'price_tecnico' => $row['price_tecnico'],
                'stock' => $row['stock'],
            ]);

            return null;

        } else {

            // ➕ crear
            return new Product([
                'name' => $row['name'],
                'price' => $row['price'],
                'price_tecnico' => $row['price_tecnico'],
                'unidad_medida' => $row['unidad_medida'],
                'stock' => $row['stock'],
                'slug' => Str::slug($row['name']),
                'codigo' => $row['codigo'],
                'codigo_interno_proveedor' => $row['codigo_interno_proveedor'],
                'proveedor_id' => $this->proveedor_id,
                'condition_id' => $row['condition_id'],
            ]);
        }
    }
}