
<?php
session_start();

require_once('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['import_file_btn'])) {
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);


    if (in_array($file_ext, $allowed_ext)) {
        $targetPath = $_FILES['import_file']['tmp_name'];
        $spreadSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
        $data = $spreadSheet->getActiveSheet()->toArray();
        $str = "";
        $count = 0;

        if ($data) {
            foreach ($data as $row) {
                if ($count == 0) {
                    $str .= "<tr>";
                    foreach ($row as $col) {
                        $str .= "<td><b>" . $col . "</b></td>";
                    }
                    $str .= "</tr>";
                    $count = 1;
                } else {
                    $str .= "<tr>";
                    foreach ($row as $col) {
                        $str .= "<td>" . $col . "</td>";
                    }
                    $str .= "</tr>";
                }
            }
            $_SESSION['arr'] = $data;
            $_SESSION['data'] = $str;
            $_SESSION['status'] = true;
            header("Location: index.php");
        }
    }
    else {
        $_SESSION['status'] = false;
        header("Location: index.php");
        exit(0);
    }
} else {
    $_SESSION['status'] = false;
    header("Location: index.php");
    exit(0);
}

?>