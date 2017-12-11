<?php
/**
 Jesse Winters
 */
require_once ("assets/dbcon.php");
require_once ("assets/functions.php");
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)??"";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)??"";
$heard = filter_input(INPUT_POST, 'heard_from', FILTER_SANITIZE_STRING)??"";     //collecting the post
$contact = filter_input(INPUT_POST, 'contact_via', FILTER_SANITIZE_STRING)??"";
$com = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING)??"";

include_once ("assets/header.php");
/*echo($email.$phone.$heard.$contact.$com );*/

if($email == "" || $phone == "" || $heard == "" || $contact == ""){
    echo("Please Re-enter Info");
    ?><form action="display_results.php" method="post">

    <fieldset>
        <legend>Account Information</legend>
        <label>E-Mail:</label>
        <input type="text" name="email" value="<?php if($email != ""){echo($email);} ?>" class="textbox"/>
        <br />

        <label>Phone Number:</label>
        <input type="text" name="phone" value="<?php if($phone != ""){echo($phone);} ?>" class="textbox"/>
    </fieldset>

    <fieldset>
        <legend>Settings</legend>

        <p>How did you hear about us?</p>
        <input type="radio" name="heard_from" value="Search Engine" />
        Search engine<br />
        <input type="radio" name="heard_from" value="Friend" />
        Word of mouth<br />
        <input type=radio name="heard_from" value="Other" />
        Other<br />

        <p>Contact via:</p>
        <select name="contact_via">
            <option value="email">Email</option>
            <option value="text">Text Message</option>
            <option value="phone">Phone</option>
        </select>

        <p>Comments: (optional)</p>
        <textarea name="comments" rows="4" cols="50"><?php echo($com) ?></textarea>
    </fieldset>

    <input type="submit" value="Submit" />

</form>
<?php
}else{
    echo("<h2>This info will be uploaded to the database</h2><p>Email: ".$email."</p><p>Phone: ".$phone."</p><p>Contact Method: ".$contact."</p><p>Comments: ".$com."</p>");
echo(addCon(dbcon(),$email,$phone,$heard,$contact,$com)); //tells what was added

}
include_once ("assets/footer.php");