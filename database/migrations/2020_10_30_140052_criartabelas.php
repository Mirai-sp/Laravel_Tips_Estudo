<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Criartabelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->unsignedBigInteger('profile_id'); // chave estrangeira foi assinado como unsigned provavelmente por causa de nao usar auto incremento
            $table->timestamps();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('descricao');            
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on('profiles');
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('titulo');
            $table->string('slug');
            $table->text('post');            
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('descricao');            
            $table->timestamps();
        });

        Schema::create('posts_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            $table->foreign('categorie_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('post_categories');

        Schema::dropIfExists('categories');

        Schema::dropIfExists('posts');

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['profile_id']); // Passado como array pois ele ira excluir por array de campos que contenham constraint, e usar a convenção de nomes
        });

        Schema::dropIfExists('profiles');

        Schema::dropIfExists('users');

    }
}
