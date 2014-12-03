<?php
include_once 'config.php';

function sec_session_start() {
    $session_name = 'sec_session_id';
    $secure = SECURE;
    $httponly = true;
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Failed session (ini_set)");
        exit();
    }
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    session_name($session_name);
    session_start();
    session_regenerate_id(); 
}
function login($email, $password, $mysqli) {
    if ($stmt = $mysqli->prepare("SELECT id, username, password, salt 
        FROM maindb
       WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // Locked?
            if (chkb($user_id, $mysqli) == true) {
                // YEP
                return false;
            } else {
                if ($db_password == $password) {
                    // CORRECT
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
                    // GOOD
                    return true;
                } else {
                    // BAD ATTEMPT
                    $now = time();
                    $mysqli->query("INSERT INTO attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // FAIL
            return false;
        }
    }
}


function chkb($user_id, $mysqli) {
    $now = time();
    $valid_attempts = $now - (2 * 60 * 60);
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}



function login_check($mysqli) {
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM maindb 
                                      WHERE id = ? LIMIT 1")) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check == $login_string) {
                    // Good
                    return true;
                } else {
                    // Bad
                    return false;
                }
            } else {
                // Bad
                return false;
            }
        } else {
            // Bad
            return false;
        }
    } else {
        // Still Bad
        return false;
    }
}



function esc_url($url) {
    if ('' == $url) {
        return $url;
    }
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
    $url = str_replace(';//', '://', $url);
    $url = htmlentities($url);
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
    if ($url[0] !== '/') {
        return '';
    } else {
        return $url;
    }
}

function LoadDB() {
require('db_connect.php');

$sql = "SELECT * FROM maindb";
$result = mysqli_query($mysqli,$sql)or die(mysqli_error());

echo <<< endhtml
<div class="table-responsive">
<table class="table">
endhtml;
echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";

while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
	$password = $row['password'];
	$salt = $row['salt'];
    echo "<tr><td>".$id."</td><td>".$username."</td><td>".$email."</td></tr>";
} 
echo "</table></div>";
mysqli_close($mysqli);
}
?>