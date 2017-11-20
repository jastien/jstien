<!DOCTYPE html>
<!-- saved from url=(0080)https://ilearn.csumb.edu/pluginfile.php/721164/mod_resource/content/0/index.html -->
<html class="gr__ilearn_csumb_edu">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>AJAX: Sign Up Page</title>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    
    
    <!--Bootstrap files-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!--Custom Styles-->
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    
    <script>
    
        var isValid = true;
        var imageG = '<img src="img/green.png"/>';
        var imageR = '<img src="img/red.png"/>';
        
        function validatePassword() {
            if ($("#rePassword").val() != $("#password").val()) {
                isValid = false;
                $("#rePasswordError").html(imageR + "Passwords must match");
            }
        } // end function validatePassword()

        function getCity() {
            $.ajax({

                type: "GET",
                url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                dataType: "json",
                data: { "zip": $("#zip").val() },
                success: function(data,status) {
                // alert(data.city);
                

                    // A "Zip code not found" message is displayed next to its text box, if that's the case
                    if (data.zip == undefined) {
                            // $("#zipError").show();
                            $("#zip").css("background", "#ff9999");
                            $("#zipError").html("Zip code not found!");
                            // isValid = false; 
                    } else if (data.zip != undefined){
                            $("#zipError").hide();
                            // isValid = true;
                             $("#zip").css("background", "#d3f8d3");
                            $("#city").html(data.city);
                            $("#latitude").html(data.latitude);
                            $("#longitude").html(data.longitude);
                    }
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                
            });//ajax
                            
        } // end function getCity()
        
        
        //snippets
        //How to add an event
        // $("#state").change( function(){ () });
        
        function getCounties() {
            // alert($("#state").val());
            $.ajax({

                type: "GET",
                url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php?state=" + $("#state").val(),
                dataType: "json",
                data: { },
                success: function(data, status) {
                    $('#county').html("<option> Select one </option>");
                    // alert(data[0].county);
                    for (i = 0; i < data.length; i++) {
                        $("#county").append("<option>" + data[i].county + "</option>");
                    } 

                },
                complete: function(data, status) { //optional, used for debugging purposes
                    //alert(status);
                }

            }); //ajax
        }
        
        function checkUsername() {
            //alert($("#username").val());
            $.ajax({

                type: "GET",
                url: "checkUsernameAPI.php",
                dataType: "json",
                data: { "username":$("#username").val() },
                success: function(data, status) {
                    //alert(data);
                    
                    if (data == false ) {
                        // alert("username available");
                        $("#username").css("background", "#d3f8d3");
                        $("#takenUsername").html("Username available").css("color", "green");
                    } else {
                        // alert("username NOT available!");
                        $("#username").css("background", "#ff9999");
                        $("#takenUsername").html("Username not available").css("color", "red");
                    }
                },
                complete: function(data, status) { //optional, used for debugging purposes
                    //alert(status);
                }

            }); //ajax
        }//end checkUsername
        
        $(document).ready(function() {
            
            $("#zip").change( function(){ getCity() });
            $("#state").change( function(){ getCounties() });
            $("#username").change(function(){ checkUsername() });
            $("#repassword").change(function(){ validatePassword() });
            
        }); //end document.ready
   
    </script>
    
    
</head>

<body data-gr-c-s-loaded="true">

   <h1> Sign Up Form </h1>

    <form id="signUpForm" onsubmit="return false" onclick="validatePassword()">
        <fieldset>
           <legend>Fill out the form</legend>
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text"></td>
                </tr>
                 <tr>
                    <td>Last Name:</td>
                    <td><input type="text"></td>
                </tr>
                
                 <tr>
                    <td>Email: </td>
                    <td><input type="text"></td>
                </tr>
                
                 <tr>
                    <td>Phone Number: </td>
                    <td><input type="text"></td>
                </tr>
                
                <tr>
                    <td>Zip Code: </td>
                    <td><input type="text" id="zip" onchange="getCity()"><span id="zipError" class="error"></span></td>
                </tr>
                
                <tr>
                    <td>City: </td>
                    <td><span id="city"></span></td>
                </tr>
                <tr>
                    <td>Latitude: </td>
                    <td><span id="latitude"></span></td>
                </tr>
                <tr>
                    <td>Longitude: </td>
                    <td><span id="longitude"></span></td>
                </tr>
                <tr>
                    <td>State: </td>
                    <td><select id="state" name="state">

                        <option>--- Select One ---</option>
                        <option value='AL'>Alabama</option>
                        <option value='AK'>Alaska</option>
                        <option value='AZ'>Arizona</option>
                        <option value='AR'>Arkansas</option>
                        <option value='CA'>California</option>
                        
                        <option value='CO'>Colorado</option>
                        <option value='CT'>Connecticut</option>
                        <option value='DE'>Delaware</option>
                        <option value='DC'>District of Columbia</option>
                        <option value='FL'>Florida</option>
                        
                        <option value='GA'>Georgia</option>
                        <option value='HI'>Hawaii</option>
                        <option value='ID'>Idaho</option>
                        <option value='IL'>Illinois</option>
                        <option value='IN'>Indiana</option>
                        
                        <option value='IA'>Iowa</option>
                        <option value='KS'>Kansas</option>
                        <option value='KY'>Kentucky</option>
                        <option value='LA'>Louisiana</option>
                        <option value='ME'>Maine</option>
                        
                        <option value='MD'>Maryland</option>
                        <option value='MA'>Massachusetts</option>
                        <option value='MI'>Michigan</option>
                        <option value='MN'>Minnesota</option>
                        <option value='MS'>Mississippi</option>
                        
                        <option value='MO'>Missouri</option>
                        <option value='MT'>Montana</option>
                        <option value='NE'>Nebraska</option>
                        <option value='NV'>Nevada</option>
                        <option value='NH'>New Hampshire</option>
                        
                        <option value='NJ'>New Jersey</option>
                        <option value='NM'>New Mexico</option>
                        <option value='NY'>New York</option>
                        <option value='NC'>North Carolina</option>
                        <option value='ND'>North Dakota</option>
                        
                        <option value='OH'>Ohio</option>
                        <option value='OK'>Oklahoma</option>
                        <option value='OR'>Oregon</option>
                        <option value='PA'>Pennsylvania</option>
                        <option value='RI'>Rhode Island</option>
                        
                        <option value='SC'>South Carolina</option>
                        <option value='SD'>South Dakota</option>
                        <option value='TN'>Tennessee</option>
                        <option value='TX'>Texas</option>
                        <option value='UT'>Utah</option>
                        
                        <option value='VT'>Vermont</option>
                        <option value='VA'>Virginia</option>
                        <option value='WA'>Washington</option>
                        <option value='WV'>West Virginia</option>
                        <option value='WI'>Wisconsin</option>
                        
                        <option value='WY'>Wyoming</option></td>
                    </tr>
                    
                <tr>
                    <td>Select a County: </td>
                    <td><select id="county"></select></td>
                </tr>
                
                <tr>
                    <td>Desired Username: </td>
                    <td><input type="text" id="username"><span id="takenUsername"></span></td>
                </tr>
                
                <tr>
                    <td>Password: </td>
                    <td><input type="password" id="password"><span id="passwordError"></span></td>
                </tr>
                
                <tr>
                    <td>Type Password Again: </td>
                    <td><input type="password" id="rePassword"><span id="rePasswordError"></span></td>
                </tr>
 
                <tr><td><br><input type="submit" value="Sign up!" id="submit"></td></tr>
            
            </table>
        </fieldset>
    </form>
</body>

</html>