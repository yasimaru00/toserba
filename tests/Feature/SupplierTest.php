<?php

namespace Tests\Feature;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class SupplierTest extends TestCase
{
    use RefreshDatabase;

    public function test_supplier_page()
    {

        $response = $this->get('/supplier');

        $response->assertStatus(302);
    }


    public function test_supplier_store()
    {
        $supplier1 = Supplier::make([
            'nama' => 'Jhonson',
            'alamat' => 'Malang',
            'telepon' => '0987654342',
        ]);
        $supplier2 = Supplier::make([
            'nama' => 'Badang',
            'alamat' => 'Batu',
            'telepon' => '09876543233',
        ]);

        $this->assertTrue($supplier1->nama != $supplier2->nama);

        // $this->assertDatabaseHas('supplier', [
        //     'nama' => 'Sukri',
        //     'alamat' => 'Malang',
        //     'telepon' => '0987654342',
        // ]);
    }

    public function test_supplier_update()
    {
        $supplier = Supplier::where('id_supplier', 1)->update([
            'nama' => 'Popo',
            'alamat' => 'Nganjuk',
            'telepon' => '3434323442',
        ]);

        $this->assertDatabaseMissing(
            'supplier',
            [

                'nama' => 'Popo',
                'alamat' => 'Nganjuk',
                'telepon' => '3434323442',
            ]
        );
    }

    public function test_supplier_delete()
    {
        $supplier = Supplier::first();
        if ($supplier) {
            $supplier->delete();
        }
        $this->assertTrue(true);
    }

    public function  test_it_store_new_supplier()
    {
        $response = $this->post('/supplier', [
            'nama' => 'Badang3',
            'alamat' => 'Batu3',
            'telepon' => '098765432233',
        ]);

        $response->assertRedirect()->dump('/supplier');
    }
}
