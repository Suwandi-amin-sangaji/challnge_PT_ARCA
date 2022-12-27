<?php

if (!function_exists('currency_IDR')) {
    function currency_IDR($value)
    {
        return "Rp. <?php echo number_format($value,0,',','.'); ?>";
}
}