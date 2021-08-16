<?php
/**
 * Handle request
 */

$data           = array_key_exists('data', $_POST) && is_array($_POST['data']) ? $_POST['data'] : [];
$formatted_data = [];
if (array_key_exists('name', $data) && $data['name']) {
    array_push($formatted_data, $data['name']);
}
if (array_key_exists('email', $data) && $data['email']) {
    array_push($formatted_data, $data['email']);
}
if (array_key_exists('phone', $data) && $data['phone']) {
    array_push($formatted_data, $data['phone']);
}
if (empty($formatted_data)) {
    echo json_encode([
        'notification' => 'Data is empty'
    ]);
    die();
}
require './class-spreadsheet-api.php';
try {
    $result   = SpreadsheetAPI::add_row([$formatted_data]);
    $response = [
        'result'       => $result,
        'notification' => 'Data appended successfully!',
    ];
    echo json_encode($response);
    die();
} catch (\Exception $e) {
    $response = json_decode($e->getMessage());
    echo json_encode([
        'values'       => array_values($data),
        'notification' => $response->error->message,
        'message'      => $e->getMessage()
    ]);
    die();
}
