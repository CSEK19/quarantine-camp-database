<?php
    header('Content-Type: application/json');
    require_once('include/config.php');
    $vid=$_GET['id'];

    $data = array();


    $query = "SELECT Quick_ct_value, COUNT(PCR_ct_value) AS size_quick FROM PATIENT_TEST_RESULTS WHERE Patient_no = '$vid' GROUP BY Quick_ct_value";
    $stmt = $conn->prepare($query);
    if($stmt->execute()){
        if($stmt->rowCount()>0){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    foreach($result as $row){
        $data[] = $row;
    }
    echo json_encode($data);
?>