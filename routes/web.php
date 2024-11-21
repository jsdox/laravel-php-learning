<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    //    return view('welcome');
    function factorial($n)
    {
        if ($n == 0) {
            return 1;
        } else {
            return $n * factorial($n - 1);
        }
    }
    return factorial(4);
});
Route::get('/bracketmatch', function () {
    //    return view('welcome');
    function bracketMatch($string)
    {
        $count = 0;
        echo strlen($string);
        echo '<br/>';
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] == '(') {
                $count++;
            } else if ($string[$i] == ')') {
                $count--;
            }
        }
        if ($count == 0) {
            return 1;
        } else {
            return 0;
        }
    }
    echo '<br/>';
    return bracketMatch('())');

});
Route::get('/runlength', function () {
    //    return view('welcome');
    function runLengthEncoding($string): string
    {
        $count = 1;
        $result = '';
        $length = strlen($string);
        for ($i = 0; $i < $length; $i++) {
            if (($length != $i+1) && $string[$i] == $string[$i + 1]) { // if the current character is equal to the next character
                $count++;
            } else {// if the current character is not equal to the next character add the count and the character to the result string
                $result .= $count . $string[$i];
                $count = 1;
            }
        }
        return $result;
    }

    return runLengthEncoding('aaabbbcccc');


});
Route::get('/stringscramble', function () {
    function stringScrample($str1, $str2)
    {
        $str1_length = strlen($str1);
        $str2_length = strlen($str2);
        $match_characters = 0;
        for ($i = 0; $i < $str1_length; $i++) {
            for ($j = 0; $j < $str2_length; $j++) {
                if ($str1[$i] == $str2[$j]) {
                    $match_characters++;
                }
            }
        }
        return $str2_length == $match_characters ? 1 : 0;
    }
    echo '<br/>';
    return stringScrample('scriptng', 'acscriptingi');
});

Route::get('/arrayadditon', function () {
//   function arrayAddition($array)
//    {
//        echo '<br/>';
//        $max = max($array);
//        $sum = array_sum($array) - $max;
//        echo 'max-'. $max;
//        echo '<br/>';
//        echo 'sum of remaining-'. $sum;
//        if ($max == $sum) {
//            return 1;
//        }
//        foreach ($array as $element) {
//            echo '<br/>';
//            if ($element == $max) {
//                break;
//            }
//           echo $element;
//           if ($max < $sum) {
//               if (($max + $element) == $sum) {
//                     return 1;
//               }
//           } else {
//               if (($max - $element) == $sum) {
//                   return 1;
//               }
//           }
//        }
//    }
//    echo '<br/>';
//    return arrayAddition([1, 5, 2, 1, 5, 10]);

    function ArrayAddition($arr) {
        // Sort the array in ascending order to find the largest number
        sort($arr);
        // Pop the largest number from the array
        $target = array_pop($arr);
        // Recursive function to check all combinations
        function checkCombination($arr, $target, $index = 0) {
//            echo '<br>';
//            echo $target;
//            echo '<br/>';
//            echo $index;
//            print_r($arr);
//            if (count($arr) > $index) {
//                echo '<br/>';
//                echo $target - $arr[$index];
//            }
            if ($target == 0) {
//                echo 'target0';
                return true;
            }
            if ($index >= count($arr)) {
                return false;
            }
            // Include the current number in the subset
            if (checkCombination($arr, $target - $arr[$index], $index + 1)) {
//                echo 'in';
                return true;
            }
            // Exclude the current number from the subset
            return checkCombination($arr, $target, $index + 1);

        }

        // Call the recursive function starting from index 0
        return checkCombination($arr, $target) ? "OK" : "NOT";
    }

// Example usage
   // echo ArrayAddition([4, 6, 23, 10, 1, 3]); // Outputs: true
    echo ArrayAddition([21, 23,5,2]); // Outputs: true
});
Route::get('array', function () {
    //Initialize the array
    //find the largest number in the array
    //calculate the sum of the array excluding the largest number
    //Check if the sum of the other numbers equals the largest number

//    $array1 = [5, 1, 3, 2, 10];
//    rsort($array1);
//
//    $sum = max($array1);
//    $calculated_sum = 0;
//
//    $count = count($array1);
//    for ($i = 0; $i < $count; $i++) {
//        if ($array1[$i] == $sum) {
//            continue;
//        }
//        $calculated_sum += $array1[$i];
//        if ($calculated_sum == $sum) {
//            return '1';
//            break;
//        }
//    }
//    echo $calculated_sum == $sum ? '1' : '0';

//    $initialArray = [8,5,4,3,2,1];
//    rsort($initialArray);
//    $largeNumber = $initialArray[0];
//    $sum = 0;
//    $success = false;
//    for($i = 1; $i < count($initialArray); $i++) {
//        $sum += $initialArray[$i];
//        if ($largeNumber < $sum) {
//            $sum -= $initialArray[$i];
//        }
//        if (!$success && $sum === $largeNumber) {
//            $success = true;
//            break;
//        }
//    }
//    echo $success ? "Yes, matched!" : "No";



//    function increment(&$value) {
//        $value++;
//    }
//
//    $num = 5;
//    increment($num);
//    echo $num; // outputs 6
    function arrayAddition($initialArray, $largeNumber, &$sum, &$success, $index = 1) {
        if ($success == 'true') {
            return 'true';
        }
        if ($index >= count($initialArray)) {
            return 'false';
        }
        $sum += $initialArray[$index];
        if ($largeNumber < $sum) {
            $sum -= $initialArray[$index];
        }
        if ($sum === $largeNumber) {
            $success = 'true';
        }
        if ($success == 'false') {
            $index++;
            arrayAddition($initialArray, $largeNumber, $sum, $success, $index);
        }

    }

    $initialArray = [9,5,4,3,2,1];
    rsort($initialArray);
    $largeNumber = $initialArray[0];
    $sum = 0;
    $success = 'false';
    arrayAddition($initialArray, $largeNumber, $sum, $success, 1);
    echo $success;
});

