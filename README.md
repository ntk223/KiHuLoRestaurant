Bài tập lớn môn Cơ sở dữ liệu
Tên project : KiHuLo Restaurant - web quản lý nhà hàng bán đồ ăn trực tuyến
Sử dụng: PHP, Js, HTML, CSS, SQL
Mô hình lập trình ứng dụng: MVC
Thành viên nhóm:
    + Nguyễn Trung Kiên - 23021590
    + Đặng Tuấn Long - 23021614
    + Nguyễn Nhất Huy - 23021578

Đóng góp của từng thành viên:
1. Nguyễn Trung Kiên:
- Chuẩn bị ban đầu: thiết kế database, xây dựng cấu trúc cho bài tập lớn theo mô hình MVC
- Vị trí chính trong dự án: Back-end
- Trang Amin:
    + Xây dựng 4 chức năng CRUD (Create - Read - Update - Delete) cho các phần trong dự án 
    bao gồm: người dùng, thực đơn, yêu cầu, giao hàng, thanh toán, bình luận
    + Xây dựng giao diện phần thống kê:
        + Đưa ra doanh thu và đánh giá của nhà hàng trong phần dashboard
        + Đưa ra các món ăn và danh sách bình luận
- Trang Customer:
    + Xử lý các logic login, sign up, logout
    + Xử lý logic chỉnh sửa giỏ hàng
    + Xây dựng tính năng update thông tin, đổi mật khẩu cho người dùng

2. Đặng Tuấn Long
A.Front-end:
+ Thiết kế giao diện và hiệu ứng cho login (Cả user và admin), signup.
+ Thiết kế giao diện và hiệu ứng cho header footer, sidebar cho giao diện người dùng.
+ Thiết kế giao diện và hiệu ứng cho phần menu, cart cho người dùng.
+ Thiết kế giao diện, hiệu ứng cho phần profile, thay đổi password của người dùng.
B.Back-end:
#Tạo các bảng thống kê cho admin bao gồm(Tự chuẩn bị các query và code để hiển thị):
-Thống kê người dùng: 
    + Top khách hàng đã trả nhiều tiền nhất kèm lượt mua.
    + Tỷ lệ đơn hàng bị hủy, boom theo khách hàng.
-Thống kê món ăn
    + Thống kê số lượng và tỉ lệ các loại món ăn trong thực đơn.
-Thống kê đơn hàng:
    + Thống kê trạng thái các đơn hàng kèm tỉ lệ.
    + Thống kê món ăn ưa thích của khách hàng dựa trên số lần gọi của khách.
-Thống kê giao hàng:
    + Đưa ra tổng phí ship và lợi nhuận từ việc ship của nhà hàng.
    + Thống kê thời gian giao hàng trung bình, tỉ lệ giao hàng thành công của từng shipper.
    + Thống kê trạng thái giao hàng.
    + Thống kê địa chỉ giao hàng phổ biến.
-Thống kê thanh toán:
    + Thống kê phương thức thanh toán chiếm tỉ lệ phần trăm bao nhiêu.
    + Thống kê doanh thu theo tháng.
    + Thống kê thời gian bán chạy trong ngày.
    + Thống kê tổng doanh thu nhà hàng từ đầu đến giờ.
-Thống kê đánh giá:
    + Thống kê món ăn được nhiều review nhất.
    + Thống kê người dùng review món ăn nhiều nhất.
#Các phần thông tin thêm cho admin gồm (Tự chuẩn bị các query và code để hiển thị):
-Lịch sử giao dịch của tất cả người dùng.
-Thống kê tổng doanh thu theo thời gian được chọn.
-Thêm phần logic để giúp admin có thể tại được file excel về máy chứa các dữ liệu trong các 
phần thống kê.
#Thêm phần logic giúp hiển thị thông báo và ngăn người dùng nhập sai ở thay đổi password
C.Database:
Tham gia vào xây dựng database và tạo dữ liệu cho database.

3. Nguyễn Nhất Huy
A.Front-end
+Thiết kế giao diện và hiệu ứng cho phần header, sidebar cho giao diện admin
+Thiết kế giao diện và hiệu ứng cho phần add menu cho admin
+Thiết kế giao diện và hiệu ứng cho phần editMenu
+Thiết kế giao diện và hiệu ứng cho phần edituser 
+Thiết kế giao diện và hiệu ứng cho phần manage menu
B.Back-end
+Chuẩn bị data cho Database 
- Chuẩn bị query cho phía back-end(đã bao gồm code):
    Query lấy ra những shipper giao nhiều đơn nhất hiện tại
    Query lấy ra danh sách khách hàng chưa đặt hàng bao giờ
    Query lấy ra danh sách đơn hàng đã giao thành công nhưng chưa thanh toán
