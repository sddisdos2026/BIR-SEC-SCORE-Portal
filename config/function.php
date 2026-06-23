<?php

session_start();

if(isset($_SESSION['auth'])) {
    // 1. Check if session has expired (300 seconds = 5 mins)
    if(isset($_SESSION['last_login_timestamp']) && (time() - $_SESSION['last_login_timestamp']) > 300) {
        session_unset();
        session_destroy();
        header("location:logout.php");
        exit();
    }
    
    // 2. Update timestamp on page load
    $_SESSION['last_login_timestamp'] = time();
}


require 'dbcon.php';

function validate($inputData) {
    global $conn;

    if (is_array($inputData)) {
        // If it's an array, sanitize every string inside it
        return array_map(function($item) use ($conn) {
            return mysqli_real_escape_string($conn, $item);
        }, $inputData);
    }

    // If it's just a string, proceed as usual
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}

function redirect($url, $status) {
    $_SESSION['status'] = $status;
    header('Location: ' . $url);
    exit(0);
}

function alertMessage() {
    if(isset($_SESSION['status'])) {
        echo "<div class='alert alert-success' id='success-alert'>
            <button type='button' class='btn-close text-dark float-end' data-bs-dismiss='alert'>
            <span aria-hidden='true'></span>
            </button>
            <h6>".$_SESSION['status']."</h6>
        </div>";
        unset($_SESSION['status']);
    }
}

function redirectfailed($url1, $status1) {
    $_SESSION['status1'] = $status1;
    header('Location: ' . $url1);
    exit(0);
}

function alertMessagefailed() {
    if(isset($_SESSION['status1'])) {
        echo "<div class='alert alert-danger'>
            <button type='button' class='btn-close text-dark float-end' data-bs-dismiss='alert'>
            <span aria-hidden='true'></span>
            </button>
            <h6>".$_SESSION['status1']."</h6>
            </div>";
        unset($_SESSION['status1']);
    }
}

function getAll($tableName) {
    global $conn;
    $table = validate($tableName);

    $query = "SELECT * 
            FROM $table";  
    $result = mysqli_query($conn, $query);
    return $result;
}

function getPending($tableName) {
    global $conn;
    $table = validate($tableName);

    $query = "SELECT * FROM $table WHERE status='For Approval' LIMIT 5";  
    $result = mysqli_query($conn, $query);
    return $result;
}

function for_approval($tableName) {
    global $conn;
    $table = validate($tableName);

    $query = "SELECT * FROM $table WHERE status='For Approval'";  
    $result = mysqli_query($conn, $query);
    return $result;
}

function for_approval_pp($tableName, $email) {
    global $conn;
    $table = validate($tableName);
    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT * FROM $table WHERE status='For Approval' AND email='$email'";  
    return mysqli_query($conn, $query);
}

function approved($tableName) {
    global $conn;
    $table = validate($tableName);

    $query = "SELECT * FROM $table WHERE status='Approved'";  
    $result = mysqli_query($conn, $query);
    return $result;
}

function approved_pp($tableName, $email) {
    global $conn;
    $table = validate($tableName);
    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT * FROM $table WHERE status='Approved' AND email='$email'";  
    return mysqli_query($conn, $query);
}

function rejected($tableName) {
    global $conn;
    $table = validate($tableName);

    $query = "SELECT * FROM $table WHERE status='Rejected'";  
    $result = mysqli_query($conn, $query);
    return $result;
}

function rejected_pp($tableName, $email) {
    global $conn;
    $table = validate($tableName);
    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT * FROM $table WHERE status='Rejected' AND email='$email'";  
    return mysqli_query($conn, $query);
}


function getAllusers($tableName) {
    global $conn;
    $table = validate($tableName);
    
    $query = "SELECT a.id as userId, a.first_name, a.last_name, a.email, a.role, a.is_ban, a.rdo_code, b.id as rdoId, b.rdo_code, b.description
                FROM $table a LEFT JOIN rdo b
                ON a.rdo_code = b.rdo_code";  
    $result = mysqli_query($conn, $query);
    return $result;
}

function docsRequested($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $email = $row['email'];

    $query = "SELECT * FROM $table WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function transmittal_slip($id) {
    global $conn;

    $request = validate('request');
    $users = validate('users');
    $rdo = validate('rdo');
    $id = validate($id);

    $query = "SELECT *
    FROM transmittal_slip
    WHERE request_id = '$id' LIMIT 1";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $response = [
                'status' => 200,
                'message' => 'Fetched data',
                'data' => $row
            ];
            return $response; 
        } else {
            $response = [
                'status' => 404,
                'message' => 'No Data Record'
            ];
            return $response; 
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response; 
    }
}

function checkParamId($paramType) {

    if (isset($_GET[$paramType])) {
        if ($_GET[$paramType] != null) {
            return $_GET[$paramType];
        } else {
            return "No ID Found";
        }
    } else {
        return "No ID given";
    }
}

function getById($tableName, $id) {
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $response = [
                'status' => 200,
                'message' => 'Fetched data',
                'data' => $row
            ];
            return $response; 
        } else {
            $response = [
                'status' => 404,
                'message' => 'No Data Record'
            ];
            return $response; 
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response; 
    }
}


