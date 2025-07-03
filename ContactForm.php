<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
</head>
<?php

/*
Function to validate input from a form. It takes in the user input
and the name of the field
*/

function validateInput($data, $fieldName) {
    //Count how many fields are invalid
    global $errorCount;

    /*
    If input is empty, display that the field is required,
    is required, increase the global error count, and return an empty string
    */
    if (empty($data)) {
        echo "\"$fieldName\" is a required field.<br/>\n";
        ++$errorCount;
        $retval = ""; 
        
    } else {
        //Clean the input by removing whitespaces and backslashes
        $retval = trim($data);
        $retval = stripslashes($retval);
    }

    //Return the empty or cleaned input value
    return($retval);
}

//Function to validate email
function validateEmail($data, $fieldName) {
    global $errorCount;

    /*
    Email field can't  be empty. 
    If it is, display that the field is required, increase global error count, 
    and return empty string*/
    if (empty($data)) {
        echo "\"$fieldName\" is a required field.<br/>\n";
        ++$errorCount;
        $retval = "";
    } else {
        /*
        if there is a value, check it's in the correct email format, 
        otherwise display that the email address is invalid */
        $retval = filter_var($data, FILTER_SANITIZE_EMAIL); 

        if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) {
            echo "\"$fieldName\" is not a valid e-mail address.</br>\n";
        }
    }
    //Return the empty or correct input value
    return($retval);
}

//Function to display contact form
function displayForm($Sender, $Email, $Subject, $Message) {
    ?> 
    <!-- Display a centered heading -->
    <h2 style = "text-align: center">Contact Me</h2> 
    <form name ="contact" action="ContactForm.php" method="post">
        
        <!-- Name -->
        <p>Your Name:
            <input type="text" name="Sender" value="<?php echo $Sender; ?>"/></php>
        
        <!-- Email -->
        <p>Your Email:
            <input type="text" name="Email" value="<?php echo $Email; ?>"/></php>
        
        <!-- Message -->
        <p>Message: <br/>
            <textarea name="Message"><?php echo $Message; ?></textarea></php>
        
        <!-- Reset or submit form -->
        <p><input type="reset" value="Clear Form" />&nbsp; &nbsp;
            <input type="submit" name="Submit" value="Send Form" /></p>
    </form>

        

<?php }
?>
</html>