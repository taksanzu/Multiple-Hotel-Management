<div class="">
    <div class="col-md-12 map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.4020007547283!2d107.10199377471866!3d10.389611289736584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31757170d7720627%3A0x47b9227d76b6999f!2z4buQYyBuw7NuZyBUaOG6o28!5e0!3m2!1svi!2s!4v1705549994702!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<footer class="bg-white text-dark py-5 pb-0">
    <div class="container ">
        <div class="row">
            <div class="col-md-3 mb-5">
                <img src="https://tiffanyhotel.com.vn/upload/logo/logo-footer.png" alt="Logo">
            </div>
            <div class="col-md-3 contact-info mb-5">
                <h4>Thông tin liên hệ</h4>
                <p class="mb-3"><i class="fas fa-map-marker-alt"></i> D3 79-80 Khu đô thị biển Phan Thiết, phường Phú thủy, Tp. Phan Thiết, Bình Thuận</p>
                @if ($user)
                    <p class="mb-3"><i class="fas fa-phone"></i> {{ $user->phone }}</p>
                    <p class="mb-3"><i class="fas fa-envelope"></i> {{ $user->email }}</p>
                @else
                    <p class="mb-3"><i class="fas fa-phone"></i> 02523 824 824 - 02523 822 622</p>
                    <p class="mb-3"><i class="fas fa-envelope"></i> receptionist@tiffanyhotel.com.vn</p>
                @endif
                <p class="">Tiffany hotel đạt chuẩn 3 sao theo QĐ số 53 ngày 28/01/2022</p>
            </div>
            <div class="col-md-3 categories mb-5">
                <h4>Danh mục</h4>
                <ul>
                    <li><a class="link-dark" href="">Tin tức</a></li>
                    <li><a class="link-dark" href="">Tiện ích</a></li>
                    <li><a class="link-dark" href="">Hình ảnh</a></li>
                    <li><a class="link-dark" href="">Loại phòng</a></li>
                </ul>
            </div>
            <div class="col-md-3 social-media mb-5">
                <h4>Mạng xã hội</h4>
                <p class="mb-3">Liên hệ <strong>Tiffany Hotel</strong> qua mạng xã hội</p>
                <ul>
                    <li><a href="#" target="_blank"><i class="fab fa-facebook fa-2xl"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-twitter fa-2xl"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-instagram fa-2xl"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<hr>
<div class="text-center p-2" style="background-color: #ffffff">
    © 2023
    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
</div>
