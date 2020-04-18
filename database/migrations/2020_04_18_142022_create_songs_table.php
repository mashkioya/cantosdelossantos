<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $copyright_enum = ['cr','dp', 'an', 'ccby4','ccbysa4','ccbynd4','ccbync4','ccbyncsa4','ccbyncnd4'];

        Schema::create('songs', function (Blueprint $table) use($copyright_enum) {
            $table->id();
            $table->string('title', 100);
            $table->string('firstline', 200);
            $table->string('tune', 30)->nullable();
            $table->string('scriptures', 200)->nullable();
            $table->text('notes')->nullable();
            $table->text('lyrics');
            $table->foreignId('lyricist_id');
            $table->foreignId('translator_id')->nullable();
            $table->foreignId('composer_id');
            $table->foreignId('arranger_id')->nullable();
            $table->enum('lyrics_copyright', $copyright_enum);
            $table->enum('translation_copyright', $copyright_enum)->nullable();
            $table->enum('music_copyright', $copyright_enum);
            $table->enum('arrangement_copyright', $copyright_enum)->nullable();
            $table->smallInteger('lyrics_year')->nullable();
            $table->smallInteger('translation_year')->nullable();
            $table->smallInteger('music_year')->nullable();
            $table->smallInteger('arrangement_year')->nullable();
            $table->string('meter', 30);
            $table->enum('mode', ['io', 'do', 'ph', 'ly', 'ml', 'ae', 'lo']);
            $table->boolean('hdslides')->nullable();
            $table->boolean('sdslides')->nullable();
            $table->boolean('wholepage')->nullable();
            $table->boolean('halfpage')->nullable();
            $table->boolean('audio_complete')->nullable();
            $table->boolean('audio_soprano')->nullable();
            $table->boolean('audio_alto')->nullable();
            $table->boolean('audio_tenor')->nullable();
            $table->boolean('audio_bass')->nullable();
            $table->string('yt_complete', 11)->nullable();
            $table->string('yt_soprano', 11)->nullable();
            $table->string('yt_alto', 11)->nullable();
            $table->string('yt_tenor', 11)->nullable();
            $table->string('yt_bass', 11)->nullable();
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
        Schema::dropIfExists('songs');
    }
}
