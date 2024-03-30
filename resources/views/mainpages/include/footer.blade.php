<div class="">
    <div class="col-md-12 map-container">
        <iframe src="{{ optional($user->settings->where('name', 'googlemap')->first())->value }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<footer class="bg-white text-dark py-5 pb-0">
    <div class="container ">
        <div class="row">
            <div class="col-md-3 mb-5">
                <a class="" href="{{ route('welcome') }}">
                    @if($user->settings->where('name', 'logo')->first())
                        <img src="{{ asset('logo').'/'.optional($user->settings->where('name', 'logo')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                    @else
                        <img class="mx-auto align-middle" src="{{ asset('upload/placeholder.png') }}" alt="" width="200" height="100">
                    @endif
                </a>
            </div>
            <div class="col-md-3 contact-info mb-5">
                <h4>Thông tin liên hệ</h4>
                <p class="mb-3"><i class="fas fa-map-marker-alt"></i>
                    {{ optional($user->settings->where('name', 'address')->first())->value }}
                </p>
                <p class="mb-3"><i class="fas fa-phone"></i>
                    {{ optional($user->settings->where('name', 'phone')->first())->value }}
                </p>
                <p class="mb-3"><i class="fas fa-envelope"></i>
                    {{ optional($user->settings->where('name', 'email')->first())->value }}
                </p>
            </div>
            <div class="col-md-3 categories mb-5">
                <h4>Danh mục</h4>
                <ul>
                    <li><a class="link-dark" href="{{ route('tintuc.index') }}">Tin tức</a></li>
                    <li><a class="link-dark" href="{{ route('tienich.index') }}">Tiện ích</a></li>
                    <li><a class="link-dark" href="{{ route('hinhanh.index') }}">Hình ảnh</a></li>
                    <li><a class="link-dark" href="{{ route('loaiphong.index') }}">Loại phòng</a></li>
                </ul>
            </div>
            <div class="col-md-3 social-media mb-5">
                <h4>Mạng xã hội</h4>
                <p class="mb-3">Liên hệ <strong>{{ optional($user->settings->where('name', 'name')->first())->value }}</strong> qua mạng xã hội</p>
                <ul>
                    <li><a href="{{ optional($user->settings->where('name', 'facebook')->first())->value }}" target="_blank"><i class="fab fa-facebook fa-2xl"></i></a></li>
                    <li><a href="{{ optional($user->settings->where('name', 'twitter')->first())->value }}" target="_blank"><i class="fab fa-twitter fa-2xl"></i></a></li>
                    <li><a href="{{ optional($user->settings->where('name', 'instagram')->first())->value }}" target="_blank"><i class="fab fa-instagram fa-2xl"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<hr>
<div class="text-center p-2" style="background-color: #ffffff">
    © 2023
    <a class="text-dark" href="{{ route('welcome') }}">{{ optional($user->settings->where('name', 'name')->first())->value }}</a>
</div>
