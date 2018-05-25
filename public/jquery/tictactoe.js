function botTurn(val) {
    var row = val[0];
    var col = val[1];
    var pos = (row * 3 + col) + 1;
    var tile = "#tile-"+pos;
    $("input",$(tile)).val('O');
    $(tile).addClass('marked');
    $(tile).addClass('o-mark');
    trackTicTac(tile,'o-mark');
}

function resetTicTacToe() {
    $("#name").attr('readonly', false);
    $('#level option:not(:selected)').prop('disabled', false);
    $(".tile").removeClass("marked");
    $(".tile").removeClass("o-mark");
    $(".tile").removeClass("x-mark");
    $(".tile").find("input").val("");
    $("#game-result").hide();
    $("#game-result").html("");
    $("#game-result").removeClass("win");
    $("#game-result").removeClass("lost");
    finished = false;
}

function printResult(status,className) {
    $("#game-result").show();
    $("#game-result").html("Game Over."+ status + " <span class='reset' onclick='resetTicTacToe();'>Reset to play again</span>.");
    $("#game-result").addClass(className);
}

function trackTicTac(obj,mark) {
    var winning_probability = [[1, 2, 3], [1, 4, 7], [1, 5, 9], [2, 5, 8], [3, 5, 7], [3, 6, 9], [4, 5, 6], [7, 8, 9]];
    var someonewon = false;
    var markedPosition = $(obj).data("position");
    $.each(winning_probability, function(key, winning_probability_index) {
        if($.inArray(markedPosition, winning_probability_index) >= 0) {
            markedLength = 0;
            $.each(winning_probability_index, function(index,value) {
                var innerSquareClass = $("#tile-"+value).attr("class");
                if(innerSquareClass.indexOf(mark)>0) {
                    markedLength = markedLength+1;
                    if(markedLength == winning_probability_index.length) {
                        finished = true;
                        someonewon = true;
                        if(mark == "x-mark") {
                            status = " You Win!";
                            className = "win";
                        } else {
                            status = " You Lost!";
                            className = "lost";
                        }
                        printResult(status,className);
                    }
                }
            });
        }
    });

    if (($(".tile:not(.marked)").length == 0) && (someonewon == false)) {
        printResult(" You draw!", "draw");
    }
    return finished;
}

function callAPI() {
    var data =  $('#ticTacToeForm').serializeArray();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: $(location).attr('href') + 'api/makeMove',
        data: data,
        error: function(returnval) {
            alert(returnval.textContent);
        },
        success: function (returnval) {
            botTurn(returnval);
        }
    });
}

$(document).ready(function() {
    finished = false;
    $(".tile").on('click', function() {
        if(!finished) {
            $("#name").attr('readonly', true);
            $('#level option:not(:selected)').prop('disabled', true);
            var squareClass = $(this).attr("class");
            if(squareClass.indexOf("marked")<0) {
                $(this).addClass('marked');
                $(this).addClass('x-mark');
                $("input",$(this)).val('X');
                finished = trackTicTac(this,'x-mark');
                if (!finished) {
                    callAPI();
                }
            }
        }
    });
});
