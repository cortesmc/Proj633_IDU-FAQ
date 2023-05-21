<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='page_all_questions.css' />
    <title>Document</title>
</head>
<body>
    <h1>Titre du site</h1>
    <div id='content'>
        <div id='buttons'>
            <div id='writeQ'>
                <form action='POST'>
                    <input type='submit' class='btn' id='writeBtn' value='Poser une question'>
                </form>
            </div>
            <div id='searchBar'>
                <form action='POST'>
                    <input type="text">
                </form>
            </div>
            <div id='filter'>
                <form action='POST'>
                    <input type='submit' class='btn' id='filterBtn' value='Filtres'>
                </form>
            </div>
            <div id='unvalidatedQ'>

            </div>
        </div>
        <div id='allQuestions'>
            <!-- div avec toutes les questions : modifier php -->
            <div class='question'>
                <a href='' class='questionTitle'>Titre</a>
                <span class='like'>❤</span>
            </div>
            <div class='question'>
                <a href='' class='questionTitle'>Titre</a>
                <span class='like'>❤</span>
            </div>
            <div class='question'>
                <a href='' class='questionTitle'>Titre</a>
                <span class='like'>❤</span>
            </div>
        </div>
    </div>
</body>
</html>