<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        
        #speech-btn a {
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            display: inline-block;
            font-weight: 700;
            height: 30px;
            line-height: 24px;
            min-width: 30px;
            padding: 2px;
            text-align: center;
            text-decoration: none!important;
            -moz-user-select: none;
            -webkit-user-select: none;
            background-color: #f8f8f8;
            background-image: -webkit-gradient(linear,left top,left bottom,from(#f8f8f8),to(#f1f1f1));
            background-image: -webkit-linear-gradient(top,#f8f8f8,#f1f1f1);
            background-image: -moz-linear-gradient(top,#f8f8f8,#f1f1f1);
            background-image: -ms-linear-gradient(top,#f8f8f8,#f1f1f1);
            background-image: -o-linear-gradient(top,#f8f8f8,#f1f1f1);
            background-image: linear-gradient(top,#f8f8f8,#f1f1f1);
            font-size: 17px;
            margin: 10px 0 0;
            border: 1px solid #bfbfbf;
            color: #6D6A69;
            transition: all 0s;
            cursor: pointer;
            -webkit-box-shadow: inset 0 0 4px 1px rgba(0,0,0,.08);
            box-shadow: inset 0 0 4px 1px rgba(0,0,0,.08);            
        }
        #speech-btn>:first-child>a+.popover {
            display: none;
            top: 42px;
            left: -113px;
            width: 255px;
        }
        #speech-btn>:first-child>a+.popover>.popover-content {
            padding: 9px 12px;
        }
        .vc-title {
            margin-bottom: 10px!important;
            font-size: 16px;
            line-height: 20px;
            text-align: center;
        }
        .vc-title-error {
            display: none;
        }
        .voice-command-active.service-allowed #speech-btn>:first-child>a {
            background: url(../img/voicecommand/active-btn.gif) no-repeat center center #0e70ca;
            border: 1px solid #125A9C;
            color: rgba(255,255,255,.9);
        }
        #chatbox {
            color: #333;
            font-family: Arial;
        }
        #chatbox .bot{
            color: green;
        }
        #chatbox b{
            font-weight: bold;
        }
    </style>
</head>
<body class="voice-command-active">
<div class="flex-center position-ref full-height">
    <div class="top-right links">
        <a href="{{ url('/') }}">Home</a>
    </div>

    <div class="content">
        <div class="title m-b-md">
            Speech Generator
        </div>
        <!-- #Voice Command: Start Speech -->
            <div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
                <div> 
                    <a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
                    <div class="popover bottom"><div class="arrow"></div>
                        <div class="popover-content">
                            <h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
                            <h4 class="vc-title-error text-center">
                                <i class="fa fa-microphone-slash"></i> Voice command failed
                                <br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
                                <br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
                            </h4>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
                            <a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- end voice command -->
        <form method="post" id="speech-form" action="{{ route('speechgen.speech') }}">
            {{ csrf_field() }}
            <div id="chatbox"></div>
            <div class="form-group">
                <label for="body">Type text here</label>
                <textarea class="form-control" id="body" name="body" rows="10"></textarea>
            </div>
            <div class="form-group">
                <button type="button" id="btn-chat" class="btn btn-warning">Chat</button>
                <button type="button" id="btn-speak" class="btn btn-success">Say</button>
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<script src="{{ asset('js/speech/app.config.js') }}"></script>
<script src="{{ asset('js/speech/voicecommand.min.js') }}"></script>
<script>
    $(function(){
        responsiveVoice.setDefaultVoice("Vietnamese Male");
        $('#btn-speak').click(function(){
           var text = $('#body').val();
           responsiveVoice.speak(text);
        });

        var botUrl = 'https://www.cleverbot.com/getreply';
        var key = 'CC1jrWFdYvAvc1mM7-Wlh59lkTA';
        var cs = '';

        $('#btn-chat').click(function(){
            var text = $('#body').val();
            myChat(text);
            $('#body').val('');
            //getResponse(text);
            getTranslation('vi', 'en', text, getResponse);
        });
        
        $( "#body" ).keydown(function( event ) {
            if ( event.which == 13 ) {
                event.preventDefault();
                $('#btn-chat').click();
            }            
        });
        
        function myChat(text){
           $('#chatbox').append('<div class="me"><b>Me:</b> ' + text + '</div>');
        }

        function botChat(text){
           $('#chatbox').append('<div class="bot"><b>Bot:</b> ' + text + '</div>');
        }

        function getResponse(text){
            /*var url = botUrl + '?key=' + key + '&cs=' + cs + '&input=' + encodeURI(text);
            $.get(url, function(data){
               cs = data.cs;
               botChat(data.output);
               responsiveVoice.speak(data.output, 'US English Female');
            });*/
            $.ajax({
                url: botUrl,
                data: {key: key, cs:cs, input:text},
                success: function(data){
                    cs = data.cs;
                    //botChat(data.output);
                    getTranslation('en', 'vi', data.output);
                    //responsiveVoice.speak(data.output, 'US English Female');
                },
                crossDomain: true,
                dataType: 'jsonp'
                //headers: {"Access-Control-Allow-Origin" : "*"}
            });
        }
       /*
        input = encodeURIComponent ("How are you?");
        function ProcessReply (data) {
            if (data.error) console.log ('Error: ' + data.error);
            else alert ('Reply: ' + data.output);
        }
        script_element = document.createElement('script'); //create new script element
        script_element.src = botUrl + "?input=" + input + '&key=' + key + '&callback=ProcessReply';
        document.getElementsByTagName ('head')[0].appendChild(script_element); //append to page, which executes it
        */

        function getTranslation(sourceLang, targetLang, text, callback){
            var translationUrl = "https://translate.googleapis.com/translate_a/single?client=gtx&sl="
                + sourceLang + "&tl=" + targetLang + "&dt=t&q=" + encodeURIComponent(text);

            $.ajax({
                url: translationUrl,
                data: {},
                success: function (data) {
                    //cs = data.cs;
                    //botChat(data.output);
                    //responsiveVoice.speak(data.output, 'US English Female');
                    //console.log(data);
                    var translatedText = data[0][0][0];
                    popLog('Text', text);
                    popLog('TranslatedText', translatedText);
                    if(callback) callback(translatedText);
                    else {
                        responsiveVoice.speak(translatedText);
                        botChat(translatedText);
                    }
                },
                crossDomain: true,
                dataType: 'json'
                //headers: {"Access-Control-Allow-Origin" : "*"}
            });
        }

        function popLog(title, content){
            $('#popLog').append('<li><b>' + title + ': </b>' + content + '</li>');
        }
    });
</script>
<ul id="popLog" style="
    position: fixed;
    right: 20px;
    top: 50px;
    background: rgba(0, 0, 0, 0.75);
    color: white;
    padding: 10px;
    overflow: auto;
    max-height: 80vh;
    /* font-family: roboto; */
    width: 400px;
">
    <li><b>Log 1: </b>Welcom to PopLog!</li>
</ul>
</body>
</html>
