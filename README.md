# PHP_LARAVEL12_META_MANAGER

```php
Laravel 12 based Meta Manager project for managing SEO Meta Tags (Title, Description, Keywords) dynamically for different pages, built using a clean MVC + Service-ready architecture.
```
# Project Overview
```php
PHP_LARAVEL12_META_MANAGER allows developers to control SEO metadata from the database instead of hardcoding meta tags inside views.
```
# Key Features 
```php
- Page-wise dynamic SEO meta management
- Database-driven meta tags
- Blade-based rendering
- API-ready structure
- Scalable & production-ready Laravel 12 architecture
```

# Step 1: Install Fresh Laravel 12 Application
Open Terminal / Command Prompt and run:
```php
composer create-project laravel/laravel:^12.0 PHP_LARAVEL12_META_MANAGER
```
Move into the project directory:
```php
cd PHP_LARAVEL12_META_MANAGER
```
Generate application key:
```php
php artisan key:generate
```

# Explanation
```php
- Installs a clean Laravel 12 application
- Application key is required for encryption and security
```

# Step 2: Configure Environment & Database
Open the .env file and update database configuration:
```php
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=meta_manager
DB_USERNAME=root
DB_PASSWORD=
```
Save the file.

Run default migrations:
```php
php artisan migrate
```

# Explanation
```php
- .env manages environment-level configuration
- Migrations create the required database tables
```

# Step 3: Meta Manager Core Architecture
# Architecture Pattern
- MVC + Service Ready Structure

# Main Components
```php
- Meta Tag Module
- Page-wise SEO Logic
- Blade-based Rendering
- API-ready structure
```

# Step 4: Create Meta Tags Database Structure
Create migration:
```php
php artisan make:migration create_meta_tags_table
```
```php
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
    Schema::create('meta_tags', function (Blueprint $table) {
        $table->id();
        $table->string('page_name');
        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();
        $table->text('meta_keywords')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_tags');
    }
};
```
Run migration:
```php
php artisan migrate
```
# Explanation
```php
- Stores SEO meta data page-wise
- Allows dynamic SEO updates without code changes
```

# Step 5: Create MetaTag Model
Create model:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    protected $fillable = [
    'page_name',
    'meta_title',
    'meta_description',
    'meta_keywords'
];

}
```
# Explanation
```php
- Model represents meta_tags table
- $fillable enables mass assignment
```
# Step 6: Create MetaTag Controller
Create controller:
```php
php artisan make:controller MetaTagController
```
```php
<?php

namespace App\Http\Controllers;
 use App\Models\MetaTag;
use Illuminate\Http\Request;

class MetaTagController extends Controller
{
   

public function index()
{
    return MetaTag::all();
}

public function store(Request $request)
{
    return MetaTag::create($request->all());
}

}
```
# Explanation
```php
- Controller handles meta tag logic
- Returns all meta records
```

# Step 7: Define Routes
Open routes/web.php:
```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetaTagController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/meta-tags', [MetaTagController::class, 'index']);
Route::post('/meta-tags', [MetaTagController::class, 'store']);

```
# Explanation
```php
/ loads the home page
/meta-tags returns meta records in JSON format
```
# Step 8: Verify Meta Loading
Start Laravel development server:
```php
php artisan serve
```
Open browser:
```php
http://127.0.0.1:8000
```
<img width="1294" height="606" alt="image" src="https://github.com/user-attachments/assets/6dd10449-dd73-4c26-aeac-c4fb993c16ca" />

```php
http://127.0.0.1:8000/meta-tags
```
<img width="897" height="424" alt="image" src="https://github.com/user-attachments/assets/6c479dea-310d-42d6-af02-d58c7db210e1" />

# Explanation
```php
- Home page loads SEO meta dynamically
- /meta-tags endpoint confirms database connectivity
```
# Project Folder Structure
```php
PHP_LARAVEL12_META_MANAGER
├── app/
│   ├── Models/
│   │   └── MetaTag.php
│   ├── Http/
│   │   └── Controllers/
│   │       └── MetaTagController.php
│
├── resources/
│   └── views/
│       └── home.blade.php
│
├── routes/
│   └── web.php
│
├── database/
│   └── migrations/
│
├── .env
├── artisan
└── composer.json
```
