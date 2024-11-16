<!-- Modal -->
<div class="modal fade" id="userAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="usersForm" enctype="multipart/form-data" action="{{route('userList.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Người dùng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <label for="name">Tên người dùng: </label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>
                <div class="modal-body">
                    <label for="password">Mật khẩu: </label>
                    <input type="password" class="form-control" name="password" id="password"/>
                </div>
                <div class="modal-body">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" name="email" id="email"/>
                </div>
                <div class="modal-body">
                    <label for="phone">Số điện thoại: </label>
                    <input type="text" class="form-control" name="phone" id="phone"/>
                </div>
                <div class="modal-body">
                    <label for="roles">Quyền: </label>
                    <select class="form-select" name="roles" id="roles">
                        <option value="0">Admin</option>
                        <option value="1">Khách hàng</option>
                    </select>
                </div>
                <div class="modal-body">
                    <label for="domain">Domain: </label>
                    <input type="text" class="form-control" name="domain" id="domain"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="userSave">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


