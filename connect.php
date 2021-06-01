<?
// Create connection
$conn = new mysqli("mysql380.umbler.com:41890", "sj", "Sj162901","patrimoniosj");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>