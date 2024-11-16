@extends('layout.layout')
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Tiện ích</h6>
    </div>
    <div class="container-fluid shadow px-3 py-3 bg-body rounded" style="background: white">
       @foreach($service_categories as $service_category)
          <div class="mb-4">
              <h5>{{ $service_category->name }}</h5>
              <div class="d-flex flex-wrap gap-5">
                  @foreach($service_category->services as $service)
                      <div class="d-flex gap-2 align-items-center">
                          <input onchange="changeStatus({{ $service->id }})" type="checkbox" name="status" @if(optional($service->service_user->where('user_id', \Illuminate\Support\Facades\Auth::id())->first())->status == 1) checked @endif>
                          <img src="{{ asset('service').'/'.$service->image }}" alt="" style="width: 20px" height="20px">
                          <p class="mb-0">{{ $service->name }}</p>
                      </div>
                  @endforeach
              </div>
          </div>
       @endforeach
    </div>
@endsection
@section('script')
    <script src="script/service.js"></script>
@endsection
