<?php

use App\Data\MockData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$apiSuccess = function (array $data, bool $isMock = true, string $message = 'Mock response') {
    return response()->json([
        'success' => true,
        'message' => $message,
        'mock' => $isMock,
        'data' => $data
    ]);
};

$apiError = function (string $message = 'Unable to fetch data') {
    return response()->json([
        'success' => false,
        'message' => $message,
        'mock' => true,
        'data' => []
    ], 500);
};

Route::middleware('api')->get('/status', function (Request $request) {
    return ['status' => 'ok', 'environment' => config('app.env')];
});

Route::prefix('auth')->group(function () use ($apiSuccess) {
    Route::post('register', function (Request $request) use ($apiSuccess) {
        return $apiSuccess([ 'token' => 'mock-register-token', 'user' => [ 'name' => $request->input('name', 'Guest') ] ], true, 'Registration simulated');
    });

    Route::post('login', function (Request $request) use ($apiSuccess) {
        return $apiSuccess([ 'token' => 'mock-login-token', 'user' => [ 'email' => $request->input('email', 'demo@example.com') ] ], true, 'Login simulated');
    });

    Route::post('forgot-password', function () use ($apiSuccess) {
        return $apiSuccess([ 'status' => 'otp_sent' ], true, 'Mock OTP has been sent');
    });

    Route::post('verify-otp', function () use ($apiSuccess) {
        return $apiSuccess([ 'status' => 'verified' ], true, 'OTP verification simulated');
    });
});

Route::get('/home', function () use ($apiSuccess) {
    return $apiSuccess([ 'banners' => MockData::banners(), 'featured' => MockData::products(['limit' => 4]), 'categories' => MockData::categories(), 'top_selling' => MockData::products(['sale_only' => true, 'limit' => 3]) ], true, 'Home data (mock)');
});

Route::get('/products', function (Request $request) use ($apiSuccess, $apiError) {
    $filters = $request->only(['category', 'search', 'limit']);
    if ($request->has('sale_only')) {
        $filters['sale_only'] = $request->boolean('sale_only');
    }

    try {
        $products = MockData::products($filters);
        return $apiSuccess([ 'products' => $products, 'categories' => MockData::categories() ], true, 'Products list');
    } catch (Throwable $exception) {
        return $apiError('Unable to gather products');
    }
});

Route::get('/products/{slug}', function ($slug) use ($apiSuccess, $apiError) {
    $product = MockData::productBySlug($slug);
    if ($product) {
        return $apiSuccess($product, true, 'Product details (mock)');
    }

    return $apiError('Product not found');
});

Route::get('/cart', function () use ($apiSuccess) {
    return $apiSuccess(MockData::cart(), true, 'Cart snapshot');
});

Route::get('/orders', function () use ($apiSuccess) {
    return $apiSuccess(MockData::orders(), true, 'Order history');
});

Route::get('/profile', function () use ($apiSuccess) {
    return $apiSuccess(MockData::profile(), true, 'User profile');
});

Route::get('/admin/dashboard', function () use ($apiSuccess) {
    return $apiSuccess(MockData::adminDashboard(), true, 'Admin dashboard');
});
EOF