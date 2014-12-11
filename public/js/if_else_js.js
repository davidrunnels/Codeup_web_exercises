var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];
var favorite = 'green';

	if (color == 'red') {
	console.log("Central Intelligence Agency... Now, there's a contradiction in terms.");

} else if (color == 'orange') {
	console.log('I was cured, all right!');

} else if (color == 'yellow') {
	console.log('We all live in a yellow submarine...');

} else if (color == 'green') {
		console.log("I think this boy's cheese has done slid off his cracker.");

} else if (color == 'blue') {
	console.log('Blue is the color of smurfs.');

} else if (color == 'indigo' || 'violet') {
	console.log('My name is Indigo Montoya. You killed by father.  Prepare to die.');
} 

message = (color == favorite) ? "This is your favorite color!" : "Sorry, no dice.";
	console.log(message);
