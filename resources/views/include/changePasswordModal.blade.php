<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="chagePasswordForm" enctype="multipart/form-data" method="POST" action="{{route('changePassword')}}">
                @csrf
                <div class="modal-body">
                    <label for="oldPassword">Mật khẩu cũ: </label>
                    <input type="password" class="form-control" name="oldPassword" id="oldPassword"/>
                </div>
                <div class="modal-body">
                    <label for="newPassword">Mật khẩu mới: </label>
                    <input type="password" class="form-control" name="newPassword" id="newPassword"/>
                </div>
                <div class="modal-body">
                    <label for="renewPassword">Nhập lại mật khẩu mới: </label>
                    <input type="password" class="form-control" name="renewPassword" id="renewPassword"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="changePasswordSave">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


