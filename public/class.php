<?php

class Conversation
{
    // Property to hold name
	public $name = '';

    // Method to say hello to name
	public function sayHello($newLine = false)
	{
		// Set the greeting name
		$greeting = "Hello {$this->name}";

		// Return greeting, checking for newline
		return ($newLine) ? "$greeting\n" : $greeting;
	}
}

// Create a new instance of Conversation
$chat = new Conversation();

// Set the $name variable
$chat->name = 'Codeup';

// Output greeting to $name
echo $chat->sayHello();


// Create a new instance of Conversation
// $talk = new Conversation();

// Set the $name variable
// $talk->name = 'David';

// Output greeting to $name
// echo $talk->sayHello();

// $talk2 = new Conversation();
// $talk2->name = 'Isaac';
// echo $talk2->sayHello();