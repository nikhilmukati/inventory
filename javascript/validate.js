 function takeOnlyNumbers(evt) {

    var charCode = evt.which ? evt.which : evt.keyCode
    
    if ( charCode == 31 || ( charCode >= 48 && charCode <= 57 ) )
        return true;
    return false;
}

function takeOnlyAlphabets(evt)
{
    var charCode = evt.which ? evt.which : evt.keyCode
    
    if( charCode == 32 || ( charCode >= 65 && charCode <= 91  ) || (charCode >=97 && charCode <=122) )
        return true;
    return false;
}