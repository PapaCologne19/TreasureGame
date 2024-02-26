var boo_audio = new Audio("sounds/boo.mp3");
var applause_audio = new Audio("sounds/applause.mp3");
var blop_audio = new Audio("sounds/wrong.mp3");
var correct_audio = new Audio("sounds/correct.mp3");
var winOrLose = false;

$(".letter").click(function () {
    $.ajax({
        data: {
            letter: $(this).text(),
            action: 2
        },
        type: "POST",
        dataType: "json",
        url: "controller.php",
        context: this,
        success: function (data) {
            if (!winOrLose) {
                if (data.win == null) {

                    $("#hangman").attr("src", data.image);
                    $("#lives-left").text(data.lives);
                    $("#hint").text(data.hint);

                    $("#guessed-word-div").html(data.guessedWord);
                    $(this).addClass("display-none");

                    var givenWords = data.given_words; 
                    givenWords.forEach(function (letter) {
                        var letterElement = $(".letter:contains('" + letter + "')");
                        letterElement.addClass("disabled");
                    });

                    var selectedLetter = data.letter.toLowerCase();
                    var correctWord = data.word.toLowerCase();

                    if (correctWord.includes(selectedLetter)) {
                        correct_audio.play();
                    } else {
                        blop_audio.play();
                    }

                } else {
                    if (data.win === false) {
                        winOrLose = true;
                        boo_audio.play();
                        $("#lives-left").text(data.lives);
                        $("#lives-left1").text(data.score);
                        $("#hint").text(data.hint);

                        $("#hangman").attr("src", data.image);
                        $("#the-word-was-div").html(data.word);
                        $("#the-word-was-div").removeClass("display-none");
                        $("#play-again-div").removeClass("display-none");
                    } else if (data.win === true) {
                        winOrLose = true;
                        applause_audio.play();
                        $("#hint").text(data.hint);
                        $("#guessed-word-div").html(data.guessedWord);
                        $("#play-again-div").removeClass("display-none");
                        $("#lives-left1").text(data.score);
                    }
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Handle error
        }
    });
});