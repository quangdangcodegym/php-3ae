### Create laravel project

composer create-project laravel/laravel author-permission

### MMigration

##### Tạo file migration

php artisan make:migration taotableNsx --create=nhasanxuat
--> tên file: 2023-10-10-000000_tao_table_Nsx  
 (taotableNsx <=>tao_table_Nsx)
(DangVanQuang <=> dang_van_quang)
--> php artisan make:migration CreateTableProducts --create=products
php artisan make:migration CreateTableMusics --create=musics
php artisan make:migration CreateTableAuthors --create=authors

hoặc
php artisan make:migration create_nhasanxuat_table

##### Cập nhật migration

php artisan make:migration suatableNsx --table=nhasansuat
--> tên file: 2023_09_13_113827_suatable_nsx.php

===> Nó sẽ viết thường + Chữ cái đầu Uppercase sẽ được hạ xuống + thêm dấu '\_'

--- Thêm khóa ngoại cho bảng products
php artisan make:migration EditTableProductAddForeign --table=products

```php
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Có thể cho phép null hoặc value default: $table->unsignedBigInteger('user_created_id')->default(null)->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Xóa khóa ngoại category_id
        });
    }
```

--- Thêm một trường cho bảng categories
php artisan make:migration EditTableCategoryAddField --table=categories
php artisan make:migration EditTableProductAddField --table=products

###### Các lệnh thường sử dụng

$table->increments(‘id’); ➔ field id tăng tự động, unsigned integer
$table->id(); ➔ field id tang tự động, big Integer
$table->integer(‘soLuong’); ➔ field kểu integer , tên soLuong
$table->string(‘tenSP’, 100); ➔ field kiểu varchar, độ dài 100
$table->boolean(‘anHien’); ➔ field kiểu Boolean
$table->double(‘diemTB’, 8, 2); ➔ field kiểu số thực
$table->dateTime(‘thoiDiemMuaHang’); ➔ field kiểu ngày giờ
$table->charset = ‘utf8mb4’; ➔ Khai báo charset cho table
$table->collation = ‘utf8mb4_unicode_ci’; ➔ Khai báo collation cho table
$table->timestamps(); ➔ Tạo 2 field created_at và updated_at

###### Thực hiện chạy migration

---- Chạy tất cả các migration chưa chạy
php artisan migrate
Nếu thằng nào đã chạy rồi thì KHỎI chạy, chưa chạy thì được chạy

php artisan migrate:rollback
Rollback về migration gần nhất (chú ý field batch trong bảng migrations)

php artisan migrate:rollback --step=2
Roleback về step được chỉ định

php artisan migrate:reset sẽ rollback lại tất cả migration của ứng dụng.
php artisan migrate:refresh sẽ rollback lại toàn bộ migration và rồi chạy lệnh migrate.

### SSEEDER

- Để tạo seeder
  php artisan make:seeder NhaSanXuat

php artisan make:seeder Categories

- Để chạy seeder đã tạo, chạy lệnh sau trong folder project
  php artisan db:seed --class=NhaSanXuat
  php artisan db:seed --class=Categories

  #### Tạo controller

  php artisan make:controller UserController
  php artisan make:controller ProductController

### MModel

php artisan make:model Category

```php
//B1: Tạo bảng và migrate:
// Tạo bảng "posts"
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    // Thêm các cột khác cho bài viết
    $table->timestamps();
});

// Tạo bảng "comments"
Schema::create('comments', function (Blueprint $table) {
    $table->id();
    $table->text('content');
    $table->unsignedBigInteger('post_id'); // Khóa ngoại đến bảng "posts"
    // Thêm các cột khác cho bình luận
    $table->timestamps();
});
// Định nghĩa các mô hình Eloquent: Tiếp theo, bạn cần định nghĩa các mô hình Eloquent cho các bảng này. Ví dụ:
// app/Models/Post.php
class Post extends Model {
    protected $fillable = ['title'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}

// app/Models/Comment.php
class Comment extends Model {
    protected $fillable = ['content'];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}

// Sử dụng mối quan hệ "many-to-one": Bây giờ bạn có thể sử dụng mối quan hệ "many-to-one" trong ứng dụng của mình. Ví dụ:
// Lấy tất cả các bình luận cho một bài viết cụ thể
$post = Post::find(1);
$comments = $post->comments;

// Lấy bài viết mà một bình luận thuộc về
$comment = Comment::find(1);
$post = $comment->post;

```

### VValidation

###### Validation sử dụng formRequest

php artisan make:request RuleNhapSV
php artisan make:request ValidationProduct

