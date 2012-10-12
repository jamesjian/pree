<form action="<?php echo HTML_ROOT. '';?>" method="POST">
    <fieldset>
        <legend>Contact us</legend>
        <dl>
            <dt>Email:</dt>
            <dd><input type="text" name="email" /></dd>
            <dt>Name</dt>
            <dd><input type="text" name="name" /></dd>
            <dt>Content</dt>
            <dd><textarea name="content" cols="30" rows="30"></textarea></dd>
            <dt><input type="submit" name="submit" value="Submit" /></dt>
            <dd><input type="reset" name="reset" value="Reset" /></dd>
        </dl>
    </fieldset>
</form>
<script type="text/javascript" src="<?php echo HTML_ROOT . 'js/jquery/jquery.validate.js';?>"></script>
