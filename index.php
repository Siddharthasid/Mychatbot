<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple ChatBot in PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

    <div class="wrapper">

        <div class="title">Simple Online ChatBot</div>

        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>

                <div class="msg-header">
                    <p>Hello there, how can i help you?</p>
                </div>
            </div>


            
        </div>

        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type Something Here....." required>
                <button id="send-btn">Send</button>
            </div>
        </div>

    </div>


    <script>

        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                //alert($value);
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                //Ajax code Starts here
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fa fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        //when chat goes down chatbot automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });

            });
        });

    </script>


</body>

</html>