<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_page()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200);
    }

    public function test_add_news_page()
    {
        $response = $this->get('/admin/news/create');

        $response->assertStatus(200);
    }

    public function test_create_view()
    {
        $response = $this->get('/admin/news/create');
        $response->assertViewIs('admin.news.create');
    }
}
