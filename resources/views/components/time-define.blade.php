<?php
$now=date("Y-m-d h:i:s");
$now=date("Y-m-d", strtotime($now));
$post_date=$posts->created_at??null;
$ago=date("Y-m-d", strtotime($post_date));

if($now==$ago){
    $now_hour=date("h");
    $post_hour=date("h",strtotime($post_date));
    if($now_hour>$post_hour){
        $ago=($now_hour-$post_hour);
        if($ago>1)
            $ago=$ago . " hours ago";
        else
            $ago=$ago . " hour ago";
    }
    else{
        $now_min=date("i");
        $post_min=date("i",strtotime($post_date));
        $minus=($now_min-$post_min);
        if($minus==0)
            $ago="just now";
        else if($minus==1)
            $ago=($minus) . " minute ago";
        else
            $ago=($minus) . " minutes ago";
    }
}
else if(date("Y")==date("Y", strtotime($post_date)))
    $ago=date("d M h:i", strtotime($post_date));
else
    $ago=date("d M Y", strtotime($post_date));
?>