```php
public function authorize(): bool
    {
        // nhớ cho true để không cần phải authorize
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'name' => ['required', 'regex:^[a-zA-Z]{8,20}$'],
            'description' => 'required|regex:^[a-zA-Z]{8,50}$',
            'category_id' => 'required|regex:^[0-9]+$',
            'price' => 'required|regex:^[0-9]+$',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên phải được nhập',
            'name.regex' => 'Tên chưa hợp lệ. Phải từ 8-20 chữ cái',
            'description.regex' => 'Thông tin mô tả chưa hợp lệ. Từ 8-50 chữ cái',
            'category_id.regex' => 'Danh mục phải là số',
            'price.regex' => 'Giá không hợp lệ',
        ];
    }
```

### RRouter

```php
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/create', [ProductController::class, 'save'])->name('save');

    Route::get('/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [ProductController::class, 'update'])->name('update');

    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});

```

Route::prefix('products')->name('products.')->group(function () {
Route::get('/{id}', [ProductController::class, 'show'])->name('show');
}
sử dụng route này như thế nào
href="{{ route(???)}}"

<a href="{{ route('products.show', ['id' => 123]) }}">Xem sản phẩm có ID 123</a>

### LLogging ứng dụng

Cấu hình ở file config/log

```php

// chú ý dòng: 'default' => env('LOG_CHANNEL', 'stack'),        Thằng stack sẽ được lấy để chạy
'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single', 'product_history'],
            // 'channels' => ['single', 'post_history'],        // dùng stack thì có thể đưa vào nhiều channel
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],
        'post_history' => [
            'driver' => 'daily',
            'path' => storage_path('logs/post_history.log'),
            'level' => 'debug',
            'days' => 0,
            'permission' => 777,
        ],
        'product_history' => [
            'driver' => 'single',
            'path' => storage_path('logs/product_history.log'),
            'level' => 'debug',
            'replace_placeholders' => true,
        ],
]
/*
    Sử dụng:
    Ghi vào 1 channel cụ thể
    Log::channel('post_history')->info('Access product index page');

    Nếu import không được thì dùng NHỚ dòng: use Illuminate\Support\Facades\Log;
    Log vào chanel stack đã được đăng kí mặc định
*/
Log::info('Access product index page ' . rand(1, 100));
```

https://viblo.asia/p/exceptions-trong-laravel-lam-the-nao-de-catch-handle-va-tu-tao-mot-exception-de-xu-ly-van-de-cua-rieng-minh-bJzKmGnOl9N

https://james.codegym.vn/mod/page/view.php?id=13274
https://james.codegym.vn/mod/page/view.php?id=13273

#### AAuthentication

composer require laravel/breeze --dev

### Polocy

Trong Laravel, Policies được sử dụng để quy định các quyền truy cập và xác định liệu một người dùng có quyền thực hiện một hành động nào đó trên một tài nguyên cụ thể hay không. Dưới đây là cách bạn có thể tạo một Policy trong Laravel:

Bước 1: Tạo một Policy mới bằng lệnh Artisan:

Copy code
php artisan make:policy MusicPolicy
Trong ví dụ này, chúng tôi đã tạo một Policy có tên MusicPolicy. Bạn có thể thay thế "MusicPolicy" bằng tên của Policy tương ứng với tài nguyên bạn đang làm việc.

Bước 2: Mở file Policy vừa được tạo (nằm trong thư mục app/Policies) và định nghĩa logic cho các phương thức kiểm tra (check methods) trong đó. Các phương thức kiểm tra này sẽ xác định quyền truy cập của người dùng đối với tài nguyên cụ thể. Ví dụ:

php
Copy code
namespace App\Policies;

use App\Models\User;
use App\Models\Music;

class MusicPolicy
{
public function view(User $user, Music $music)
{
// Xác định xem người dùng có quyền xem một bản ghi Music cụ thể hay không.
return true; // Hoặc bất kỳ logic xác định quyền truy cập nào dựa trên $user và $music.
}

    public function update(User $user, Music $music)
    {
        // Xác định xem người dùng có quyền cập nhật một bản ghi Music cụ thể hay không.
        return $user->id === $music->user_id;
    }

    // Định nghĩa các phương thức kiểm tra khác tùy theo yêu cầu của bạn.

}
Bước 3: Đăng ký Policy trong file AuthServiceProvider.php (nằm trong thư mục app/Providers) trong phương thức $policies. Ví dụ:

php
Copy code
use App\Models\Music;
use App\Policies\MusicPolicy;

protected $policies = [
Music::class => MusicPolicy::class,
];
Bước 4: Sử dụng các phương thức kiểm tra (check methods) trong mã của bạn để kiểm tra quyền truy cập của người dùng đối với tài nguyên cụ thể. Ví dụ:

php
Copy code
if (auth()->user()->can('update', $music)) {
// Người dùng có quyền cập nhật bản ghi Music này.
} else {
// Người dùng không có quyền cập nhật bản ghi Music này.
}
Như vậy, bạn đã tạo và sử dụng một Policy trong Laravel để kiểm tra quyền truy cập của người dùng đối với tài nguyên cụ thể.

### CCau trúc thư mục resources dự án laravel

Trong một dự án Laravel, các thư mục storage/app, public, và resources có mục đích và vai trò khác nhau:

storage/app: Đây là nơi để bạn lưu trữ các tài liệu dưới dạng dữ liệu người dùng (user-generated data) hoặc tạo ra các tập tin mà ứng dụng của bạn tạo ra trong quá trình hoạt động. Thường thì, các tập tin trong thư mục này không thể truy cập trực tiếp từ mạng, và chúng được sử dụng để lưu trữ dữ liệu như hình ảnh người dùng tải lên, tệp tạm thời, v.v. Điều này đảm bảo tính riêng tư và an toàn cho dữ liệu người dùng.

public: Thư mục này chứa các tài liệu và tệp tin được truy cập trực tiếp từ mạng. Điều này bao gồm các tài liệu tĩnh như HTML, CSS, JavaScript, hình ảnh, video, v.v. Bất cứ tệp tin nào bạn muốn trình duyệt web có thể truy cập trực tiếp cần phải được đặt trong thư mục public. Điều này cho phép bạn thực hiện các yêu cầu HTTP trực tiếp đến các tài liệu này.

resources: Thư mục này chứa tất cả các tài liệu và mã nguồn gốc của ứng dụng Laravel của bạn. Điều này bao gồm mã nguồn PHP, các tệp tin ngôn ngữ, tệp tin Sass hoặc LESS, và các tệp tin nguồn khác. Các tài liệu trong thư mục này không thể truy cập trực tiếp từ mạng, và chúng cần được biên dịch hoặc xử lý trước khi được gửi đến trình duyệt web.

Về phần CSS, thường bạn sẽ viết mã nguồn CSS trong thư mục resources/css, sau đó biên dịch nó thành tệp tin CSS tĩnh và lưu vào thư mục public/css để trình duyệt có thể truy cập trực tiếp.

### bblade

```blade

// định nghĩa phần layout
    <html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
        This is the master sidebar.
        @show                  // vừa định nghĩa section VÀ cho SHOW ra liền luôn
        <div class="container">
            @yield('content')
        </div>
    </body>
    </html>


// định nghĩa trang kế thừa
    <!-- Stored in resources/views/child.blade.php -->
    @extends('layouts.layout')
    @section('title')
        Page Title Name
    @endsection
    // Nếu bên trong chỉ là 1 chuỗi thì có thể thay bằng dòng dưới
    @section('title', 'Page Title Name')

    @section('sidebar')
    @parent  // chèn nội dung của thằng cha vô, nếu có @parent thì sẽ đè lên

    <p>This is appended to the master sidebar.</p>
    @endsection

    @section('content')
    <p>This is my body content.</p>
    @endsection

```

### AAuthentication

@if(auth()->user()) // kiểm tra user đã đăng nhập

#### AAuthor

Lỗi thì clear cached spatie

https://spatie.be/docs/laravel-permission/v5/basic-usage/new-app

@hasanyrole('writer|admin')
<a class="nav-link" href="#">Products</a>
@endhasanyrole
@hasrole('admin')
<a class="nav-link" href="#">Musics</a>
@endhasrole

@foreach(auth()->user()->roles as $role)
<span>{{ $role->name }}</span>
@endforeach

### aauthor_customer_api_v1

composer create-project laravel/laravel author-api-customer-v1
php artisan serve
php artisan make:controller CustomerControllerAPI

php artisan make:factory CustomerFactory
php artisan db:seed --class=UserPermissionSeeder
php artisan make:seeder UserPermissionSeeder
php artisan migrate

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
composer require spatie/laravel-permission

### AAuthor by permisstion

Câu lênh này thực hiện 2 việc
php artisan vendor:publish --provider=”Laravel\Sanctum\SanctumServiceProvider”

1. author-api-customer-v1\vendor\laravel\sanctum\database\migrations] to [D:\CODEGYM\LOP TOI\PHP-0623\PHP\QUANG\laravel\longnv\author-api-customer-v1\database\migrations] DONE

2. File [D:\CODEGYM\LOP TOI\PHP-0623\PHP\QUANG\laravel\longnv\author-api-customer-v1\config\sanctum.php] already exists SKIPPED

LỖI NÀY
Symfony\Component\Routing\Exception\RouteNotFoundException: Route [login] not defined
Thì thêm ở header khi gửi request postman
"Accept"=>"application/json"
