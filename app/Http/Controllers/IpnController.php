<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class IpnController extends Controller{

    function ipnResponse()
    {
        /* Make sure strlen behaves as intended by setting multibyte function overload to 0*/
        ini_set("mbstring.func_overload", 0);
        if (ini_get("mbstring.func_overload") > 2) {  /* check if mbstring.func_overload is still set to overload strings(2)*/
            echo "WARNING: mbstring.func_overload is set to overload strings and might cause problems\n";
        }

        /* Internet Payment Notification */

        $pass = Config::get('payu.SECRET_KEY');    /* pass to compute HASH */
        $result = "";                /* string for compute HASH for received data */
        $return = "";                /* string to compute HASH for return result */
        $signature = isset($_POST["HASH"])? $_POST["HASH"]:'';    /* HASH received */
        $body = "";

        /* read info received */
        ob_start();
        while (list($key, $val) = each($_POST)) {
            $$key = $val;

            /* get values */
            if ($key != "HASH") {

                if (is_array($val)) $result .= $this->arrayExpand($val);
                else {
                    $size = strlen(StripSlashes($val));
                    $result .= $size . StripSlashes($val);
                }

            }

        }
        $body = ob_get_contents();
        ob_end_flush();

        $date_return = date("YmdGis");

        $return = strlen($_POST["IPN_PID"][0]) . $_POST["IPN_PID"][0] . strlen($_POST["IPN_PNAME"][0]) . $_POST["IPN_PNAME"][0];
        $return .= strlen($_POST["IPN_DATE"]) . $_POST["IPN_DATE"] . strlen($date_return) . $date_return;

        $hash = $this->hmac($pass, $result); /* HASH for data received */

        $body .= $result . "\r\n\r\nHash: " . $hash . "\r\n\r\nSignature: " . $signature . "\r\n\r\nReturnSTR: " . $return;

        if ($hash == $signature) {
            echo "Verified OK!";

            /* ePayment response */
            $result_hash = $this->hmac($pass, $return);
            dd("<EPAYMENT>" . $date_return . "|" . $result_hash . "</EPAYMENT>");

            /* Begin automated procedures (START YOUR CODE)*/


        } else {
            /* warning email */
            mail("webmaster@gecad.ro", "BAD IPN Signature", $body, "");
        }
    }

    private function arrayExpand($array)
    {
        $retval = "";
        for ($i = 0; $i < sizeof($array); $i++) {
            $size = strlen(StripSlashes($array[$i]));
            $retval .= $size . StripSlashes($array[$i]);
        }

        return $retval;
    }

    private function hmac($key, $data)
    {
        $b = 64; // byte length for md5
        if (strlen($key) > $b) {
            $key = pack("H*", md5($key));
        }
        $key = str_pad($key, $b, chr(0x00));
        $ipad = str_pad('', $b, chr(0x36));
        $opad = str_pad('', $b, chr(0x5c));
        $k_ipad = $key ^ $ipad;
        $k_opad = $key ^ $opad;
        return md5($k_opad . pack("H*", md5($k_ipad . $data)));
    }
}

?>