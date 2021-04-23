<?php

namespace App\Services;

use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use \Illuminate\Support\Str as Str;

class ParserService
{
    protected $url;

    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    public function parsing()
    {
        $xml = XmlParser::load($this->url);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        $this->saveNews($data);
    }

// Сохранение новостей

        public function saveNews($data){

        foreach ($data['news'] as $key => $value)
        {
            $rss =
                [
                    'title' => $value['title'],
                    'newstext' => $value['description'],
                    'category_id' => 12,
                    'slug' => Str::slug($value['title'])
                ];

            \DB::table('news')->insert($rss);
        }

    }

}
