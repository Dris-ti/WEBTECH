<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
<html>
<body>
    <h1 class="heading">
        Registration
    </h1>

    <form action="Registration.php" method="post">

        <table>
            <td>
                <fieldset class="main-box-1" >
                    <legend>General Information:</legend>
                        <table>
                            <tr>
                                <td>First Name</td>
                                <td>: 
                                    <?php 
                                    if($_POST["first-name"] == "")
                                    {
                                        
                                    };
                                    ?> 
                                </td>
                                <td rowspan="7">
                                    <!-- :<input type="image" name="" id=""> -->
                                    <!-- <img height="100px" src="img.png" alt="Can't load image"> -->
                                </td>
                            </tr>
                
                            <tr>
                                <td>Last Name</td>
                                <td>: <?php echo $_POST["last-name"]; ?>
                                </td>
                                
                            </tr>
                
                            <tr>
                                <td>Gender</td>
                                <td>
                                    : <?php echo $_POST["gender"]; ?>
                                </td>
                                
                            </tr>
                
                            <tr>
                                <td>Father's Name</td>
                                <td>
                                    : <?php echo $_POST["father-name"]; ?>
                                </td>
                            </tr>
                
                            <tr>
                                <td>Mother's Name</td>
                                <td>
                                    : <?php echo $_POST["mother-name"]; ?>
                                </td>
                            </tr>
                
                            <tr>
                                <td>Blood Group</td>
                                <td>
                                    : <?php echo $_POST["blood-grp"]; ?>
                                </td>
                            </tr>
                
                            <tr>
                                <td>Religion</td>
                                <td>
                                    : <?php echo $_POST["religion"]; ?>
                                </td>
                            </tr>
                
                        </table>
                   </fieldset>
            </td>
    
            <td>
                <fieldset class="main-box-2">
                    <legend>Contact Information:</legend>
                    <table>
                        <tr>
                            <td>Email</td>
                            <td>
                                : <?php echo $_POST["email"]; ?>
                            </td>
                        </tr>
                
                        <tr>
                            <td>Phone/Mobile</td>
                            <td>
                                : <?php echo $_POST["phn-no"]; ?>
                            </td>
                        </tr>
                
                        <tr>
                            <td>Website</td>
                            <td>
                                : <?php echo $_POST["website"]; ?>
                            </td>
                        </tr>
                
                        <tr>
                            <td>Address</td>
                            <td>
                                <fieldset>
                                    <legend>Present Address</legend>
                                    <table>
                                        <tr>
                                            <td>
                                            : <?php 
                                                $country = $_POST["country"];
                                                $city = $_POST["city"];
                                                $address = $_POST["address"];
                                                $zip_code = $_POST["zip-code"];
                                                echo $country . " " . $city . " " . $address . " " . $zip_code;
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </fieldset>
                            </td>
                        </tr>
    
                        
                    </table>
                   </fieldset>
            </td>
    
            <td>
                    <fieldset class="main-box-1">
                        <legend>Account Information</legend>
                        <table>
                            <tr>
                                <td>Username:</td>
                                <td>
                                    : <?php echo $_POST["user-name"]; ?>
                                </td>
                            </tr>
    
                            <tr>
                                <td>Password:</td>
                                <td>
                                    : <?php echo $_POST["password"]; ?>
                                </td>
                            </tr>
    
                            <tr>
                                <td>Confirm Password:</td>
                                <td>
                                    : <?php echo $_POST["conf-password"]; ?>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <br>
                    <button>Register</button>
            </td>        
        </table>

    </form>

    

    
</body>
</html>


