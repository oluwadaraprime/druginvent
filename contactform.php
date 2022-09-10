<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h4 class="sent-notification"></h4>
    <form id="">
    <h2>Send an Email</h2>

    <label>Name</label>
    <input id="name" type="text" placeholder="Enter Name"><br>
    <label>Email</label>
    <input id="email" type="text" placeholder="Enter Name"><br><label>Phone</label>
    <input id="phone" type="number" placeholder="Enter Name"><br><label>Subject</label>
    <input id="subject" type="text" placeholder="Enter Name"><br>
    <label>Message</label>
    <textarea id="body" row="5" placeholder="Type Message"></textarea><br><br>
    <button type="button" onclick="sendEmail()" value="Send An Email">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

	<script type="text/javacript">
		function sendEmail(){
			var name = $("#name");
			var email = $("#email");
			var phone = $("#phone");
			var subject = $("#subject");
            var body = $("#body");

			if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(phone) && isNotEmpty(body)&& isNotEmpty(body)){
				$.ajax({
					url: 'sendEmail.php',
					method: 'POST',
					dataType: 'json',
					data:{
						name: name.val(),
						phone: phone.val(),
						email: email.val(),
						subject:subject.val(),
                        body:body.val(),
					}, success: function(response){
						$("#myForm")[0].rest();
						$(".sent_notification").text("Message sent successfully.");
					}
				})
			}
		}
		function isNotEmpty(caller){
			if(caller.val() == ""){
				caller.css("border", "1px solid red");
				return false;
			}
			else
			{
				caller.css("border", '');
				return true;
			}
		}

	</script>
</body>
</html>