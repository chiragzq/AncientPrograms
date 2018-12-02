var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
today = mm+'/'+dd+'/'+yyyy;
document.getElementById("date").value = today;
document.getElementById("date").size = today.length - 3;