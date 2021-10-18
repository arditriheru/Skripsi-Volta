<?php

/**
 * Helpher untuk mencetak tanggal dalam format bahasa indonesia
 *
 * @package CodeIgniter
 * @category Helpers
 * @author Ardi Tri Heru (arditriheruh@gmail.com)
 * @link https://github.com/arditriheru
 */

/**
 * Fungsi untuk merubah bulan bahasa inggris menjadi bahasa indonesia
 */

if (!function_exists('getDatenow')) {
    date_default_timezone_set("Asia/Jakarta");
    function getDatenow()
    {
        $getdatenow = date('Y-m-d');
        return $getdatenow;
    }
}

if (!function_exists('getTimenow')) {
    date_default_timezone_set("Asia/Jakarta");
    function getTimenow()
    {
        $gettimenow = date("H:i:s");
        return $gettimenow;
    }
}

if (!function_exists('getMonthNow')) {
    function getMonthNow()
    {
        $value = getDatenow();
        $getMonthNow = date('m', strtotime($value));
        return $getMonthNow;
    }
}

if (!function_exists('getYearNow')) {
    function getYearNow()
    {
        $value = getDatenow();
        $getYearNow = date('Y', strtotime($value));
        return $getYearNow;
    }
}

if (!function_exists('getDayIndo')) {
    function getDayIndo()
    {
        $day = date("D");

        switch ($day) {
            case 'Sun':
                $hari = "Minggu";
                break;

            case 'Mon':
                $hari = "Senin";
                break;

            case 'Tue':
                $hari = "Selasa";
                break;

            case 'Wed':
                $hari = "Rabu";
                break;

            case 'Thu':
                $hari = "Kamis";
                break;

            case 'Fri':
                $hari = "Jumat";
                break;

            case 'Sat':
                $hari = "Sabtu";
                break;

            default:
                $hari = "Tidak di ketahui";
                break;
        }

        return $hari;
    }
}

if (!function_exists('getMonthIndo')) {
    date_default_timezone_set("Asia/Jakarta");
    function getMonthIndo()
    {
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;

            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

if (!function_exists('getDateIndo')) {
    function getDateIndo()
    {
        $getDateIndo = getDayIndo() . ", " . Date('d') . " " . getMonthIndo() . " " . Date('Y');
        return $getDateIndo;
    }
}

if (!function_exists('formatDateIndo')) {
    function formatDateIndo($date)
    {
        $monthIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $year       = substr($date, 0, 4);
        $month      = substr($date, 5, 2);
        $date       = substr($date, 8, 2);
        $result     = $date . '&nbsp;' . $monthIndo[(int)$month - 1] . '&nbsp;' . $year;
        return ($result);
    }
}

if (!function_exists('getAge')) {
    function getAge($date)
    {
        $tgl    = new DateTime($date);
        $today  = new DateTime('today');
        $y      = $today->diff($tgl)->y;
        $m      = $today->diff($tgl)->m;
        $d      = $today->diff($tgl)->d;
        return $y . " Tahun, " . $m . " Bulan, " . $d . " Hari";
    }

    if (!function_exists('getThnAkademik')) {
        function getThnAkademik()
        {
            $result = date('Y', strtotime(getDateNow())) . '/' . date('Y', strtotime('+1 year', strtotime(getDateNow())));
            return $result;
        }
    }
}
