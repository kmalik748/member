<?php
if(isset($_GET["id"])){
    require '../app/db.php';
    $id = $_GET["id"];

    $output = "";
    $sql = "SELECT * FROM users WHERE id=$id";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res)){
        $output .= '
            <table class="table" border="1">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Job Title</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Language</th>
                    <th>Address</th>
                </tr>
        ';
        $row = mysqli_fetch_array($res);
            $output .= '
                <tr>
                    <td>'.$row["first_name"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["jobTitle"].'</td>
                    <td>'.$row["dob"].'</td>
                    <td>'.$row["gender"].'</td>
                    <td>'.$row["phone"].'</td>
                    <td>'.$row["language"].'</td>
                    <td>'.$row["address"].'</td>
                </tr>
        ';
        $output .=" </table>";
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=MemberProfile.xls");
        echo $output;
    }
    else{
        echo '
            <p class="display-3">No Record Found!</p>
        ';
    }
}
