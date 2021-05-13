class Question {
    constructor(text, choices, answer) {
      this.text = text;
      this.choices = choices;
      this.answer = answer;
    }
    isCorrectAnswer(choice) {
      return this.answer === choice;
    }
  }
  //utf8_encode('string') needed to display 'à' , 'é', etc...


  //console.log(questions);

  class Quiz {
    constructor(questions) {
      this.score = 0;
      this.questions = questions;
      this.currentQuestionIndex = 0;
    }
    getCurrentQuestion() {
      return this.questions[this.currentQuestionIndex];
    }
    guess(answer) {
      if (this.getCurrentQuestion().isCorrectAnswer(answer)) {
        this.score++;
      }
      this.currentQuestionIndex++;
      document.getElementById("quiz").innerHTML = document.getElementById("quiz").innerHTML;
    }
    hasEnded() {
      return this.currentQuestionIndex >= this.questions.length;
    }
  }

  // Regroup all  functions relative to the App Display
  const display = {
    elementShown: function(id, text) {
      let element = document.getElementById(id);
      element.innerHTML = text;
    },
    endQuiz: function() {
      endQuizHTML = `
        <h1>Quiz finished !</h1>
        <h3> Your score : ${quiz.score} / ${quiz.questions.length}</h3>`;
      this.elementShown("quiz", endQuizHTML);
    },
    question: function() {
      this.elementShown("question", quiz.getCurrentQuestion().text);
    },
    choices: function() {
      let choices = quiz.getCurrentQuestion().choices;

      guessHandler = (id, guess) => {
        document.getElementById(id).onclick = function() {
          quiz.guess(guess);
          quizApp();
        }
      }
      // display choices and handle guess
      for(let i = 0; i < choices.length; i++) {
        this.elementShown("choice" + i, choices[i]);
        guessHandler("guess" + i, choices[i]);
      }
    },
    progress: function() {
      let currentQuestionNumber = quiz.currentQuestionIndex + 1;
      this.elementShown("progress", "Question " + currentQuestionNumber + " of " + quiz.questions.length);
    },
  };

  // Game logic
  quizApp = () => {
    if (quiz.hasEnded()) {
      display.endQuiz();
    } else {
      display.question();
      display.choices();
      display.progress();
    }
  }
  var questionsProcessed=[];
  generateQuestions = () => {
    for(var i=0;i<questions.length;i++)
    {
      questionsProcessed.push(new Question(questions[i][0],[questions[i][1],questions[i][2],questions[i][3],questions[i][4]],questions[i][1]));
    }
  }
  // Create Quiz
  generateQuestions();
  let quiz = new Quiz(questionsProcessed);
  quizApp();

  //console.log(quiz);
