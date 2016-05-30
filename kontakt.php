
<?php
include 'naglowek.php';
?>


<<center> <img src="img/KONTAKT.jpg" height="200" "/></center>


<form id="formularzKontaktowy" align="center" class="form-horizontal"  style="margin-top: 75px " action="mail.php" method="post">

    <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
            <input type="text" name="email" class="input-xlarge" id="inputEmail" placeholder="Email">
        </div>
    </div>

    <div class="control-group">

        <label class="control-label" for="inputSubject">Temat</label>
        <div class="controls">
            <input type="text" name="subject" class="input-xlarge" id="inputSubject" placeholder="Temat wiadomości">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputMessage">Wiadomość</label>
        <div class="controls">
            <textarea type="text" name="message" class="input-xlarge" id="inputMessage" placeholder="Twoja wiadomość" rows="6"></textarea>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Wyślij wiadomość</button>
        </div>
    </div>

</form>

</div> <!-- /container -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>

<script>
    $("#formularzKontaktowy").validate({
        errorClass: "text-error",
        rules: {
            subject: "required",
            message: "required",
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            subject: "Nie wpisałeś tematu wiadomości",
            message: "Nie wpisałeś treści wiadomości",
            email: {
                required: "Nie podałeś swojego adresu e-mail",
                email: "Błędny format adresu e-mail"
            }
        }
    });
</script>
        <script src="js/main.js"></script>


<?php
include 'stopka.php';?>
