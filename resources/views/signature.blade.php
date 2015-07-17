<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/hmac-sha256.js"></script>

        <script type="text/javascript">
            function submit() {
                var params = {
                    "firstname": "Mickey",
                    "lastname": "Mouse",
                    "apikey": "ca681f0d-a4e7-43e9-a5be-ef80b3d1af71",
                    // "secretkey": "secretkey",
                    "secretkey": "$2y$10$Ov2xi8JbhqC.6nsVoLn.f.bI5LbGwuavVH4ZaLhMeCqnI.MkYPBT.",
                };
                var theUrl = signatureGenerator(params, "/signature/verify");
                console.log(theUrl);

                var responseText = httpGet(theUrl);
            }

            function httpGet(theUrl) {
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.open( "GET", theUrl, false );
                xmlHttp.send( null );
                return xmlHttp.responseText;
            }

            function signatureGenerator(params, baseUrl) {
                var keys = [];
                for (var key in params) {
                    if (key === "secretkey") continue;
                    keys.push(key);
                };
                keys.sort();

                var encUrl = "";
                var delimiter = "";
                for (var i = 0; i < keys.length; i++) {
                    var key = keys[i];
                    encUrl += delimiter + key + "=" + encodeURIComponent(params[key]);
                    delimiter = "&";
                }

                var lowUrl = encUrl.toLowerCase();
                var secretkey = params["secretkey"];

                var hash = CryptoJS.HmacSHA256(lowUrl, secretkey);
                var base64 = window.btoa(hash.toString());

                return baseUrl + "?" + encUrl + "&signature=" + base64;
            };
        </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
        <div>
            First name:<br>
            <input type="text" name="firstname" value="Mickey">
            <br>
            Last name:<br>
            <input type="text" name="lastname" value="Mouse">
            <br><br>
            <input type="button" value="Button" onclick="javascript:submit();">
        </form>
    </body>
</html>
