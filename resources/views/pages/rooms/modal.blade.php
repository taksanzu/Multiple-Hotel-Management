<!-- Modal -->
<div class="modal fade" id="roomsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="roomsForm" enctype="multipart/form-data" action="{{route('rooms.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Loại phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearRoom()"></button>
                </div>
                <input type="hidden" name="id" id="id">
                <div class="form-group py-1 px-3">
                    <label for="name">Tên phòng:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>
                <div class="form-group py-1 px-3">
                    <label for="stars">Số sao:</label>
                    <input type="number" step="1" max="5" min="0" id="stars" class="form-control" name="stars">
                </div>
                <div class="form-group py-1 px-3">
                    <label for="number_of_rooms">Số phòng:</label>
                    <input type="number" step="1" min="0" class="form-control" name="number_of_rooms" id="number_of_rooms"/>
                </div>
                <div class="form-group py-1 px-3">
                    <label for="number_of_rooms">Giá:</label>
                    <input type="number" step="1" min="0" class="form-control" name="price" id="price"/>
                </div>
                <div class="form-group py-1 px-3">
                    <label for="videolink">Link Video:</label>
                    <input type="text" class="form-control" name="videolink" id="videolink"/>
                </div>
                <div class="form-group py-1 px-3">
                    <label for="link360">Link 360:</label>
                    <input type="text" class="form-control" name="link360" id="link360"/>
                </div>
                <div class="form-group py-1 px-3">
                    <label for="image360">Ảnh 360:</label>
                    <input type="file" class="form-control" name="image360" id="image360" accept="image/*"/>
                </div>
                <div class="form-group py-1 px-3">
                    <div id="output360" class="d-flex flex-row flex-wrap"></div>
                </div>
                <div class="form-group py-1 px-3">
                    <label for="image" id="fileLabel">Ảnh:</label>
                    <input type="file"  multiple class="form-control" name="image[]" id="image" accept="image/*"/>
                </div>
                <div class="form-group py-1 px-3">
                    <div id="output" class="d-flex flex-row flex-wrap"></div>
                </div>
                <div class="form-group py-1 px-3">
                    <label for="description">Mô tả<label class="text-danger">(*)</label> :</label>
                    <textarea id="description" class="form-control" name="description"></textarea>
                </div>
                <div class="px-3 pt-1 pb-3">
                    @foreach($service_categories as $service_category)
                        <div class="mb-3">
                            <h6>{{ $service_category->name }}</h6>
                            <div class="d-flex flex-wrap gap-5">
                                @foreach($service_category->services as $service)
                                    <div class="d-flex gap-2 align-items-center">
                                        <input value="{{ $service->id }}" type="checkbox" name="status[]" >
                                        <img src="{{ asset('service').'/'.$service->image }}" alt="" style="width: 20px" height="20px">
                                        <p class="mb-0">{{ $service->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearRoom()">Close</button>
                    <button type="submit" class="btn btn-primary" id="">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

