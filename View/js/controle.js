function alpha(x)
{
    for(let i = 0; i < x.length; i++)
    {
        if((x.charAt(i).toUpperCase() < 'A') || (x.charAt(i).toUpperCase() > 'Z'))
        {
            return false;
        }
    }
    return true;
}

function verif_registration()
{
    let fname = register.fname.value;
    let lname = register.lname.value;
    let phone = register.tel.value;
    let pass = register.pass.value;
    let cpass = register.cpass.value;
    
    if(!alpha(fname))
    {
        alert("First name is invalid");
        return false;
    }
    
    if(!alpha(lname))
    {
        alert("Last name is invalid");
        return false;
    }
    
    if(isNaN(phone))
    {
        alert("Phone Number is invalid");
        return false;
    }
    
    if(pass != cpass)
    {
        alert(pass + " Check your passwords !!! " + cpass);
        return false;
    }

    return true;
}