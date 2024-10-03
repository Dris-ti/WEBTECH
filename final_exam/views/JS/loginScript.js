function login_validation(data)
{
    const id = data.id.value;
    const pass = data.password.value;
    let isValid = true;

    let idErr = document.getElementById("idErr");
    let passwordErr = document.getElementById("passwordErr");

    idErr.innerHTML = "";
    passwordErr.innerHTML = "";

    if(id === "")
    {
        idErr.innerHTML = "Please enter your ID";
        isValid = false;
    }

    if(pass === "")
    {
        passwordErr.innerHTML = "Please enter your password";
        isValid = false;
    }

    return isValid;

}