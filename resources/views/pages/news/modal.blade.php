<!-- Modal -->
<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="newsForm" enctype="multipart/form-data" action="{{route('news.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tin tức</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearNews()"></button>
                </div>
                <input type="hidden" name="id" id="id">
                <input name="type" type="hidden" value="{{$type}}">
                <div class="modal-body">
                    <label for="title">Tiêu đề<label class="text-danger">(*)</label> :</label>
                    <input type="text" class="form-control" name="title" id="title"/>
                </div>
                <div class="modal-body">
                    <label for="description">Mô tả:<label class="text-danger">(*)</label> :</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="modal-body">
                    <label for="videolink">Link Video:</label>
                    <input type="text" class="form-control" name="videolink" id="videolink"/>
                </div>
                <div class="modal-body">
                    <label for="link360">Link 360:</label>
                    <input type="text" class="form-control" name="link360" id="link360"/>
                </div>
                <div class="modal-body">
                    <label for="imageNews" id="fileLabel">Ảnh<label class="text-danger">(*)</label> :</label>
                    <input type="file" class="form-control" name="imageNews" id="imageNews" accept="image/*"/>
                </div>
                <div class="modal-body">
                    <div id="output" class="d-flex flex-row flex-wrap"></div>
                </div>
                <div class="modal-body">
                    <label for="contents">Nội dung<label class="text-danger">(*)</label> :</label>
                    <textarea id="contents" class="form-control" name="contents"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearNews()">Close</button>
                    <button type="submit" class="btn btn-primary" id="newsSave">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


