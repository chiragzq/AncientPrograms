var days,
	crops,
	pounds,
	ids,
	x = new XMLHttpRequest();
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
function average(param) {
	var done = 0;
	for(var i = 0;i < param.length - 1;i ++) {
		console.log(parseInt(param[i]))
		done += parseInt(param[i]);
	}
	console.log(done);
	done /= param.length - 1;
	return Math.round(done);
}
function addAll(param) {
	var done = 0;
	for(var i = 0;i < param.length - 1;i ++) {
		console.log(parseInt(param[i]));
		done += parseInt(param[i]);
	}
	return done;
}
function goals(p) {
	var total = addAll(p);
	document.getElementById("goals").innerHTML = "Your goal is: 1000 pounds <br>You currently are at: " + total + " pounds<br>Your average pounds per crop are: " + average(p) + " pounds<br>You have completed " + addAll(p)/10 + "% of your goal"
}
function autoload() {
	x.open('GET', 'getcrop.php', false);
	x.send();
	crops = (x.responseText);
	x.open('GET', 'getday.php', false);
	x.send();
	days = textToArray(x.responseText);
	x.open('GET', 'getpounds.php', false);
	x.send();
	pounds = textToArray(x.responseText);
	x.open('GET', 'getid.php', false);
	x.send();
	ids = textToArray(x.responseText);
	var total = "";
	for(var i = 0;i < crops.length;i ++) {
		total = total + days[i] + "    " + crops[i] + "    " + pounds[i] + "<br>"
	}
	console.log(crops);
	if (!(crops[0] == undefined)) document.getElementById("data").innerHTML = "<iframe src='fattable.html' width='633' height='400'></iframe>";
	else document.getElementById("data").innerHTML = "<i>No data to display.</i>"
	goals(pounds);
}
function changeInput() {
	if(document.getElementById("delall").checked) document.getElementById("id").disabled=true;
	else document.getElementById("id").disabled = false;
}
autoload();
setInterval(changeInput, 62.5);