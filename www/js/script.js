class Question {
    constructor(text, choices) {
      this.text = text;
      this.choices = choices;
      this.answer = choices[0];
    }
    isCorrectAnswer(choice) {
      return this.answer === choice;
    }
  }
  //utf8_encode('string') needed to display 'à' , 'é', etc...
  function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

  // Pick a remaining element...
  randomIndex = Math.floor(Math.random() * currentIndex);
  currentIndex -= 1;

  // And swap it with the current element.
  temporaryValue = array[currentIndex];
  array[currentIndex] = array[randomIndex];
  array[randomIndex] = temporaryValue;
  }

  return array;
  }

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
    notExistingQuiz: function() {
      endQuizHTML = "<h1>Quiz does not exist !</h1>";
      if((new URLSearchParams(window.location.search)).get('category')!=null){
        endQuizHTML+='<h3> There is no quiz for category "'+ (new URLSearchParams(window.location.search)).get('category')+'"</h3>';
      }else{
        endQuizHTML+='<h3> No category provided</h3>';
      }
      this.elementShown("quiz", endQuizHTML);
    },
    question: function() {
      this.elementShown("question", quiz.getCurrentQuestion().text);
    },
    choices: function() {
      let choices = quiz.getCurrentQuestion().choices;


shuffle(choices);

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
      var category= (new URLSearchParams(window.location.search)).get('category');
      var categoryFormatted= category.charAt(0).toUpperCase() + category.slice(1);
      this.elementShown("progress", "Question " + currentQuestionNumber + " of " + quiz.questions.length + "</br></br>Category: "+categoryFormatted);
    },
  };

  // Game logic
  quizApp = () => {
    if (quiz.hasEnded()) {
      if(questionsProcessed.length==0){
        console.log("Non existing quiz");
        display.notExistingQuiz();
      }else{
      display.endQuiz();
    }
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
      questionsProcessed.push(new Question(questions[i][0],[questions[i][1],questions[i][2],questions[i][3],questions[i][4]]));
    }
  }
  // Create Quiz
  generateQuestions();
  shuffle(questionsProcessed);
  let quiz = new Quiz(questionsProcessed);
  quizApp();

  //console.log(quiz);
