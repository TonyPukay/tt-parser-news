@extends('pattern.main')
@section('content')

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        body{
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            color:#fff;
            padding:10px;
            font:14px/1.3 'Segoe UI',Arial, sans-serif;
        }
        #container{
            color: #555;
            font-size: 58px;
            margin: 0 auto;
            padding: 200px 0 100px;
            width: 650px;
            position:relative;
            min-height: 90px;

            font-family:'Open Sans Condensed',sans-serif;
            text-shadow:1px 1px 0 rgba(255,255,255,0.5);
        }

        #container:before{
            content: ">";
            font-size: 50px;
            left: -40px;
            opacity: 0.25;
            position: absolute;
            text-shadow: 1px 1px 0 white;
            top: 210px;
        }

        #userText{
            background:none;
            border:none;
            border-bottom:1px solid #aaa;

            color: #777777;
            display: block;
            font-family: 'Open Sans Condensed',sans-serif;
            font-size: 26px;
            margin: 0 auto 0px;
            padding: 10px;
            text-align: center;
            width: 300px;
            outline: none;
        }
    </style>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" type="text/css" />

    <div class="content">
        <div class="title m-b-md" id="first">
            Hello:)
        </div>

        <div class="title m-b-md" id="second">
            This my Test Tasks
        </div>
    </div>
    <div id="container">Hello:)</div>

    <input type="hidden" id="userText" />

@endsection

@section('scripts')
    <script href="js/lib/jquery.shuffleLetters.js"></script>
    <script>
        (function($){

            $.fn.shuffleLetters = function(prop){

                var options = $.extend({
                    "step"		: 8,			// How many times should the letters be changed
                    "fps"		: 25,			// Frames Per Second
                    "text"		: "", 			// Use this text instead of the contents
                    "callback"	: function(){}	// Run once the animation is complete
                },prop)

                return this.each(function(){

                    var el = $(this),
                        str = "";


                    // Preventing parallel animations using a flag;

                    if(el.data('animated')){
                        return true;
                    }

                    el.data('animated',true);


                    if(options.text) {
                        str = options.text.split('');
                    }
                    else {
                        str = el.text().split('');
                    }

                    // The types array holds the type for each character;
                    // Letters holds the positions of non-space characters;

                    var types = [],
                        letters = [];

                    // Looping through all the chars of the string

                    for(var i=0;i<str.length;i++){

                        var ch = str[i];

                        if(ch == " "){
                            types[i] = "space";
                            continue;
                        }
                        else if(/[a-z]/.test(ch)){
                            types[i] = "lowerLetter";
                        }
                        else if(/[A-Z]/.test(ch)){
                            types[i] = "upperLetter";
                        }
                        else {
                            types[i] = "symbol";
                        }

                        letters.push(i);
                    }

                    el.html("");

                    // Self executing named function expression:

                    (function shuffle(start){

                        // This code is run options.fps times per second
                        // and updates the contents of the page element

                        var i,
                            len = letters.length,
                            strCopy = str.slice(0);	// Fresh copy of the string

                        if(start>len){

                            // The animation is complete. Updating the
                            // flag and triggering the callback;

                            el.data('animated',false);
                            options.callback(el);
                            return;
                        }

                        // All the work gets done here
                        for(i=Math.max(start,0); i < len; i++){

                            // The start argument and options.step limit
                            // the characters we will be working on at once

                            if( i < start+options.step){
                                // Generate a random character at thsi position
                                strCopy[letters[i]] = randomChar(types[letters[i]]);
                            }
                            else {
                                strCopy[letters[i]] = "";
                            }
                        }

                        el.text(strCopy.join(""));

                        setTimeout(function(){

                            shuffle(start+1);

                        },1000/options.fps);

                    })(-options.step);


                });
            };

            function randomChar(type){
                var pool = "";

                if (type == "lowerLetter"){
                    pool = "abcdefghijklmnopqrstuvwxyz0123456789";
                }
                else if (type == "upperLetter"){
                    pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                }
                else if (type == "symbol"){
                    pool = ",.?/\\(^)![]{}*&^%$#'\"";
                }

                var arr = pool.split('');
                return arr[Math.floor(Math.random()*arr.length)];
            }

        })(jQuery);
        $(function(){

            // container is the DOM element;
            // userText is the textbox

            var container = $("#container")
            userText = $('#userText');

            // Shuffle the contents of container
            container.shuffleLetters();

            // Bind events
            userText.click(function () {

                userText.val("");

            }).bind('keypress',function(e){

                if(e.keyCode == 13){

                    // The return key was pressed

                    container.shuffleLetters({
                        "text": userText.val()
                    });

                    userText.val("");
                }

            }).hide();

            // Leave a 4 second pause

            setTimeout(function(){

                // Shuffle the container with custom text
                container.shuffleLetters({
                    "text": "This my Test Tasks!"
                });

                userText.val("type anything and hit return..").fadeIn();

            },4000);

        });

    </script>
@endsection