<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ContactMessage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contact', function (Request $request) {
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
            'urgent' => 'nullable|boolean',
        ]);

        $validated['urgent'] = $request->boolean('urgent');

        ContactMessage::create($validated);

        return response()->json([
            'success' => true,
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->validator->errors()->first(),
            'errors' => $e->errors(),
        ], 422);
    } catch (\Throwable $e) {
        return response()->json([
            'success' => false,
            'message' => 'حدث خطأ أثناء إرسال الرسالة',
        ], 500);
    }
});
