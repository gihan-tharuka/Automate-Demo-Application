
<?php

use Illuminate\Support\Facades\Route;

// Filament required login route for admin
Route::get('/dashboard/login', function () {
    return redirect('/login');
})->name('filament.mainPanel.auth.login');

Route::post('/dashboard/logout', function () {
    \Auth::logout();
    return redirect('/login');
})->name('filament.mainPanel.auth.logout');

Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    $services = \App\Models\Service::where('is_active', true)
        ->orderBy('created_at', 'asc')
        ->get();
    return view('services', compact('services'));
});

Route::get('/about', function () {
    $teamMembers = \App\Models\TeamMember::where('is_active', true)
        ->orderBy('order', 'asc')
        ->get();
    return view('about', compact('teamMembers'));
});

Route::get('/products', function () {
    $products = \App\Models\Product::with('category')
        ->where('quantity', '>', 0)
        ->orderBy('category_id', 'asc')
        ->orderBy('name', 'asc')
        ->get();

    $categories = \App\Models\Category::whereHas('products', function($query) {
        $query->where('quantity', '>', 0);
    })->get();

    // Get unique filter options from products
    $makes = \App\Models\Product::where('quantity', '>', 0)
        ->whereNotNull('vehicle_make')
        ->where('vehicle_make', '!=', '')
        ->distinct()
        ->pluck('vehicle_make')
        ->sort()
        ->values();

    $models = \App\Models\Product::where('quantity', '>', 0)
        ->whereNotNull('vehicle_model')
        ->where('vehicle_model', '!=', '')
        ->distinct()
        ->pluck('vehicle_model')
        ->sort()
        ->values();

    $years = \App\Models\Product::where('quantity', '>', 0)
        ->whereNotNull('vehicle_year')
        ->where('vehicle_year', '!=', '')
        ->distinct()
        ->pluck('vehicle_year')
        ->sort()
        ->values();

    return view('products', compact('products', 'categories', 'makes', 'models', 'years'));
});

use App\Http\Controllers\MessageController;
Route::get('/contact', function () {
    return view('contact');
});
Route::middleware('auth')->post('/contact', [MessageController::class, 'store'])->name('contact.store');

use App\Http\Controllers\InvoiceReportController;
use App\Http\Controllers\InvoiceReceiptController;
Route::post('/invoice-report/pdf', [InvoiceReportController::class, 'pdf'])->name('invoice.report.pdf');

Route::get('/invoice/{invoice}/receipt', [InvoiceReceiptController::class, 'show'])->name('invoice.receipt');
Route::get('/invoice/{invoice}/receipt/pdf', [InvoiceReceiptController::class, 'downloadPdf'])->name('invoice.receipt.pdf');

use App\Http\Controllers\AppointmentController;
// Book appointment page is public, but storing requires auth
Route::get('/appointments/book', [AppointmentController::class, 'index'])->name('appointments.book');
Route::middleware('auth')->group(function () {
    Route::post('/appointments/book', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::post('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
});

use App\Http\Controllers\ReviewController;
// Review routes - authenticated users only
Route::middleware('auth')->group(function () {
    // Appointment-based reviews
    Route::get('/appointments/{appointment}/review', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/appointments/{appointment}/review', [ReviewController::class, 'store'])->name('reviews.store');

    // General reviews (not tied to appointments)
    Route::get('/reviews/new', [ReviewController::class, 'createGeneral'])->name('reviews.general.create');
    Route::post('/reviews/new', [ReviewController::class, 'storeGeneral'])->name('reviews.general.store');
});

// Public testimonials page
Route::get('/testimonials', function () {
    $testimonials = \App\Models\Review::featured()->paginate(9);

    $stats = [
        'total_reviews' => \App\Models\Review::where('status', 'approved')->count(),
        'average_rating' => round(\App\Models\Review::where('status', 'approved')->avg('rating') ?: 0, 1),
        'five_star_percentage' => \App\Models\Review::where('status', 'approved')->count() > 0
            ? round((\App\Models\Review::where('status', 'approved')->where('rating', 5)->count() / \App\Models\Review::where('status', 'approved')->count()) * 100)
            : 0,
    ];

    return view('testimonials', compact('testimonials', 'stats'));
})->name('testimonials');

// Dashboard route - Filament handles /dashboard
// Admin users see admin widgets, customer users see appointment & review widgets
// Create a named route that redirects to Filament dashboard for compatibility
Route::redirect('/user/dashboard', '/dashboard')->name('dashboard');
