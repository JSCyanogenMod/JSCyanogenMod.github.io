<?php
// Ensure the script is accessed via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the incoming data from the SWF file
    $usession = isset($_POST['usession']) ? htmlspecialchars($_POST['usession']) : null;
    $action = isset($_POST['action']) ? htmlspecialchars($_POST['action']) : null;
    $useractive = isset($_POST['useractive']) ? htmlspecialchars($_POST['useractive']) : null;

    // Log the received data (useful for debugging)
    error_log("Session ID: $usession, Action: $action, User Active: $useractive");

    // Perform actions based on the received data
    // For example, validate the session or update user status
    if ($usession && $action && $useractive !== null) {
        // Example response data
        $response = [
            'status' => 'success',
            'message' => 'Data processed successfully',
            'usession' => $usession,
            'action' => $action,
            'useractive' => $useractive
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Invalid input data'
        ];
    }

    // Return the response as URL-encoded variables
    echo http_build_query($response);
} else {
    // Return an error message if not accessed via POST
    echo http_build_query([
        'status' => 'error',
        'message' => 'Invalid request method'
    ]);
}
?>
