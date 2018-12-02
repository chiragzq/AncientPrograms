var x = new XMLHttpRequest();
var name;
var tosave = 0; //turn on and off ACTUAL saving.
function parseText() {
	var text = document.getElementById('text').value;
	var parsed = '';
	for(var i = 0;i < text.length;i ++) {
		if(text[i] == " ") parsed = parsed + "_";
		else parsed = parsed + text[i];
	}
	return parsed;
}
function parsePwd() {
	var text = document.getElementById('password').value;
	var parsed = '';
	for(var i = 0;i < text.length;i ++) {
		if(text[i] == " ") parsed = parsed + "_";
		else parsed = parsed + text[i];
	}
	if(parsed === "")return "null";
	else return parsed;
}
function getRandName() {
	x.open('GET', 'random.php', false);
	x.send();
	return x.responseText;
}
function save() {
	var textToSave = parseText();
	var password = parsePwd();
	name = getRandName();
	var url = "newtxt.php?name=" + name + "&text=" + textToSave + "&pwd=" + password;
	if(tosave === 0){
	x.open('GET', url, false)
	x.send();
}
document.getElementById("thename").innerHTML = "The name of your save is: " + name;
}
document.getElementById('savetxt').addEventListener('click', save, false);