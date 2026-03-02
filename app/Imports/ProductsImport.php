<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $product = Product::where('codigo_interno_proveedor', $row['codigo_interno_proveedor'])
        ->first();

        if ($product) {

            // 🔄 Solo actualizar campos específicos
            $product->update([
                'price' => $row['price'],
                'price_tecnico' => $row['price_tecnico'],
                'stock' => $row['stock'],
            ]);

            return $product;

        } else {

            // ➕ Crear nuevo producto
            return new Product([
                'name' => $row['name'],
                'price' => $row['price'],
                'price_tecnico' => $row['price_tecnico'],
                'unidad_medida' => $row['unidad_medida'],
                'stock' => $row['stock'],
                'slug' => Str::slug($row['name']),
                'codigo' => $row['codigo'],
                'codigo_interno_proveedor' => $row['codigo_interno_proveedor'],
                'proveedor_id' => $row['proveedor_id'],
                'condition_id' => $row['condition_id'],
            ]);
        }
    }
}