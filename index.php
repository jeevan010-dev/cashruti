<?php

$con = mysqli_connect("sql206.infinityfree.com", "if0_36667827", "TgueDU0wCmHM", "if0_36667827_ca");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shruti || To Do List </title>
</head>

<body>
    <h1 align="center">TO DO List</h1>
    <div class="syllabus">
        <form action="form.php" method="POST" class="group1">
    <?php
    $sql = "SELECT * FROM ca_grp";
    $grp = mysqli_query($con, $sql);
    while ($group = mysqli_fetch_assoc($grp)) {
        $groupid = $group['grp_id'];
        echo '<h2>' . $group['grp_name'] . '</h2>';
        echo '<input type="hidden" name="gname" value="' . $group['grp_name'] . '">';

        $sql_sub = "SELECT * FROM ca_subject WHERE grp_id = $groupid";
        $sub = mysqli_query($con, $sql_sub);
        while ($subj = mysqli_fetch_assoc($sub)) {
            $subid = $subj['ca_sub_id'];
            echo '<h3>' . $subj['ca_sub_name'] . '</h3>';
            echo '<input type="hidden" name="sname" value="' . $subj['ca_sub_name'] . '">';

            $sql_chap = "SELECT * FROM ca_chap WHERE grp_id = $groupid AND ca_sub_id = $subid";
            $chap = mysqli_query($con, $sql_chap);
            while ($chapt = mysqli_fetch_assoc($chap)) {
                $chapid = $chapt['chap_id'];
                echo '<h4> Chapter No.: ' . $chapt['chap_no'] . ' . ' . $chapt['chap_name'] . '</h4>';
                echo '<input type="checkbox" name="check" value="' . $chapid . '"> Chapter Completed';
                 echo '<input type="hidden" name="cname" value="' . $chapid . '"> Chapter Completed';
                echo '<input type="datetime-local" name="updt">';
                echo '<hr>';
            }
        }
    }
    ?>
    <button type="submit" name="submit">Submit</button>
</form>
    </div>
    <script>
        function submitfrm() {
            var check = document.getElementById("chap");
            var tmdt = document.getElementById("chapdt");
            console.log(check.checked);
            console.log(tmdt.value);
        }
    </script>


</body>

</html>