Route::get('fibonacici', function () {
    function fibonacci($n) {
//        $fibonacci = [];
//        for ($i = 0; $i <= $n; $i++) {
//            if ($i == 0) {
//                $fibonacci[$i] = 0;
//            } else if ($i == 1) {
//                $fibonacci[$i] = 1;
//            } else {
//                $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
//            }
//        }
        if ($n == 0) {
            return 0;
        } else if ($n == 1) {
            return 1;
        } else {
            return fibonacci($n - 1) + fibonacci($n - 2);
        }
    }
//    echo fibonacci(7);

    function registerForEvent($name, $email) {
        $sanizedName = filter_var($name, FILTER_SANITIZE_STRING);
        $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $sanizedName . ' ' . $sanitizedEmail;
    }
    return registerForEvent('John Doe', 'email@gmail.com');

    enum DiscountType
    {
        case Standard;
        case Seasonal;
        case Weight;
    }

    function getDiscountedPrice(float $cartWeight, float $totalPrice,
        DiscountType $discountType): float
    {
        $totalPrice = $totalPrice - ($totalPrice * 0.1);
    }


    echo getDiscountedPrice(12, 100, DiscountType::Weight);
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/binary-pattern', function () {
    class binaryPattern {
        // 0, 1, 0, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1
        // 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14
        public function binary($num) {
            $j = 0; // 2 5
            $k = 2; // 3 4
            for ($i = 0; $i < $num; $i++) {
               if ($i == $j) {
                   echo 0 . ',';
                   $j +=  $k;
                   $k += 1;
               } else {
                    echo 1 . ',';
                }
            }

        }
    }
    $binary = new binaryPattern();
    return $binary->binary(3);
});

Route::get('maxprofit', function () {
//    function maxProfit($prices) {
//        $maxProfit = 0;
//        $minPrice = $prices[0];
//        for ($i = 1; $i < count($prices); $i++) {
//            $maxProfit = max($maxProfit, $prices[$i] - $minPrice);
//            $minPrice = min($minPrice, $prices[$i]);
//        }
//        return $maxProfit;
//    }
//    return maxProfit([2, 1, 10, 20]);

    $result = [];
    function calculateMaxProfit($prices, &$result, $count, $index = 0): array|string
    {
        if ($index == $count) {
            return '';
        }
        for ($i = $index; $i < $count; $i++) {
            $result[] = $prices[$i] - $prices[$index];
        }
        calculateMaxProfit($prices, $result, $count, $index + 1);
        return $result;
    }
    $input = [7, 10, 1, 3, 6, 9, 2];
    calculateMaxProfit($input, $result, count($input));
    echo '<pre>';
    print_r(max($result));
});


