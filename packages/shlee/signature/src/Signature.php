<?php

namespace Shlee\Signature;

class Signature
{
    private $params;

    function __construct()
    {
        //
    }

    public function execute($params )
    {
        if (empty($params)) {
            return ["result" => false, "message" => "Parameter is not set at all."];
        }
        if (empty($params["signature"])) {
            return ["result" => false, "message" => "Signature is not set at all."];
        }

        $inputStr = "";
        $delimiter = "";
        $hashInBase64 = "";
        try {
            foreach ($params as $key => $value) {
                if (strcmp($key, "signature") === 0) continue;
                $inputStr .= $delimiter.$key."=".$value;
                $delimiter = "&";
            }
            $lowStr = strtolower($inputStr);
            // $user = User::where("apikey", "=", $_GET["apikey"])->firstOrFail();
            // $secretkey = $user[0]->secretkey;
            $secretkey = "\$2y\$10\$Ov2xi8JbhqC.6nsVoLn.f.bI5LbGwuavVH4ZaLhMeCqnI.MkYPBT.";
            $hash = hash_hmac("sha256", $lowStr, $secretkey);
            $hashInBase64 = base64_encode($hash);
        } catch (Exception $e) {
            return ["result" => false, "message" => $e->getMessage()];
        }

        if (strcmp($params["signature"], $hashInBase64) !== 0) {
            return ["result" => false, "message" => "Signature is incorrect."];
        }

        return ["result" => true, "message" => "All right."];
    }
}
