<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_stores_message(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Procurement Team',
            'email' => 'procurement@energinusantara.test',
            'phone' => '+62 812 3456 7890',
            'company' => 'PT Energi Nusantara',
            'subject' => 'Permintaan penawaran tangki horizontal',
            'message' => 'Kami membutuhkan informasi kapasitas dan estimasi pengerjaan.',
        ]);

        $response->assertRedirect('/#contact');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'procurement@energinusantara.test',
            'subject' => 'Permintaan penawaran tangki horizontal',
            'status' => 'new',
        ]);
    }
}
