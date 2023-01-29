<?php
$firstName = htmlspecialchars($_GET['first']);
// The htmlspecialchars() function converts special characters to HTML entities. 
// This means that it will replace HTML characters like < and > with &lt; and &gt;. 
// This prevents attackers from exploiting the code by injecting HTML or Javascript code 
// (Cross-site Scripting attacks) in forms.
$lastName = $_GET['last'];
$age = $_GET['age'];

$firstName = filter_input(INPUT_GET, 'first', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName = filter_input(INPUT_GET, 'last', FILTER_SANITIZE_SPECIAL_CHARS);
$age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_EMAIL);




if (isset($_GET['first']) && ($_GET['last']) && ($_GET['age'])) {
    $firstName = htmlspecialchars($_GET['first']);
    $lastName = htmlspecialchars($_GET['last']);
} else {
 ;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getting Data</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <h1>Web Processor</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']
                    //The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script. 
                    ?> ">
        <label for="first">First Name:</label>
        <input type="text" id="first" name="first" autocomplete="off">
        <label for="last">Last Name:</label>
        <input type="text" id="last" name="last" autocomplete="off">
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" autocomplete="off">
        <div>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </div>
    </form>
    <?php
    //1) “Hello, my name is [firstname] [lastname].”
    if (isset($_GET['first']) && ($_GET['last']) && ($_GET['age'])) {
    echo "Hello, my name is" . $firstName . " $lastName.";
    echo "<br>";
    //2) This statement is conditional based on the [age] parameter.

    if ($age >= 18) {
        echo "I am old enough to vote in the United States.";
        echo "<br>";

    } else {
        echo "I am not old enough to vote in the United States.";
        echo "<br>";

    }
    //Calculate the days based on the number given for age (3rd sentence)
    $days = $age * 365;
    echo "I have been alive for approximately " . $days . " days.";
    echo "<br>";
    //4) Add the current date to your page with PHP 
    echo "Today's date is " . date("F j, Y");


   
 
}else{
    echo "missing parameters!";

}
    ?>
    
</body>

</html>