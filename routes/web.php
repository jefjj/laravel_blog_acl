<?php

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

Route::get('/', 'PostsController@index')->name('posts');

Auth::routes();
Route::post('admin/password/change', 'Auth\ChangePasswordController@change')->name('changePassword');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'users',
], function (){
    Route::get('/', 'UsersController@index')->name('users');
    Route::get('/delete/{id}', 'UsersController@deleteUser')->name('deleteUser')->where('id', '[0-9]+');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'posts',
], function (){
    Route::get('/new', 'PostsController@newPost')->name('newPost');
    Route::get('/update/{id}', 'PostsController@updatePost')->name('updatePost')->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'PostsController@deletePost')->name('deletePost')->where('id', '[0-9]+');
    Route::post('/filter_by_user', 'PostsController@filterByUserId')->name('postsById');
    Route::post('/save', 'PostsController@savePost')->name('savePost');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'roles',
], function (){
    Route::get('/', 'RolesController@index')->name('roles');
    Route::get('/delete/{id}', 'RolesController@deleteRole')->name('deleteRole')->where('id', '[0-9]+');
    Route::post('/save', 'RolesController@saveRole')->name('saveRole');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'permissions',
], function (){
    Route::get('/', 'PermissionsController@index')->name('permissions');
    Route::get('/delete/{id}', 'PermissionsController@deletePermission')->name('deletePermission')->where('id', '[0-9]+');
    Route::post('/save', 'PermissionsController@savePermission')->name('savePermission');
});

Route::post('/image', 'ImagesController@save')->name('imageUpload');
Route::get('/image', 'ImagesController@index')->name('image');
/* Route::get('/image', function()
{
    $url = url('/img/tec.jpg');
    $nome = uniqid('img_');
    $destinationPathG = public_path('img/' . $nome . '.jpg');
    $destinationPath = public_path('img/thumbnails/' . $nome . '.jpg');
    //dd($url);
    $imgOri = Intervention\Image\Facades\Image::make(url('/img/summer_ori.jpg'));

    $width = $imgOri->width();
    $height = $imgOri->height();

    if($width != $height) 
    {
        $adjustSize = ($width > $height ? [0, $width - $height] : [$width - $height, 0]); 
        $img = Intervention\Image\Facades\Image::make(url('/img/summer_ori.jpg'))->resizeCanvas($adjustSize[0], $adjustSize[1], 'center', true, '#ffffff');
    }

    $img->fit(500);
    $img->save($destinationPathG, 100);
    $img->fit(200);
    $img->save($destinationPath, 100);

    return $img->response('jpg');
}); */
