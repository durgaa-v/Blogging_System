function validatef(){

    var input_field_1 = document.getElementById("inputfield-1").value
    var err_1 = document.getElementById("err1")


    if(input_field_1 == ""){
        err_1.style.display = "block"
        err_1.style.color = "red"
    }
    else if(input_field_1 != ""){
        err_1.style.display = "none"
    }

}

function validatel(){
    var input_field_2 = document.getElementById("inputfield-2").value
    var err_2 = document.getElementById("err2")

    if(input_field_2 == ""){
        err_2.style.display = "block"
        err_2.style.color = "red"
    }

    else if(input_field_2 != ""){
        err_2.style.display = "none"
    }


}

function validateMail(){
    var input_field_3 = document.getElementById("inputfield-3").value
    var err_3 = document.getElementById("err3")

    if(input_field_3 == ""){
        err_3.style.display = "block"
        err_3.style.color = "red"
    }
    else if(input_field_3 != ""){
        err_3.style.display = "none"
    }


}

function validatePhn(){
    var input_field_4 = document.getElementById("inputfield-4").value
    var err_4 = document.getElementById("err4")

    if(input_field_4 == ""){
        err_4.style.display = "block"
        err_4.style.color = "red"
    }
    else if(input_field_4 != ""){
        err_4.style.display = "none"
    }


}

function validatePass(){
    var input_field_5 = document.getElementById("inputfield-5").value
    var err_5 = document.getElementById("err5")

    if(input_field_5 == ""){
        err_5.style.display = "block"
        err_5.style.color = "red"
    }
    else if(input_field_5 != ""){
        err_5.style.display = "none"
    }


}

function validateRePass(){
    var input_field_5 = document.getElementById("inputfield-5").value
    var input_field_6 = document.getElementById("inputfield-6").value
    var err_6 = document.getElementById("err6")

    console.log(input_field_5,input_field_6)


    if(input_field_6 == ""){
        err_6.innerHTML = "*Password cannot be empty"
        err_6.style.display = "block"
        err_6.style.color = "red"
    }
    else if(input_field_6 != ""){
        err_6.style.display = "none"
    }
    else if(input_field_6 != input_field_5) {
        err_6.innerHTML = "Passwords don't match"
        err_6.style.display = "block"
        err_6.style.color = "red"
    } 


}

function validate2(){
    var input_field_1 = document.getElementById("inputfield-1").value.length
    var input_field_2 = document.getElementById("inputfield-2").value.length
    var input_field_3 = document.getElementById("inputfield-3").value.length
    var input_field_4 = document.getElementById("inputfield-4").value.length
    var input_field_5 = document.getElementById("inputfield-5").value.length
    var input_field_6 = document.getElementById("inputfield-6").value.length
    var err_7 = document.getElementById("err7")

    if(input_field_1 == "" || input_field_2 == "" || input_field_3 == "" || input_field_4 == "" || input_field_5 == "" || input_field_6 == ""){
        err_7.style.display = "block"
        err_7.style.color = "red"
        return false
    }
    return true


}

// function resetText(){

//     var err_1 = document.getElementById("err7")
//     var err_2 = document.getElementById("err7")
//     var err_3 = document.getElementById("err7")
//     var err_4 = document.getElementById("err7")
//     var err_5 = document.getElementById("err7")
//     var err_6 = document.getElementById("err7")
//     var err_7 = document.getElementById("err7")
    
//     for(let i = 1 ; i <=7;i++){
//         if(err_$(i).style.display = "block" ){
//             err_$(i).style.display = "none"

//         }
//     }

// }