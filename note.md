# DỰ ÁN WEBSITE HỌC TRỰC TUYẾN

    ## Dành cho người dùng
        - Hiển thị danh sách khóa học
        - Hiển thị thông tin chi tiết khóa học
        - Xem video bài giảng
        - Download tài liệu bài giảng
        - Học thử bài giảng
        - Đăng ký / đăng nhập
        - Trang tài khoản: Thông tin cá nhân , khóa học của tôi ...
        - Mua khóa học
        - Giỏ hàng
        - Hiển thị danh sách tin tức
        - Hiển thị chi tiết tin tức

    ## Dành cho quản trị
        - Quản lý danh mục
        - Quản lý học viên
        - Quản lý khóa học
        - Quản lý giảng viên
        - Quản lý bài giảng
        - Quản lý danh mục tin tức
        - Quản lý tin tức
        - Quản lý người dùng (Quản lý hệ thống)
        - Kích hoạt khóa học cho học viên
        - Phân quyền quản trị hệ thống
        - Báo cáo thống kê,....
        - Quản lý file tài liệu
        - Quản lý video

    ## API
        - Xây dựng API hoàn chỉnh

    ## Phân tích database

        1. Table categories => Quản lý danh mục
            - id =>int
            - name => varchar(200)
            - slug => varchar(200)
            - parent_id =>int
            - created_at => timestamp
            - updated_at => timestamp
        2. Table courses => Quản lý khóa học
            - id => int
            - name =>varchar(255)
            - slug => varchar(255)
            - detail => text
            - teacher_id => int
            - thumbnail => varchar(255)
            - price => float
            - sale_price => float
            - code => varchar(100)
            - durations => float
            - is_document => tinyint
            - supports => text
            - status => tinyint
            - created_at => timestamp
            - updated_at => timestamp
        3. Table lessions => Quản lý bài giảng
            - id => int
            - name => varchar(255)
            - slug => varchar(255)
            - video_id => int
            - document_id => int
            - parent_id =>
            - is_trial => tinyint
            - views => int
            - position => int
            - duration => float
            - created_at => timestamp
            - updated_at => timestamp
        4. Table categories_courses => Trung gian liên kết giữa danh mục và khóa học
            - id => int
            - category_id => int
            - courses_id => int
            - created_at => timestamp
            - updated_at => timestamp
        5. Table teacher => Giảng viên
            - id => int
            - name => varchar(100)
            - slug => varchar(100)
            - description => text
            - exp => float
            - images => varchar(255)
            - created_at => timestamp
            - updated_at => timestamp
        6. Table videos =>  Quản lý video bài giảng
            - id => int
            - name => varchar(255)
            - url => varchar(255)
            - created_at => timestamp
            - updated_at => timestamp
        7. Table documents => Quản lý  tài liệu bải giảng
            - id => int
            - name => varchar(255)
            - url => varchar(255)
            - size => float
            - created_at => timestamp
            - updated_at => timestamp
        8. Table categories_posts => Quản lý danh mục tin tức

        -   id => int
        -   name => varchar(200)
        -   slug => varchar(200)
        -   parent_id => int
        -   created_at => timestamp
        -   updated_at => timestamp

        9. Table posts => Quản lý tin tức

        -   id => int
        -   title => varchar(255)
        -   slug => varchar(255)
        -   content => text
        -   exceprt => text
        -   thumbnail => varchar(255)
        -   category_id => int
        -   created_at => timestamp
        -   updated_at => timestamp

        10. Table students => Quản lý học viên

        -   id => int
        -   name => varchar(100)
        -   email => varchar(100)
        -   phone => varchar(20)
        -   password => varchar(100)
        -   address => varchar(200)
        -   status => tinyint(1)
        -   created_at => timestamp
        -   updated_at => timestamp

        11. Table students_courses => Trung gian học viên và khóa học

        -   id => int
        -   course_id => int
        -   student_id => int
        -   created_at => timestamp
        -   updated_at => timestamp

        12. Table orders => Quản lý đơn đăng ký của học viên

        -   id => int
        -   student_id => int
        -   total => float
        -   status => tinyint(1)
        -   created_at => timestamp
        -   updated_at => timestamp

        13. Table orders_detail => Chi tiết đơn hàng

        -   id => int
        -   order_id => int
        -   course_id => int
        -   price => float
        -   created_at => timestamp
        -   updated_at => timestamp

        14. Table orders_status => Quản lý trạng thái đơn hàng

        -   id => int
        -   name => varchar(200)
        -   created_at => timestamp
        -   updated_at => timestamp

        15. Table users => Quản trị hệ thống

        -   id => int
        -   name => varchar(100)
        -   email => varchar(100)
        -   password => varchar(100)
        -   group_id => int
        -   created_at => timestamp
        -   updated_at => timestamp

        16. Table groups => Quản trị nhóm người dùng

        -   id => int
        -   name => varchar(100)
        -   permissions => text
        -   created_at => timestamp
        -   updated_at => timestamp

        17. Table modules => Danh sách các module trong trang quản trị

        -   id => int
        -   name => varchar(100)
        -   title => varchar(200)
        -   role => text

        18. Table options => Quản lý các thiết lập

        -   id => int
        -   name => varchar(100)
        -   value => text

