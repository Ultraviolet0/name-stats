<?php

/**
 * Dump and die function based on the example from Laracasts.
 * Displays the contents of the variable passed in an easy-to-read
 * format then exits the program
 *
 * @param   Mixed  $value  Any variable of mixed data type
 *
 * @return  Nothing          
 */

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  exit();
}

function getFullNames($FH)
{
  $lineNumber = 0;
  $fullNames = [];

  $nextName = fgets($FH);

  while (!feof($FH)) {
    if ($lineNumber % 2 == 0) {
      $fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));
    }

    $lineNumber++;
    $nextName = fgets($FH);
  }

  return $fullNames;
}

function getFirstNames($fullNames)
{
  $firstNames = [];

  foreach ($fullNames as $fullName) {
    $startHere = strpos($fullName, ",") + 1;
    $firstNames[] = trim(substr($fullName, $startHere));
  }

  return $firstNames;
}

function getLastNames($fullNames)
{
  $lastNames = [];

  foreach ($fullNames as $fullName) {
    $stopHere = strpos($fullName, ",");
    $lastNames[] = substr($fullName, 0, $stopHere);
  }

  return $lastNames;
}

function getValidNames($fullNames, $firstNames, $lastNames)
{
  $validFirstNames = [];
  $validLastNames = [];
  $validFullNames = [];

  for ($i = 0; $i < count($fullNames); $i++) {
    // jam the first and last name together without a comma, then test for alpha-only characters
    if (ctype_alpha($lastNames[$i] . $firstNames[$i])) {
      $validFirstNames[$i] = $firstNames[$i];
      $validLastNames[$i] = $lastNames[$i];
      $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
  }

  return [$validFullNames, $validFirstNames, $validLastNames];
}

function displayAllNames($fullNames)
{
  echo '<h2>All Names</h2>';
  echo "<p>There are " . count($fullNames) . " total names</p>";
  echo '<ul class="scroll-list">';
  foreach ($fullNames as $fullName) {
    echo "<li>$fullName</li>";
  }
  echo "</ul>";
}

function displayAllValidNames($validFullNames)
{
  echo '<h2>All Valid Names</h2>';
  echo "<p>There are " . count($validFullNames) . " valid names</p>";
  echo '<ul class="scroll-list">';
  foreach ($validFullNames as $validFullName) {
    echo "<li>$validFullName</li>";
  }
  echo "</ul>";
}

function displayAllUniqueNames($validFullNames)
{
  echo '<h2>Unique Names</h2>';
  $uniqueValidNames = (array_unique($validFullNames));
  echo ("<p>There are " . count($uniqueValidNames) . " unique names</p>");
  echo '<ul class="scroll-list">';
  foreach ($uniqueValidNames as $uniqueValidNames) {
    echo "<li>$uniqueValidNames</li>";
  }
  echo "</ul>";
}

function displayAllUniqueLastNames($validLastNames)
{
  echo '<h2>Unique Last Names</h2>';
  $uniqueValidLastNames = (array_unique($validLastNames));
  echo ("<p>There are " . count($uniqueValidLastNames) . " unique last names</p>");
  echo '<ul class="scroll-list">';
  foreach ($uniqueValidLastNames as $uniqueValidLastName) {
    echo "<li>$uniqueValidLastName</li>";
  }
  echo "</ul>";
}


function displayAllUniqueFirstNames($validFirstNames)
{
  echo '<h2>Unique First Names</h2>';
  $uniqueValidFirstNames = (array_unique($validFirstNames));
  echo ("<p>There are " . count($uniqueValidFirstNames) . " unique first names</p>");
  echo '<ul class="scroll-list">';
  foreach ($uniqueValidFirstNames as $uniqueValidFirstName) {
    echo "<li>$uniqueValidFirstName</li>";
  }
  echo "</ul>";
}

function displayNameCounts($names) {
  $nameCounts = array_count_values($names);

  arsort($nameCounts);

  echo '<ul class="scroll-list">';
  foreach ($nameCounts as $name => $count) {
    echo "<li>$name: $count</li>";
  }
  echo "</ul>";
}
