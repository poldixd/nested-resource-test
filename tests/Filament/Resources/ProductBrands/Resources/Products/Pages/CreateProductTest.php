<?php

namespace App\Filament\Resources\ProductBrands\Resources\Products\Pages;

use App\Filament\Resources\ProductBrands\Pages\CreateProductBrand;
use App\Models\ProductBrand;
use App\Models\User;
use Livewire\Livewire;

test('creates product ok', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $productBrand = ProductBrand::factory()->create();

    $this->assertDatabaseCount('products', 0);

    Livewire::test(CreateProduct::class, [
        'record' => $productBrand,
        'parentRecord' => $productBrand,
    ])
        ->assertOk()
        ->fillForm([
            'name' => 'Test Brand'
        ])
        ->call('create');

    $this->assertDatabaseCount('products', 1);
});
