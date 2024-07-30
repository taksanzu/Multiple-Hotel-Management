@extends('mainpages.mau2.layout.layout')
@section('content')
    <section class="image-singlePage"
             @if($user->settings->where('name', 'image11')->first())
                 style="background: url('{{ asset('images'.'/'.$user->settings->where('name', 'image11')->first()->value) }}')"
             @else
                 style="background-image: url('{{ asset('uploads/1/contact/88.jpg') }}')"
        @endif>
    </section>

    <section class="introduce-hotel">
        <div class="container">
            <h2>Dịch vụ</h2>
        </div>
    </section>
    <section class="singlePage singlePage_slide">
        <div class="main-wrap">
            <div class="wrap-section-content br-black">
                <div class="container">
                    <div class="row multicol-layout2">
                        @foreach($services as $service)
                            <div class="col-md-6 col-sm-6 col-xs-12 col" style="margin-bottom: 20px">
                                <div class="multicol-image">
                                    <img src="/images/news/mainnews/{{$service->images}}"
                                         alt="/images/news/mainnews/{{$service->images}}">
                                </div>
                                <div class="multicol-content multicol-contentDetail">
                                    <div class="multicol-title title-detail restaurant">
                                        <h3>
                                            <a href="{{route('tienich.detail',['id' => $service->id, 'slug'=> $service->slug])}}">{{$service->title}}</a>
                                        </h3>
                                        <p class="no-padding">{{$service->description}}</p>
                                    </div>
                                    <div class="multicol-action multicol-actionDetail">
                                        <div class="reditect">
                                            <a href="{{route('tienich.detail',['id' => $service->id, 'slug'=> $service->slug])}}">
                                                <span>LEARN MORE</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
