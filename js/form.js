$(document).ready(function() {

  var form = $('#form'),
		nome = $('#nome'),
		telefone = $('#telefone'),
		email = $('#email'),
		assunto = $('#assunto'),
		mensagem = $('#mensagem'),
		info = $('#info'),
		submit = $("#enviar");
  
  form.on('input', '#nome','#email, #assunto, #telefone, #mensagem', function() {
    $(this).css('border-color', '');
    info.html('').slideUp();
  });
  
  submit.on('click', function(e) {
    e.preventDefault();
    if(validate()) {
		$.ajax({
			type: "POST",
			url: "enviomail/envio.php",
			data: form.serialize(),
			dataType: "json"
		}).done(function(data) {
			if(data.success) {
				nome.val('');
				telefone.val('');
				email.val('');
				assunto.val('Contato Site ByMeia');
				mensagem.val('');
				info.html('Mensagem enviado!').css('color', 'blank').slideDown();
			} else {
				info.html('Erro ao enviar, tente novamente!').css('color', 'red').slideDown();
			}
		});
      
    }
  });
  
  function validate() {
    var valid = true;
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    if($.trim(nome.val()) === "") {
      info.html('Nome vazio, preencha por favor!').css('color', 'red').slideDown();
      valid = false;
    }
	if($.trim(telefone.val()) === "") {
      info.html('Telefone vazio, preencha por favor!').css('color', 'red').slideDown();
      valid = false;
    }
	if(!regex.test(email.val())) {
      info.html('Email errado, verifique por favor!').css('color', 'red').slideDown();
      valid = false;
    }
    if($.trim(mensagem.val()) === "") {
		info.html('Mensagem vazio, preencha por favor!').css('color', 'red').slideDown();
      valid = false;
    }
    
    return valid;
  }

});