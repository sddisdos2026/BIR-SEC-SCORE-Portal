<?php
    require '../config/function.php';

    // Ensure session is started so we can destroy it
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['auth'])) {
        // 1. Call your custom function
        logoutSession();

        // 2. Clear all session variables
        $_SESSION = array();

        // 3. Destroy the session cookie in the browser
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // 4. Finally, destroy the session on the server
        session_destroy();
        
        // Redirect to login/home
        header("Location: ../");
        exit();
    } else {
        // If they weren't logged in anyway, just send them back
        header("Location: ../");
        exit();
    }
?>
