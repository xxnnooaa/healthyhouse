<!-- Detail Model -->
<div class="modal fade" id="detail<?php echo $row['id']; ?>" tabindex="-1" role="dialog " aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Food Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
            <?php
                    $edit = $connection->query("SELECT * FROM food WHERE id=" . $row['id']);
                    $erow = $edit->fetch_assoc();
              
                    ?>
                <form action="" method="">
               
                    <div class="row">
                        <div class="col-lg-12" align="center">
                            <?php echo '<img src="food-images/' . $erow['image'] . '" width="200px;" height="180px;" alt="Image">' ?>
                        </div>
                    </div></br>
                        
                    <div class="mb-3 row">
                    
                        <label for="foodname" class="col-sm-3 col-form-label">ประเภทอาหาร</label>
                        <div class="col-sm-9">
                        <?php
                                  if($erow['food_type_id'] == 1){
                                  echo '<input type="text" class="form-control" value="สมูทตี้และของว่าง" disabled > '; 
                                }
                                elseif($erow['food_type_id'] == 2){
                                   echo '<input type="text" class="form-control" value=" สลัดและผลไม้ " disabled > '; 
                                }
                                elseif($erow['food_type_id'] == 3){
                                    echo '<input type="text" class="form-control" value="ย่างและทอด" disabled > '; 
                                }
                                elseif($erow['food_type_id'] == 4){
                                    echo '<input type="text" class="form-control" value="สเต็กและซุป" disabled > '; 
                                }
                                elseif($erow['food_type_id'] == 5){
                                    echo '<input type="text" class="form-control" value="ผัดและต้ม" disabled > '; 
                                }

                    ?>  
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foodname" class="col-sm-3 col-form-label">ชื่ออาหาร</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text"  value="<?php echo $erow['foodname']; ?>"  disabled>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ingredients" class="col-sm-3 col-form-label">วัตถุดิบ</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" disabled><?php echo $erow['ingredients']; ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ingredients" class="col-sm-3 col-form-label">วิธีทำ</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" disabled><?php echo $erow['cook']; ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foodname" class="col-sm-3 col-form-label">จำนวนแคลอรี่</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="Disabled input" value="<?php echo $erow['calorie'] . ' แคลอรี่';?>"  disabled>
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

