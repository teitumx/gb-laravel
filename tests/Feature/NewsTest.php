<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_all_news()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function test_show_one_news()
    {
        $id = rand(1,5);

        $response = $this->get('/news/show/' . $id);

        $response->assertStatus(200);
    }

    //Тест на отображение правильного текста в новости
    public function test_news_has_text()
    {
        $id = rand(1,5);

        $response = $this->get('/news/show/' . $id);

        $response->assertSee('Отобразить новость с ID = ' . $id);

    }

    public function news_view()
    {
        $response = $this->get('news/');
        $response->assertViewIs('news.index');
    }
}

