<div class="card" style="padding: 10px; background: rgba(0,0,0,0.1); border-radius: 9px;">
    <div class="card card-header bg-info text-light">
        <h5><i class="fas fa-info"></i>&nbsp;ข้อมูลผู้เล่น</h5>
    </div>
    <div class="card" style="padding: 10px; border-radius: 9px;">

        <p style="color: #000;"><strong><i class="fas fa-user"></i> Game ID :</strong> <?php echo $userinfo_login['userid']; ?></p>
        <p style="color: #000;"><strong><i class="fas fa-check-circle"></i> สถานะ ID :</strong>
            <?php
            if ($userinfo_login['state'] == 0) {
                echo ' <i style="color: green;">เล่นได้ปกติ</i>';
            } else {
                echo ' <i style="color: red;">มีปัญหา</i>';
            }
            ?></p>
        <p style="color: #000;"><strong><i class="fas fa-sign-in-alt"></i> จำนวนครั้งเข้าเกม:</strong> <?php echo $userinfo_login['logincount']; ?></p>
        <p style="color: #000;"><strong><i class="fas fa-stopwatch"></i> เข้าเกมส์ล่าสุด :</strong> <?php echo $userinfo_login['lastlogin']; ?></p>
        <p style="color: #000;"><strong><i class="fas fa-street-view"></i> จำนวนตัวละคร :</strong>
            <?php
            $rows_char = $connect->query('SELECT * FROM `char` WHERE account_id = "' . $userinfo_login['account_id'] . '"')->num_rows;
            echo $rows_char;
            ?> ตัว</p>
        <p style="color: #000;"><strong><i class="fas fa-dollar-sign"></i> จำนวนแคช :</strong>
            <?php
            $check_card = $connect->query('SELECT * FROM `acc_reg_num` WHERE account_id = "' . $userinfo_login['account_id'] . '"')->num_rows;
            $crad_num = $connect->query('SELECT * FROM `acc_reg_num` WHERE account_id = "' . $userinfo_login['account_id'] . '"')->fetch_assoc();

            if ($check_card == 0) {
                echo "ไม่มีรายการ";
            } else {
                echo $crad_num['value'] . " แคช";
            }


            ?></p>
        </p>

        <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 1px;">
            <button type="button" class="btn btn-info btn-block" onclick="logout()"><i class="fa fa-unlock-alt"></i> เปลี่ยน Password</button>
        </div>
        <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 1px;">
            <button type="button" class="btn btn-warning btn-block" onclick="logout()"><i class="fas fa-sync"></i> กลับจุด Save</button>
        </div>
        <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 1px;">
            <button type="button" class="btn btn-warning btn-block" onclick="logout()"><i class="fa fa-wrench"></i> แก้บัคตัวละคร</button>
        </div>
        <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 8px;">
            <div id="return"></div>
            <button type="button" class="btn btn-danger btn-block" onclick="logout()"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
        </div>
    </div>
</div>