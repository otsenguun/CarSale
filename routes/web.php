<?php
use Illuminate\Support\Facades\Input;
use App\Carmarks;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PageController@homeshow');

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/carlist', 'PageController@carlist');

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::post('/sendmail','MailController@send');


Route::get('/cardetail/{id}','PageController@detail');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

 Route::group(['middleware' => ['auth']], function () {

        Route::resource('carproduct', 'CarProductController');

		Route::resource('carmark', 'CarMarkController');

		Route::resource('car', 'CarController');

		Route::get('/admin/car/search','CarController@search');

		Route::resource('user', 'UserController');

		Route::resource('carimg', 'CarImgController');

		Route::resource('slider', 'SliderController');



		Route::delete('/productdelete/{id}', 'CarProductController@destroy');


		Route::delete('/markdelete/{id}', 'CarMarkController@destroy');


		Route::delete('/cardelete/{id}', 'CarController@destroy');

		Route::delete('/deleteslider/{id}', 'SliderController@destroy');

		Route::delete('/carimgdelete/{id}', 'CarImgController@destroy');

		Route::get('/userprofile', function () {
				  	  return view('backend.user.userprofile');
				});

    });



 Route::get('/ajax-carmark',function(){

 	$prod_id = Input::get('prod_id');
 	$carmarks = Carmarks::where('car_product_id','=',$prod_id)->get();


 	return Response::json($carmarks);
 	
 });

 Route::get('/addlist','PageController@carlistadd');

Route::get('captcha', function () {

    $chars = '0123456789';
    $randomString = '';
    for ($i = 0; $i < 5; $i++) {
        $randomString .= $chars[rand(0, strlen($chars) - 1)];
    }

    Session::put('car-sale', strtolower($randomString));

    $im = imagecreatefrompng(public_path('captcha_bg.png'));

    imagettftext($im, 25, 0, 5, 45, imagecolorallocate($im, 0, 0, 0), public_path('larabiefont.ttf'), $randomString);

    header('Content-type: image/png');

    imagepng($im, NULL, 0);

    imagedestroy($im);


})->name('captcha');


Auth::routes();






 