<!DOCTYPE html>
<html>
    <head>
        <title>Listfilter example</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery.listfilter.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                'use strict';

                // Apply a filter to the list
                var filter = $('input#filterinput'), clearfilter = $('input#clearfilter');
                $('ul#mylist').listfilter({
                    'filter': filter,
                    'clearlink': clearfilter,
                    'alternate': true,
                    'alternateclass': 'other'
                });
            });
        </script>
    </head>
    <body>
        <h1>Listfilter example</h1>
        <form name="filterform">
            <label>Filter<input type="text" name="filterinput" id="filterinput"></input></label>
            <input type="button" name="clear" value="Clear" id="clearfilter"></input>
        </form>
        <ul id="mylist">
            <li>Drivers</li>
            <li>Labor</li>
            <li>Human Resource</li>
            <li>Information Technology</li>
            <li>Policing</li>
        </ul>
    </body>
</html>
