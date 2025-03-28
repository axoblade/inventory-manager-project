require_once("./db.php");

// Initialize the database connection
$db = new MySQLDatabase();

// Insert example
$insertData = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'age' => 30
];
$insertId = $db->insert('users', $insertData);

// Fetch data example
$users = $db->fetchData('users', ['age' => 30], 'name, email');

// Update example
$updateSuccess = $db->update('users', 1, [
'name' => 'John Smith',
'email' => 'john.smith@example.com'
]);

// Delete example
$deleteSuccess = $db->delete('users', 1);

// Close connection when done
$db->close();