Route::get('duplicate', function () {
    function duplicate($array)
    {
        $manage_array = [];
        $duplicate = [];
        foreach($array as $key => $value) {
            if (in_array($value, $manage_array)) {
                $duplicate[] = $value;
            }
            $manage_array[$value] = $value;
        }
        return $duplicate;
    }
    return duplicate([1, 2, 3, 6, 3, 6, 1]);
});

Route::get('productofarray', function () {
    $result = [];
    function duplicate($array, &$result, $index = 0)
    {
        if ($index == sizeof($array)) {
            return '';
        }
        $num = 1;
        $index_value = $array[$index];
        foreach($array as $key => $value) {
            if ($index_value != $value) {
                $num = $num * $value;
            }
        }
        $result[$index] = $num;
        duplicate($array, $result, $index + 1);
        return $result;
    }
    duplicate([10, 3, 5, 6, 2], $result);
    echo '<pre>';
    print_r($result);
});

Route::get('maxsumofarray', function () {
    function maxSubarraySum($arr) {
        $max_sum = PHP_INT_MIN; // Initialize the maximum sum to a very small value
        $current_sum = 0;
        foreach ($arr as $value) {
            echo "<br/>";
            // Update the current sum to either the current value or the sum including the current value
//            $current_sum = max($value, $current_sum + $value);
            // Update the global maximum sum if the current sum is larger
//            $max_sum = max($max_sum, $current_sum);

            $current_sum = ($value > $current_sum) ? $value: $current_sum + $value;
            echo $current_sum;
            echo "<br/>";
            $max_sum = ($max_sum > $current_sum) ? $max_sum: $current_sum;
            echo $max_sum;
            echo "<br/>";
        }
        return $max_sum;
    }
// Example usage
    $arr = [-2, -4];
//    $arr = [1,2,5,-4];
    echo "<br/>Maximum Sum = " . maxSubarraySum($arr); // Output: 6

  //######################################################################
//    echo "<br/>The smallest integer is: " . PHP_INT_MIN . "<br/>";
//    echo "The largest integer is: " . PHP_INT_MAX . "<br/>";
//
//    $max_sum = PHP_INT_MIN; // Initialize with the smallest possible value
//    $current_sum = -10;
//    $max_sum = max($max_sum, $current_sum);
//
//    echo "The maximum sum is: " . $max_sum . "\n";
});


Route::get('maxProductArray', function () {
    function maxProductArray($arr) {
        $max_sum = PHP_INT_MIN; // Initialize the maximum sum to a very small value
        $current_value = 1;
        foreach ($arr as $value) {
            echo "<br/>";
            $current_value = $current_value * $value;
            if ($current_value != 0) {
                echo 'max';
                $max_sum = $current_value;
            }
            echo $current_value;
        }
        return $max_sum;
    }

    $arr = [-2, 6, -3, -10, 0, 2];
    echo "<br/>Maximum product of array = " . maxProductArray($arr); // Output: 6
});

Route::get('sumoftarget', function () {
    //Given an array arr[] of n integers and a target value, the task is to find whether there is a pair of elements in the array whose sum is equal to target. This problem is a variation of
    function sum($arr, $target) {
        $count = count($arr);
        $find = 'false';
        for ($i = 0; $i < $count; $i++) {
            $element = $arr[$i];
            for ($j = $i + 1; $j < $count; $j++) {
                if ($element + $arr[$j] == $target) {
                    $find = 'true';
                }
            }
        }
        return $find;
    }
    $arr = [0, -1, 2, -3, 1];
    echo "<br/>Pair with given Sum (Two Sum) is = " . sum($arr, $target = -2);
});


