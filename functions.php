<?php
include_once 'connection.php';

function duplicateExists($table, $column, $value, $conn)
{
    $dup = false;
    try {
        //echo ($table . $column . $value);
        $query = "SELECT * FROM $table where $column = ?;";
        $statement = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($statement, $query)) {
            mysqli_stmt_bind_param($statement, "s", $value);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);

            if (mysqli_fetch_assoc($result)) {
                $dup = true;
            }
            return $dup;
        }
    } catch (Exception $e) {
    }
}


function checkNumber($value)
{
    if (filter_var($value, FILTER_VALIDATE_INT)) {
        return true;
    } else return false;
}

function checkName($value)
{
    $value = str_replace(" ", "", $value);
    if (ctype_alpha($value) === false) return false;
    else return true;
}

function checkuName($value)
{
    if (ctype_alnum($value) === false) return false;
    else return true;
}
