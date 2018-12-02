function textToArray(text) {
	var array = [""];
	var add = 0; //new
	var stop = 0;
	var i = 1;
	while(stop == 0) {
		add = 0;
		if (text[i - 1] == " ") add = 1;
		if(add == 0)array[array.length - 1] = array[array.length - 1] + text[i - 1];
		else array = array.concat("");
		i ++;
		if(i > text.length) stop = 1;
	}
	return array;
}
function loadText() {
	x.open('GET', 'gettxt.php', false);
	x.send();
	console.log(textToArray(x.responseText));
	var array = textToArray(x.responseText);
	console.log(array.length);
	for(var i = 0;i < array.length;i ++) {
		array[i] = array[i].replace(/_/g, " ");
	}
	return array;
}
function loadPwd() {
	x.open('GET', 'getpwd.php', false);
	x.send();
	console.log(textToArray(x.responseText));
	return textToArray(x.responseText);
}
function loadName() {
	x.open('GET', 'getname.php', false);
	x.send();
	console.log(textToArray(x.responseText));
	return textToArray(x.responseText);
}
function getFinalData(name, names, texts, pwds) {
	var index = names.indexOf(name);
	if(index > -1) var data = [names[index], texts[index], pwds[index]];
	else var data = ['Error: Name not found', 'Error: Text not found', 'Error: Password not found'];
	return data;
}
function checkPwd(pwd) {
	if(pwd == "null") return true;
	else {
		var check = prompt("Please enter the password for this text.");
		if(check == pwd) return true;
		else return false;
	}
}
function load() {
	name = prompt("Name?");
	var info = getFinalData(name, loadName(), loadText(), loadPwd());
	console.log(info)
	if(checkPwd(info[2]) == true) {
	document.getElementById("text").value = info[1];
	document.getElementById("thename").innerHTML = "The name of your save is: " + name;	
	document.getElementById("password").value = info[2];
}
}
document.getElementById("loadtxt").addEventListener("click", load, false);