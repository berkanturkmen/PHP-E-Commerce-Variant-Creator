<?php

function myFunction($a, $b = [])
{
	if (empty($b)) {
		$a = array_reverse(array_filter($a, 'count'));
	}

	$c = array_pop($a);

	foreach ($c as $d) {
		if (empty($a)) {
			yield array_merge($b, [$d]);
		} else {
			yield from myFunction($a, array_merge($b, [$d]));
		}
	}
}

$a = [['Red', 'Green', 'Blue'], ['S', 'M', 'L']];

print_r('<pre>');
print_r(iterator_to_array(myFunction($a), false));
print_r('</pre>');
