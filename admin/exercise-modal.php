<!-- Detail Model -->
<div class="modal fade" id="detail<?php echo $row['id']; ?>" tabindex="-1" role="dialog " aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exercise Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
            <?php
                    $edit = $connection->query("SELECT * FROM exercise WHERE id=" . $row['id']);
                    $erow = $edit->fetch_assoc();
              
                    ?>
                <form action="" method="">
               
                    <div class="row">
                        <div class="col-lg-12" align="center">
                            <?php echo '<img src="exercise-images/' . $erow['image'] . '" width="200px;" height="180px;" alt="Image">' ?>
                        </div>
                    </div></br>
                        
                    <div class="mb-3 row">
                    
                        <label for="foodname" class="col-sm-4 col-form-label">ประเภทกิจกรรมออกกำลังกาย</label>
                        <div class="col-sm-8">
                        <?php
                                  if($erow['ex_type_id'] == 1){
                                  echo '<input type="text" class="form-control" value="คาร์ดิโอ" disabled > '; 
                                }
                                elseif($erow['ex_type_id'] == 2){
                                   echo '<input type="text" class="form-control" value="เวทเทรนนิ่ง" disabled > '; 
                                }

                    ?>  
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foodname" class="col-sm-4 col-form-label">ชื่อกิจกรรม</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text"  value="<?php echo $erow['exercisename']; ?>"  disabled>     
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ingredients" class="col-sm-4 col-form-label">รายละเอียด</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" disabled><?php echo $erow['detail']; ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foodname" class="col-sm-4 col-form-label">จำนวนพลังงานที่เผาผลาญ</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" placeholder="Disabled input" value="<?php echo $erow['burn'] . ' แคลอรี่';?>"  disabled>
                        </div>
                    </div>
                  
                   
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

