<?php
/*
 * @Author: AJ Javadi 
 * @Email: amirjavadi25@gmail.com
 * @Date: 2025-07-30 01:34:24 
 * @Last Modified by: Someone
 * @Last Modified time: 2025-07-30 01:53:32
 * @Description: file:///Users/aj/Herd/php-intermediate-blog/bin/misc_command.php
 *  miscellaneous cli commands for the blog management system
 */


require_once __DIR__ . "/vendor/autoload.php";

$climate = new \League\CLImate\CLImate;

$climate->red('Whoa now this text is red.');
$climate->blue('Blue? Wow!');
$climate->green('Green is the color of life.');
$climate->yellow('Yellow is the color of sunshine.');
$climate->magenta('Magenta is a color that is often associated with creativity.');
$climate->cyan('Cyan is a color that is often associated with calmness.');
$climate->white('White is the color of purity and simplicity.');

//* INFO 

$climate->info('This is an informational message.');
$climate->comment('This is a comment.');

//* WARNING
$climate->warning('This is a warning message.');
$climate->error('This is an error message.');
$climate->error('This is an error message with a stack trace.', true);


//* SUCCESS
$climate->success('This is a success message.');
$climate->shout('This is a shout message!');

//* QUESTION
$climate->question('What is your name?');
$name = $climate->input('Please enter your name:')->prompt();
$climate->info("Hello, $name!");

//* ASK
$climate->ask('What is your favorite color?');
$color = $climate->input('Please enter your favorite color:')->prompt();
$climate->info("Your favorite color is $color."); 

//* TABLE
$data = [
    ['Name' => 'Alice', 'Age' => 30, 'City' => 'New York'],
    ['Name' => 'Bob', 'Age' => 25, 'City' => 'Los Angeles'],
    ['Name' => 'Charlie', 'Age' => 35, 'City' => 'Chicago'],
];
$climate->table($data);

//* PROGRESS BAR
$climate->progress()->start(100);
for ($i = 0; $i < 100; $i++) {
    usleep(50000); // Simulate some work
    $climate->progress()->advance();
}
$climate->progress()->finish();

//* FILE
$file = __DIR__ . '/sample.txt';
file_put_contents($file, "This is a sample file created by the CLI command.\n");
$climate->file($file)->info('File created successfully.');

//* COMMAND
$climate->command('ls -l', 'List files in the current directory');
$climate->command('pwd', 'Print the current working directory');
$climate->command('whoami', 'Display the current user');
$climate->command('date', 'Display the current date and time');
$climate->command('php -v', 'Display the PHP version');
$climate->command('git status', 'Display the current Git status');
$climate->command('composer install', 'Install Composer dependencies');
$climate->command('npm install', 'Install NPM dependencies');

//* INPUT
$input = $climate->input('Please enter some input:')->prompt();
$climate->info("You entered: $input");
//* MULTI-LINE INPUT
$multiLineInput = $climate->input('Please enter multiple lines of input (press Enter to finish):')
    ->accept(function ($input) {
        return !empty($input);
    })
    ->prompt();
$climate->info("You entered:\n$multiLineInput");

//* CONFIRM
if ($climate->confirm('Do you want to proceed?')->confirmed()) {
    $climate->info('You chose to proceed.');
} else {
    $climate->info('You chose not to proceed.');
}   

//* CHOICE
$choice = $climate->radio('Please choose an option:', ['Option 1', 'Option 2', 'Option 3'])
    ->defaultTo('Option 1')
    ->prompt();
$climate->info("You chose: $choice");  
//* SLIDER
$sliderValue = $climate->slider('Please select a value between 1 and 10:', 1, 10)
    ->defaultTo(5)
    ->prompt();
$climate->info("You selected: $sliderValue");  
//* PASSWORD
$password = $climate->password('Please enter your password:')
    ->prompt();
$climate->info('Your password has been set.'); 

//* MULTI-SELECT
$multiSelect = $climate->checkboxes('Please select multiple options:', ['Option A
', 'Option B', 'Option C'])
    ->defaultTo(['Option A'])
    ->prompt();
$climate->info("You selected: " . implode(', ', $multiSelect));

//* MULTI-LINE SELECT
$multiLineSelect = $climate->multiline('Please enter multiple lines of text (
press Enter to finish):')
    ->accept(function ($input) {
        return !empty($input);
    })
    ->prompt();
$climate->info("You entered:\n$multiLineSelect");

//* INFO with multi-line select
$climate->info('You can use multi-line input to provide detailed information or comments.');
// * INFO with multi-line select