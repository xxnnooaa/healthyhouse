<div class="modal fade" id="member<?php echo $fetch_info['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>แก้ไขข้อมูลส่วนตัว</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              
                <div class="container-fluid">
                    <form method="POST" action="profile-edit.php?id=<?php echo $fetch_info['id']; ?>" >
                        <div class="row">
                            <div class="col-lg-3" align="left">
                                <label style="position:relative; top:7px;" style="font-size: 16px;">ชื่อ :</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="firstname" class="form-control" style="font-size: 16px;" value="<?php echo $fetch_info['firstname']; ?>">
                            </div>
                        </div>
                       </br>
                       <div class="row">
                            <div class="col-lg-3" align="left">
                                <label style="position:relative; top:7px;" style="font-size: 16px;">นามสกุล :</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="lastname" class="form-control" style="font-size: 16px;" value="<?php echo $fetch_info['lastname']; ?>">
                            </div>
                        </div>
                       </br>
                       <div class="row">
                            <div class="col-lg-3" align="left">
                                <label style="position:relative; top:7px;" style="font-size: 16px;">ชื่อผู้ใช้ :</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control" style="font-size: 16px;" value="<?php echo $fetch_info['name']; ?>">
                            </div>
                        </div>
                       </br>
                        <div class="row">
                            <div class="col-lg-3" align="left">
                                <label style="position:relative; top:7px;" style="font-size: 16px;">อีเมล :</label>
                            </div>
                            
                            <div class="col-lg-9">
                                <input type="text" name="email" class="form-control" style="font-size: 16px;" value="<?php echo $fetch_info['email']; ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 18px;">
                    ยกเลิก</button>
                <button type="submit" class="btn btn-success" name="update-member" style="font-size: 18px;">
                   บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->