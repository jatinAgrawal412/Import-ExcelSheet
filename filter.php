<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $search = $_POST['search'];
    if ($search !== NULL) {

        $count = 0;
        $str_search = "";
        if ($_SESSION['arr']) {
            $arr = $_SESSION['arr'];
            foreach ($arr as $row) {
                if ($count == 0) {
                    $str_search .= "<tr>";
                    foreach ($row as $col) {
                        if ($col != NULL) {
                            $str_search .= "<td><b>" . $col . "</b></td>";
                        }
                    }
                    $str_search .= "</tr>";
                    $count = 1;
                } else {
                    if (strpos($row[1], $search) !== false) {
                        $str_search .= "<tr>";
                        foreach ($row as $col) {
                            $str_search .= "<td>" . $col . "</td>";
                        }
                        $str_search .= "</tr>";
                    }
                }
            }
            $_SESSION['str_search'] = $str_search;
            header('Location: index.php');
        } else {
            $_SESSION['str_search'] === "";
            header('Location: index.php');
        }
    }
    else{
        $_SESSION['str_search'] === "";
        header('Location: index.php');
    }
}
