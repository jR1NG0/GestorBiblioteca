<?php

use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
  	\DB::table('libros')->insert([
  		'id' => 1,
  		'titulo' => 'The Raven',
        'anno' => '1845',
        'autor_id'=> 1,
        'genero_id'=> 3,
  		]);
  	\DB::table('libros')->insert([
  		'id' => 2,
  		'titulo' => 'A Song of ice and fire',
        'anno' => '1996',
        'autor_id' => 2,
        'genero_id' => 3,
  		]);
  	\DB::table('libros')->insert([
  		'id' => 3,
  		'titulo' => 'Tom Sawyer',
        'anno' => '1876',
        'autor_id'=> 3,
        'genero_id'=> 2,
  		]);
  	\DB::table('libros')->insert([
  		'id' => 1,
  		'titulo' => 'Anna Karenina',
        'anno' => '1877',
        'autor_id'=> 4,
        'genero_id'=> 3,
  		]);
  	\DB::table('libros')->insert([
  		'id' => 1,
  		'titulo' => 'A midsummer night`s dream',
        'anno' => '1595',
        'autor_id'=> 5,
        'genero_id'=> 1,
  		]);
    
  }
}
