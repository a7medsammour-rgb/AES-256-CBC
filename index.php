<?php
$key = "12345678901234567890123456789012"; // مفتاح التشفير
$iv  = "1234567890123456"; // IV

$encryptedText = "";
$decryptedText = "";
$inputText = "";

if (isset($_POST['encrypt'])) {
    $inputText = $_POST['text'];
    $encryptedText = openssl_encrypt($inputText, "AES-256-CBC", $key, 0, $iv);
}

if (isset($_POST['decrypt'])) {
    $inputText = $_POST['text'];
    $decryptedText = openssl_decrypt($inputText, "AES-256-CBC", $key, 0, $iv);
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>AES-256-CBC Encryption</title>

    <style>
        body {
            font-family: Tahoma, Arial;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 60px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            resize: none;
        }

        .buttons {
            text-align: center;
            margin-top: 15px;
        }

        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
        }

        .encrypt {
            background: #007bff;
            color: #fff;
        }

        .decrypt {
            background: #28a745;
            color: #fff;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .result h3 {
            margin-top: 0;
            color: #444;
        }

        .result p {
            word-wrap: break-word;
            background: #fff;
            padding: 10px;
            border-radius: 5px;
            border: 1px dashed #ccc;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>تشفير AES-256-CBC</h2>

    <form method="post">
        <textarea name="text" rows="5" placeholder="ادخل النص هنا"><?php echo htmlspecialchars($inputText); ?></textarea>

        <div class="buttons">
            <button type="submit" name="encrypt" class="encrypt">تشفير</button>
            <button type="submit" name="decrypt" class="decrypt">فك تشفير</button>
        </div>
    </form>

    <!-- نتيجة التشفير -->
    <?php if (isset($_POST['encrypt']) && $encryptedText != "") { ?>
        <div class="result">
            <h3>النص المشفّر</h3>
            <p><?php echo $encryptedText; ?></p>
        </div>
    <?php } ?>

    <!-- نتيجة فك التشفير -->
    <?php if (isset($_POST['decrypt'])) { ?>
        <div class="result">
            <h3>النص المشفّر</h3>
            <p><?php echo htmlspecialchars($inputText); ?></p>

        
        </div>
    <?php } ?>
</div>

</body>
</html>
