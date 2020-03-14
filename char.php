<?php
function randword($n)
    {
        $key = "";
        for($i=0;$i<$n;$i++)
            {
            $type = rand(0,2);
                if($type==0)
                {
                    $r = chr(rand(97,122));
                    $key.=$r;
                }
            elseif($type==1)
                {
                    $r = chr(rand(65,90));
                    $key.=$r;
                }
            else
                {
                    $r = rand(0,9);
                    $key.=$r;
                }
            }
        return $key;
    }
?>