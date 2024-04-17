<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
            $table->string('answer4');
            $table->smallInteger('correct')->default(1);
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        \App\Models\Test::create([ 'question' => 'Q01', 'answer1' => 'A01.1',  'answer2' => 'A01.2*', 'answer3' => 'A01.3',  'answer4' => 'A01.4',  'correct' => 2, 'category_id' => 1 ]);
        \App\Models\Test::create([ 'question' => 'Q02', 'answer1' => 'A02.1*', 'answer2' => 'A02.2',  'answer3' => 'A02.3',  'answer4' => 'A02.4',  'correct' => 1, 'category_id' => 3 ]);
        \App\Models\Test::create([ 'question' => 'Q03', 'answer1' => 'A03.1',  'answer2' => 'A03.2*', 'answer3' => 'A03.3',  'answer4' => 'A03.4',  'correct' => 2, 'category_id' => 1 ]);
        \App\Models\Test::create([ 'question' => 'Q04', 'answer1' => 'A04.1',  'answer2' => 'A04.2',  'answer3' => 'A04.3*', 'answer4' => 'A04.4',  'correct' => 3, 'category_id' => 2 ]);
        \App\Models\Test::create([ 'question' => 'Q05', 'answer1' => 'A05.1',  'answer2' => 'A05.2',  'answer3' => 'A05.3*', 'answer4' => 'A05.4',  'correct' => 4, 'category_id' => 2 ]);
        \App\Models\Test::create([ 'question' => 'Q06', 'answer1' => 'A06.1',  'answer2' => 'A06.2',  'answer3' => 'A06.3',  'answer4' => 'A06.4*', 'correct' => 4, 'category_id' => 2 ]);
        \App\Models\Test::create([ 'question' => 'Q07', 'answer1' => 'A07.1',  'answer2' => 'A07.2',  'answer3' => 'A07.3*', 'answer4' => 'A07.4',  'correct' => 3, 'category_id' => 1 ]);
        \App\Models\Test::create([ 'question' => 'Q08', 'answer1' => 'A08.1',  'answer2' => 'A08.2',  'answer3' => 'A08.3*', 'answer4' => 'A08.4',  'correct' => 3, 'category_id' => 3 ]);
        \App\Models\Test::create([ 'question' => 'Q09', 'answer1' => 'A09.1*', 'answer2' => 'A09.2',  'answer3' => 'A09.3',  'answer4' => 'A09.4',  'correct' => 1, 'category_id' => 3 ]);
        \App\Models\Test::create([ 'question' => 'Q10', 'answer1' => 'A10.1',  'answer2' => 'A10.2*', 'answer3' => 'A10.3',  'answer4' => 'A10.4',  'correct' => 2, 'category_id' => 1 ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
