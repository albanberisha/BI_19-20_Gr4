function validoo() {
    if (validoFormen() == false) {} else {
        var msg = "Mesazhi eshte derguar me sukses";
        alert(msg);
    }
}

function validoFormen() {
    var uname = document.getElementById("uname").value;
    var email = document.getElementById("email").value;
    var mesazhi = document.getElementById("mesazhi").value;

    if (uname == "") {
        return false;
    } else {
        if (email == "") {
            return false;
        } else {
            if (mesazhi == "") {
                return false;
            }
        }
    }
}