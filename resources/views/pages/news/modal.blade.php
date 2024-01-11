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
                    <label for="title">Tiêu đề</label>
                    <input type="text" class="form-control" name="title" id="title"/>
                </div>
                <div class="modal-body">
                    <label for="description">Mô tả ngắn</label>
                    <input type="text" class="form-control" name="description" id="description"/>
                </div>
                <div class="modal-body">
                    <label for="contents">Nội dung</label>
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


