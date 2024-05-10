<?php
require('../../db/connection.php');
session_start();

if (isset($_GET['topic'])) 
{
            $topic = $_GET['topic']; 
            $CatId=$_SESSION['CatId'];
            $sql="select cat_name from category where cat_id=$CatId";
            $result2 = mysqli_query($con, $sql);
            if($result2 && mysqli_num_rows($result2) > 0)
            {
                $row = mysqli_fetch_array($result2);
                $catname=$row['cat_name'];
           
            $sql = "SELECT * FROM `quiz` where trim(category)='$catname' and trim(topic)='$topic'  ORDER BY Rand()";
            //echo $sql;               
            $result1 = mysqli_query($con, $sql);
                // Associative array to store questions
                $questions = array();
                if ($result1) {
    // Loop through each row in the result set
    while ($row = $result1->fetch_assoc()) {
        // Format the row into the desired structure
        $question = array(
            // 'category' => $row['Category'],
            // 'Topic' => array(
            //     array(
            //         $row['Topic'] => array(
            //             array(
                        str_replace(",", '', 'Question') => $row['question'],
                        'OptionA' => $row['optionA'],
                        'OptionB' => $row['optionB'],
                        'OptionC' => $row['optionC'],
                        'OptionD' => $row['optionD'],
                        'Answer' => $row['answer'],
                        'Solution' =>$row['solution'],
                        'Level' =>$row['level'],
                        
            );
            //         )
            //     )
            // )
            //         );
    
        //echo "Questions ".$question;
        // Add the formatted question to the array
        $questions[] = $question;
    }

}
//$json_data = format_json($questions);
 $json_data = json_encode($questions,  JSON_PRETTY_PRINT);

// Output the JSON data
//echo $json_data;
$js_file = 'question.js';
$file_content = "export const questions = " . $json_data ;
file_put_contents($js_file, $file_content);
}
}
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
    <link rel="stylesheet" href="../../resources/CSS/style_quant_topics.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <script type="module">
       import { questions } from './question.js';

