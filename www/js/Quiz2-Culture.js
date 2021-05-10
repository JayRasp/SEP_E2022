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
  let questions = [
    new Question("When did the creation of the Belval campus begin ?", ["1992", "2002", "2003", "2010"], "2003"),
    new Question("The University of Luxembourg has 6714 students coming from: ", ["70 countries","115 countries", "129 countries", "218 countries"], "129 countries"),
    new Question("The university is composed of a cultural space. What is its main mission?", ["Run and coordinate cultural, intercultural events and contribute to life on the campus","Promote and improve the living conditions at the University of Luxembourg", "Raise awareness among members of the university community", "Boosting intercultural dialogue"], "Run and coordinate cultural, intercultural events and contribute to life on the campus"),
    new Question("What are the cultural spaces surrounding the Belval campus ?", ["National Museum of History and Art and Dräi Eechelen Museum", "National Center for Literature","National Museum of Natural History", "National Center for Industrial Culture"], "National Museum of History and Art and Dräi Eechelen Museum"),
    new Question("What cultural events took place on the Belval campus in 2020-2021 ?", ["Night of cultures", "Summer in the City: My Urban Piano, outdoor concerts and projections, street theater, exhibitions", "Luxembourg Art Week", "Night of the museums - museum smile"],"Night of cultures")
  ];


  console.log(questions);

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
  // Create Quiz
  let quiz = new Quiz(questions);
  quizApp();

  console.log(quiz);
