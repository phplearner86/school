<?php  

function username($fn, $ln)
{
     $fn_init = strtolower(substr($fn, 0, 2));
     $ln_init = strtolower(substr($ln, 0, 1));
     $no = random_int(1000, 9999);

     return $fn_init . $ln_init . $no;
}

function password($fn, $ln, $dob)
{
     $fn_init = ucfirst(substr($fn, 0, 1));
     $ln_init = strtolower(substr($ln, 0, 1));

     $dt = \Carbon\Carbon::parse($dob);

     $year = substr($dt->year, 2, 2);

     if (strlen($dt->month) == 1) 
     {
        $month = '0'. $dt->month;
     }
     else
     {
        $month = $dt->month;
     }

     if (strlen($dt->day) == 1) 
     {
        $day = '0'. $dt->day;
     }
     else
     {
        $day = $dt->day;
     }

     return $fn_init . $ln_init . $year . $month . $day;
}

function email($fn, $ln)
{
    return str_slug($fn . ' ' . $ln);
}

function name($fn, $ln)
{
    return str_slug($fn . ' ' . $ln);
}

function checked($checked, $current)
{
    return $checked == $current ? 'checked' : ' ';
}