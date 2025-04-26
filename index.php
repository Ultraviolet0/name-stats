<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Names - Results</title>
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <?php
    include 'functions/utility-functions.php';
    $fileName = 'names.txt';

    $lineNumber = 0;

    // Load up the array
    $FH = fopen($fileName, "r");

    // Return full names array
    $fullNames = getFullNames($FH);

    fclose($FH);

    // $findMe = ',';
    // echo $fullNames[0] . '<br>';
    // echo strpos($fullNames[0], $findMe) . '<br>';
    // echo substr($fullNames[0], 0, strpos($fullNames[0], $findMe));
    // exit();

    // Get all first names
    $firstNames = getFirstNames($fullNames);

    // Get all last names
    $lastNames = getLastNames($fullNames);

    // Get valid names
    [$validFullNames, $validFirstNames, $validLastNames] = getValidNames($fullNames, $firstNames, $lastNames);

    // ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

    echo '<h1>Names - Results</h1>';

    displayAllNames($fullNames);

    displayAllValidNames($validFullNames);

    displayAllUniqueNames($validFullNames);

    displayAllUniqueLastNames($validLastNames);

    displayAllUniqueFirstNames($validFirstNames);

    echo '<h2>Most Common Last Names</h2>';
    displayNameCounts($validLastNames);

    echo '<h2>Most Common First Names</h2>';
    displayNameCounts($validFirstNames);
    ?>
  </div>
</body>

</html>
