<!DOCTYPE html>
<html>
<head>
    <title>Đặt phòng đã được chấp nhận</title>
</head>
<body>
<h1>Đặt phòng của bạn đã được chấp nhận!</h1>
<p>Kính gửi {{ $booking->name }},</p>
<p>Chúng tôi vui mừng thông báo rằng đơn đặt phòng của bạn ở <b>{{$user}}</b> đã được chấp nhận. Dưới đây là chi tiết về đặt phòng của bạn:</p>
<ul>
    <li><strong>Tên khách hàng:</strong> {{ $booking->name }}</li>
    <li><strong>Số điện thoại:</strong> {{ $booking->phone }}</li>
    <li><strong>Email:</strong> {{ $booking->email }}</li>
    <li><strong>Ngày nhận phòng:</strong> {{ $booking->checkin }}</li>
    <li><strong>Ngày trả phòng:</strong> {{ $booking->checkout }}</li>
    <li><strong>Số lượng người lớn:</strong> {{ $booking->number_of_adults }}</li>
    <li><strong>Số lượng trẻ em:</strong> {{ $booking->number_of_children }}</li>
    <li><strong>Số lượng phòng:</strong> {{ $booking->number_of_rooms }}</li>
    <li><strong>Loại phòng:</strong> {{ optional($booking->room)->name}}</li>
    <li><strong>Ghi chú:</strong> {{ $booking->notes }}</li>
    <li><strong>Giá:</strong> {{ number_format($total) }} VNĐ</li>
</ul>
<p>Cảm ơn bạn đã lựa chọn dịch vụ của chúng tôi.</p>
</body>
</html>
