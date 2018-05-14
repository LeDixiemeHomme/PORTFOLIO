<?php include "includes/header.php" ?>
<form action="mailto:example@mail.com" method="post">
	<label for="fname"><p>Sujet</p></label>
    <input type="text" class="fname" name="firstname" placeholder="Le Sujet...">
	<label for="subject"><p>Message</p></label>
    <textarea class="subject" name="subject" placeholder="Votre message..." style="height:200px"></textarea>
    <input type="submit" name="submit"/>
</form>
<?php include "includes/footer.php" ?>
