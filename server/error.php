<?php
function error($errorName, $timeDuration)
{
    if (isset($_SESSION["$errorName"])) {
        $error = $_SESSION["$errorName"];
        unset($_SESSION["$errorName"]);
        echo "<span class='error $errorName'>$error</span>";
        echo "<script defer>
            setTimeout(()=>{
                document.querySelector('.$errorName').style.display = 'none';
            }, $timeDuration);
        </script>";
    }
}

function value($name){
    if(isset($_SESSION["$name"])){
        $value = $_SESSION["$name"];
        unset($_SESSION["$name"]);
        echo "$value";
    }
}

?>