## Cài đặt Project và kết nối với Github

### Cài đặt Laravel

composer create-project laravel/laravel .

### Kết nối với Github

-   Đăng ký tài khoản Github (Nếu có rồi hãy đăng nhập)

-   Tạo Repository

-   Kết nối với folder project trên máy tính

-   Push code lên Github

### Quy trình updat code lên github

-   git add .
-   git commit -m "Noi dung update"
-   git push

## Cài đặt Laravel Module

## Cài đặt Repository cho Laravel Module

## Viết Artisan Console cho Laravel Module

    'php artisan make:module ten_module'

## Tích hợp Layout Admin

## Xây dựng Module quản lý Users

## Tạo Migrations - Seeder - Chuẩn bị giao diện

    'php artisan make:seeder UserSeeder'

    'php artisan db:seed --class=Modules\User\seeders\UserSeeder'

## Tạo Repository và các phương thức cần thiết

    - Hiển thị danh sách User ( có phân trang )
    - Thêm User
    - Sửa User
    - Xóa User
    - Lấy thông tin 1 User

## Viết chức năng thêm User

    - Sử dụng package Laravel DataTables hiển thị danh sách user
        1. Install package Laravel DataTables
            + composer require yajra/laravel-datatables-oracle:"^10.0"
            + Laravel 9:
                composer require yajra/laravel-datatables:^9.0
            + Laravel 10:
                composer require yajra/laravel-datatables:^10.0
        2. Configuration:
            config/app.php
                'providers' => [
                    // ...
                    Yajra\DataTables\DataTablesServiceProvider::class,
                ],
        3. php artisan vendor:publish --tag=datatables
    - Sử dụng package Debug Bar Laravel để kiểm tra câu lệnh SQL
        1. Install package  https://github.com/barryvdh/laravel-debugbar
            + composer require barryvdh/laravel-debugbar --dev
        2. Configuration:
            + If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php
                Barryvdh\Debugbar\ServiceProvider::class,
        3. php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"

## Viết chức năng xóa User

## Viết chức năng quản lý danh mục

    - Migration
        php artisan make:migration create_categories_table --path=/modules/Categories/migrations

        php artisan migrate
    - Tạo model category
        php artisan make:model Category ( Phàn tạo đúng vị trí chưa được)
    - Hàm tạo slug javascript

        ```javascript
        function getSlug(title) {
            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
            slug = slug.replace(/đ/gi, "d");
            //Xóa các ký tự đặt biệt
            slug = slug.replace(
                /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
                ""
            );
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, "-");
            slug = slug.replace(/\-\-\-\-/gi, "-");
            slug = slug.replace(/\-\-\-/gi, "-");
            slug = slug.replace(/\-\-/gi, "-");
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = "@" + slug + "@";
            slug = slug.replace(/\@\-|\-\@|\@/gi, "");
            return slug;
        }
        ```
    - Tạo menu đa cấp
        [
            'id'=>1,
            'name'=>'A'
        ],

        [
            'id'=>1,
            'name'=>'A'
            'sub' =>[
                'id'=> 3,
                'name'=>'C'
            ]
        ],
## Viết chức năng quản lý Courses Khóa Học 
    - Migration
        php artisan make:migration create_courses_table --path=/modules/Courses/migrations

        php artisan migrate
    - Tạo model category
        php artisan make:model Category ( Phàn tạo đúng vị trí chưa được)
    -Tích hợp ckeditor và laravel filemanager 
        + Tích hợp CKeditor 

        + Tích hợp Laravel File Manager
            1. Command Install 
                composer require unisharp/laravel-filemanager
                php artisan vendor:publish --tag=lfm_config
                php artisan vendor:publish --tag=lfm_public
                php artisan storage:link
            2. Edit APP_URL in .env
                

