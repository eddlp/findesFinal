$.extend( $.validator.messages, {
    required: "Este campo es obligatorio.",
    remote: "Por favor, complet� este campo.",
    email: "Por favor, escrib� una direcci�n de correo v�lida.",
    url: "Por favor, escrib� una URL v�lida.",
    date: "Por favor, escrib� una fecha v�lida.",
    dateISO: "Por favor, escrib� una fecha (ISO) v�lida.",
    number: "Por favor, escrib� un n�mero entero v�lido.",
    digits: "Por favor, escrib� s�lo d�gitos.",
    creditcard: "Por favor, escrib� un n�mero de tarjeta v�lido.",
    equalTo: "Por favor, escrib� el mismo valor de nuevo.",
    extension: "Por favor ingres� una im�gen con formato JPG o PNG",
    maxlength: $.validator.format( "Por favor, no escribas m�s de {0} caracteres." ),
    minlength: $.validator.format( "Por favor, no escribas menos de {0} caracteres." ),
    rangelength: $.validator.format( "Por favor, escrib� un valor entre {0} y {1} caracteres." ),
    range: $.validator.format( "Por favor, escrib� un valor entre {0} y {1}." ),
    max: $.validator.format( "Por favor, escrib� un valor menor o igual a {0}." ),
    min: $.validator.format( "Por favor, escrib� un valor mayor o igual a {0}." ),
    nifES: "Por favor, escrib� un NIF v�lido.",
    nieES: "Por favor, escrib� un NIE v�lido.",
    cifES: "Por favor, escrib� un CIF v�lido."

} );

jQuery.validator.addMethod("onlyString", function(value, element) {
    return this.optional(element) || /^[�A-Za-z _]*[�A-Za-z][�A-Za-z _]*$/i.test(value);
}, "Ingresa solamente letras" );