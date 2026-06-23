<?php

if(isset($_SESSION['auth'])) {

    if(isset($_SESSION['loggedInUserRole'])) {

        $role = validate($_SESSION['loggedInUserRole']);
        $email = validate($_SESSION['loggedInUser']['email']);

        $query = "SELECT * FROM users WHERE email='$email' AND role='$role' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {

            if (mysqli_num_rows($result) == 0) {

                logoutSession();
                header("Location: ../index.php");
            } else {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                if ($row['role'] != 'Administrator' && $row['role'] != 'Approver' && $row['role'] != 'Approver (Head)' && $row['role'] != 'Point Person' && $row['role'] != 'Security Analyst') {
                    logoutSession();
                    header("Location: ../index.php");
                }
                
                if ($row['is_ban'] == 1) {
                    logoutSession();
                    header("Location: ../index.php");
                }
            }

        } else {
            logoutSession();
            header("Location: ../index.php");
        }

    }
} else {
    logoutSession();
    header("Location: ../index.php");
}

?>