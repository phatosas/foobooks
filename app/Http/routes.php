<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');	
});

Route::group(['middleware' => ['web']], function () {
	Route::get('/books', 'BookController@getIndex');
	Route::get('/books/show/{title?}', 'BookController@getShow');
	Route::get('/books/create', 'BookController@getCreate');
	Route::post('/books/create', 'BookController@postCreate');
	Route::get('/books/edit/{id?}', 'BookController@getEdit');
	Route::post('/books/edit/', 'BookController@postEdit');
	Route::get('/books/delete/{title?}', 'BookController@getDelete');
	Route::post('/books/delete/', 'BookController@postDelete');
	Route::get('/authors', 'AuthorController@getIndex');
	Route::get('/authors/show/{id?}', 'AuthorController@getShow');
	Route::get('/authors/create', 'AuthorController@getCreate');
	Route::post('/authors/create', 'AuthorController@postCreate');
	Route::get('/authors/edit/{id}', 'AuthorController@getEdit');
	Route::post('/authors/edit/{id}', 'AuthorController@postEdit');
	Route::post('/authors/delete/{id}', 'AuthorController@postDelete');

	Route::get('/practice', function() {
		$random = new Random();
		return $random->getRandomString(10);
	});
});


Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
