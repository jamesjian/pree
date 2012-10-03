<?php
use \Zx\Message\Message as Message;
Message::show_message();
?>

<form action="<?php echo HTML_ROOT;?>admin/staff/login" method="post">
    User:<input type="text" name="staff_name" size="50" />
    Password: <input type="password" name="staff_password" size="50" />
    <input type="submit" name="submit" value="login" />
    <input type="reset" name="reset" value="clear" />
</form>