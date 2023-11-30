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
