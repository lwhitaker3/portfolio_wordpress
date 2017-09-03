<?php
$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Your Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Subject</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Subject">
      </div>
      <div class="form-group">
        <label for="exampleTextarea">Message</label>
        <textarea class="form-control" id="exampleTextarea" placeholder="Enter Your Message..." rows="5"></textarea>
      </div>

      <div class="button">
        <button class="button-link" type="submit">
          <svg>
            <rect x="0" y="0" fill="none" width="100%" height="100%"></rect>
          </svg>
          Submit
        </button>
      </div>
    </form>

    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name" type="text" value="" size="30"/><br>
    Your email:<br>
    <input name="email" type="text" value="" size="30"/><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="30"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php
    }
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
		echo "All fields are required, please fill out form again.";
    ?>
    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name" type="text" value="" size="30"/><br>
    Your email:<br>
    <input name="email" type="text" value="" size="30"/><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="30"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php
	    }
    else{
	    $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
	  mail("lou.whitaker@hotmail.com", $subject, $message, $from);
		echo "Email sent!";
    ?>
    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name" type="text" value="" size="30"/><br>
    Your email:<br>
    <input name="email" type="text" value="" size="30"/><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="30"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php
	    }
    }
?>
