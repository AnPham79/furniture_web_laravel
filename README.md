<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

Mô tả chức năng cơ bản
- giao diện dùng master layout + tạo provider lưu sử lí số lượng giỏ hàng vì header sử dụng nhìu chỗ
- tìm kiếm trên nav đưa ra sản phẩm thông qua dữ liệu tìm kiếm
- trang chủ: load ra các sản phẩm, phân trang, xem chỉ tiết
- trang sản phẩm tìm kiếm sản phẩm theo tên  + phân trang + thêm vào giỏ hàng
- giỏ hàng ( tăng giảm xóa sản phẩm)
- xem chi tiết có tăng số lượng sản phẩm rồi add vô giỏ
- bình luận
- thanh toán gửi mail kèm thông tin đơn hàng
- đăng nhập | đăng kí có gửi mail
- lịch sử mua hàng
- theo giỏi đơn hàng + hủy đơn
- CRUD cho admin
- import file EXECL CSV cho admin

- tải từ git về tạo file env mới
- chạy php php artisan key:generate
- xóa ; trước extension=zip
- xóa ; trước extension=gd
- chưa có composer thì composer install
- có rồi thì composer update để cập nhật 2 cái vừa xóa.

- mail hog
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=phamngocbaoan792004@gmail.com
MAIL_PASSWORD=rldfqcifrfswdmrr
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=phamngocbaoan792004@gmail.com
MAIL_FROM_NAME="Phạm An Admin"

- gửi sms bằng nexmo ( lỗi );
- queue send mail;

- notification: sen mail

- Events & Listeners

1. Định nghĩa một event

2. Định nghĩa một listener

3. Mapping giữ listener và event: Khai báo cho listener biết cần lắng nghe sự kiện nào

4. Khởi tạo một event

- 2 cách đăg kí 

- Đăng ký trong EventServiceProvider

- Tự đăng ký event (sử dụng helper hoặc facede Laravel cung cấp)

- observer tạo observer bằng cách php artisan make:observer UserObserver --model=User
- Đăng ký Observer trong phương thức boot của file service provider
use App\Models\User;
use App\Observers\UserObserver;

public function boot()
{
    User::observe(UserObserver::class);
}

