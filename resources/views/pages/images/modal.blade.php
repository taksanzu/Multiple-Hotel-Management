<!-- Modal -->
<div class="modal fade" id="imagesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="imageForm" enctype="multipart/form-data" action="{{route('images.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="image" id="fileLabel">Ảnh<label class="text-danger">(*)</label> :</label>
                    <input type="file"  multiple class="form-control" name="image[]" id="image" accept="image/*"/>
                </div>
                <div class="modal-body">
                    <div id="output" class="d-flex flex-row flex-wrap"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearImage()">Close</button>
                    <button type="submit" class="btn btn-primary" id="">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

