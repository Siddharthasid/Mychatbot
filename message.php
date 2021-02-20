<?php

    //Connecting to database

    $conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error.....");

    //Getting user message through ajax
    $getMesg = mysqli_real_escape_string($conn, $_POST['text']);

    //Checking user query to database query
    $check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
    $run_query = mysqli_query($conn, $check_data) or die("Error");

    //If user query matched to database query we'll show the reply otherwise it go to else statement

    if(mysqli_num_rows($run_query) > 0){
        //fetching replay from database according to user query
        $fetch_data = mysqli_fetch_assoc($run_query);
        //storing replay to variable which we will send to ajax
        $replay = $fetch_data['replies'];
        echo $replay;
    }else{
        echo "Sorry can't be able to understand you!";
    }

?>