<?php
function CheckEmail($email)
{
	global $conn, $table;
	$sql = "SELECT COUNT(*) FROM $table WHERE f_email=:email";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":email", $email);
	$stmt->execute();
	$result = $stmt->fetchColumn();
    $stmt = null;

    return $result;
}

function SelectAccount($email)
{
	global $conn, $table;
	$stmt = $conn->prepare("SELECT * FROM $table WHERE f_email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function SetAccountToActive($id)
{
	global $conn, $table;
	$sql_status = "UPDATE $table SET f_status = 'Aktif' WHERE f_id = :id"; 
    $stmt_status = $conn->prepare($sql_status);
    $stmt_status->bindParam(':id', $id);
    $stmt_status->execute();
    $stmt_status = null;
}

function CookieRememberMe($expiryTime, $username)
{
    setcookie("remember_me", $username, $expiryTime, "/");
}

function CookieLevel($expiryTime, $level)
{
	setcookie("level", $level, $expiryTime, "/");
}

function CookieActiveTime($expiryTime)
{
    setcookie("cookie_exp", $expiryTime, $expiryTime, "/");
}

function CookieIdUser($expiryTime, $id)
{
    setcookie("id", $id, $expiryTime, "/");
}
?>