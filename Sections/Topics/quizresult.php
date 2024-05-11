<?php
require('../../db/connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../resources/CSS/style.css">
    <!-- <link rel="stylesheet" href="../../resources/CSS/style_quant_topics.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> -->


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Page</title>
    <style>
         /* body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        } */

        .wrapper {


            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            /* margin: 0;
            background-color: #f5f5f5; */



            /* max-width: 800px; */
            width: 100%;
          
            flex-direction: column;
            align-items: center;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            width: 100%;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
        }

        .text-success {
            color: green;
        }

        .text-danger {
            color: red;
        }
    </style>
    <script type="module">
        document.addEventListener("DOMContentLoaded", function() {
    // Retrieve question data from localStorage
    const allQuestionsJSON = localStorage.getItem('allQuestions');
    const allQuestions = JSON.parse(allQuestionsJSON);

    // Initialize variables for tracking correct and wrong answers
    let correctAnswers = 0;
    let wrongAnswers = 0;

    // Get the container where you want to display the questions
    const questionsContainer = document.getElementById('questions-container');

    // Iterate over each question
    allQuestions.forEach((question, index) => {
        let userAns="";
        if(question.OptionA==question.selectedAnswer)
        {
            userAns="OptionA";
        }
        if(question.OptionB==question.selectedAnswer)
        {
            userAns="OptionB";
        }
        if(question.OptionC==question.selectedAnswer)
        {
            userAns="OptionC";
        }
        if(question.OptionD==question.selectedAnswer)
        {
            userAns="OptionD";
        }
        // Create card element for each question
        const card = document.createElement('div');
        card.classList.add('card');
        card.innerHTML = `
            <div class="card-body">
                <h5 class="card-title">Question ${index + 1}</h5>
                <p class="card-text">${question.Question}</p>
                <form id="questionForm${index}">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer${index}" id="optionA${index}" value="OptionA" ${userAns === 'OptionA' ? 'checked' : ''}>
                                <label class="form-check-label" for="optionA${index}">
                                    ${question.OptionA}
                                </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer${index}" id="optionB${index}" value="OptionB" ${userAns === 'OptionB' ? 'checked' : ''}>
                                <label class="form-check-label" for="optionB${index}">
                                    ${question.OptionB}
                                </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer${index}" id="optionC${index}" value="OptionC" ${userAns === 'OptionC' ? 'checked' : ''}>
                                <label class="form-check-label" for="optionC${index}">
                                    ${question.OptionC}
                                </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer${index}" id="optionD${index}" value="OptionD" ${userAns === 'OptionD' ? 'checked' : ''}>
                                <label class="form-check-label" for="optionD${index}">
                                    ${question.OptionD}
                                </label>
                    </div>
                </form>
                <p>Attempted Answer: ${question.selectedAnswer || 'Not attempted'}</p>
                <p>Correct Answer: ${question.Answer}</p>
            </div>
        `;
        userAns=userAns.replace("Option","");
        // Check if attempted answer matches correct answer
        if (userAns && userAns === question.Answer) {
            card.classList.add('text-success'); // Add class for correct answer
            correctAnswers++;
        } else if (question.selectedAnswer) {
            card.classList.add('text-danger'); // Add class for wrong answer
            wrongAnswers++;
        }

        // Append card to container
        questionsContainer.appendChild(card);
    });

    // Display total score
    const scoreContainer = document.getElementById('score-container');
    scoreContainer.innerHTML = `
        <p>Total Correct Answers: ${correctAnswers}</p>
        <p>Total Wrong Answers: ${wrongAnswers}</p>
    `;
});

    </script>
</head>
<body>
    <header>
        <?php $path = "../..";  include("../../components/nav_header.php") ;?>
    </header>

  <div class="wrapper">
     <div class="container" id="score-container"></div>
        <div class="container" id="questions-container"></div>
       
    </div>

</body>
</html>
