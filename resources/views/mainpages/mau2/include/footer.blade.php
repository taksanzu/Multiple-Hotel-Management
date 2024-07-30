<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-12 info"><p>
                    <a href="{{ optional($user->settings->where('name', 'googlemap')->first())->value }}"
                       target="_blank">
              <span class="home">
                <i class="fas fa-home"></i>
              </span> {{ optional($user->settings->where('name', 'address')->first())->value }}</a>
                </p>
                <p>
                    <a href="tel:{{ optional($user->settings->where('name', 'phone')->first())->value }}">
              <span class="phone">
                <i class="fas fa-phone"></i>
              </span>{{ optional($user->settings->where('name', 'phone')->first())->value }}</a>
                </p>
                <p>
                    <a href="{{ optional($user->settings->where('name', 'email')->first())->value }}">
              <span class="envelope">
                <i class="fas fa-envelope"></i>
              </span>{{ optional($user->settings->where('name', 'email')->first())->value }}</a>
                </p>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12 menu-footer">
                <h4>Thông tin</h4>
                <ul>
                    <li class="">
                        <a href="{{route('loaiphong.index')}}" target="_self">
                            Phòng nghỉ
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('tienich.index')}}" target="_self">
                            Dịch vụ
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('hinhanh.index')}}" target="_self">
                            Hình ảnh
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('tintuc.index')}}" target="_self">
                            Tin tức & khuyến mãi
                        </a>
                    </li>
                </ul>

            </div>

            <div class="col-md-4 col-xs-12 social-icon">
                <h3 class="text-center">Mạng xã hội</h3>
                <div class="text-center">
            <span class="social-facebook">
              <a href="{{ optional($user->settings->where('name', 'facebook')->first())->value }}"
                 rel="Majestic Premium">
                <i class="fab fa-facebook-f"></i>
              </a>
            </span>
                    <span class="social-twitter">
              <a href="{{ optional($user->settings->where('name', 'twitter')->first())->value }}"
                 rel="Majestic Premium">
                <i class="fab fa-twitter"></i>
              </a>
            </span>
                    <span class="social-instagram">
              <a href="{{ optional($user->settings->where('name', 'instagram')->first())->value }}"
                 rel="Majestic Premium">
                <i class="fab fa-instagram"></i>
              </a>
            </span>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 copy-right">
                <p>Copyright ©  <a class="text-dark" href="{{ route('welcome') }}">{{ optional($user->settings->where('name', 'name')->first())->value }}</a></p>
            </div>
        </div>
    </div>
</footer>
