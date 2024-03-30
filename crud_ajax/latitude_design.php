<?php

$GOOGLE_API_KEY = 'AIzaSyDHN1eXoIBAnZTWH4WutZCL3bjuZ3ZzCzY';

if (isset($_POST['submit'])) {
    $address = $_POST['address'];
    $formatted_address = str_replace(' ', '+', $address);
    $geocodeFromAddr = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$formatted_address}&key={$GOOGLE_API_KEY}");
    print_r($geocodeFromAddr);

    $apiResponse = json_decode($geocodeFromAddr);
    if (!empty($apiResponse->error_message)) {
        $api_error = $apiResponse->error_message;
    } else {
        $latitude  = $apiResponse->results[0]->geometry->location->lat;
        $longitude = $apiResponse->results[0]->geometry->location->lng;

        $formatted_address  = $apiResponse->results[0]->formatted_address;
    }
}

?>

<html>

<head>
    <title>Get Latitude and Longitude from address</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

</html>

<body>
    <h1>Get Latitude and Longitude from Address</h1>
    <div class="wrapper">
        <?php if (!empty($api_error)) { ?>
            <div class="alert alert-danger"><?php echo $api_error; ?></div>
        <?php } ?>
        <form method="post">
            <div class="form_group">
                <label>Address:</label>
                <input type="text" name="address" class="form_control" value="" placeholder="Enter address" required>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Get geo data">
        </form>
        <?php if (!empty($api_response)) { ?>
            <div class="disp_data">
                <p>Formatted Address: <b> <?php echo !empty($formatted_address) ? $formatted_address : ''; ?></b></p>
                <p>Latitude: <b> <?php echo !empty($latitude) ? $latitude : ''; ?></b></p>
            </div>
        <?php } ?>
    </div>
</body>