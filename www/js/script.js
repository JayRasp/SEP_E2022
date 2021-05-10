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
    new Question("What are the opening hours of the LLC(Luxembourg Learning Center ?", ["8a.m-22p.m", "7a.m-8p.m", "9a.m-9p.m", "6a.m-8p.m"], "8a.m-22p.m"),
    new Question("When was the University of Luxembourg created ?", ["2003","1995", "1980", "2007"], "2003"),
    new Question("How many students are enrolled at the university ?", ["6714","3540", "10900", "5698"], "6714"),
    new Question("What does FSTM stand for ?", ["Faculty of Science, Technology and Medicine","Faculty of Science, Technology and Mathematics", "Faculty of Social Technologies and Medicine", "Faculty of Social Sciences, Technology and Medicine"], "Faculty of Science, Technology and Medicine")
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
