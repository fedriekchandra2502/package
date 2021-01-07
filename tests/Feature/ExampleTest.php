<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createPackage()
    {
        $response = $this->post('/api/package', [
            'package_name' => 'Sepeda',
            'customer_name' => 'Andi',
            'customer_address' => 'Tangerang',
            'customer_email' => 'andi@gmail.com',
            'customer_phone' => '08123512312',
            'receiver_name' => 'Lala',
            'receiver_address' => 'Pantai Indah Kapuk',
            'receiver_phone' => '0812526312353',
        ]);

        $response->assertStatus(200);
        $this->assertEquals($response->getData()->message, 'create package success');
    }

    public function test_updatePackage() {
        $response = $this->put('/api/package/5ff68860d151000016007c72', [
            'package_name' => 'Boneka',
            'customer_name' => 'Budi',
            'customer_address' => 'Rawa Belong',
            'customer_email' => 'budi@gmail.com',
            'customer_phone' => '08123512312',
            'receiver_name' => 'Anton',
            'receiver_address' => 'Kemanggisan',
            'receiver_phone' => '0812526312353',
        ]);

        $response->assertStatus(200);
        $this->assertEquals($response->getData()->message, 'update package success');
    }

    public function test_changePackageName() {
        $response = $this->patch('/api/package/5ff68860d151000016007c72', [
            'package_name' => 'Chocolate',
        ]);

        $response->assertStatus(200);
        $this->assertEquals($response->getData()->data->package_name, 'Chocolate');
        $this->assertEquals($response->getData()->message, 'package name has been changed');
    }
}
