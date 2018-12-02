var x = new XMLHttpRequest();
function getId() {
	x.open('GET', 'getid.php', false);
	x.send();
	if(x.responseText == "") {return 1;}
	else {
		var stuff = textToArray(x.responseText);
		/*if(stuff.length == 2) return 2;
		if(stuff.length == 3) return 3;
		/*for(var i = 0;i < stuff.length - 1;i ++) {
			stuff[i] = parseInt(stuff[i]);
			console.log(stuff[i]);
		}
		return parseInt(stuff[stuff.length - 2]) + 1; */
		console.log(stuff);
		console.log(stuff.length);
		console.log('HELP');
		return stuff.length;
	}
}
function save() {
	var crop = document.getElementById("type").value;
	var day = document.getElementById('date').value;
	var weight = document.getElementById('weight').value
	var id = getId();
	var url='save.php?crop=' + crop + '&date=' + day + '&pounds=' + weight + '&id=' + id;
	console.log(url);
	x.open('GET', 'save.php?crop=' + crop + '&date=' + day + '&pounds=' + weight + '&id=' + id, false);
	x.send();
	alert(x.responseText);
	autoload();
}
document.getElementById('stuff').addEventListener('click', save, false);