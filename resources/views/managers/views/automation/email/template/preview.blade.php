<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $email->getSubject() }}</title>

    <style>

            body {
                padding-top: 45px !important;
            }

        /* Style the tab */
        div.tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;

                position: fixed;
                top: 0;
                width: 100%;
                left: 0;
                z-index: 2;

        }

        /* Style the buttons inside the tab */
        div.tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        div.tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        div.tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            border: 1px solid #ccc;
            border-top: none;
            border-bottom: none;
        }
        .email_preview_frame {
            margin: 0;
            border: none;
            width: 100%;
            height: calc(100vh - 50px);
        }
    </style>
</head>

<body style="margin:0;padding:0;">
        <div class="tab">
          <button class="tablinks active" onclick="openTab(event, 'html')">{{ trans('messages.web_view_html_tab') }}</button>
          <button class="tablinks" onclick="openTab(event, 'plain')">{{ trans('messages.web_view_plain_tab') }}</button>
        </div>

        <div id="html" class="tabcontent" style="display: block">
            <iframe class="email_preview_frame" src="{{ route('Automation2Controller@templatePreviewContent', [
                'uid' => $automation->uid,
                'email_uid' => $email->uid,
            ]) }}"></iframe>
        </div>


        <div id="plain" class="tabcontent" style="padding: 10px">

        {!! $email->getPlainContent() !!}

        </div>


    <script>
    function openTab(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>
</body>

</html>

