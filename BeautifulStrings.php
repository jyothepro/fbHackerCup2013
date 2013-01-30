<?
/*
When John was a little kid he didn't have much to do. There was no internet, no Facebook, and no programs to hack on. So he did the only thing he could... he evaluated the beauty of strings in a quest to discover the most beautiful string in the world.

Given a string s, little Johnny defined the beauty of the string as the sum of the beauty of the letters in it.

The beauty of each letter is an integer between 1 and 26, inclusive, and no two letters have the same beauty. Johnny doesn't care about whether letters are uppercase or lowercase, so that doesn't affect the beauty of a letter. (Uppercase 'F' is exactly as beautiful as lowercase 'f', for example.)

You're a student writing a report on the youth of this famous hacker. You found the string that Johnny considered most beautiful. What is the maximum possible beauty of this string?

Input
The input file consists of a single integer m followed by m lines.
Output
Your output should consist of, for each test case, a line containing the string "Case #x: y" where x is the case number (with 1 being the first case in the input file, 2 being the second, etc.) and y is the maximum beauty for that test case.
Constraints
5 ≤ m ≤ 50
2 ≤ length of s ≤ 500

Example Input:
5
ABbCcc
Good luck in the Facebook Hacker Cup this year!
Ignore punctuation, please :)
Sometimes test cases are hard to make up.
So I just go consult Professor Dalves

Example Output:
Case #1: 152
Case #2: 754
Case #3: 491
Case #4: 729
Case #5: 646
*/

$handle = @fopen("input1FB.txt", "r");
$outputArray = array();
if ($handle) {
    if (($counter = fgets($handle, 4096)) !== false) {
        //echo $counter;
   	}
   	for ($i=0; $i<$counter; $i++) {
   		$buffer = fgets($handle, 4096);
   		//echo $buffer . "\n";
   		$ret = getBeauty($buffer);

   		array_push($outputArray, 'Case #' . ($i + 1) . ': ' . $ret . "\n");
	}
    fclose($handle);
    
    $handle = @fopen("output", "w");
    foreach ($outputArray as $k => $v) {
   		fwrite($handle, $v);
	}
  	fclose($handle);
}

function getBeauty($string) {
	$charArray = array();
	$beautyCounter = 0;
	$beautyStarter = 26;
	$new_string = ereg_replace("[^A-Za-z]", "", $string);
	$new_string = strtolower($new_string);
	for ($i=0; $i<strlen($new_string); $i++) {
		if (array_key_exists($new_string[$i], $charArray)) {
			$charArray[$new_string[$i]] += 1;
		} else {
			$charArray[$new_string[$i]] = 1;
		}
	}
	arsort($charArray);
	//print_r($charArray);
	foreach ($charArray as $k => $v) {
		//echo $v . "\n";
		$beautyCounter += $v * $beautyStarter;
		$beautyStarter -= 1;
	}
	return $beautyCounter;
}

