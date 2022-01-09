<?php

use Illuminate\Support\Facades\Route;

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

const HASHES = [
    "ep2UMbksqGnFlaU56HdaPafGfKYqEx4wFdU5Cw8XNRs19ZtHmASBAXUwLfHWoBnU6Q6XNr9hqplzjqwSGFTlaOiEZLMT7bOSjfGBEqIU4R33XEHisSL8CVW5B2ljBc=="
    => 'alex',
    'ep1UMbksqGnFlaU56HdaPafGfKYqEx4wFdU5Cw8XNRs19ZtHmASBAXUwLfHWoBnU6Q6XNr9hqplzjqwSGFTlaOiEZLMT7bOSjfGBEqIU4R33XEHisSL8CVW5B2ljBc=='
    => 'ola',
];

Route::permanentRedirect('/', 'https://dila.ua');

Route::get('/api/patients/orders/covid/info/', function () {

    $hash = $_GET['orderHash'] ?? '';
    if (isset(HASHES[$hash])) {
        $testOwner = HASHES[$hash];
        $testPoint = strtotime("yesterday");
        if (date('D') === 'Mon') {
            $testPoint = strtotime("-2 days");
        }
        $yesterday = date('d-m-Y', $testPoint);
        return view($testOwner, [
            'yesterday' => $yesterday
        ]);
    }
    return abort(404);
});
