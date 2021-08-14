<?php

require("res/fizzbuzz.php");
require("res/fib.php");
require("res/SN.php");


/* Exercise FizzBuzz */
{
run_fizz();
}
/* ---------------- */

echo("<hr>");

/* Exercise Fibonacci */
{
$val = 5;
echo run_fib($val);
}
/* ---------------- */

echo("<hr>");

/* Social Network Exercise | some tests */
{

/**
create users
*/
$user0 = new Author(0, 'Daniel');
$user1 = new Author(1, 'Ivo');

/**

create posts

*/
$post0 = new Post('wine over bear', 'lets discuss some statistics about wine and bear consumers', $user0);
$post1 = new Post('programming with dark glasses', 'swag/style is also important when writing code!', $user1);

/**
generate feed
*/
$feed = new Feed();

/**
add posts to feed
*/
$feed->addPost($post0);
$feed->addPost($post1);


/**
test deletes
*/
//$feed->delPost($post1, $user1);
$feed->delPost($post1, $user0);

/**
create comments
*/
$comment0 = new Comment('wine better than bear', $user1);
$comment1 = new Comment('it depends!! ', $user0);
$comment2 = new Comment('when i drink bear i go sickomode, wine makes me get in chillmode', $user0);
/**
add comment to post
*/
$post0->addComment($comment0);
$post0->addComment($comment1);
$post0->addComment($comment2);

/**
delete comment
*/
//$post0->delComment($comment1, $user0);
$post0->delComment($comment1, $user1);
//$post0->delComment($comment0, $user0);
//$post0->delComment($comment0, $user1);

/**
display
*/
print_r($feed->getPosts());
//var_dump($feed->getPosts());

}
/* ---------------------------- */

?>
