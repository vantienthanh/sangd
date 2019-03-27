<div class="box-body">
    <label for="">Tên phiên giao dịch</label>
    <input type="text" class="form-control" disabled name="" id="" value="{{$enterprisesession->session->title}}">
    <label for="">Tên doanh nghiệp tham gia</label>
    <input type="text" name="" id="" disabled="" value="{{$enterprisesession->user->username}}" class="form-control">
    <label for="status">Trạng thái</label>
    <select name="status" id="status" class="form-control">
        <option value="0" <?php if($enterprisesession->status ==0) echo "selected" ?>>Chờ duyệt</option>
        <option value="1" <?php if($enterprisesession->status ==1) echo "selected" ?>>Cho phép</option>
        <option value="2" <?php if($enterprisesession->status ==2) echo "selected" ?>>Từ chối</option>
    </select>
</div>
