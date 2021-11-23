<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

//use Spatie\YamlFrontMatter\YamlFrontMatter;
//use Illuminate\Support\Facades\File;

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

Route::get('ping', function (){
    $mailchimp = new \MailchimpMarketing\ApiClient();
$mailchimp->setConfig([
	'apiKey' => config('services.mailchimp.key'),
	'server' => 'us20'
]);

try {
    $response = $mailchimp->lists->createList([
      "name" => "PHP Developers Meetup",
      "permission_reminder" => "permission_reminder",
      "email_type_option" => false,
      "contact" => [
        "company" => "Mailchimp",
        "address1" => "675 Ponce de Leon Ave NE",
        "city" => "Atlanta",
        "state" => "GA",
        "zip" => "30308",
        "country" => "US",
      ],
      "campaign_defaults" => [
        "from_name" => "Gettin' Together",
        "from_email" => "gettingtogether@example.com",
        "subject" => "PHP Developer's Meetup",
        "language" => "EN_US",
      ],
    ]);
    print_r($response);
  } catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
  }
});


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');