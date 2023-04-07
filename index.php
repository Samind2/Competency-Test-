<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="./css../style.css">
    <title>012Supanee</title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                <h3>ข้อมูลคนไข้ <a href="addQueue.php" class="btn btn-info float-end">+เพิ่มข้อมูล</a> </h3> <br/>
                <!-- <table class="table table-striped  table-hover table-responsive table-bordered"> -->
                <table id="customerTable" class="display table table-striped  table-hover table-responsive table-bordered ">

                    <thead align="center">

                        <tr>
                                <th width="10%">วันที่เข้ารกษา</th>
                                <th width="20%">รหัสคิว</th>
                                <th width="20%">ชื่อ-นาสกุล</th>
                                <th width="20%">รหัสบัตรประชาชน</th>
                                <th width="20%">เพศ</th>
                                <th width="20%">ภาพผู้ป่วย</th>
                                <th width="10%">สถานะการรักษา</th>
                                <th width="5%">แก้ไข</th>
                                <th width="5%">ลบ</th>
                            </tr>

                    </thead>
                    <tbody>
                        <?php
                        require 'connect.php';
                        $sql =
                            'SELECT * FROM tbl_patient, tbl_queue WHERE tbl_patient.pid = tbl_queue.pid';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r['qdate'] ?></td>
                                <td><?= $r['qnumber'] ?></td>
                                <td><?= $r['pname'] ?></td>
                                <td><?= $r['pid'] ?></td>
                                <td><?= $r['pgender'] ?></td>
                                
                                <td><img src="./img/<?= $r['pimage']; ?>" width="50px" height="50" alt="image" onclick="enlargeImg()" id="img1" ></td>
                                <td><?= $r['qstatus'] ?></td>
                                <td><a href="updateQueueForm.php?qdate=<?= $r['qdate'] ?>&qnumber=<?= $r['qnumber'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="deleteQueue.php?qdate=<?= $r['qdate'] ?>&qnumber=<?= $r['qnumber'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>
    

</body>

</html>