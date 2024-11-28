
function validate(inputId,errId){

     var email_input = document.getElementById("email-input")

     var err_1 = document.getElementById("err1")




     if(email_input.value.length < 1){
         err_1.style.display = "inline-block"
         err_1.style.color = "red"
     }
     else if(email_input.value.length >= 1){
        err_1.style.display = "none"
    }

}

function change(){
    var email_input = document.getElementById("email-input")

    var err_1 = document.getElementById("err1")
    if(email_input.value.length < 1){
        err_1.style.display = "block"
        err_1.style.color = "red"
    }

}
function changePass(){
    var pass_input = document.getElementById("pass-input")
    var err_2 = document.getElementById("err2")

    if(pass_input.value.length < 1){
        err_2.style.display = "block"
        err_2.style.color = "red"
    }

}

function validatePass(passId,errId){
    var pass_input = document.getElementById("pass-input")
    var err_2 = document.getElementById("err2")

    if(pass_input.value.length < 1){
        err_2.style.display = "block"
        err_2.style.color = "red"
    }
    else if(pass_input.value.length >= 1){
        err_2.style.display = "none"
    }

}
