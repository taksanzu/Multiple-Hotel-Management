<!-- Modal -->
<div class="modal fade" id="roomsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="newsForm" enctype="multipart/form-data" action="{{route('rooms.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Loại phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearRoom()"></button>
                </div>
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <label for="name">Tên phòng:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>
                <div class="modal-body">
                    <label for="description">Mô tả:</label>
                    <input type="text" class="form-control" name="description" id="description"/>
                </div>
                <div class="modal-body">
                    <label for="stars">Số sao:</label>
                    <input type="number" step="1" max="5" min="0" id="stars" class="form-control" name="stars">
                </div>
                <div class="modal-body">
                    <label for="number_of_rooms">Số phòng:</label>
                    <input type="number" step="1" min="0" class="form-control" name="number_of_rooms" id="number_of_rooms"/>
                </div>
                <div class="modal-body">
                    <label for="image" id="fileLabel">Ảnh:</label>
                    <input type="file"  multiple class="form-control" name="image[]" id="image" accept="image/*"/>
                </div>
                <div class="modal-body">
                    <div id="output" class="d-flex flex-row flex-wrap"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearRoom()">Close</button>
                    <button type="submit" class="btn btn-primary" id="">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

