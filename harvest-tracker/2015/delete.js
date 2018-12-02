function deletestuff() {
    if (confirm("CONFIRM!! DO YOU REALLY WANT TO DELETE? PRESS CANCEL!") == true) alert('CANCELLED!');
    else {
        if (document.getElementById("delall").checked == false) {
        var id = Number(document.getElementById("id").value);
        if (isNaN(id) == false) {
            x.open('GET', 'delete.php?id=' + ids[id - 1], false);
            x.send();
            autoload();
        } else alert("Invalid Number");
    } else {
        if (confirm("ARE YOU SURE YOU WANT TO DELETE ALL OPTIONS!!!!!!!!!!!!! PRESS CANCEL!!!") == true) alert('CANCELLED!');
        else {
            x.open('GET', 'delete.php?id=all', false);
            x.send();
            autoload();
        }
    }
}
}
document.getElementById("deletebutton").addEventListener("click", deletestuff);