<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                -> constrained('categories')
                -> cascadeOnDelete();
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->string('img', 191) -> nullable();
            $table->text('newstext');
            $table->string('author')
                ->default('Admin');
            $table->timestamps();

            //Создание внешнего ключа с таблицей categories - развёрнутый способ
//            $table->foreign('category_id') // какое поле в таблице
//                -> on('categories') // с какой таблицей связь
//                -> references('id') // какая колонка
//                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
