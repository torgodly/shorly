<!DOCTYPE html>
<html>
<head>
    <title>عيد مبارك</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #e67e22;
            font-size: 24px;
            margin-bottom: 30px;
            margin-top: 50px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        img {
            width: 100%;
            height: 100%;
            margin-top: 50px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, .2);
        }

        .signature {
            margin-top: 50px;
            font-size: 18px;
            font-style: italic;
        }

        .team-name {
            color: #e67e22;
            font-weight: bold;
        }
    </style>
</head>
<body dir="rtl">
<div class="container">
    <h1>عيد فطر مبارك {{ $user->name }} من فريق شورلي!</h1>
    <img src="{{ $message->embed(public_path('/images/mail/Eid-Mobarak.png')) }}" alt="Eid Mubarak">
    <p>بمناسبة عيد الفطر المبارك، يقدم لكم فريق شورلي أطيب التهاني والبركات ونسأل الله أن يديمه علينا وعليكم وعلى الامة الاسلامية، كل عام وأنتم بخير.</p>
    <p>كما نبشركم بانطلاق النسخة الثانية من الموقع والتي تحتوي على ميزات جديدة بإمكانكم استعمالها مجانا.</p>
    <p>أطيب التمنيات من فريق <a href="https://shor.ly" class="team-name">شورلي</a>!</p>
    <p class="signature">اعادة الله علينا بالبركات،</p>
</div>
</body>
</html>