document.addEventListener("DOMContentLoaded", function () {
    const questionDiv = document.getElementById('queston');
    const optionDiv = document.getElementById('option');
    const descDiv = document.getElementById('description');
    const resultDiv = document.getElementById('result');
    const questionNoDiv = document.getElementById('questionNo');
    const resdiv= document.getElementById('descdiv');
    const timerDisplay =document.getElementById('timer');
    let currentQuestionIndex = 0;
    let allQuestions = questions;
    let isCompleted = false;
    let correctAnswers = 0;
    let wrongAnswers = 0;
    let selectedAnswer = null;


    let timerInterval; // Variable to hold the timer interval

function startTimer(duration) {
    let timer = duration;
    const timerDisplay = document.getElementById('timer');

    timerInterval = setInterval(function () {
        const minutes = Math.floor(timer / 60);
        const seconds = timer % 60;

        timerDisplay.textContent = `Remaining Time: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

        if (--timer < 0) {
            clearInterval(timerInterval);
            // Implement logic for when the time is up, e.g., submitting the test
            submitTest();
        }
    }, 1000);
}

    // Define an array to store selected answers for each question
    let selectedAnswers = new Array(allQuestions.length).fill(null);

    function displayQuestion() {
        const question = allQuestions[currentQuestionIndex];
        questionDiv.innerHTML = `Question ${currentQuestionIndex + 1}:<br><br>${question.Question}`;
        optionDiv.innerHTML = ''; // Clear previous options
        descDiv.innerHTML = ''; // Clear previous description

        // Display options
        const optionLabels = ['OptionA', 'OptionB', 'OptionC', 'OptionD'];
        var i=1;
        optionLabels.forEach(label => {
            const option = question[label];
            const radioButton = document.createElement('input');
            radioButton.type = 'radio';
            radioButton.name = 'option';
            radioButton.id="option"+ i;
            ++i;
            radioButton.value = option;
            radioButton.style.marginRight = '10px'; // Add margin between radio button and label

            const labelElement = document.createElement('label');
            labelElement.textContent = option;
            labelElement.style.marginRight = '20px'; // Add margin between radio button and label
            labelElement.style.border="1px solid";
            labelElement.style.height="40px";
            labelElement.style.width="200px";
            labelElement.style.borderRadius="20px";

            // Check if there's a saved answer for this question
            if (selectedAnswer === option) {
                radioButton.checked = true;
            }

            radioButton.addEventListener('change', () => {
                selectedAnswer = option;
                checkAnswer();
            });

            optionDiv.appendChild(radioButton);
            optionDiv.appendChild(labelElement);
            optionDiv.appendChild(document.createElement('br')); // Add line break after each option
        });
    }

// Add event listener to the Start button
document.getElementById('startBtn').addEventListener('click', () => {
        // Get the selected level
        const selectedLevel = document.querySelector('input[name="level"]:checked').value.toLowerCase();
        
        // Filter questions based on the selected level
        allQuestions = questions.filter(question => question.Level.toLowerCase() === selectedLevel);
        
        // Call displayQuestion to show the first question
        currentQuestionIndex=0;
        displayQuestion();
        
        document.getElementById('result').textContent = '';

        document.getElementById('submitBtn').style.display="none",
        document.getElementById('nextBtn').style.display="inline"
        updateQuestionNumber(); // Update question number for the initial question
        
        startTimer(1800);

    });




    // Add event listeners to the difficulty level radio buttons
    const difficultyRadios = document.getElementsByName('level');
    difficultyRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            const selectedLevel = radio.value.toLowerCase(); // Convert to lowercase for consistency
            filterQuestionsByLevel(selectedLevel);
            
        });
    });

    // Function to filter questions by difficulty level
    function filterQuestionsByLevel(level) {
        const filteredQuestions = allQuestions.filter(question => question.level.toLowerCase() === level);
        // Update allQuestions with filtered questions
        allQuestions = filteredQuestions;
        currentQuestionIndex = 0; // Reset current question index

        displayQuestion(); // Display the first question after filtering
        document.getElementById('submitBtn').style.display="none"
        document.getElementById('nextBtn').style.display = 'inline'; // Show the Next button

        updateQuestionNumber(); // Update question number
        nextQuestion();
        previousQuestion();
    }


    // Event listener for description button
   // Event listener for description button
document.getElementById('descriptionBtn').addEventListener('click', () => {
    const question = allQuestions[currentQuestionIndex];
    descDiv.textContent = question.Solution; // Display description in descDiv
});


// 


    function nextQuestion() {
        if (currentQuestionIndex < allQuestions.length - 1) {
            currentQuestionIndex++;
            updateQuestionNumber(); // Update question number
            displayQuestion();
        } else {
            // User has completed all questions
            isCompleted = true;
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('submitBtn').style.display = 'inline';
            document.getElementById('result').textContent = `Correct Answers: ${correctAnswers}, Wrong Answers: ${wrongAnswers}`;
        }
    }

    function previousQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            updateQuestionNumber(); // Update question number
            displayQuestion();
        }
    }

    function submitTest() {
    // Implement submission logic here
    alert('Test Submitted!');
    document.getElementById('submitBtn').style.display="none"
    document.getElementById('nextBtn').style.display = 'inline'; // Show the Next button
    
    nextQuestion(); // Call nextQuestion() to show the result after submission
}


    // Function to update the question number
    function updateQuestionNumber() {
        questionNoDiv.textContent = `Question ${currentQuestionIndex + 1}:`;
    }
    //function to check answer and display msg
    function checkAnswer() {
    const question = allQuestions[currentQuestionIndex];
    const selectedOption = document.querySelector('input[name="option"]:checked');
        //alert("hi");
    if (selectedOption) {
        const selectedAnswer = selectedOption.value;
        const correctAnswer = question.correctanswer;
            if(correctAnswer=='A')
            {
                correctAnswer=document.getElementById("option1").value;

            }
            if(correctAnswer=='B')
            {
                correctAnswer=document.getElementById("option2").value;
                
            }
            if(correctAnswer=='C')
            {
                correctAnswer=document.getElementById("option3").value;
                
            }
            if(correctAnswer=='D')
            {
                correctAnswer=document.getElementById("option4").value;
                
            }
        if (selectedAnswer === correctAnswer) {
            resdiv.innerText = 'Correct Answer!';
            resdiv.style.color = 'green'; // Change color to green for correct answer
        } else {
            resdiv.innerText = 'Wrong Answer!';
            resdiv.style.color = 'red'; // Change color to red for wrong answer
        }
    } else {
        resdiv.innerText = 'Please select an answer!';
        resdiv.style.color = 'black'; // Reset color to black
    }
}



// Add event listener to the "Clear Answer" button
document.getElementById('clearBtn').addEventListener('click', () => {
    // Clear the selected answer for the current question
    selectedAnswer = null;
    // Clear background color of all options
    const options = document.querySelectorAll('input[name="option"]');
    options.forEach(option => {
        if (option.checked) {
            option.checked = false; // Uncheck the radio button
            descDiv.innerText="";
            return; // Exit the loop after clearing the selected answer
        }
    });

    // Keep the selected level stable by filtering questions based on the currently checked level radio button
    const selectedLevelRadio = document.querySelector('input[name="level"]:checked');
    const selectedLevel = selectedLevelRadio ? selectedLevelRadio.value.toLowerCase() : 'easy';
    filterQuestionsByLevel(selectedLevel);
});


    document.getElementById('nextBtn').addEventListener('click', nextQuestion);
    document.getElementById('prevBtn').addEventListener('click', previousQuestion);
    document.getElementById('submitBtn').addEventListener('click', submitTest);

    
});


    </script>
</head>

<body>
    <header>
        <?php $path = "../..";  include("../../components/nav_header.php") ;?>
    </header>
    <div style="display: flex; padding-top: 10px; ">
        <p style="margin-left: 300px; padding-left: 20px;">
            <input type="radio" name="level" value="easy" style="margin-left: 20px;" class="form-check-input">
            <label> Easy</label>
            <input type="radio" name="level" value="medium" style="margin-left: 20px;" class="form-check-input">
            <label>Medium</label>
            <input type="radio" name="level" value="hard" style="margin-left: 20px;" class="form-check-input">
            <label>Hard</label>
        </p>
        <button id="startBtn"
         style="margin-left: 100px; width: 80px; background-color: blue; border: none; color: white;
        border-radius: 8px;">Start</button>
         </div>
         <hr width="98%"/>
    <!-- <div style="display: flex; "> 
    <label style="margin-left: 20px;">Question Palette</label>
    <select style="border-radius: 5px;">
        <option value=""></option>
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
    </select>
</div>
    <hr width="98%"> -->
    <div id="timer" style="height: 40px; border: 1px solid; background-color: rgb(11, 10, 10); color: white; padding: 10px; font-size: larger;"></div>
    <br>
    <div style="width: 80%; display: flex; justify-content: center; width: 100vw;">
        <div style="display: flex; justify-content: space-between; min-height: 570px; width: 95%;">
            <div id="queston" style="width: 40%;">
                <b> <span id="questionNo"> Question 1:<br> </span> </b>
            </div>


            <div style="width: 40%;">
                <div style="width: 100%; display: flex; justify-content: center; flex-direction: column;">
                    <div id="option"
                        style=" padding: 10px; padding-left: 30px; font-size: larger; background-color: white; height: 250px; border: 1px solid; border-radius: 10px;">
                    </div>
                    <br>
                    <div id="descdiv" style="border:1px solid ; width: 400px; padding-left: 30px; height: 20px; border-radius: 8px;"> </div><br>
                    <div>
                        <button id="descriptionBtn" class="btn w-25 bg-primary ms-5 text-light">Description</button>
                        <button id="clearBtn" class="btn w-25 bg-primary ms-5 text-light">clear answer</button>
                    </div>

                    <div 
                        style="border: 1px solid; width: 400px;  margin: 18px 0px 0px 34px; padding: 20px; border-radius: 8px;">
                        
                        <div id="description" style="font-style: italic; "></div>

                    </div>

                </div>

                <div>
                    <div id="result" style="color: darkcyan;"></div>
                </div>
            </div>

        </div>
    </div>

    <hr width="98%">


    <div align="right" style="margin: 20px 70px 0px 0px;">

        <button id="prevBtn"
            style="width: 130px; height:40px ; font-size: larger; background-color: rgb(255, 139, 30); color: wheat; border-radius: 5px;border: 0px;  ">Previous</button>
        <button id="nextBtn"
            style="width: 130px; height:40px ; font-size: larger; background-color: rgb(255, 139, 30); color: wheat; border-radius: 5px;border: 0px; margin-left: 20px; ">Next</button>
        <button id="submitBtn"
            style="display: none; width: 130px; height:40px ; font-size: larger; background-color: rgb(255, 139, 30); color: wheat; border-radius: 5px;border: 0px;  ">Submit</button>
    </div>
</body>

</html>




