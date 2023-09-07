<!DOCTYPE html>
<html>
<head>
    <title>Time Increment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h2 {
            text-align : center;
        }
        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin: 0;
            text-align: center;
        }

        form {
            max-width: 450px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        table {
            max-width: 600px;
            margin: 20px auto;
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Time Increment</h1>
    <form method="post">
        Masukkan waktu (hh:mm:ss): <input type="text" name="input_time" required>
        <button type="submit">Tambah 1 Detik</button>
    </form>

    <?php
    function incrementTime($time) {
        $time_parts = explode(':', $time);
        $hours = intval($time_parts[0]);
        $minutes = intval($time_parts[1]);
        $seconds = intval($time_parts[2]);

        $seconds++;

        if ($seconds >= 60) {
            $seconds = 0;
            $minutes++;

            if ($minutes >= 60) {
                $minutes = 0;
                $hours++;

                if ($hours >= 24) {
                    $hours = 0;
                }
            }
        }

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input_time = $_POST['input_time'];

        echo "<h2>Data Waktu</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Setelah Penambahan 1 detik</th></tr>";

        $example_times = [
            
        ];

        foreach ($example_times as $time) {
            echo "<tr><td>$time</td></tr>";
        }

        if (preg_match('/^\d{2}:\d{2}:\d{2}$/', $input_time)) {
            $result_time = incrementTime($input_time);
            echo "<tr><td>$result_time</td></tr>";
        } else {
            echo "<tr><td colspan='3'>Format waktu tidak valid. Gunakan format hh:mm:ss.</td></tr>";
        }

        echo "</table>";
    }
    ?>

</body>
</html>
