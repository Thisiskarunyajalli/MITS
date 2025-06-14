
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"] ?? '');
    $message = htmlspecialchars($_POST["message"]);

    $entry = array(
        "name" => $name,
        "email" => $email,
        "subject" => $subject,
        "message" => $message,
        "time" => date("Y-m-d H:i:s")
    );

    $file = 'admin/data.json';
    $data = array();

    if (file_exists($file)) {
        $json = file_get_contents($file);
        $data = json_decode($json, true);
    }

    $data[] = $entry;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    echo "Message received! <a href='index.html'>Go back</a>";
}
?>
