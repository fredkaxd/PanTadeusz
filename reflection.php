<?php

    $servername = "10.254.94.2";
    $database = "s180070";
    $username = "s180070";
    $password = "magda314";
    $connection = new mysqli($servername, $username, $password, $database);
    $db = mysqli_select_db($connection, $database);
    $title = $_POST["title"];
    $reflection = $_POST["reflection"];
    if ($title != '') {
        $insertQuery = "INSERT INTO reflections (title, reflection) VALUES ('$title', '$reflection')";
        mysqli_query($connection, $insertQuery);
    }

    $selectQuery = "SELECT * FROM reflections";
    $results = mysqli_query($connection, $selectQuery);
    mysqli_close($connection);


    $url = 'https://mandrillapp.com/api/1.0/messages/send.json';
    $params = [
        'message' => array(
            'subject' => $title,
            'text' => $reflection,
            'html' => '<p>'.$reflection.'</p>',
            'from_email' => 'uek@no-replay.com',
            'to' => array(
              array(
                'email' => 'wojcikk@wizard.uek.krakow.pl',
                'name' => 'Katarzyna WÛjcik'
              )
            )
        )
    ];

    $params['key'] = 'HEpZLrPrRBEa7W9fLAJKeQ';
    $params = json_encode($params);
    $ch = curl_init();

    if ($title != '') {
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $head = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Reflection</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($results as $result) {
                echo "<tr>";
                echo "<td>" . $result['title'] . "</td>";
                echo "<td>" . $result['reflection'] . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<hr>

<div class="row">
    <div class="col-xs-12 col-sm-6">
        <form role="form" action="?ksiega=reflection" method="post" >
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title">
          </div>
          <div class="form-group">
            <label for="reflection">Reflection</label>
            <textarea name="reflection" class="form-control" id="reflection" rows="5" required></textarea>
          </div>
          <br>
          <button type="submit" class="btn btn-info pull-right">Wy≈õlij</button>
          <br>
        </form>
    </div>
</div> 