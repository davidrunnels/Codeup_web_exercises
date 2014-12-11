
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

switch (color) {
	case "red":
        console.log("You are red.");
        break;
    case "orange":
        console.log("You are orange.");
        break;
    case "yellow":
        console.log("You are yellow.");
        break;
     case "green":
        console.log("You are green.");
        break;
     case "blue":
        console.log("You are blue.");
        break;
    default:
        console.log("You are unknown to me.");
        break;
    // todo: create a case statement that will handle every color except indigo and violet
    // todo: when a color is encountered log a message that tells the color, and an object of that color
    //       example: Blue is the color of the sky.

    // todo: create a default case that will catch indigo and violet
    // todo: for the default case, log: I do not know anything by that color.
}