function samplegetById($id) {
    global $conn;

    $request = validate('request');
    $users = validate('users');
    $rdo = validate('rdo');
    $id = validate($id);

    // $query = "SELECT *
    // FROM transmittal_slip a
    // JOIN request b ON a.request_id = b.id
    // WHERE a.request_id = '$id' LIMIT 1";
    
    // $result = mysqli_query($conn, $query);

    $query = "SELECT * 
        FROM $request a 
        JOIN $users b ON a.user_id = b.id
        JOIN $rdo c ON b.rdo_code = c.rdo_code
        WHERE a.id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $response = [
                'status' => 200,
                'message' => 'Fetched data',
                'data' => $row
            ];
            return $response; 
        } else {
            $response = [
                'status' => 404,
                'message' => 'No Data Record'
            ];
            return $response; 
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response; 
    }
}


function getRDOCode($id) {
    global $conn;

    $request = validate('request');
    $users = validate('users');
    $rdo = validate('rdo');
    $id = validate($id);

    // $query = "SELECT *
    // FROM transmittal_slip a
    // JOIN request b ON a.request_id = b.id
    // WHERE a.request_id = '$id' LIMIT 1";
    
    // $result = mysqli_query($conn, $query);

    $query = "SELECT a.user_id, b.id, b.rdo_code, c.rdo_code, c.description 
    FROM request a 
    JOIN users b ON a.user_id = b.id 
    JOIN rdo c ON b.rdo_code = c.rdo_code 
    WHERE a.id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $response = [
                'status' => 200,
                'message' => 'Fetched data',
                'data' => $row
            ];
            return $response; 
        } else {
            $response = [
                'status' => 404,
                'message' => 'No Data Record'
            ];
            return $response; 
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response; 
    }
}

function getByUserId($tableName, $user_id) {
    global $conn;

    $table = validate($tableName);
    $user_id = validate($user_id);

    $query = "SELECT * FROM $table WHERE user_id='$user_id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $response = [
                'status' => 200,
                'message' => 'Fetched data',
                'data' => $row
            ];
            return $response; 
        } else {
            $response = [
                'status' => 404,
                'message' => 'No Data Record'
            ];
            return $response; 
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response; 
    }
}


function logoutSession() {
    unset($_SESSION['auth']);
    unset($_SESSION['loggedInUserRole']);
    unset($_SESSION['loggedInUser']);
}

function getClientIp() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function view_uploads($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $email = $row['email'];

    $query = "SELECT * FROM $table WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function view_uploads_head($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);

    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);

    return $result;
}

function aoi($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $email = $row['email'];
    $file_type = 'Articles of Incorporation';

    $query = "SELECT * FROM $table WHERE email='$email' AND file_type = '$file_type'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function aoi_head($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $file_type = 'Articles of Incorporation';

    $query = "SELECT * FROM $table WHERE file_type = '$file_type'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function bylaws($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $email = $row['email'];
    $file_type = 'By-Laws';

    $query = "SELECT * FROM $table WHERE email='$email' AND file_type = '$file_type'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function bylaws_head($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $file_type = 'By-Laws';

    $query = "SELECT * FROM $table WHERE file_type = '$file_type'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function gis($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $email = $row['email'];
    $file_type = 'General Information Sheet';

    $query = "SELECT * FROM $table WHERE email='$email' AND file_type = '$file_type'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function gis_head($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $file_type = 'General Information Sheet';

    $query = "SELECT * FROM $table WHERE file_type = '$file_type'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function afs($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $email = $row['email'];
    $file_type = 'Audited Financial Statements';

    $query = "SELECT * FROM $table WHERE email='$email' AND file_type = '$file_type'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function afs_head($tableName) {
    global $conn;
    global $row;
    $table = validate($tableName);
    $file_type = 'Audited Financial Statements';

    $query = "SELECT * FROM $table WHERE file_type = '$file_type'";
    $result = mysqli_query($conn, $query);

    return $result;
}


/**
 * GENERATE REFERENCE NUMBER
 * @param PDO    $pdo
 * @param string $prefix   e.g. "NN_CD"
 * @param string $midText  e.g. "SEC"
 * @param int    $padLength e.g. 5 => 00001
 * @param string $tz       e.g. "Asia/Manila"
 * @return string
 * @throws Throwable
 */

function generateReferenceNumber(
    PDO $pdo,
    string $prefix,
    array $data, // 1. Pass your array here safely
    string $midText = "SEC",
    int $padLength = 5,
    string $tz = "Asia/Manila"
): string {
    
    // 2. Safely read the key without global conflicts
    $rdo_code = $data['rdo_code'] ?? "000";

    $now  = new DateTime("now", new DateTimeZone($tz));
    $year = (int)$now->format('Y');

    try {
        $pdo->beginTransaction();

        $select = $pdo->prepare("
            SELECT last_value
            FROM ref_sequences
            WHERE seq_year = :y AND prefix = :p
            FOR UPDATE
        ");
        $select->execute([':y' => $year, ':p' => $prefix]);
        
        // 3. Changed $row to $dbRow so it never overwrites your array data
        $dbRow = $select->fetch(PDO::FETCH_ASSOC);

        if ($dbRow) {
            $next = (int)$dbRow['last_value'] + 1;
            $update = $pdo->prepare("
                UPDATE ref_sequences
                SET last_value = :v
                WHERE seq_year = :y AND prefix = :p
            ");
            $update->execute([':v' => $next, ':y' => $year, ':p' => $prefix]);
        } else {
            $next = 1;
            $insert = $pdo->prepare("
                INSERT INTO ref_sequences (seq_year, prefix, last_value)
                VALUES (:y, :p, :v)
            ");
            $insert->execute([':y' => $year, ':p' => $prefix, ':v' => $next]);
        }

        $pdo->commit();

        $counter = str_pad((string)$next, $padLength, "0", STR_PAD_LEFT);
        return "{$prefix}-RDO{$rdo_code}-{$midText}{$year}-{$counter}";

    } catch (Throwable $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        throw $e;
    }
}


?>