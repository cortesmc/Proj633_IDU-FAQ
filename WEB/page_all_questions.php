<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='page_all_questions.css' />
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Titre du site</h1>
    </header>
    <div id='content'>
        <div id='buttons'>
            <div id='writeQ'>
                <form action='' method='post'>
                    <input type='submit' class='btn' id='writeBtn' value='Poser une question'>
                </form>
                <div>
                    <form action='' method='post'></form>
                        <div id='writeHeader'>
                            <span>Sujet</span>
                            <input type='text'>
                        </div>
                        <textarea name='questionTA' id='TextAreaQuestion' cols='30' rows='10'></textarea>
                        <div id='QBtns'>
                            <input type='submit' class='btn' id='backBtn' value='Annuler'>
                            <input type='submit' class='btn' id='sendBtn' value='Envoyer'>
                        </div>
                    </form>
                </div>
            </div>            
            <div id='unvalidatedQ'>

            </div>
            <div id=searchDiv>
                <div id='searchBarDiv'>
                    <form action='' method='post'>
                        <input type='text' id='searchBar'>
                    </form>
                </div>
                <div id='filter'>
                    <form action='' method='post'>
                        <input type='submit' class='btn' id='filterBtn' value='Filtres'>
                    </form>
                </div>
            </div>
        </div>
        <div id='allQuestions'>
            <!-- div avec toutes les questions : modifier php -->
            <div class='question'>
                <a href='' class='questionTitle'>Ceci est un titre</a>
                <input type='submit' value='❤' class='like'></input>
            </div>
            <div class='question'>
                <a href='' class='questionTitle'>Ceci est un titre</a>
                <input type='submit' value='❤' class='like'></input>
            </div>
            <div class='question'>
                <a href='' class='questionTitle'>Ceci est un titre</a>
                <input type='submit' value='❤' class='like'></input>
            </div>
        </div>
    </div>
</body>
</html>